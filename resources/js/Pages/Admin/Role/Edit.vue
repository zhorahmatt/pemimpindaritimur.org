<template>
    <Head>
        <title>{{ isEdit ? 'Ubah Peran' : 'Tambah Peran' }} - GLP INDTIM</title>
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
                                <Link href="/admin/roles" class="btn-link-myprimary fw-bold pe-3">Manajemen Peran</Link>
                            </li>
                            <li class="breadcrumb-item pe-3 text-muted">{{ isEdit ? 'Ubah' : 'Tambah' }}</li>
                        </ol>
                        <div class="page-heading d-flex align-items-center">
                            <h1 class="mb-0 me-3">{{ isEdit ? 'Ubah Peran' : 'Tambah Peran' }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl px-0">
                    <form @submit.prevent="submit">
                        <div class="card border border-gray-300 mb-6">
                            <div class="row align-items-start m-0">
                                <div class="col-md-4 col-xl-3 card-header px-8 py-7 border-0 pb-0">
                                    <div class="card-title d-flex flex-column m-0">
                                        <h2>Nama Peran</h2>
                                        <p class="fs-5 text-gray-600 mt-3 mb-0 fw-normal">Gunakan nama tanpa spasi, cth. 'editor-content'.</p>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xl-9 card-body px-8 py-7">
                                    <div class="fv-row">
                                        <label class="required form-label fs-6">Nama</label>
                                        <input type="text" class="form-control fs-5" required v-model="form.name" :class="{ 'is-invalid': errors.name }" :disabled="isProtected" />
                                        <div v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border border-gray-300">
                            <div class="row align-items-start m-0">
                                <div class="col-md-4 col-xl-3 card-header px-8 py-7 border-0 pb-0">
                                    <div class="card-title d-flex flex-column m-0">
                                        <h2>Izin</h2>
                                        <p class="fs-5 text-gray-600 mt-3 mb-0 fw-normal">Pilih izin yang diberikan kepada peran ini.</p>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xl-9 card-body px-8 py-7">
                                    <div class="row">
                                        <div v-for="permission in permissions" :key="permission" class="col-md-6 mb-2">
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" :value="permission" v-model="form.permissions" :disabled="isProtected" />
                                                <span class="form-check-label">{{ permission }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div v-if="errors.permissions" class="text-danger mt-2">{{ errors.permissions }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-6 mb-7">
                            <Link href="/admin/roles" class="btn btn-light btn-sm me-2">Batal</Link>
                            <button v-if="!isProtected" type="submit" id="submit_button" class="btn btn-sm btn-myprimary fs-5">
                                <span class="indicator-label">Simpan</span>
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
import { reactive, computed } from 'vue';
import Swal from 'sweetalert2';

export default {
    layout: LayoutAdmin,
    components: { Head, Link },
    props: {
        errors: Object,
        role: Object,
        permissions: Array,
        selectedPermissions: Array,
        reservedRoles: Array,
    },
    setup(props) {
        const isEdit = computed(() => !!props.role);
        const isProtected = computed(() => isEdit.value && props.reservedRoles?.includes(props.role.name));
        const form = reactive({
            name: props.role?.name ?? '',
            permissions: [...(props.selectedPermissions ?? [])],
        });

        const submit = () => {
            if (isProtected.value) return;
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
            const onSuccess = () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Peran berhasil disimpan.',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                });
            };
            if (isEdit.value) {
                router.put(`/admin/roles/${props.role.id}`, form, { onSuccess, onFinish: cleanup });
            } else {
                router.post('/admin/roles', form, { onSuccess, onFinish: cleanup });
            }
        };

        return { form, submit, isEdit, isProtected };
    },
};
</script>
