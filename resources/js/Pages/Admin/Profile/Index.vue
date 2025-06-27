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
                                        <label class="form-label fs-6">Logo Yayasan</label>
                                        <div id="logo-dropzone" :key="dropzoneKey"
                                            class="dropzone border-dashed border-myprimary rounded p-5 text-center">
                                            <div class="dz-message needsclick flex-column text-center gap-5 p-5">
                                                <i class="ri-image-add-line text-myprimary fs-3x"></i>
                                                <div>
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-2">Jatuhkan file di sini /
                                                        klik untuk mengunggah.</h3>
                                                    <span class="fs-7 fw-semibold text-gray-400">Maksimal 10 MB</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="errors.logo" class="text-mydanger mt-2">
                                            {{ errors . logo }}
                                        </div>
                                    </div>
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
                        <div class="card border border-gray-300 my-6">
                            <div class="row align-items-start m-0">
                                <div class="col-md-4 col-xl-3 card-header px-8 py-7 border-0 pb-0">
                                    <div class="card-title d-flex flex-column m-0">
                                        <h2>Rekening Donasi</h2>
                                        <p class="fs-5 text-gray-600 mt-3 mb-0 fw-normal">Mengelola informasi rekening untuk donasi
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xl-9 card-body px-8 py-7">
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Nama Bank</label>
                                        <select class="form-select fs-5" required v-model="form.bank_name"
                                            :class="{ 'is-invalid': errors.bank_name }">
                                            <option value="BCA">BCA</option>
                                            <option value="BRI">BRI</option>
                                            <option value="BNI">BNI</option>
                                            <option value="Mandiri">Mandiri</option>
                                            <option value="BTN">BTN</option>
                                            <option value="BSI">BSI</option>
                                        </select>
                                        <div v-if="errors.bank_name" class="text-mydanger mt-2">
                                            {{ errors . bank_name }}
                                        </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Nomor Rekening</label>
                                        <input type="text" class="form-control fs-5" required placeholder="Masukkan nomor rekening disini..."
                                            v-model="form.bank_number" :class="{ 'is-invalid': errors.bank_number }">
                                        <div v-if="errors.bank_number" class="text-mydanger mt-2">
                                            {{ errors . bank_number }}
                                        </div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="required form-label fs-6">Nama Pemilik</label>
                                        <input type="text" class="form-control fs-5" required placeholder="Masukkan nama pemilik disini..."
                                            v-model="form.bank_account" :class="{ 'is-invalid': errors.bank_account }">
                                        <div v-if="errors.bank_account" class="text-mydanger mt-2">
                                            {{ errors . bank_account }}
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
    import { reactive, onMounted } from 'vue';
    import Dropzone from 'dropzone';
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
                logo: null,
                tagline: props.profile.tagline,
                year: props.profile.year,
                members: props.profile.members,
                address: props.profile.address,
                bank_name: props.profile.bank_name,
                bank_number: props.profile.bank_number,
                bank_account: props.profile.bank_account,
                facebook: props.profile.facebook,
                instagram: props.profile.instagram,
                whatsapp: props.profile.whatsapp,
                email: props.profile.email,
            });

            onMounted(() => {
                const dz = new Dropzone('#logo-dropzone', {
                    url: '/', 
                    paramName: 'logo',
                    maxFiles: 1,
                    maxFilesize: 10,
                    acceptedFiles: 'image/jpeg,image/png',
                    autoProcessQueue: false,
                    addRemoveLinks: true,
                    dictRemoveFile: 'Hapus',
                    init: function () {
                        this.on('addedfile', function (file) {
                            form.logo = file;
                        });
                        this.on('removedfile', function () {
                            form.logo = null;
                        });

                        if (props.profile.logo) {
                            const mockFile = {
                                name: props.profile.image_name ?? 'Logo Yayasan',
                                size: props.profile.image_size ?? 12345
                            };
                            this.emit('addedfile', mockFile);
                            this.emit('thumbnail', mockFile, `/storage/${props.profile.logo}`);
                            this.emit('complete', mockFile);
                            mockFile.previewElement.classList.add('dz-success', 'dz-complete');
                        }
                    },
                });
            });

            const submit = () => {
                const submitBtn = document.querySelector('#submit_button');
                if (submitBtn) {
                    submitBtn.setAttribute('data-kt-indicator', 'on');
                    submitBtn.setAttribute('disabled', true);
                }

                const payload = new FormData();
                payload.append('name', form.name);
                payload.append('tagline', form.tagline);
                payload.append('year', form.year);
                payload.append('members', form.members);
                payload.append('address', form.address);
                payload.append('bank_name', form.bank_name);
                payload.append('bank_number', form.bank_number);
                payload.append('bank_account', form.bank_account);
                payload.append('facebook', form.facebook);
                payload.append('instagram', form.instagram);
                payload.append('whatsapp', form.whatsapp);
                payload.append('email', form.email);
                if (form.logo && (form.logo instanceof File || form.logo instanceof Blob)) {
                    payload.append('logo', form.logo);
                }

                const cleanup = () => {
                    if (submitBtn) {
                        submitBtn.removeAttribute('data-kt-indicator');
                        submitBtn.removeAttribute('disabled');
                    }
                };

                payload.append('_method', 'PUT');
                router.post(`/admin/profile/${props.profile.id}`, payload, {
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
