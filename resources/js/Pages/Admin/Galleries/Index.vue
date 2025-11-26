<template>

    <Head>
        <title>Galeri - GLP INDTIM</title>
    </Head>

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-7 py-lg-8">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack align-items-end">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <ol class="breadcrumb text-muted fs-6 fw-semibold mb-3">
                            <li class="breadcrumb-item pe-3">
                                <Link href="/admin/dashboard" class="btn-link-myprimary fw-bold pe-3">Dashboard</Link>
                            </li>
                            <li class="breadcrumb-item pe-3 text-muted">Galeri</li>
                        </ol>
                        <div class="page-heading">
                            <h1 class="mb-0">Galeri</h1>
                        </div>
                    </div>
                    <button @click="() => { resetForm(); isEditMode = false; openDrawer(); }"
                        class="btn btn-sm btn-myprimary fs-5 mb-1">
                        Tambah Gambar
                    </button>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl px-0">
                    <div class="text-center py-10" v-if="galleries.length === 0">
                        <img src="/assets/media/illustrations/empty.png"
                            alt="Tidak ada data" class="mh-300px">
                        <h2 class="text-gray-800 mb-4">Gambar Belum Ada</h2>
                        <p class="text-gray-600 fs-4">Tidak ditemukan gambar pada galeri saat ini.</p>
                    </div>
                    <div v-else>
                        <div class="masonry-gallery">
                            <div v-for="(gallery, index) in galleries" :key="index" class="masonry-item">
                                <div class="d-block overlay position-relative">
                                    <img :src="`/storage/${gallery.image}`" :alt="gallery.description"
                                        class="overlay-wrapper rounded-4 w-100" />
                                    <div class="overlay-layer position-absolute top-0 start-0 w-100 h-100 d-flex gap-3 align-items-center justify-content-center bg-dark bg-opacity-25 rounded-4">
                                        <button @click.prevent="openLightbox(`/storage/${gallery.image}`)"
                                            class="p-0 bg-transparent border-0">
                                            <i class="ri-eye-fill text-white fs-2x"></i>
                                        </button>
                                        <button @click="editGallery(gallery)"
                                            class="p-0 bg-transparent border-0">
                                            <i class="ri-edit-2-fill text-white fs-2x"></i>
                                        </button>
                                        <button @click.prevent="destroy(gallery.id)"
                                            class="p-0 bg-transparent border-0">
                                            <i class="ri-delete-bin-fill text-white fs-2x"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <FsLightbox :toggler="lightboxToggler" :slide="currentIndex" :sources="lightboxSources" />
                    </div>
                </div>
            </div>
        </div>
        <form @submit.prevent="submit">
            <div id="kt_drawer_example_advanced" class="bg-body" data-kt-drawer="true" data-kt-drawer-activate="true"
                data-kt-drawer-toggle="#kt_drawer_example_advanced_button"
                data-kt-drawer-close="#kt_drawer_example_advanced_close" data-kt-drawer-name="docs"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'100%', 'md': '500px'}"
                data-kt-drawer-direction="end">
                <div class="card w-100 rounded-0">
                    <div class="card-header ps-6 pe-3 h-60px border-bottom border-gray-300 h-60px h-lg-70px" style="min-height: unset;">
                        <div class="card-title">
                            <h2>{{ isEditMode ? 'Edit Gambar' : 'Tambah Gambar' }}</h2>
                        </div>
                        <div class="card-toolbar" id="kt_drawer_example_advanced_close">
                            <div class="btn btn-sm btn-icon btn-mylighten rounded-pill">
                                <i class="bi bi-x-lg fs-3"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light p-6 d-flex flex-column gap-7">
                        <div class="flex-grow-1">
                            <div class="card border border-gray-300">
                                <div class="card-header h-auto p-6 border-bottom border-gray-300"
                                    style="min-height: unset;">
                                    <div class="card-title m-0">
                                        <h3>Data Gambar</h3>
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Gambar</label>
                                        <div id="gallery-dropzone" :key="dropzoneKey"
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
                                        <div v-if="errors.image" class="text-mydanger mt-2">
                                            {{ errors . image }}
                                        </div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="form-label fs-6">Deskripsi</label>
                                        <textarea class="form-control fs-5" data-kt-autosize="true" rows="5"
                                            placeholder="Masukkan deskripsi disini..."
                                            v-model="form.description" :class="{ 'is-invalid': errors.description }">
                                        </textarea>
                                        <div v-if="errors.description" class="text-mydanger mt-2">
                                            {{ errors . description }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-mylight fs-5 me-3"
                                id="kt_drawer_example_advanced_close">Batal</button>
                            <button type="submit" id="kt_drawer_submit_button"
                                class="btn btn-sm btn-myprimary fs-5">
                                <span class="indicator-label">
                                    {{ isEditMode ? 'Edit Gambar' : 'Tambah Gambar' }}
                                </span>
                                <span class="indicator-progress">
                                    Mohon Tunggu... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import LayoutAdmin from '../../../Layouts/Admin.vue';
    import { Head, Link, router } from '@inertiajs/vue3';
    import { reactive, ref, nextTick, watch } from 'vue';
    import Dropzone from 'dropzone';
    import Swal from 'sweetalert2';
    import FsLightbox from "fslightbox-vue";

    export default {
        layout: LayoutAdmin,

        components: {
            Head,
            Link,
            FsLightbox,
        },

        props: {
            errors: Object,
            galleries: Object,  
        },

        data() {
            return {
                lightboxToggler: false,
                lightboxSources: [],
            };
        },

        methods: {
            openLightbox(clickedImageUrl) {
                this.lightboxSources = this.galleries.map(p => `/storage/${p.image}`);
                this.currentIndex = this.lightboxSources.indexOf(clickedImageUrl) + 1;
                this.lightboxToggler = !this.lightboxToggler;
            },
        },

        setup() {
            const dropzoneRef = ref(null);
            const dropzoneKey = ref(Date.now());

            const openDrawer = async () => {
                dropzoneKey.value = Date.now();
                await nextTick();

                const drawerEl = document.querySelector('#kt_drawer_example_advanced');
                if (drawerEl && window.KTDrawer) {
                    const drawer = KTDrawer.getInstance(drawerEl) || new KTDrawer(drawerEl);
                    drawer.show();
                }
            };

            const form = reactive({
                image: null,
                description: '',
            });

            const editing = ref(null);
            const isEditMode = ref(false);

            const resetForm = () => {
                form.image = null;
                form.description = '';

                isEditMode.value = false;
                editing.value = null;

                if (dropzoneRef.value) {
                    dropzoneRef.value.removeAllFiles(true);
                }

                const drawerCloseBtn = document.querySelector('#kt_drawer_example_advanced_close');
                if (drawerCloseBtn) drawerCloseBtn.click();
            };

            const submit = () => {
                const submitBtn = document.querySelector('#kt_drawer_submit_button');
                if (submitBtn) {
                    submitBtn.setAttribute('data-kt-indicator', 'on');
                    submitBtn.setAttribute('disabled', true);
                }

                const payload = new FormData();
                payload.append('description', form.description);
                if (form.image && (form.image instanceof File || form.image instanceof Blob)) {
                    payload.append('image', form.image);
                }

                const cleanup = () => {
                    if (submitBtn) {
                        submitBtn.removeAttribute('data-kt-indicator');
                        submitBtn.removeAttribute('disabled');
                    }
                };

                if (isEditMode.value && editing.value) {
                    payload.append('_method', 'PUT');
                    router.post(`/admin/galleries/${editing.value.id}`, payload, {
                        onSuccess: () => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data Galeri Berhasil Diperbarui!',
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                                customClass: {
                                    popup: 'swal-custom-icon',
                                }
                            });
                            resetForm();
                        },
                        onFinish: cleanup
                    });
                } else {
                    router.post('/admin/galleries', payload, {
                        onSuccess: () => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data Galeri Berhasil Disimpan!',
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                                customClass: {
                                    popup: 'swal-custom-icon',
                                }
                            });
                            resetForm();
                        },
                        onFinish: cleanup
                    });
                }
            };

            const editGallery = (gallery) => {
                isEditMode.value = true;
                editing.value = gallery;

                form.image = null;
                form.description = gallery.description;

                openDrawer();
            };

            const destroy = (id) => {
                Swal.fire({
                    icon: 'warning',
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batal",
                    customClass: {
                        popup: 'swal-custom-icon',
                        confirmButton: "btn btn-sm btn-myprimary",
                        cancelButton: "btn btn-sm btn-mydanger"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        router.delete(`/admin/galleries/${id}`);
                        Swal.fire({
                            icon: 'success',
                            title: 'Dihapus!',
                            text: 'Data Galeri Berhasil Dihapus!',
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            customClass: {
                                popup: 'swal-custom-icon',
                            }
                        });
                    }
                })
            };

            
            watch(dropzoneKey, () => {
                nextTick(() => {
                    const dz = new Dropzone('#gallery-dropzone', {
                        url: '/',
                        paramName: 'image',
                        maxFiles: 1,
                        maxFilesize: 10,
                        acceptedFiles: 'image/jpeg,image/png',
                        autoProcessQueue: false,
                        addRemoveLinks: true,
                        dictRemoveFile: 'Hapus',
                        init: function() {
                            this.on('addedfile', function(file) {
                                form.image = file;
                            });

                            this.on('removedfile', function() {
                                form.image = null;
                            });

                            dropzoneRef.value = this;

                            if (isEditMode.value && editing.value?.image) {
                                const mockFile = {
                                    name: editing.value.image.split('/').pop(),
                                };
                                this.emit('addedfile', mockFile);
                                this.emit('thumbnail', mockFile, `/storage/${editing.value.image}`);
                                this.emit('complete', mockFile);
                                mockFile.previewElement.classList.add('dz-success', 'dz-complete');
                            }
                        },
                    });
                });
            });

            return {
                form,
                submit,
                destroy,
                resetForm,
                editGallery,
                isEditMode,
                openDrawer,
                dropzoneKey,
            }
        }
    }
</script>

<style>

</style>
