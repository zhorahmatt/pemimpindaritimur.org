<template>

    <Head>
        <title>Program Amal - GLP INDTIM</title>
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
                            <li class="breadcrumb-item pe-3 text-muted">Program Amal</li>
                        </ol>
                        <div class="page-heading">
                            <h1 class="mb-0">Program Amal</h1>
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
                                    placeholder="Cari judul program di sini..." v-model="search" />
                            </form>
                            <div class="card-toolbar m-0 flex-grow-1 flex-sm-grow-0">
                                <Link href="/admin/programs/create" type="button" 
                                    class="d-flex align-items-center justify-content-center btn btn-sm btn-myprimary fs-5 w-100">
                                    Tambah Program
                                </Link>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="kt_datatable_horizontal_scroll"
                                    class="table align-middle table-row-bordered fs-5 gy-5 border-bottom border-gray-300 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-600 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-20px ps-6 pe-5 bg-secondary" style="letter-spacing: 0.04em;">#</th>
                                            <th class="bg-secondary min-w-250px" style="letter-spacing: 0.04em;">Judul Program</th>
                                            <th class="bg-secondary min-w-150px" style="letter-spacing: 0.04em;">Tahapan</th>
                                            <th class="bg-secondary min-w-100px" style="letter-spacing: 0.04em;">Status</th>
                                            <th class="bg-secondary pe-6 min-w-125px" style="letter-spacing: 0.04em;"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr v-if="programs.data.length === 0">
                                            <td colspan="5" class="text-center py-10">
                                                <img src="/assets/media/illustrations/empty.png"
                                                    alt="Tidak ada data" class="mh-300px">
                                                <h2 class="text-gray-800 mb-4">Program Tidak Ditemukan</h2>
                                                <p class="text-gray-600 fs-4">Belum ada program atau pencarian tidak sesuai.</p>
                                            </td>
                                        </tr>
                                        <tr v-else v-for="(program, index) in programs.data" :key="index">
                                            <td class="ps-6">
                                                {{ ++index + (programs . current_page - 1) * programs . per_page }}
                                            </td>
                                            <td class="text-dark fw-bold">
                                                <i v-if="program.is_featured" class="ri-star-fill fs-4 me-1 text-warning"></i>
                                                {{ program.title }}
                                            </td>
                                            <td>{{ program . phase }}</td>
                                            <td>
                                                <span
                                                    class="badge text-capitalize fs-7 px-3 py-2"
                                                    :class="{
                                                        'bg-mysecondary text-mysecondary': program.status === 'published',
                                                        'bg-mydanger-light text-mydanger-light': program.status === 'archived'
                                                    }"
                                                >
                                                    {{ program.status === 'published' ? 'Terbit' : program.status === 'archived' ? 'Arsip' : program.status }}
                                                </span>
                                            </td>
                                            <td class="text-end pe-6">
                                                <Link :href="`/admin/programs/${program.id}/edit`" type="button"
                                                    class="btn btn-sm btn-icon btn-mysecondary me-2">
                                                    <i class="ri-edit-2-fill fs-3"></i></Link>
                                                <button @click.prevent="destroy(program.id)"
                                                    class="btn btn-sm btn-icon btn-mydanger">
                                                    <i class="ri-delete-bin-fill fs-3"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <Pagination :links="programs.links" align="end" class="py-5 px-6" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LayoutAdmin from '../../../Layouts/Admin.vue';
    import Pagination from '../../../Components/Pagination.vue';
    import { Head, Link, router } from '@inertiajs/vue3';
    import { ref } from 'vue';
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
            programs: Object,
        },

        setup() {
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            const handleSearch = () => {
                router.get('/admin/programs', {
                    q: search.value,
                });
            }

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
                        router.delete(`/admin/programs/${id}`);
                        Swal.fire({
                            icon: 'success',
                            title: 'Dihapus!',
                            text: 'Data Program Berhasil Dihapus!',
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
                destroy,
            }
        }
    }
</script>

<style>

</style>
