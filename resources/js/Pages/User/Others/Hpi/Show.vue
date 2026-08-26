<template>
    <Head>
        <title>High Performing Individual (HPI) — Dashboard</title>
        <link
            rel="icon"
            type="image/png"
            href="https://static.wixstatic.com/media/c94795_78a4ae59fcc2452faf186eb882124bbd%7EMv2.jpg/v1/fill/w_192%2Ch_192%2Clg_1%2Cusm_0.66_1.00_0.01/c94795_78a4ae59fcc2452faf186eb882124bbd%7EMv2.jpg"
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
                        High Performing Individual (HPI)
                    </h1>
                    <p
                        class="fw-semibold text-gray-600 fs-2 mb-0 mx-md-20 mx-lg-0"
                    >
                        Daftar peserta
                        <span class="fw-bolder text-mydanger">High Performing Individual</span> — Batch 11, Makassar (To Be Confirmed).
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
                                :href="`/hpi/dashboard/export?q=${search}&status=${selectedStatus}`"
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
                                            class="bg-secondary min-w-150px"
                                            style="letter-spacing: 0.04em"
                                        >
                                            Asiaworks
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
                                            <div v-if="data.asiaworks_joined === 'Ya'">
                                                <span class="badge bg-light-primary text-primary fw-bold fs-7">
                                                    {{ data.asiaworks_training || 'Ya' }}
                                                </span>
                                            </div>
                                            <div v-else>
                                                <span class="badge bg-light-secondary text-gray-500 fs-7">
                                                    Tidak
                                                </span>
                                            </div>
                                        </td>
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
            <form @submit.prevent="submitForm()">
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
                    data-kt-drawer-width="{default:'100%', 'md': '550px'}"
                    data-kt-drawer-direction="end"
                >
                    <div class="card w-100 rounded-0">
                        <div
                            class="card-header ps-6 pe-3 h-60px border-bottom border-gray-300 h-60px h-lg-70px"
                        >
                            <div class="card-title">
                                <h2>Edit Data Peserta</h2>
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
                            class="card-body bg-light p-6 d-flex flex-column gap-6"
                            style="max-height: calc(100vh - 140px); overflow-y: auto;"
                        >
                            <div class="flex-grow-1">
                                <!-- Status Card -->
                                <div class="card rounded-4 border border-gray-300 mb-6">
                                    <div class="card-header h-auto p-5 border-bottom border-gray-300" style="min-height: unset">
                                        <div class="card-title m-0">
                                            <h3>Status Pendaftaran</h3>
                                        </div>
                                    </div>
                                    <div class="card-body p-5">
                                        <label class="form-label fs-6 fw-semibold text-gray-700">Status</label>
                                        <select class="form-select fs-5" v-model="form.status">
                                            <option value="pending">Pending</option>
                                            <option value="accept">Disetujui</option>
                                            <option value="deny">Ditolak</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Informasi Pribadi -->
                                <div
                                    class="card rounded-4 border border-gray-300 mb-6"
                                >
                                    <div
                                        class="card-header h-auto p-5 border-bottom border-gray-300"
                                        style="min-height: unset"
                                    >
                                        <div class="card-title m-0">
                                            <h3>Informasi Pribadi</h3>
                                        </div>
                                    </div>
                                    <div
                                        class="card-body p-5 d-flex flex-column gap-4"
                                    >
                                        <div>
                                            <label class="required form-label fs-6 fw-semibold text-gray-700">Nama Peserta</label>
                                            <input type="text" class="form-control fs-5" v-model="form.name" required placeholder="Masukkan nama peserta..." />
                                        </div>
                                        <div>
                                            <label class="required form-label fs-6 fw-semibold text-gray-700">Alamat Email</label>
                                            <input type="email" class="form-control fs-5" v-model="form.email" required placeholder="Masukkan email..." />
                                        </div>
                                        <div>
                                            <label class="required form-label fs-6 fw-semibold text-gray-700">No. WhatsApp</label>
                                            <input type="text" class="form-control fs-5" v-model="form.whatsapp" required placeholder="Masukkan no. whatsapp..." />
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-7">
                                                <label class="required form-label fs-6 fw-semibold text-gray-700">Asal Kab/Kota</label>
                                                <input type="text" class="form-control fs-5" v-model="form.city" required placeholder="Asal kota..." />
                                            </div>
                                            <div class="col-5">
                                                <label class="required form-label fs-6 fw-semibold text-gray-700">Ukuran Baju</label>
                                                <select class="form-select fs-5" v-model="form.size" required>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Informasi Usaha -->
                                <div
                                    class="card rounded-4 border border-gray-300 mb-6"
                                >
                                    <div
                                        class="card-header h-auto p-5 border-bottom border-gray-300"
                                        style="min-height: unset"
                                    >
                                        <div class="card-title m-0">
                                            <h3>Informasi Usaha</h3>
                                        </div>
                                    </div>
                                    <div
                                        class="card-body p-5 d-flex flex-column gap-4"
                                    >
                                        <div>
                                            <label class="required form-label fs-6 fw-semibold text-gray-700">Nama Usaha / Perusahaan</label>
                                            <input type="text" class="form-control fs-5" v-model="form.business_name" required placeholder="Nama usaha..." />
                                        </div>
                                        <div>
                                            <label class="required form-label fs-6 fw-semibold text-gray-700">Bidang Usaha</label>
                                            <input type="text" class="form-control fs-5" v-model="form.business_field" required placeholder="Bidang usaha..." />
                                        </div>
                                        <div>
                                            <label class="required form-label fs-6 fw-semibold text-gray-700">Jabatan</label>
                                            <input type="text" class="form-control fs-5" v-model="form.position" required placeholder="Jabatan..." />
                                        </div>
                                    </div>
                                </div>

                                <!-- Pelatihan Asiaworks -->
                                <div
                                    class="card rounded-4 border border-gray-300 mb-6"
                                >
                                    <div
                                        class="card-header h-auto p-5 border-bottom border-gray-300"
                                        style="min-height: unset"
                                    >
                                        <div class="card-title m-0">
                                            <h3>Program Asiaworks Indonesia</h3>
                                        </div>
                                    </div>
                                    <div
                                        class="card-body p-5 d-flex flex-column gap-4"
                                    >
                                        <div>
                                            <label class="form-label fs-6 fw-semibold text-gray-700">Pernah Mengikuti Program Pelatihan Asiaworks?</label>
                                            <select class="form-select fs-5" v-model="form.asiaworks_joined">
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div v-if="form.asiaworks_joined === 'Ya'">
                                            <label class="form-label fs-6 fw-semibold text-gray-700">Training yang Diikuti</label>
                                            <select class="form-select fs-5" v-model="form.asiaworks_training">
                                                <option value="">Pilih training...</option>
                                                <option value="Basic">Basic</option>
                                                <option value="Advance">Advance</option>
                                                <option value="Leadership Program">Leadership Program</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Informasi Lainnya -->
                                <div
                                    class="card rounded-4 border border-gray-300"
                                >
                                    <div
                                        class="card-header h-auto p-5 border-bottom border-gray-300"
                                        style="min-height: unset"
                                    >
                                        <div class="card-title m-0">
                                            <h3>Informasi Lainnya</h3>
                                        </div>
                                    </div>
                                    <div
                                        class="card-body p-5 d-flex flex-column gap-4"
                                    >
                                        <div>
                                            <label class="required form-label fs-6 fw-semibold text-gray-700">Tantangan/Masalah yang Sedang Dihadapi</label>
                                            <textarea class="form-control fs-5" rows="3" v-model="form.problem" required placeholder="Tantangan atau masalah..."></textarea>
                                        </div>
                                        <div>
                                            <label class="required form-label fs-6 fw-semibold text-gray-700">Harapan Setelah Mengikuti Training HPI</label>
                                            <textarea class="form-control fs-5" rows="3" v-model="form.hope" required placeholder="Harapan setelah training..."></textarea>
                                        </div>
                                        <div>
                                            <label class="required form-label fs-6 fw-semibold text-gray-700">Darimana Mendapatkan Informasi Ini?</label>
                                            <input type="text" class="form-control fs-5" v-model="form.from" required placeholder="Sumber informasi..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Action Buttons -->
                            <div class="d-flex flex-column gap-3 pt-3">
                                <button
                                    type="submit"
                                    id="kt_drawer_save_button"
                                    class="btn btn-sm btn-myprimary w-100 fs-5 py-3"
                                >
                                    <span class="indicator-label">
                                        <i class="ri-save-line me-1 fs-4"></i> Simpan Perubahan
                                    </span>
                                    <span class="indicator-progress">
                                        Mohon Tunggu...
                                        <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"
                                        ></span>
                                    </span>
                                </button>
                                <div class="d-flex gap-3">
                                    <button
                                        type="button"
                                        id="kt_drawer_deny_button"
                                        class="btn btn-sm btn-mydanger-solid flex-fill fs-5"
                                        :disabled="form.status === 'deny'"
                                        @click="submitForm('deny')"
                                    >
                                        <span class="indicator-label">
                                            Tolak
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
                                        :disabled="form.status === 'accept'"
                                        @click="submitForm('accept')"
                                    >
                                        <span class="indicator-label">
                                            Setujui
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
                "/hpi/dashboard",
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
            name: "",
            email: "",
            whatsapp: "",
            city: "",
            size: "",
            business_name: "",
            business_field: "",
            position: "",
            problem: "",
            hope: "",
            from: "",
            asiaworks_joined: "Tidak",
            asiaworks_training: "",
            status: "pending",
        });

        const selectedData = ref(null);
        const isEditMode = ref(false);

        const resetForm = () => {
            form.name = "";
            form.email = "";
            form.whatsapp = "";
            form.city = "";
            form.size = "";
            form.business_name = "";
            form.business_field = "";
            form.position = "";
            form.problem = "";
            form.hope = "";
            form.from = "";
            form.asiaworks_joined = "Tidak";
            form.asiaworks_training = "";
            form.status = "pending";
            isEditMode.value = false;
            selectedData.value = null;

            const drawerCloseBtn = document.querySelector(
                "#kt_drawer_example_advanced_close"
            );
            if (drawerCloseBtn) drawerCloseBtn.click();
        };

        const submitForm = (targetStatus = null) => {
            if (!selectedData.value) return;

            const statusToSave = targetStatus || form.status;
            const buttonId = targetStatus === "accept"
                ? "#kt_drawer_accept_button"
                : targetStatus === "deny"
                ? "#kt_drawer_deny_button"
                : "#kt_drawer_save_button";

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
            payload.append("name", form.name);
            payload.append("email", form.email);
            payload.append("whatsapp", form.whatsapp);
            payload.append("city", form.city);
            payload.append("size", form.size);
            payload.append("business_name", form.business_name);
            payload.append("business_field", form.business_field);
            payload.append("position", form.position);
            payload.append("problem", form.problem);
            payload.append("hope", form.hope);
            payload.append("from", form.from);
            payload.append("asiaworks_joined", form.asiaworks_joined);
            if (form.asiaworks_joined === "Ya") {
                payload.append("asiaworks_training", form.asiaworks_training);
            }
            payload.append("status", statusToSave);

            router.post(
                `/hpi/dashboard/${selectedData.value.id}`,
                payload,
                {
                    onSuccess: () => {
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil!",
                            text: "Data peserta berhasil disimpan.",
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
                            text: "Tidak dapat memperbarui data peserta. Periksa input Anda.",
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
            form.name = data.name || "";
            form.email = data.email || "";
            form.whatsapp = data.whatsapp || "";
            form.city = data.city || "";
            form.size = data.size || "L";
            form.business_name = data.business_name || "";
            form.business_field = data.business_field || "";
            form.position = data.position || "";
            form.problem = data.problem || "";
            form.hope = data.hope || "";
            form.from = data.from || "";
            form.asiaworks_joined = data.asiaworks_joined || "Tidak";
            form.asiaworks_training = data.asiaworks_training || "";
            form.status = data.status || "pending";
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
                    router.delete(`/hpi/dashboard/${id}`);
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
            submitForm,
            destroy,
            resetForm,
            editData,
            getInitials,
            isEditMode,
            openDrawer,
            selectedData,
        };
    },
};
</script>

<style scoped></style>
