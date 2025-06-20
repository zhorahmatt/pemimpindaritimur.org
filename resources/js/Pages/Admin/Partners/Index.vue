<template>

    <Head>
        <title>Partner - GLP INDTIM</title>
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
                            <li class="breadcrumb-item pe-3 text-muted">Partner</li>
                        </ol>
                        <div class="page-heading">
                            <h1 class="mb-0">Partner</h1>
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
                                    placeholder="Cari partner disini..." v-model="search" />
                            </form>
                            <div class="card-toolbar m-0 flex-grow-1 flex-sm-grow-0">
                                <button @click="() => { resetForm(); isEditMode = false; openDrawer(); }"
                                    class="d-flex align-items-center justify-content-center btn btn-sm btn-myprimary fs-5 w-100">
                                    Tambah Partner
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
                                            <th class="bg-secondary min-w-150px" style="letter-spacing: 0.04em;">Logo</th>
                                            <th class="bg-secondary min-w-150px" style="letter-spacing: 0.04em;">Nama</th>
                                            <th class="bg-secondary min-w-200px" style="letter-spacing: 0.04em;">Link</th>
                                            <th class="bg-secondary pe-6 min-w-125px" style="letter-spacing: 0.04em;"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr v-if="partners.data.length === 0">
                                            <td colspan="5" class="text-center py-10">
                                                <img src="/assets/media/illustrations/empty.png"
                                                    alt="Tidak ada data" class="mh-300px">
                                                <h2 class="text-gray-800 mb-4">Partner Tidak Ditemukan</h2>
                                                <p class="text-gray-600 fs-4">Belum ada partner atau pencarian tidak sesuai.</p>
                                            </td>
                                        </tr>
                                        <tr v-else v-for="(partner, index) in partners.data" :key="index">
                                            <td class="ps-6">
                                                {{ ++index + (partners . current_page - 1) * partners . per_page }}
                                            </td>
                                            <td>
                                                <img class="h-30px" :src="`/storage/${partner.logo}`" alt="Logo Partner">
                                            </td>
                                            <td class="text-dark fw-bold">{{ partner . name }}</td>
                                            <td class="mw-200px text-truncate">
                                                <a :href="partner.link" target="_blank" class="btn-link-myprimary" >
                                                    {{ partner . link }}
                                                </a>
                                            </td>
                                            <td class="text-end pe-6">
                                                <button @click="editPartner(partner)"
                                                    class="btn btn-sm btn-icon btn-mysecondary me-2">
                                                    <i class="ri-edit-2-fill fs-3"></i></button>
                                                <button @click.prevent="destroy(partner.id)"
                                                    class="btn btn-sm btn-icon btn-mydanger">
                                                    <i class="ri-delete-bin-fill fs-3"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <Pagination :links="partners.links" align="end" class="py-5 px-6" />
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
                            <h2>{{ isEditMode ? 'Edit Partner' : 'Tambah Partner' }}</h2>
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
                                        <h3>Data Partner</h3>
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Nama</label>
                                        <input type="text" class="form-control fs-5" v-model="form.name"
                                            required placeholder="Masukkan nama disini..."
                                            :class="{ 'is-invalid': errors.name }" />
                                        <div v-if="errors.name" class="text-mydanger mt-2">
                                            {{ errors . name }}
                                        </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label fs-6">Logo</label>
                                        <input type="file" class="form-control fs-5" @input="form.logo = $event.target.files[0]"
                                            :class="{ 'is-invalid': errors.logo }" />
                                        <div v-if="errors.logo" class="text-mydanger mt-2">
                                            {{ errors . logo }}
                                        </div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="required form-label fs-6">Link Website / Sosmed</label>
                                        <input type="text" class="form-control fs-5" v-model="form.link"
                                            required placeholder="Masukkan link website / sosmed disini..."
                                            :class="{ 'is-invalid': errors.link }" />
                                        <div v-if="errors.link" class="text-mydanger mt-2">
                                            {{ errors . link }}
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
                                    {{ isEditMode ? 'Edit Partner' : 'Tambah Partner' }}
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
            partners: Object,
        },

        setup() {
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            const handleSearch = () => {
                router.get('/admin/partners', {
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
                logo: null,
                link: '',
            });

            const editing = ref(null);
            const isEditMode = ref(false);

            const resetForm = () => {
                form.name = '';
                form.logo = null;
                form.link = '';

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
                payload.append('link', form.link);
                if (form.logo instanceof File) {
                    payload.append('logo', form.logo);
                }

                const cleanup = () => {
                    if (submitBtn) {
                        submitBtn.removeAttribute('data-kt-indicator');
                        submitBtn.removeAttribute('disabled');
                    }
                };

                if (isEditMode.value && editing.value) {
                    payload.append('_method', 'PUT');
                    router.post(`/admin/partners/${editing.value.id}`, payload, {
                        onSuccess: () => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data Partner Berhasil Diperbarui!',
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
                    router.post('/admin/partners', payload, {
                        onSuccess: () => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data Partner Berhasil Disimpan!',
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

            const editPartner = (partner) => {
                isEditMode.value = true;
                editing.value = partner;

                form.name = partner.name;
                form.logo = null;
                form.link = partner.link;

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
                        router.delete(`/admin/partners/${id}`);
                        Swal.fire({
                            icon: 'success',
                            title: 'Dihapus!',
                            text: 'Data Partner Berhasil Dihapus!',
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
                editPartner,
                isEditMode,
                openDrawer,
            }
        }
    }
</script>

<style>

</style>
