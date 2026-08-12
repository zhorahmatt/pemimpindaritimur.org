# RBAC foundation and invited accounts

## Scope

Implement the authorization foundation before building member profiles or activity history:

- Add granular roles and permissions using `spatie/laravel-permission`.
- Secure every existing admin and registration-management route server-side.
- Add admin-managed user invitations; keep public registration disabled.
- Add role/permission and account-management screens to the existing Inertia admin UI.
- Preserve public event registration forms, but protect their dashboards, status updates, deletes, and exports.
- Defer member contact/profile fields, AsiaWorks Basic/Advanced/Leadership records, and member-activity participation to the next phase.

## 1. Install and configure RBAC

- Add a Laravel 12-compatible `spatie/laravel-permission` dependency in `composer.json`/`composer.lock` and publish its standard config and migrations.
- Add `app/Support/Rbac/PermissionCatalog.php` as the canonical source of permission names so routes, seeders, tests, and shared frontend abilities do not duplicate strings.
- Add `Spatie\Permission\Traits\HasRoles` to `app/Models/User.php`.
- Register Spatie's `role`, `permission`, and `role_or_permission` middleware aliases in `bootstrap/app.php`.
- Add a `Gate::before` rule in `app/Providers/AppServiceProvider.php` so only the seeded `super-admin` role bypasses individual permission checks.

Use this initial permission taxonomy:

- `admin.dashboard.view`
- `admin.users.view`, `admin.users.invite`, `admin.users.update`, `admin.users.delete`, `admin.users.assign-role`
- `admin.roles.view`, `admin.roles.create`, `admin.roles.update`, `admin.roles.delete`
- CRUD permissions for `content.galleries`, `content.activities`, `content.programs`, `content.blogs`, `content.testimonials`, and `content.partners`
- `foundation-profile.view`, `foundation-profile.update`
- `registrations.ilmu-keuangan.view|update|delete|export`
- `registrations.minaut.view|update|delete|export`

Seed these roles:

- `super-admin`: Gate bypass; not assignable through the UI.
- `admin`: operational access to current CMS, foundation profile, registrations, and user viewing/inviting/updating/role assignment.
- `editor`: publication content permissions only, plus dashboard access.
- `registration-officer`: registration dashboard permissions only, plus dashboard access.
- `member`: authenticated internal member with no admin-module permissions yet; reserved for the member portal in the next phase.

## 2. Seed safely

- Add `database/seeders/RolesAndPermissionsSeeder.php` to create/update permissions and synchronize the predefined roles idempotently, resetting Spatie's permission cache before and after synchronization.
- Update `database/seeders/DatabaseSeeder.php` to run roles/permissions before users.
- Update `database/seeders/UserTableSeeder.php` to `updateOrCreate` the bootstrap administrator and assign `super-admin`; read its initial credentials from environment/config rather than creating duplicate users on repeated seeding.
- Document the required production bootstrap-admin environment variables in `.env.example`; do not expose a default production password.

## 3. Enforce authorization on routes

Refactor `routes/web.php` into explicit route groups and action-level permission checks:

- Keep `/admin/*` behind `auth`.
- Require `admin.dashboard.view` for the dashboard.
- Apply matching `view/create/update/delete` permissions to each existing admin resource route rather than checking only the index route.
- Preserve self-account management as `/admin/account`, available to every authenticated account, and separate it from user administration.
- Add `/admin/users` routes for listing, inviting, editing, deleting, and assigning roles, each guarded by its own `admin.users.*` permission.
- Add `/admin/roles` routes for role CRUD and permission synchronization, guarded by `admin.roles.*`; block editing/deleting `super-admin` and prevent assignment of that role through normal UI endpoints.
- Keep public `GET`/`POST` routes for the Ilmu Keuangan and Minaut forms.
- Put their dashboard, status-update, delete, and export routes behind `auth` plus the matching `registrations.*` permission.
- Correct the duplicated Minaut GET/POST route name by naming the POST route `minaut.store`, then update `resources/js/Pages/User/Others/Minaut/Index.vue` if it references the old name.
- Return ordinary Laravel/Inertia-compatible 403 responses for authenticated users without permission; verify the login redirect for guests.

Authorization in middleware/controllers remains authoritative. Frontend visibility is only a usability layer.

## 4. Build admin-controlled invitations

Add an invitation lifecycle rather than creating users with shared temporary passwords:

- Add `database/migrations/*_create_user_invitations_table.php` with inviter FK, name, normalized email, a uniquely indexed hashed token, intended role, expiry, accepted timestamp, and timestamps.
- Add `app/Models/UserInvitation.php` with casts and relationships to inviter and accepted user where applicable.
- Add an admin invitation action/controller under `app/Http/Controllers/Admin/` that validates a unique email and an assignable role, invalidates/replaces an outstanding invite for the same email, stores only a token hash, and sends a time-limited notification.
- Add `app/Notifications/UserInvitationNotification.php` with the one-time acceptance URL. Use Laravel's configured mail transport; tests should fake notifications.
- Add public guest routes and `app/Http/Controllers/Auth/AcceptInvitationController.php` for displaying and accepting a valid invitation.
- Add `resources/js/Pages/Auth/AcceptInvitation.vue`, reusing `resources/js/Layouts/Auth.vue`, with read-only name/email and password/confirmation fields.
- Accept invitations transactionally: lock/validate token, reject expired/used invitations, create the user, assign the intended role, mark the invite accepted, log the user in, and redirect according to access (`/admin/dashboard` only if allowed; otherwise a safe authenticated account/member landing route).
- Mark invited email addresses verified when the invite is accepted, because control of the invited mailbox was demonstrated.
- Add invite resend/revoke behavior to user management if an invite remains pending.
- Add a rate limiter for invite acceptance attempts and never expose raw tokens in database fields or logs.

Disable open account creation:

- Remove `Features::registration()` from `config/fortify.php`.
- Keep `app/Actions/Fortify/CreateNewUser.php` unused by Fortify; verify both GET and POST `/register` are unavailable.
- Retain Fortify login and password-reset behavior.

## 5. Separate self-account and user administration

Refactor `app/Http/Controllers/Admin/UserController.php` so its current self-update behavior cannot be confused with managing arbitrary accounts:

- Move current authenticated-user account methods to `app/Http/Controllers/AccountController.php` (or clearly named `account` methods) and serve `resources/js/Pages/Admin/User/Account.vue`, preserving current-password verification.
- Use `Admin/UserController` for paginated/searchable user and pending-invitation administration.
- Validate role assignment against allowlisted roles; prevent deleting oneself, deleting the last super-admin, changing a super-admin through normal endpoints, or granting `super-admin` without a dedicated bootstrap mechanism.
- Add `app/Http/Controllers/Admin/RoleController.php` for role CRUD and permission synchronization; predefined `super-admin` remains immutable.
- Add/update Inertia pages under `resources/js/Pages/Admin/User/` and `resources/js/Pages/Admin/Role/` using existing Admin layout, form, pagination, flash-message, and SweetAlert conventions.

## 6. Make navigation permission-aware

- Extend `app/Http/Middleware/HandleInertiaRequests.php` to share the authenticated user's role names and a boolean permission map derived from `PermissionCatalog`.
- Update `resources/js/Components/Sidebar.vue` to show each current module only when the account can view it.
- Add User Management and Role Management links only for their corresponding permissions.
- Rename the existing Account link/route so it remains visible to all authenticated accounts without implying it manages users.
- Display role names dynamically rather than the hardcoded `Admin` badge in the current account page.

## 7. Verification

Add PHPUnit feature tests with `RefreshDatabase`, model factories, and notification fakes:

- Permission and role seeders are idempotent and create the complete catalog.
- Bootstrap user receives `super-admin`; `super-admin` bypass works.
- Guests are redirected from protected routes.
- Authenticated accounts receive 403 for modules/actions they lack.
- Each role can access only its intended modules, including distinct create/update/delete checks.
- Ilmu Keuangan and Minaut public forms remain accessible, while dashboard/view/update/delete/export operations require their exact permissions.
- Public Fortify registration GET/POST routes are disabled.
- An authorized admin can create an invitation; unauthorized accounts cannot.
- Raw invitation tokens are not stored, expired/revoked/used tokens fail, and acceptance is single-use.
- Accepting an invite creates a verified user, assigns the selected role, authenticates the account, and marks the invitation accepted.
- Admin UI rules prevent self-deletion, last-super-admin deletion, and UI assignment/modification of `super-admin`.
- Self-account updates still require the current password when changing passwords and cannot alter roles.

Run:

- `php artisan migrate:fresh --seed` against the test environment.
- `php artisan test`.
- `./vendor/bin/pint --test`.
- `npm run build`.
- Inspect `php artisan route:list` to confirm middleware and route names.
- Manually log in as each seeded role and verify sidebar visibility plus direct-URL denial.

## Explicitly deferred

Do not add member profile or training/activity tables in this phase. The next phase should attach a `member_profile` to `users` for WhatsApp/address and model AsiaWorks Basic, Advanced, and Leadership attendance as records containing completion date, batch, and location. Member-to-foundation-activity submissions should then use user foreign keys rather than email-only matching.
