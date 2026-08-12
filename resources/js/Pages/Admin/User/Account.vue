<template>
    <Head>
        <title>Akun Saya - GLP INDTIM</title>
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
                            <li class="breadcrumb-item pe-3 text-muted">Akun Saya</li>
                        </ol>
                        <div class="page-heading d-flex align-items-center">
                            <h1 class="mb-0 me-3">Akun Saya</h1>
                            <span v-for="role in user.roles" :key="role" class="badge bg-myprimary text-white fs-6 me-2">{{ role }}</span>
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
                                        <p class="fs-5 text-gray-600 mt-3 mb-0 fw-normal">Mengelola data dasar identitas Anda sendiri.</p>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xl-9 card-body px-8 py-7">
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Nama Pengguna</label>
                                        <input type="text" class="form-control fs-5" required
                                            placeholder="Masukkan nama pengguna..." v-model="form.name"
                                            :class="{ 'is-invalid': errors.name }" />
                                        <div v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="required form-label fs-6">Alamat Email</label>
                                        <input type="email" class="form-control fs-5" required
                                            placeholder="Masukkan alamat email..." v-model="form.email"
                                            :class="{ 'is-invalid': errors.email }" />
                                        <div v-if="errors.email" class="text-danger mt-2">{{ errors.email }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border border-gray-300 mt-6 mb-7">
                            <div class="row align-items-start m-0">
                                <div class="col-md-4 col-xl-3 card-header px-8 py-7 border-0 pb-0">
                                    <div class="card-title d-flex flex-column m-0">
                                        <h2>Kredensial Akun</h2>
                                        <p class="fs-5 text-gray-600 mt-3 mb-0 fw-normal">Mengatur keamanan akun dengan opsi perubahan kata sandi.</p>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xl-9 card-body px-8 py-7">
                                    <div class="mb-5 fv-row">
                                        <label class="form-label fs-6">Kata Sandi Lama</label>
                                        <input type="password" class="form-control fs-5"
                                            placeholder="Masukkan kata sandi lama..." v-model="form.current_password"
                                            :class="{ 'is-invalid': errors.current_password }" />
                                        <div v-if="errors.current_password" class="text-danger mt-2">{{ errors.current_password }}</div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                        <label class="form-label fs-6">Kata Sandi Baru</label>
                                        <input type="password" class="form-control fs-5"
                                            placeholder="Masukkan kata sandi baru..." v-model="form.password"
                                            :class="{ 'is-invalid': errors.password }" />
                                        <div v-if="errors.password" class="text-danger mt-2">{{ errors.password }}</div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="form-label fs-6">Konfirmasi Kata Sandi Baru</label>
                                        <input type="password" class="form-control fs-5"
                                            placeholder="Konfirmasi kata sandi baru..." v-model="form.password_confirmation" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
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
    },
    setup(props) {
        const form = reactive({
            name: props.user.name,
            email: props.user.email,
            current_password: '',
            password: '',
            password_confirmation: '',
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
            router.put('/admin/account', form, {
                onSuccess: () => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Profil berhasil diperbarui.',
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                    });
                    form.current_password = '';
                    form.password = '';
                    form.password_confirmation = '';
                },
                onFinish: cleanup,
            });
        };

        return { form, submit };
    },
};
</script>
