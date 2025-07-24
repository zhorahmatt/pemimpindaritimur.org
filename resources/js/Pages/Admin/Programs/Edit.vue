<template>

    <Head>
        <title>Edit Program - GLP INDTIM</title>
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
                                <Link href="/admin/programs" class="btn-link-myprimary fw-bold pe-3">Program Amal</Link>
                            </li>
                            <li class="breadcrumb-item pe-3 text-muted">Edit Program</li>
                        </ol>
                        <div class="page-heading">
                            <h1 class="mb-0">Edit Program</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl px-0">
                    <form @submit.prevent="submit">
                        <div class="row g-6">
                            <div class="col-md-4">
                                <div class="card border border-gray-300">
                                    <div class="card-header p-6 d-flex flex-column m-0 border-bottom border-gray-300" style="min-height: unset;">
                                        <h3 class="mb-0">Informasi Umum</h3>
                                    </div>
                                    <div class="card-body p-6">
                                        <div class="mb-5 fv-row">
                                            <label class="required form-label fs-6">Judul</label>
                                            <textarea class="form-control fs-5" data-kt-autosize="true" rows="5"
                                                required placeholder="Masukkan judul disini..."
                                                v-model="form.title" :class="{ 'is-invalid': errors.title }">
                                            </textarea>
                                            <div v-if="errors.title" class="text-mydanger mt-2">
                                                {{ errors . title }}
                                            </div>
                                        </div>
                                        <div class="mb-5 fv-row">
                                            <label class="required form-label fs-6">Tahapan</label>
                                            <select class="form-select fs-5" required v-model="form.phase"
                                                :class="{ 'is-invalid': errors.phase }">
                                                <option value="Akan Datang">Akan Datang</option>
                                                <option value="Dibuka">Dibuka</option>
                                                <option value="Ditutup">Ditutup</option>
                                                <option value="Terlaksana">Terlaksana</option>
                                            </select>
                                            <div v-if="errors.phase" class="text-mydanger mt-2">
                                                {{ errors . phase }}
                                            </div>
                                        </div>
                                        <div class="mb-5 fv-row">
                                            <label class="required form-label fs-6">Status</label>
                                            <div class="btn-group w-100" data-kt-buttons="true"
                                                data-kt-buttons-target="[data-kt-button]">
                                                <label
                                                    class="btn btn-active-myprimary text-gray-700 text-hover-white text-active-white btn-outline"
                                                    data-kt-button="true"
                                                    :class="{ active: form.status === 'published' }">
                                                    <input class="btn-check" type="radio" v-model="form.status"
                                                        value="published" />
                                                    Terbit
                                                </label>
                                                <label
                                                    class="btn btn-active-myprimary text-gray-700 text-hover-white text-active-white btn-outline"
                                                    data-kt-button="true"
                                                    :class="{ active: form.status === 'archived' }">
                                                    <input class="btn-check" type="radio" v-model="form.status"
                                                        value="archived" />
                                                    Arsip
                                                </label>
                                            </div>
                                            <div v-if="errors.status" class="text-mydanger mt-2">
                                                {{ errors . status }}
                                            </div>
                                        </div>
                                        <hr class="mb-5" style="border-color: var(--bs-gray-500);">
                                        <div class="fv-row">
                                            <div class="form-check form-switch form-check-custom form-check-solid gap-4 justify-content-between">
                                                <label class="form-label fs-6 mb-0">Tampilkan sebagai Unggulan</label>
                                                <input class="form-check-input" type="checkbox" id="flexSwitchDefault"
                                                    v-model="form.is_featured" :true-value="true" :false-value="false"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card border border-gray-300">
                                    <div class="card-header p-6 d-flex flex-column m-0 border-bottom border-gray-300" style="min-height: unset;">
                                        <h3 class="required mb-0">Konten Program</h3>
                                    </div>
                                    <div class="card-body p-6">
                                        <div class="fv-row">
                                            <Editor 
                                                :api-key="TinyMCEApiKey" 
                                                v-model="form.content" 
                                                :init="editorInit"
                                            />
                                            <div v-if="errors.content" class="text-mydanger mt-2">
                                                {{ errors . content }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border border-gray-300 mt-6">
                                    <div class="card-header p-6 d-flex flex-column m-0 border-bottom border-gray-300" style="min-height: unset;">
                                        <h3 class="required mb-0">Gambar Program</h3>
                                    </div>
                                    <div class="card-body p-6">
                                        <div id="program-dropzone" class="dropzone border-dashed border-myprimary rounded p-5 text-center">
                                            <div class="dz-message needsclick flex-column text-center gap-5 p-5">
                                                <i class="ri-image-add-line text-myprimary fs-3x"></i>
                                                <div>
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-2">Jatuhkan file di sini / klik untuk mengunggah.</h3>
                                                    <span class="fs-7 fw-semibold text-gray-400">Maks. 10 MB • Rasio 4:3</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="errors.image" class="text-mydanger mt-2">
                                            {{ errors . image }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-7">
                            <Link href="/admin/programs" type="button" class="btn btn-sm btn-mylight fs-5 me-3">Batal</Link>
                            <button type="submit" id="submit_button"
                                class="btn btn-sm btn-myprimary fs-5">
                                <span class="indicator-label">
                                    Edit Program
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
    import { reactive, onMounted, watch } from 'vue';
    import Dropzone from 'dropzone';
    import Swal from 'sweetalert2';
    import Editor from '@tinymce/tinymce-vue';

    export default {
        layout: LayoutAdmin,

        components: {
            Head,
            Link,
            Editor
        },

        props: {
            errors: Object,
            program: Object,
            TinyMCEApiKey: String,
        },

        setup(props) {
            const form = reactive({
                title: props.program.title,
                slug: props.program.slug,
                phase: props.program.phase,
                image: null,
                content: props.program.content,
                status: props.program.status,
                is_featured: props.program.is_featured === 1 || props.program.is_featured === true
            });

            const editorInit = {
                menubar: false,
                plugins: 'advlist lists link emoticons autoresize',
                toolbar:
                    'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link emoticons',
                style_formats: [
                    { title: 'Paragraf', block: 'p' },
                    { title: 'Judul Besar', block: 'h2' },
                    { title: 'Judul Sedang', block: 'h3' },
                    { title: 'Judul Kecil', block: 'h4' },
                ],
                min_height: 300,
                max_height: 600,
                content_style: `
                    @import url('https://fonts.googleapis.com/css2?family=Pathway+Extreme&display=swap');
                    body {
                        font-family: 'Pathway Extreme', sans-serif;
                    }
                `
            };

            watch(() => form.title, (newTitle) => {
                form.slug = newTitle
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/--+/g, '-');
            });

            onMounted(() => {
                const dz = new Dropzone('#program-dropzone', {
                    url: '/', 
                    paramName: 'image',
                    maxFiles: 1,
                    maxFilesize: 10,
                    acceptedFiles: 'image/jpeg,image/png',
                    autoProcessQueue: false,
                    addRemoveLinks: true,
                    dictRemoveFile: 'Hapus',
                    init: function () {
                        this.on('addedfile', function (file) {
                            form.image = file;
                        });
                        this.on('removedfile', function () {
                            form.image = null;
                        });

                        if (props.program.image) {
                            const mockFile = {
                                name: props.program.image_name ?? 'Gambar Program',
                            };
                            this.emit('addedfile', mockFile);
                            this.emit('thumbnail', mockFile, `/storage/${props.program.image}`);
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
                payload.append('title', form.title);
                payload.append('slug', form.slug);
                payload.append('phase', form.phase);
                payload.append('content', form.content);
                payload.append('status', form.status);
                payload.append('is_featured', form.is_featured ? '1' : '0'); 
                if (form.image && (form.image instanceof File || form.image instanceof Blob)) {
                    payload.append('image', form.image);
                }

                const cleanup = () => {
                    if (submitBtn) {
                        submitBtn.removeAttribute('data-kt-indicator');
                        submitBtn.removeAttribute('disabled');
                    }
                };

                payload.append('_method', 'PUT');
                router.post(`/admin/programs/${props.program.id}`, payload, {
                    onSuccess: () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Data Program Berhasil Diperbarui!',
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
                editorInit,
                submit,
            };
        }
    }
</script>

<style>
</style>
