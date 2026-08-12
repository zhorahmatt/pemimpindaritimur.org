<?php

namespace App\Support\Rbac;

class PermissionCatalog
{
    public const GROUP_ADMIN = 'admin';

    public const GROUP_USER_MANAGEMENT = 'admin.users';

    public const GROUP_ROLE_MANAGEMENT = 'admin.roles';

    public const GROUP_CONTENT = 'content';

    public const GROUP_PROFILE = 'foundation-profile';

    public const GROUP_REGISTRATIONS = 'registrations';

    public const PERMISSIONS = [
        'admin.dashboard.view',

        'admin.users.view',
        'admin.users.invite',
        'admin.users.update',
        'admin.users.delete',
        'admin.users.assign-role',

        'admin.roles.view',
        'admin.roles.create',
        'admin.roles.update',
        'admin.roles.delete',

        'content.galleries.view',
        'content.galleries.create',
        'content.galleries.update',
        'content.galleries.delete',

        'content.activities.view',
        'content.activities.create',
        'content.activities.update',
        'content.activities.delete',

        'content.programs.view',
        'content.programs.create',
        'content.programs.update',
        'content.programs.delete',

        'content.blogs.view',
        'content.blogs.create',
        'content.blogs.update',
        'content.blogs.delete',

        'content.testimonials.view',
        'content.testimonials.create',
        'content.testimonials.update',
        'content.testimonials.delete',

        'content.partners.view',
        'content.partners.create',
        'content.partners.update',
        'content.partners.delete',

        'foundation-profile.view',
        'foundation-profile.update',

        'registrations.ilmu-keuangan.view',
        'registrations.ilmu-keuangan.update',
        'registrations.ilmu-keuangan.delete',
        'registrations.ilmu-keuangan.export',

        'registrations.minaut.view',
        'registrations.minaut.update',
        'registrations.minaut.delete',
        'registrations.minaut.export',
    ];

    public const ROLE_SUPER_ADMIN = 'super-admin';

    public const ROLE_ADMIN = 'admin';

    public const ROLE_EDITOR = 'editor';

    public const ROLE_REGISTRATION_OFFICER = 'registration-officer';

    public const ROLE_MEMBER = 'member';

    public const ASSIGNABLE_ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_EDITOR,
        self::ROLE_REGISTRATION_OFFICER,
        self::ROLE_MEMBER,
    ];

    public const ROLE_PERMISSIONS = [
        self::ROLE_ADMIN => [
            'admin.dashboard.view',
            'admin.users.view',
            'admin.users.invite',
            'admin.users.update',
            'admin.users.delete',
            'admin.users.assign-role',
            'admin.roles.view',
            'content.galleries.view',
            'content.galleries.create',
            'content.galleries.update',
            'content.galleries.delete',
            'content.activities.view',
            'content.activities.create',
            'content.activities.update',
            'content.activities.delete',
            'content.programs.view',
            'content.programs.create',
            'content.programs.update',
            'content.programs.delete',
            'content.blogs.view',
            'content.blogs.create',
            'content.blogs.update',
            'content.blogs.delete',
            'content.testimonials.view',
            'content.testimonials.create',
            'content.testimonials.update',
            'content.testimonials.delete',
            'content.partners.view',
            'content.partners.create',
            'content.partners.update',
            'content.partners.delete',
            'foundation-profile.view',
            'foundation-profile.update',
            'registrations.ilmu-keuangan.view',
            'registrations.ilmu-keuangan.update',
            'registrations.ilmu-keuangan.delete',
            'registrations.ilmu-keuangan.export',
            'registrations.minaut.view',
            'registrations.minaut.update',
            'registrations.minaut.delete',
            'registrations.minaut.export',
        ],
        self::ROLE_EDITOR => [
            'admin.dashboard.view',
            'content.galleries.view',
            'content.galleries.create',
            'content.galleries.update',
            'content.galleries.delete',
            'content.activities.view',
            'content.activities.create',
            'content.activities.update',
            'content.activities.delete',
            'content.programs.view',
            'content.programs.create',
            'content.programs.update',
            'content.programs.delete',
            'content.blogs.view',
            'content.blogs.create',
            'content.blogs.update',
            'content.blogs.delete',
            'content.testimonials.view',
            'content.testimonials.create',
            'content.testimonials.update',
            'content.testimonials.delete',
            'content.partners.view',
            'content.partners.create',
            'content.partners.update',
            'content.partners.delete',
        ],
        self::ROLE_REGISTRATION_OFFICER => [
            'admin.dashboard.view',
            'registrations.ilmu-keuangan.view',
            'registrations.ilmu-keuangan.update',
            'registrations.ilmu-keuangan.delete',
            'registrations.ilmu-keuangan.export',
            'registrations.minaut.view',
            'registrations.minaut.update',
            'registrations.minaut.delete',
            'registrations.minaut.export',
        ],
        self::ROLE_MEMBER => [],
    ];

    public static function all(): array
    {
        return self::PERMISSIONS;
    }

    public static function isAssignableRole(string $role): bool
    {
        return in_array($role, self::ASSIGNABLE_ROLES, true);
    }

    public static function permissionsForRole(string $role): array
    {
        return self::ROLE_PERMISSIONS[$role] ?? [];
    }
}
