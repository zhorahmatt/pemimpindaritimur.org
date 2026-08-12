<template>
    <Head>
        <title>Manajemen Peran - GLP INDTIM</title>
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
                            <li class="breadcrumb-item pe-3 text-muted">Manajemen Peran</li>
                        </ol>
                        <div class="page-heading d-flex align-items-center">
                            <h1 class="mb-0 me-3">Manajemen Peran</h1>
                        </div>
                    </div>
                    <div>
                        <Link v-if="$page.props.auth.can['admin.roles.create']" href="/admin/roles/create" class="btn btn-sm btn-myprimary">Tambah Peran</Link>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl px-0">
                    <div class="card border border-gray-300">
                        <div class="card-body p-0">
                            <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="ps-5">Nama</th>
                                        <th>Jumlah Izin</th>
                                        <th class="text-end pe-5">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 fw-semibold">
                                    <tr v-for="row in roles.data" :key="row.id">
                                        <td class="ps-5">{{ row.name }}</td>
                                        <td>{{ row.permissions.length }}</td>
                                        <td class="text-end pe-5">
                                            <button v-if="$page.props.auth.can['admin.roles.update'] && !reservedRoles.includes(row.name)" class="btn btn-icon btn-light btn-sm me-1" @click="edit(row.id)">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                            <button v-if="$page.props.auth.can['admin.roles.delete'] && !reservedRoles.includes(row.name)" class="btn btn-icon btn-light btn-sm" @click="confirmDelete(row)">
                                                <i class="ri-delete-bin-line text-danger"></i>
                                            </button>
                                            <span v-if="reservedRoles.includes(row.name)" class="badge bg-light-warning text-warning">Dilindungi</span>
                                        </td>
                                    </tr>
                                    <tr v-if="roles.data.length === 0">
                                        <td colspan="3" class="text-center text-muted py-10">Belum ada peran.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="roles.links" />
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
        roles: Object,
        permissions: Array,
        reservedRoles: Array,
    },
    methods: {
        edit(id) {
            router.visit(`/admin/roles/${id}/edit`);
        },
        confirmDelete(row) {
            Swal.fire({
                icon: 'warning',
                title: 'Hapus peran?',
                text: `Peran ${row.name} akan dihapus.`,
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    router.delete(`/admin/roles/${row.id}`);
                }
            });
        },
    },
};
</script>
