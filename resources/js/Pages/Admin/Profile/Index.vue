<template>

    <Head>
        <title>Profil Yayasan - GLP INDTIM</title>
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
                            <li class="breadcrumb-item pe-3 text-muted">Profil Yayasan</li>
                        </ol>
                        <div class="page-heading">
                            <h1 class="mb-0">Profil Yayasan</h1>
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
                                        <h2>Informasi Yayasan</h2>
                                        <p class="fs-5 text-gray-600 mt-3 mb-0 fw-normal">Mengelola data dasar yayasan untuk informasi di halaman utama
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xl-9 card-body px-8 py-7">
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Nama Yayasan</label>
                                        <input type="text" class="form-control fs-5" required placeholder="Masukkan nama yayasan disini..."
                                            v-model="form.name" :class="{ 'is-invalid': errors.name }">
                                        <div v-if="errors.name" class="text-mydanger mt-2">
                                            {{ errors . name }}
                                        </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Tagline</label>
                                        <input type="text" class="form-control fs-5" required placeholder="Masukkan tagline yayasan disini..."
                                            v-model="form.tagline" :class="{ 'is-invalid': errors.tagline }">
                                        <div v-if="errors.tagline" class="text-mydanger mt-2">
                                            {{ errors . tagline }}
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-6 fv-row">
                                            <label class="required form-label fs-6">Tahun Berdiri</label>
                                            <input type="number" class="form-control fs-5" required placeholder="Masukkan tahun berdiri disini..."
                                                v-model="form.year" :class="{ 'is-invalid': errors.year }">
                                            <div v-if="errors.year" class="text-mydanger mt-2">
                                                {{ errors . year }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <label class="required form-label fs-6">Total Anggota</label>
                                            <input type="number" class="form-control fs-5" required placeholder="Masukkan total anggota disini..."
                                                v-model="form.members" :class="{ 'is-invalid': errors.members }">
                                            <div v-if="errors.members" class="text-mydanger mt-2">
                                                {{ errors . members }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="required form-label fs-6">Alamat Lengkap</label>
                                        <textarea class="form-control fs-5" data-kt-autosize="true" rows="3"
                                            required placeholder="Masukkan alamat lengkap disini..."
                                            v-model="form.address" :class="{ 'is-invalid': errors.address }">
                                        </textarea>
                                        <div v-if="errors.address" class="text-mydanger mt-2">
                                            {{ errors . address }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border border-gray-300 mt-6 mb-7">
                            <div class="row align-items-start m-0">
                                <div class="col-md-4 col-xl-3 card-header px-8 py-7 border-0 pb-0">
                                    <div class="card-title d-flex flex-column m-0">
                                        <h2>Sosial Media</h2>
                                        <p class="fs-5 text-gray-600 mt-3 mb-0 fw-normal">Atur sosial media yayasan untuk memudahkan koneksi
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xl-9 card-body px-8 py-7">
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Facebook</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ri-facebook-box-fill fs-3"></i>
                                            </span>
                                            <input type="text" class="form-control fs-5" required placeholder="Masukkan nama pengguna disini..."
                                                v-model="form.facebook" :class="{ 'is-invalid': errors.facebook }" />
                                        </div>
                                        <div v-if="errors.facebook" class="text-mydanger mt-2">
                                            {{ errors . facebook }}
                                        </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Instagram</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ri-instagram-line fs-3"></i>
                                            </span>
                                            <input type="text" class="form-control fs-5" required placeholder="Masukkan nama pengguna disini..."
                                                v-model="form.instagram" :class="{ 'is-invalid': errors.instagram }" />
                                        </div>
                                        <div v-if="errors.instagram" class="text-mydanger mt-2">
                                            {{ errors . instagram }}
                                        </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">WhatsApp</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ri-whatsapp-fill fs-3"></i>
                                            </span>
                                            <input type="number" class="form-control fs-5" required placeholder="Masukkan nomor whatsapp disini..."
                                                v-model="form.whatsapp" :class="{ 'is-invalid': errors.whatsapp }" />
                                        </div>
                                        <div v-if="errors.whatsapp" class="text-mydanger mt-2">
                                            {{ errors . whatsapp }}
                                        </div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="required form-label fs-6">Alamat Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ri-mail-line fs-3"></i>
                                            </span>
                                            <input type="email" class="form-control fs-5" required placeholder="Masukkan alamat email disini..."
                                                v-model="form.email" :class="{ 'is-invalid': errors.email }" />
                                        </div>
                                        <div v-if="errors.email" class="text-mydanger mt-2">
                                            {{ errors . email }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" id="submit_button"
                                class="btn btn-sm btn-myprimary fs-5">
                                <span class="indicator-label">
                                    Simpan Perubahan
                                </span>
                                <span class="indicator-progress">
                                    Mohon Tunggu... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
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

        components: {
            Head,
            Link,
        },

        props: {
            errors: Object,
            profile: Object
        },

        setup(props) {
            const form = reactive({
                name: props.profile.name,
                tagline: props.profile.tagline,
                year: props.profile.year,
                members: props.profile.members,
                address: props.profile.address,
                facebook: props.profile.facebook,
                instagram: props.profile.instagram,
                whatsapp: props.profile.whatsapp,
                email: props.profile.email,
            });

            const submit = () => {
                const submitBtn = document.querySelector('#submit_button');
                if (submitBtn) {
                    submitBtn.setAttribute('data-kt-indicator', 'on');
                    submitBtn.setAttribute('disabled', true);
                }

                const cleanup = () => {
                    if (submitBtn) {
                        submitBtn.removeAttribute('data-kt-indicator');
                        submitBtn.removeAttribute('disabled');
                    }
                };

                router.put(`/admin/profile/${props.profile.id}`, {
                    name: form.name,
                    tagline: form.tagline,
                    year: form.year,
                    members: form.members,
                    address: form.address,
                    facebook: form.facebook,
                    instagram: form.instagram,
                    whatsapp: form.whatsapp,
                    email: form.email,
                }, {
                    onSuccess: () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Data Profil Yayasan Berhasil Diperbarui!',
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            customClass: {
                                popup: 'swal-custom-icon',
                            }
                        });
                    },
                    onFinish: cleanup
                });
            }

            return {
                form,
                submit,
            };
        }
    }
</script>

<style>

</style>
