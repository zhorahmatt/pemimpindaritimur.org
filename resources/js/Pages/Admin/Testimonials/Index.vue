<template>

    <Head>
        <title>Testimoni - GLP INDTIM</title>
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
                            <li class="breadcrumb-item pe-3 text-muted">Testimoni</li>
                        </ol>
                        <div class="page-heading">
                            <h1 class="mb-0">Testimoni</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl px-0">
                    <div class="card border border-gray-300">
                        <div class="card-header border-0 py-5 px-6 d-flex flex-wrap gap-3">
                            <form @submit.prevent="handleSearch"
                                class="d-flex align-items-center position-relative my-1 flex-grow-1 flex-sm-grow-0 w-100 w-sm-300px">
                                <i class="bi bi-search position-absolute ms-5 fs-4"></i>
                                <input type="text" class="form-control form-control-solid ps-13 fs-5"
                                    placeholder="Cari nama/testimoni di sini..." v-model="search" />
                            </form>
                            <div class="card-toolbar m-0 flex-grow-1 flex-sm-grow-0">
                                <button @click="() => { resetForm(); isEditMode = false; openDrawer(); }"
                                    class="d-flex align-items-center justify-content-center btn btn-sm btn-myprimary fs-5 w-100">
                                    Tambah Testimoni
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="kt_datatable_horizontal_scroll"
                                    class="table align-middle table-row-bordered fs-5 gy-5 border-bottom border-gray-300 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-600 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-20px ps-6 pe-5 bg-secondary" style="letter-spacing: 0.04em;">#</th>
                                            <th class="bg-secondary min-w-250px" style="letter-spacing: 0.04em;">Dari / Oleh</th>
                                            <th class="bg-secondary min-w-300px" style="letter-spacing: 0.04em;">Testimoni</th>
                                            <th class="bg-secondary pe-6 min-w-125px" style="letter-spacing: 0.04em;"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr v-if="testimonials.data.length === 0">
                                            <td colspan="4" class="text-center py-10">
                                                <img src="/assets/media/illustrations/empty.png"
                                                    alt="Tidak ada data" class="mh-300px">
                                                <h2 class="text-gray-800 mb-4">Testimoni Tidak Ditemukan</h2>
                                                <p class="text-gray-600 fs-4">Belum ada testimoni atau pencarian tidak sesuai.</p>
                                            </td>
                                        </tr>
                                        <tr v-else v-for="(testimonial, index) in testimonials.data" :key="index">
                                            <td class="ps-6">
                                                {{ ++index + (testimonials . current_page - 1) * testimonials . per_page }}
                                            </td>
                                            <td class="d-flex align-items-center gap-3">
                                                <img class="w-45px h-45px min-w-45px rounded-circle object-fit-cover" :src="`/storage/${testimonial.photo}`" alt="Foto Profil">
                                                <div>
                                                    <p class="text-dark fw-bold mb-1">{{ testimonial . name }}</p>
                                                    <p class="fs-7 mb-0">{{ testimonial . title }}</p>
                                                </div>
                                            </td>
                                            <td class="mw-300px">
                                                <p class="text-truncate-2 mb-0">
                                                    {{ testimonial . testimonial }}
                                                </p>
                                            </td>
                                            <td class="text-end pe-6">
                                                <button @click="editTestimonial(testimonial)"
                                                    class="btn btn-sm btn-icon btn-mysecondary me-2">
                                                    <i class="ri-edit-2-fill fs-3"></i></button>
                                                <button @click.prevent="destroy(testimonial.id)"
                                                    class="btn btn-sm btn-icon btn-mydanger">
                                                    <i class="ri-delete-bin-fill fs-3"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <Pagination :links="testimonials.links" align="end" class="py-5 px-6" />
                        </div>
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
                            <h2>{{ isEditMode ? 'Edit Testimoni' : 'Tambah Testimoni' }}</h2>
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
                                        <h3>Pemberi Testimoni</h3>
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Foto Profil</label>
                                        <input type="file" class="form-control fs-5" @input="form.photo = $event.target.files[0]"
                                            :class="{ 'is-invalid': errors.photo }" />
                                        <div v-if="errors.photo" class="text-mydanger mt-2">
                                            {{ errors . photo }}
                                        </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Nama</label>
                                        <input type="text" class="form-control fs-5" v-model="form.name"
                                            required placeholder="Masukkan nama disini..."
                                            :class="{ 'is-invalid': errors.name }" />
                                        <div v-if="errors.name" class="text-mydanger mt-2">
                                            {{ errors . name }}
                                        </div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="required form-label fs-6">Gelar / Peran</label>
                                        <input type="text" class="form-control fs-5" v-model="form.title"
                                            required placeholder="Masukkan gelar / peran disini..."
                                            :class="{ 'is-invalid': errors.title }" />
                                        <div v-if="errors.title" class="text-mydanger mt-2">
                                            {{ errors . title }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border border-gray-300 mt-6">
                                <div class="card-header h-auto p-6 border-bottom border-gray-300"
                                    style="min-height: unset;">
                                    <div class="card-title m-0">
                                        <h3 class="required">Detail Testimoni</h3>
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="fv-row">
                                        <textarea class="form-control fs-5" data-kt-autosize="true" rows="5"
                                            required placeholder="Masukkan detail testimoni disini..."
                                            v-model="form.testimonial" :class="{ 'is-invalid': errors.testimonial }">
                                        </textarea>
                                        <div v-if="errors.testimonial" class="text-mydanger mt-2">
                                            {{ errors . testimonial }}
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
                                    {{ isEditMode ? 'Edit Testimoni' : 'Tambah Testimoni' }}
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
    import Pagination from '../../../Components/Pagination.vue';
    import { Head, Link, router } from '@inertiajs/vue3';
    import { reactive, ref } from 'vue';
    import Swal from 'sweetalert2';

    export default {
        layout: LayoutAdmin,

        components: {
            Head,
            Link,
            Pagination
        },

        props: {
            errors: Object,
            testimonials: Object,
        },

        setup() {
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            const handleSearch = () => {
                router.get('/admin/testimonials', {
                    q: search.value,
                });
            }

            const openDrawer = () => {
                const drawerEl = document.querySelector('#kt_drawer_example_advanced');
                if (drawerEl && window.KTDrawer) {
                    const drawer = KTDrawer.getInstance(drawerEl) || new KTDrawer(drawerEl);
                    drawer.show();
                }
            };

            const form = reactive({
                name: '',
                title: '',
                photo: null,
                testimonial: '',
            });

            const editing = ref(null);
            const isEditMode = ref(false);

            const resetForm = () => {
                form.name = '';
                form.title = '';
                form.photo = null;
                form.testimonial = '';

                isEditMode.value = false;
                editing.value = null;

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
                payload.append('name', form.name);
                payload.append('title', form.title);
                payload.append('testimonial', form.testimonial);
                if (form.photo instanceof File) {
                    payload.append('photo', form.photo);
                }

                const cleanup = () => {
                    if (submitBtn) {
                        submitBtn.removeAttribute('data-kt-indicator');
                        submitBtn.removeAttribute('disabled');
                    }
                };

                if (isEditMode.value && editing.value) {
                    payload.append('_method', 'PUT');
                    router.post(`/admin/testimonials/${editing.value.id}`, payload, {
                        onSuccess: () => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data Testimoni Berhasil Diperbarui!',
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
                    router.post('/admin/testimonials', payload, {
                        onSuccess: () => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data Testimoni Berhasil Disimpan!',
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

            const editTestimonial = (testimonial) => {
                isEditMode.value = true;
                editing.value = testimonial;

                form.name = testimonial.name;
                form.title = testimonial.title;
                form.photo = null;
                form.testimonial = testimonial.testimonial;

                const drawerEl = document.querySelector('#kt_drawer_example_advanced');
                if (drawerEl && window.KTDrawer) {
                    const drawer = KTDrawer.getInstance(drawerEl) || new KTDrawer(drawerEl);
                    drawer.show();
                }
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
                        router.delete(`/admin/testimonials/${id}`);
                        Swal.fire({
                            icon: 'success',
                            title: 'Dihapus!',
                            text: 'Data Testimoni Berhasil Dihapus!',
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

            return {
                search,
                handleSearch,
                form,
                submit,
                destroy,
                resetForm,
                editTestimonial,
                isEditMode,
                openDrawer,
            }
        }
    }
</script>

<style>

</style>
