<template>
    <Head>
        <title>Ubah Pengguna - GLP INDTIM</title>
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
                            <li class="breadcrumb-item pe-3 text-muted">Ubah Pengguna</li>
                        </ol>
                        <div class="page-heading d-flex align-items-center">
                            <h1 class="mb-0 me-3">Ubah Pengguna</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl px-0">
                    <form @submit.prevent="submit">
                        <div class="card border border-gray-300">
                            <div class="row align-items-start m-0">
                                <div class="col-md-4 col-xl-3 card-header px-8 py-7 border-0 pb-0">
                                    <div class="card-title d-flex flex-column m-0">
                                        <h2>Informasi Akun</h2>
                                        <p class="fs-5 text-gray-600 mt-3 mb-0 fw-normal">Perbarui identitas dan peran pengguna.</p>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xl-9 card-body px-8 py-7">
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Nama Lengkap</label>
                                        <input type="text" class="form-control fs-5" required v-model="form.name" :class="{ 'is-invalid': errors.name }" />
                                        <div v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Alamat Email</label>
                                        <input type="email" class="form-control fs-5" required v-model="form.email" :class="{ 'is-invalid': errors.email }" />
                                        <div v-if="errors.email" class="text-danger mt-2">{{ errors.email }}</div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="required form-label fs-6">Peran</label>
                                        <select multiple class="form-select fs-5" v-model="form.roles" required>
                                            <option v-for="role in roles" :key="role" :value="role">{{ role }}</option>
                                        </select>
                                        <div class="form-text">Tahan tombol Ctrl/Cmd untuk memilih lebih dari satu peran.</div>
                                        <div v-if="errors.roles" class="text-danger mt-2">{{ errors.roles }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-6 mb-7">
                            <Link href="/admin/users" class="btn btn-light btn-sm me-2">Batal</Link>
                            <button type="submit" id="submit_button" class="btn btn-sm btn-myprimary fs-5">
                                <span class="indicator-label">Simpan Perubahan</span>
                                <span class="indicator-progress">Mohon Tunggu... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import LayoutAdmin from '../../../Layouts/Admin.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { reactive } from 'vue';
import Swal from 'sweetalert2';

export default {
    layout: LayoutAdmin,
    components: { Head, Link },
    props: {
        errors: Object,
        user: Object,
        roles: Array,
    },
    setup(props) {
        const form = reactive({
            name: props.user.name,
            email: props.user.email,
            roles: [...props.user.roles],
        });

        const submit = () => {
            const btn = document.querySelector('#submit_button');
            if (btn) {
                btn.setAttribute('data-kt-indicator', 'on');
                btn.setAttribute('disabled', true);
            }
            const cleanup = () => {
                if (btn) {
                    btn.removeAttribute('data-kt-indicator');
                    btn.removeAttribute('disabled');
                }
            };
            router.put(`/admin/users/${props.user.id}`, {
                name: form.name,
                email: form.email,
            }, {
                onSuccess: () => {
                    router.post(`/admin/users/${props.user.id}/roles`, { roles: form.roles }, {
                        onSuccess: () => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Pengguna berhasil diperbarui.',
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                            });
                        },
                        onFinish: cleanup,
                    });
                },
                onError: cleanup,
            });
        };

        return { form, submit };
    },
};
</script>
