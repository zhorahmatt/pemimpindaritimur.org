<template>
    <Head>
        <title>Daftar Undangan - GLP INDTIM</title>
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
                            <li class="breadcrumb-item pe-3">
                                <Link href="/admin/users" class="btn-link-myprimary fw-bold pe-3">Manajemen Pengguna</Link>
                            </li>
                            <li class="breadcrumb-item pe-3 text-muted">Undangan</li>
                        </ol>
                        <div class="page-heading d-flex align-items-center">
                            <h1 class="mb-0 me-3">Daftar Undangan</h1>
                        </div>
                    </div>
                    <div>
                        <Link href="/admin/users/create" class="btn btn-sm btn-myprimary">Undang Pengguna</Link>
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
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th>Status</th>
                                        <th>Berlaku Sampai</th>
                                        <th class="text-end pe-5">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 fw-semibold">
                                    <tr v-for="row in invitations.data" :key="row.id">
                                        <td class="ps-5">{{ row.name }}</td>
                                        <td>{{ row.email }}</td>
                                        <td>{{ row.role }}</td>
                                        <td>
                                            <span v-if="row.accepted_at" class="badge bg-light-success text-success">Diterima</span>
                                            <span v-else-if="row.revoked_at" class="badge bg-light-danger text-danger">Dicabut</span>
                                            <span v-else-if="isExpired(row.expires_at)" class="badge bg-light-warning text-warning">Kedaluwarsa</span>
                                            <span v-else class="badge bg-light-info text-info">Menunggu</span>
                                        </td>
                                        <td>{{ formatDateTime(row.expires_at) }}</td>
                                        <td class="text-end pe-5">
                                            <button v-if="canManage && !row.accepted_at && !row.revoked_at" class="btn btn-icon btn-light btn-sm me-1" @click="resend(row)">
                                                <i class="ri-mail-send-line"></i>
                                            </button>
                                            <button v-if="canManage && !row.accepted_at && !row.revoked_at" class="btn btn-icon btn-light btn-sm" @click="revoke(row)">
                                                <i class="ri-close-circle-line text-danger"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr v-if="invitations.data.length === 0">
                                        <td colspan="6" class="text-center text-muted py-10">Belum ada undangan.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="invitations.links" />
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
        invitations: Object,
    },
    computed: {
        canManage() {
            return this.$page.props.auth.can['admin.users.invite'];
        },
    },
    methods: {
        isExpired(value) {
            return new Date(value) < new Date();
        },
        formatDateTime(value) {
            if (!value) return '—';
            return new Date(value).toLocaleString('id-ID', { dateStyle: 'short', timeStyle: 'short' });
        },
        resend(row) {
            Swal.fire({
                icon: 'question',
                title: 'Kirim ulang undangan?',
                text: `Undangan baru akan dikirim ke ${row.email}.`,
                showCancelButton: true,
                confirmButtonText: 'Kirim',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    router.post(`/admin/users/invitations/${row.id}/resend`);
                }
            });
        },
        revoke(row) {
            Swal.fire({
                icon: 'warning',
                title: 'Cabut undangan?',
                text: `Undangan ${row.email} akan dicabut.`,
                showCancelButton: true,
                confirmButtonText: 'Cabut',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    router.delete(`/admin/users/invitations/${row.id}`);
                }
            });
        },
    },
};
</script>
