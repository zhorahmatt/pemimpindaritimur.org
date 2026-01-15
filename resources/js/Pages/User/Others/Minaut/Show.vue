<template>
    <Head>
        <title>Smart Financial Map</title>
        <link
            rel="icon"
            type="image/png"
            href="https://static.wixstatic.com/media/abd792_d2396960b539400081a5ba95b65f311a~mv2.png/v1/fill/w_500,h_500,al_c/abd792_d2396960b539400081a5ba95b65f311a~mv2.png"
        />
    </Head>

    <main
        id="kt_body"
        class="bg-light position-relative app-blank"
        data-kt-name="metronic"
        data-bs-spy="scroll"
        data-bs-target="#kt_landing_menu"
    >
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <!-- Hero Section -->
            <section
                id="hero"
                class="bg-white border-bottom border-gray-300 py-0"
            >
                <div
                    class="container d-flex flex-column align-items-center text-center py-10 py-md-20"
                >
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-3">
                       Minaut Indonesia : Problem Solving and Decision Making
                    </h1>
                    <p
                        class="fw-semibold text-gray-600 fs-2 mb-0 mx-md-20 mx-lg-0"
                    >
                        Para pemimpin yang siap
                        <span class="fw-bolder text-mydanger">mengambil keputusan</span>
                        dengan
                        <span class="fw-bolder text-mydanger">rasional</span>,
                        <span class="fw-bolder text-mydanger">percaya diri</span>, dan
                        <span class="fw-bolder text-mydanger">akuntabel</span>.
                    </p>
                </div>
            </section>

            <section id="data-table" class="container py-10 py-md-20">
                <div class="row g-6 pb-6">
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card border border-gray-300 h-100">
                            <div
                                class="card-body d-flex align-items-center gap-5 p-6"
                            >
                                <div
                                    class="p-6 bg-myprimary rounded-circle d-flex align-items-center justify-content-center"
                                >
                                    <i
                                        class="ri-team-fill text-white fs-2hx"
                                    ></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <p
                                        class="fs-4 fw-semibold text-gray-800 mb-1"
                                    >
                                        Total Pendaftar
                                    </p>
                                    <h1 class="fs-2hx mb-0">{{ total_all }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card border border-gray-300 h-100">
                            <div
                                class="card-body d-flex align-items-center gap-5 p-6"
                            >
                                <div
                                    class="p-6 bg-mysuccess-light rounded-circle d-flex align-items-center justify-content-center"
                                >
                                    <i
                                        class="ri-verified-badge-fill text-mysuccess fs-2hx"
                                    ></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <p
                                        class="fs-4 fw-semibold text-gray-800 mb-1"
                                    >
                                        Disetujui
                                    </p>
                                    <h1 class="fs-2hx mb-0">
                                        {{ total_accept }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card border border-gray-300 h-100">
                            <div
                                class="card-body d-flex align-items-center gap-5 p-6"
                            >
                                <div
                                    class="p-6 bg-mydanger-light rounded-circle d-flex align-items-center justify-content-center"
                                >
                                    <i
                                        class="ri-close-circle-fill text-mydanger fs-2hx"
                                    ></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <p
                                        class="fs-4 fw-semibold text-gray-800 mb-1"
                                    >
                                        Ditolak
                                    </p>
                                    <h1 class="fs-2hx mb-0">
                                        {{ total_deny }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card border border-gray-300 h-100">
                            <div
                                class="card-body d-flex align-items-center gap-5 p-6"
                            >
                                <div
                                    class="p-6 bg-mywarning-light rounded-circle d-flex align-items-center justify-content-center"
                                >
                                    <i
                                        class="ri-time-fill text-mywarning fs-2hx"
                                    ></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <p
                                        class="fs-4 fw-semibold text-gray-800 mb-1"
                                    >
                                        Pending
                                    </p>
                                    <h1 class="fs-2hx mb-0">
                                        {{ total_pending }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border border-gray-300">
                    <div
                        class="border-0 py-5 px-6 d-flex align-items-center flex-column justify-content-between flex-md-row gap-3"
                    >
                        <form
                            @submit.prevent="handleSearch"
                            class="d-flex align-items-center position-relative my-1 flex-grow-1 flex-sm-grow-0 w-100 w-md-300px"
                        >
                            <i
                                class="bi bi-search position-absolute ms-5 fs-4"
                            ></i>
                            <input
                                type="text"
                                class="form-control form-control-solid ps-13 fs-5"
                                placeholder="Cari nama peserta di sini..."
                                v-model="search"
                            />
                        </form>
                        <div
                            class="d-flex flex-column gap-3 w-100 w-md-auto flex-sm-row"
                        >
                            <div class="input-group w-100 w-md-auto">
                                <span
                                    class="input-group-text"
                                    id="basic-addon2"
                                >
                                    Status
                                </span>
                                <select
                                    class="form-select fs-5"
                                    v-model="selectedStatus"
                                    @change="handleStatusChange"
                                >
                                    <option value="all">Semua</option>
                                    <option value="accept">Disetujui</option>
                                    <option value="pending">Pending</option>
                                    <option value="deny">Ditolak</option>
                                </select>
                            </div>
                            <a
                                :href="`/minaut-indonesia/dashboard/export?q=${search}&status=${selectedStatus}`"
                                class="w-100 w-md-auto d-flex align-items-center text-nowrap justify-content-center btn btn-sm btn-myprimary fs-5"
                            >
                                Export Excel
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div
                            class="text-center border-top border-bottom border-gray-300 py-10 px-6"
                            v-if="datas.data.length === 0"
                        >
                            <img
                                src="/assets/media/illustrations/empty.png"
                                alt="Tidak ada data"
                                class="mh-300px img-fluid"
                            />
                            <h2 class="text-dark mb-4">
                                Peserta Tidak Ditemukan
                            </h2>
                            <p class="text-gray-600 fs-4 mb-0">
                                Belum ada peserta atau pencarian tidak sesuai.
                            </p>
                        </div>
                        <div class="table-responsive" v-else>
                            <table
                                id="kt_datatable_horizontal_scroll"
                                class="table align-middle table-row-bordered fs-5 gy-5 mb-0"
                            >
                                <thead>
                                    <tr
                                        class="text-start text-gray-600 fw-bold fs-7 text-uppercase gs-0"
                                    >
                                        <th
                                            class="w-20px ps-6 pe-5 bg-secondary"
                                            style="letter-spacing: 0.04em"
                                        >
                                            #
                                        </th>
                                        <th
                                            class="bg-secondary min-w-200px"
                                            style="letter-spacing: 0.04em"
                                        >
                                            Nama Peserta
                                        </th>
                                        <th
                                            class="bg-secondary min-w-150px"
                                            style="letter-spacing: 0.04em"
                                        >
                                            No. WhatsApp
                                        </th>
                                        <th
                                            class="bg-secondary min-w-150px"
                                            style="letter-spacing: 0.04em"
                                        >
                                            Usaha / Brand
                                        </th>
                                        <th
                                            class="bg-secondary min-w-100px"
                                            style="letter-spacing: 0.04em"
                                        >
                                            Status
                                        </th>
                                        <th
                                            class="bg-secondary pe-6 min-w-125px"
                                            style="letter-spacing: 0.04em"
                                        ></th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <tr
                                        v-for="(data, index) in datas.data"
                                        :key="index"
                                    >
                                        <td class="ps-6">
                                            {{
                                                ++index +
                                                (datas.current_page - 1) *
                                                    datas.per_page
                                            }}
                                        </td>
                                        <td
                                            class="d-flex align-items-center gap-3"
                                        >
                                            <div
                                                class="symbol symbol-45px symbol-circle"
                                            >
                                                <div
                                                    class="symbol-label fs-4 fw-semibold bg-myprimary text-white"
                                                >
                                                    {{ getInitials(data.name) }}
                                                </div>
                                            </div>
                                            <div>
                                                <p
                                                    class="text-dark fw-bold mb-1"
                                                >
                                                    {{ data.name }}
                                                </p>
                                                <a
                                                    :href="`mailto:${data.email}`"
                                                    class="btn-link-myprimary fw-bold fs-7 mb-0"
                                                    >{{ data.email }}</a
                                                >
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                :href="`https://wa.me/${data.whatsapp.replace(
                                                    /^0/,
                                                    '62'
                                                )}`"
                                                target="_blank"
                                                class="btn-link-myprimary fw-bold"
                                            >
                                                {{ data.whatsapp }}
                                            </a>
                                        </td>
                                        <td>{{ data.business_name }}</td>
                                        <td>
                                            <span
                                                class="badge text-capitalize fs-7 px-3 py-2"
                                                :class="{
                                                    'bg-mysuccess-light text-mysuccess':
                                                        data.status ===
                                                        'accept',
                                                    'bg-mywarning-light text-mywarning':
                                                        data.status ===
                                                        'pending',
                                                    'bg-mydanger-light text-mydanger':
                                                        data.status === 'deny',
                                                }"
                                            >
                                                {{
                                                    data.status === "accept"
                                                        ? "Diterima"
                                                        : data.status ===
                                                          "pending"
                                                        ? "Pending"
                                                        : data.status === "deny"
                                                        ? "Ditolak"
                                                        : data.status
                                                }}
                                            </span>
                                        </td>
                                        <td class="text-end pe-6">
                                            <button
                                                @click="editData(data)"
                                                class="btn btn-sm btn-icon btn-mysecondary me-2"
                                            >
                                                <i class="ri-eye-fill fs-3"></i>
                                            </button>
                                            <button
                                                v-if="canDelete"
                                                @click.prevent="
                                                    destroy(data.id)
                                                "
                                                class="btn btn-sm btn-icon btn-mydanger-solid"
                                            >
                                                <i
                                                    class="ri-delete-bin-fill fs-3"
                                                ></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination
                            v-if="datas.data.length > 100"
                            :links="datas.links"
                            align="end"
                            class="py-5 px-6 border-top border-gray-300"
                        />
                    </div>
                </div>
            </section>
            <form @submit.prevent="submit">
                <div
                    id="kt_drawer_example_advanced"
                    class="bg-body"
                    style="overflow-x: hidden"
                    data-kt-drawer="true"
                    data-kt-drawer-activate="true"
                    data-kt-drawer-toggle="#kt_drawer_example_advanced_button"
                    data-kt-drawer-close="#kt_drawer_example_advanced_close"
                    data-kt-drawer-name="docs"
                    data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'100%', 'md': '500px'}"
                    data-kt-drawer-direction="end"
                >
                    <div class="card w-100 rounded-0">
                        <div
                            class="card-header ps-6 pe-3 h-60px border-bottom border-gray-300 h-60px h-lg-70px"
                        >
                            <div class="card-title">
                                <h2>Data Peserta</h2>
                            </div>
                            <div
                                class="card-toolbar"
                                id="kt_drawer_example_advanced_close"
                            >
                                <div
                                    class="btn btn-sm btn-icon btn-mylighten rounded-pill"
                                >
                                    <i class="bi bi-x-lg fs-3"></i>
                                </div>
                            </div>
                        </div>
                        <div
                            class="card-body bg-light p-6 d-flex flex-column gap-7"
                        >
                            <div class="flex-grow-1">
                                <div
                                    class="card rounded-4 border border-gray-300"
                                >
                                    <div
                                        class="card-header h-auto p-6 border-bottom border-gray-300"
                                        style="min-height: unset"
                                    >
                                        <div class="card-title m-0">
                                            <h3>Informasi Pribadi</h3>
                                        </div>
                                    </div>
                                    <div
                                        class="card-body p-6 d-flex flex-column gap-3"
                                    >
                                        <div
                                            class="d-flex justify-content-between gap-6"
                                        >
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Nama Peserta
                                            </p>
                                            <p
                                                class="fs-5 text-end text-dark fw-bold mb-0"
                                            >
                                                {{ selectedData?.name }}
                                            </p>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between gap-6"
                                        >
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Alamat Email
                                            </p>
                                            <a
                                                :href="`mailto:${selectedData?.email}`"
                                                class="fs-5 text-end btn-link-myprimary fw-bold mb-0"
                                                >{{ selectedData?.email }}</a
                                            >
                                        </div>
                                        <div
                                            class="d-flex justify-content-between gap-6"
                                        >
                                            <p class="fs-5 text-gray-600 mb-0">
                                                No. WhatsApp
                                            </p>
                                            <a
                                                :href="`https://wa.me/${selectedData?.whatsapp.replace(
                                                    /^0/,
                                                    '62'
                                                )}`"
                                                target="_blank"
                                                class="fs-5 text-end btn-link-myprimary fw-bold mb-0"
                                                >{{ selectedData?.whatsapp }}</a
                                            >
                                        </div>
                                        <div
                                            class="d-flex justify-content-between gap-6"
                                        >
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Asal Kab/Kota
                                            </p>
                                            <p
                                                class="fs-5 text-end text-dark fw-bold mb-0"
                                            >
                                                {{ selectedData?.city }}
                                            </p>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between gap-6"
                                        >
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Ukuran Baju
                                            </p>
                                            <p
                                                class="fs-5 text-end text-dark fw-bold mb-0"
                                            >
                                                {{ selectedData?.size }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="card rounded-4 border border-gray-300 mt-6"
                                >
                                    <div
                                        class="card-header h-auto p-6 border-bottom border-gray-300"
                                        style="min-height: unset"
                                    >
                                        <div class="card-title m-0">
                                            <h3>Informasi Usaha</h3>
                                        </div>
                                    </div>
                                    <div
                                        class="card-body p-6 d-flex flex-column gap-3"
                                    >
                                        <div
                                            class="d-flex justify-content-between gap-6"
                                        >
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Nama Usaha/Brand
                                            </p>
                                            <p
                                                class="fs-5 text-end text-dark fw-bold mb-0"
                                            >
                                                {{
                                                    selectedData?.business_name
                                                }}
                                            </p>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between gap-6"
                                        >
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Bidang Usaha
                                            </p>
                                            <p
                                                class="fs-5 text-end text-dark fw-bold mb-0"
                                            >
                                                {{
                                                    selectedData?.business_field
                                                }}
                                            </p>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between gap-6"
                                        >
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Jabatan
                                            </p>
                                            <p
                                                class="fs-5 text-end text-dark fw-bold mb-0"
                                            >
                                                {{ selectedData?.position }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="card rounded-4 border border-gray-300 mt-6"
                                >
                                    <div
                                        class="card-header h-auto p-6 border-bottom border-gray-300"
                                        style="min-height: unset"
                                    >
                                        <div class="card-title m-0">
                                            <h3>Informasi Lainnya</h3>
                                        </div>
                                    </div>
                                    <div
                                        class="card-body p-6 d-flex flex-column gap-5"
                                    >
                                        <div class="d-flex flex-column gap-2">
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Masalah Keuangan Bisnis
                                            </p>
                                            <p
                                                class="fs-5 text-dark fw-bold mb-0"
                                            >
                                                {{ selectedData?.problem }}
                                            </p>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Harapan Setelah Workshop
                                            </p>
                                            <p
                                                class="fs-5 text-dark fw-bold mb-0"
                                            >
                                                {{ selectedData?.hope }}
                                            </p>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Darimana Mendapatkan Informasi
                                                Ini?
                                            </p>
                                            <p
                                                class="fs-5 text-dark fw-bold mb-0"
                                            >
                                                {{ selectedData?.from }}
                                            </p>
                                        </div>
                                        <div
                                            v-if="selectedData?.image"
                                            class="d-flex flex-column gap-2"
                                        >
                                            <p class="fs-5 text-gray-600 mb-0">
                                                Bukti Pembayaran
                                            </p>
                                            <a
                                                :href="`/storage/${selectedData?.image}`"
                                                target="_blank"
                                                class="fs-5 btn-link-myprimary fw-bold mb-0"
                                            >
                                                <i
                                                    class="fs-4 fw-semibold ri-eye-line me-1"
                                                ></i>
                                                Lihat Bukti Pembayaran
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-4">
                                <button
                                    type="button"
                                    id="kt_drawer_deny_button"
                                    class="btn btn-sm btn-mydanger-solid flex-fill fs-5"
                                    :disabled="selectedData?.status === 'deny'"
                                    @click="submit('deny')"
                                >
                                    <span class="indicator-label">
                                        {{
                                            selectedData?.status === "deny"
                                                ? "Ditolak"
                                                : "Tolak"
                                        }}
                                    </span>
                                    <span class="indicator-progress">
                                        Mohon Tunggu...
                                        <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"
                                        ></span>
                                    </span>
                                </button>
                                <button
                                    type="button"
                                    id="kt_drawer_accept_button"
                                    class="btn btn-sm btn-mysuccess-solid flex-fill fs-5"
                                    :disabled="
                                        selectedData?.status === 'accept'
                                    "
                                    @click="submit('accept')"
                                >
                                    <span class="indicator-label">
                                        {{
                                            selectedData?.status === "accept"
                                                ? "Disetujui"
                                                : "Setujui"
                                        }}
                                    </span>
                                    <span class="indicator-progress">
                                        Mohon Tunggu...
                                        <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"
                                        ></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</template>

<script>
import Pagination from "../../../../Components/Pagination.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { ref, reactive, nextTick } from "vue";
import Swal from "sweetalert2";

export default {
    components: {
        Head,
        Link,
        Pagination,
    },

    props: {
        errors: Object,
        datas: Object,
        total_all: Number,
        total_deny: Number,
        total_pending: Number,
        total_accept: Number,
        current_status: String,
    },

    setup(props) {
        const selectedStatus = ref("" || props.current_status || "all");

        const search = ref(
            "" || new URL(document.location).searchParams.get("q")
        );

        const applyFilter = () => {
            router.get(
                "/minaut-indonesia/dashboard",
                {
                    q: search.value,
                    status: selectedStatus.value,
                },
                { preserveState: true }
            );
        };

        const handleSearch = () => {
            applyFilter();
        };

        const handleStatusChange = () => {
            applyFilter();
        };

        const openDrawer = async () => {
            await nextTick();

            const drawerEl = document.querySelector(
                "#kt_drawer_example_advanced"
            );
            if (drawerEl && window.KTDrawer) {
                const drawer =
                    KTDrawer.getInstance(drawerEl) || new KTDrawer(drawerEl);
                drawer.show();
            }
        };

        const form = reactive({
            data: "",
        });

        const canDelete = ref(
            new URL(document.location).searchParams.get("can-delete") === "true"
        );

        const selectedData = ref(null);
        const isEditMode = ref(false);

        const resetForm = () => {
            form.data = "";
            isEditMode.value = false;
            selectedData.value = null;

            const drawerCloseBtn = document.querySelector(
                "#kt_drawer_example_advanced_close"
            );
            if (drawerCloseBtn) drawerCloseBtn.click();
        };

        const submit = (status) => {
            const buttonId =
                status === "accept"
                    ? "#kt_drawer_accept_button"
                    : "#kt_drawer_deny_button";
            const submitBtn = document.querySelector(buttonId);

            if (submitBtn) {
                submitBtn.setAttribute("data-kt-indicator", "on");
                submitBtn.setAttribute("disabled", true);
            }

            const cleanup = () => {
                if (submitBtn) {
                    submitBtn.removeAttribute("data-kt-indicator");
                    submitBtn.removeAttribute("disabled");
                }
            };

            const payload = new FormData();
            payload.append("_method", "PUT");
            payload.append("status", status);

            router.post(
                `/minaut-indonesia/dashboard/${selectedData.value.id}`,
                payload,
                {
                    onSuccess: () => {
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil!",
                            text:
                                status === "accept"
                                    ? "Data peserta berhasil disetujui."
                                    : "Data peserta berhasil ditolak.",
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            customClass: { popup: "swal-custom-icon" },
                        });
                        resetForm();
                    },
                    onError: () => {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal",
                            text: "Tidak dapat mengubah status. Coba lagi.",
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            customClass: { popup: "swal-custom-icon" },
                        });
                    },
                    onFinish: cleanup,
                    preserveScroll: true,
                }
            );
        };

        const editData = (data) => {
            isEditMode.value = true;
            selectedData.value = { ...data };
            form.data = data.data || "";
            openDrawer();
        };

        const destroy = (id) => {
            Swal.fire({
                icon: "warning",
                title: "Apakah Anda yakin?",
                text: "Anda tidak akan dapat mengembalikan ini!",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
                customClass: {
                    popup: "swal-custom-icon",
                    confirmButton: "btn btn-sm btn-myprimary",
                    cancelButton: "btn btn-sm btn-mydanger",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    router.delete(`/minaut-indonesia/dashboard/${id}`);
                    Swal.fire({
                        icon: "success",
                        title: "Dihapus!",
                        text: "Data Peserta Berhasil Dihapus!",
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        customClass: {
                            popup: "swal-custom-icon",
                        },
                    });
                }
            });
        };

        const getInitials = (name) => {
            if (!name) return "";
            return name
                .split(" ")
                .map((word) => word[0])
                .join("")
                .substring(0, 2)
                .toUpperCase();
        };

        return {
            search,
            handleSearch,
            handleStatusChange,
            selectedStatus,
            form,
            submit,
            destroy,
            resetForm,
            editData,
            getInitials,
            isEditMode,
            openDrawer,
            selectedData,
            canDelete,
        };
    },
};
</script>

<style scoped></style>
