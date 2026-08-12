<template>
    <Head>
        <title>Manajemen Pengguna - GLP INDTIM</title>
    </Head>

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-7 py-lg-8">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <ol class="breadcrumb text-muted fs-6 fw-semibold mb-3">
                            <li class="breadcrumb-item pe-3">
                                <Link href="/admin/dashboard" class="btn-link-myprimary fw-bold pe-3">Dashboard</Link>
                            </li>
                            <li class="breadcrumb-item pe-3 text-muted">Manajemen Pengguna</li>
                        </ol>
                        <div class="page-heading d-flex align-items-center">
                            <h1 class="mb-0 me-3">Manajemen Pengguna</h1>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <Link v-if="$page.props.auth.can['admin.users.invite']" href="/admin/users/invitations" class="btn btn-light btn-sm">Daftar Undangan</Link>
                        <Link v-if="$page.props.auth.can['admin.users.invite']" href="/admin/users/create" class="btn btn-sm btn-myprimary">Undang Pengguna</Link>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl px-0">
                    <div class="card border border-gray-300 mb-7">
                        <div class="card-body py-5">
                            <form @submit.prevent="search">
                                <div class="d-flex flex-wrap gap-3 align-items-end">
                                    <div class="flex-grow-1">
                                        <label class="form-label fs-7">Cari Pengguna</label>
                                        <input type="text" class="form-control" v-model="filterTerm" placeholder="Nama atau email..." />
                                    </div>
                                    <div>
                                        <button class="btn btn-myprimary btn-sm" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card border border-gray-300">
                        <div class="card-body p-0">
                            <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="ps-5">Nama</th>
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th>Dibuat</th>
                                        <th class="text-end pe-5">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 fw-semibold">
                                    <tr v-for="row in users.data" :key="row.id">
                                        <td class="ps-5">{{ row.name }}</td>
                                        <td>{{ row.email }}</td>
                                        <td>
                                            <span v-for="role in row.roles" :key="role" class="badge bg-light-primary text-primary me-1">{{ role }}</span>
                                        </td>
                                        <td>{{ formatDate(row.created_at) }}</td>
                                        <td class="text-end pe-5">
                                            <button v-if="$page.props.auth.can['admin.users.update']" class="btn btn-icon btn-light btn-sm me-1" @click="edit(row.id)">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                            <button v-if="$page.props.auth.can['admin.users.delete']" class="btn btn-icon btn-light btn-sm" @click="confirmDelete(row)">
                                                <i class="ri-delete-bin-line text-danger"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr v-if="users.data.length === 0">
                                        <td colspan="5" class="text-center text-muted py-10">Belum ada pengguna.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="users.links" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import LayoutAdmin from '../../../Layouts/Admin.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Pagination from '../../../Components/Pagination.vue';
import Swal from 'sweetalert2';

export default {
    layout: LayoutAdmin,
    components: { Head, Link, Pagination },
    props: {
        users: Object,
        filters: Object,
        superAdminCount: Number,
    },
    data() {
        return {
            filterTerm: this.filters?.q ?? '',
        };
    },
    methods: {
        search() {
            router.get('/admin/users', { q: this.filterTerm }, { preserveState: true });
        },
        edit(id) {
            router.visit(`/admin/users/${id}/edit`);
        },
        formatDate(value) {
            if (!value) return '—';
            return new Date(value).toLocaleDateString('id-ID', { year: 'numeric', month: 'short', day: 'numeric' });
        },
        confirmDelete(row) {
            Swal.fire({
                icon: 'warning',
                title: 'Hapus pengguna?',
                text: `Pengguna ${row.name} akan dihapus.`,
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    router.delete(`/admin/users/${row.id}`);
                }
            });
        },
    },
};
</script>
