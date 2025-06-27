<template>
    <Head>
        <title>Kegiatan Internal - GLP INDTIM</title>
    </Head>

    <main id="kt_body" class="bg-light position-relative app-blank" data-kt-name="metronic" data-bs-spy="scroll"
        data-bs-target="#kt_landing_menu">
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="flex-grow-1">
                <!-- Hero Section -->
                <section id="hero" class="bg-white border-bottom border-gray-200 py-0">
                    <Navbar />
                    <div class="container d-flex flex-column align-items-center text-center pt-10 pb-10 pb-lg-20">
                        <h1 class="fw-bolder text-dark lh-base fs-3x mb-3">
                            Bersama Menyatukan Langkah 🚀
                        </h1>
                        <p class="fw-semibold text-gray-600 fs-2 mb-8">
                            Tempat jiwa-jiwa <span class="fw-bolder text-mydanger">bertumbuh</span>,
                            <span class="fw-bolder text-mydanger">berbagi ilmu</span> dan
                            <span class="fw-bolder text-mydanger">semangat</span> dalam
                            <span class="fw-bolder text-mydanger">harmoni kebersamaan</span>.
                        </p>

                        <form @submit.prevent="handleSearch"
                            class="d-flex align-items-center position-relative my-1 w-100 w-lg-75">
                            <i class="bi bi-search position-absolute ms-7 fs-3"></i>
                            <input type="text"
                                class="form-control form-control-solid border border-gray-200 rounded-pill ps-16 fs-4 h-55px"
                                placeholder="Cari judul kegiatan disini..." v-model="search" />
                        </form>
                    </div>
                </section>

                <!-- Activities Section -->
                <section id="activities" class="py-10 py-lg-20">
                    <div class="container">
                        <div v-if="activities.data.length === 0" class="text-center">
                            <img src="/assets/media/illustrations/empty.png"
                                alt="Tidak ada data" class="mh-300px">
                            <h2 class="text-gray-800 mb-4">Kegiatan Tidak Ditemukan</h2>
                            <p class="text-gray-600 fs-4 mb-10">Belum ada kegiatan atau pencarian tidak sesuai.</p>
                        </div>
                        <div class="row g-0 justify-content-center" v-else>
                            <div v-for="(activity, index) in activities.data" :key="index" class="col-12 col-md-6 col-lg-4">
                                <Link :href="`/activities/${activity.slug}`" class="d-flex flex-column gap-4 text-start m-5" id="activity-card">
                                    <div class="ribbon ribbon-start ribbon-clip">
                                        <div class="ribbon-label fs-6">
                                            {{ activity.phase }}
                                            <span class="ribbon-inner"
                                                :class="{
                                                    'bg-mywarning': activity.phase === 'Akan Datang',
                                                    'bg-mysuccess': activity.phase === 'Dibuka',
                                                    'bg-mydanger': activity.phase === 'Ditutup',
                                                    'bg-myprimary': activity.phase === 'Terlaksana'
                                                }"
                                            ></span>
                                        </div>
                                        <div class="overflow-hidden position-relative rounded-4 mh-300px ratio ratio-4x3">
                                            <img :src="`/storage/${activity.image}`" class="img-fluid object-fit-cover mw-100"
                                                alt="Gambar Kegiatan Internal" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <p class="fw-bold text-dark fs-2 mb-2 text-truncate-2">{{ activity.title }}</p>
                                        <p class="text-gray-600 fs-4 mb-0 text-truncate-3">{{ stripTags(activity.content) }}</p>
                                    </div>
                                </Link>
                            </div>
                            <Pagination :links="activities.links" class="mt-8" align="center" />
                        </div>
                    </div>
                </section>
            </div>

            <!-- Footer Section -->
            <section id="footer">
                <div class="bg-myprimary py-10">
                    <div class="container">
                        <div class="row g-10">
                            <div class="col-12 col-md-6 d-flex flex-column gap-5 justify-content-between">
                                <div class="d-flex align-items-center gap-4">
                                    <img alt="Logo" src="/assets/media/logos/glp-indtim-logo.png"
                                        class="logo-default h-55px" />
                                    <p class="fw-semibold text-white fs-4 mb-0">Graduate Leadership Program
                                        <br>Indonesia Timur</p>
                                </div>
                                <p class="text-white opacity-75 fs-4 mb-0">{{ profile.address }}</p>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-row gap-15 gap-xl-20 justify-content-md-end">
                                <div class="d-flex flex-column gap-4">
                                    <p class="text-white opacity-50 fs-4 mb-0 text-uppercase"
                                        style="letter-spacing: 0.08em;">Navigasi</p>
                                    <div class="d-flex flex-column gap-2">
                                        <Link href="/" class="fw-semibold text-white fs-4">Beranda</Link>
                                        <Link href="/" class="fw-semibold text-white fs-4">Galeri Kami</Link>
                                        <Link href="/activities" class="fw-semibold text-white fs-4">Kegiatan Internal</Link>
                                        <Link href="/programs" class="fw-semibold text-white fs-4">Program Amal</Link>
                                        <Link href="/blogs" class="fw-semibold text-white fs-4">Blog</Link>
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-4">
                                    <p class="text-white opacity-50 fs-4 mb-0 text-uppercase"
                                        style="letter-spacing: 0.08em;">Sosial Media</p>
                                    <div class="d-flex flex-column gap-2">
                                        <a :href="`https://facebook.com/${profile.facebook}`" target="_blank"
                                            class="d-flex flex-row align-items-center gap-2 fs-4 text-white">
                                            <i class="ri-facebook-box-fill fs-3 text-white"></i>
                                            {{ profile.facebook }}
                                        </a>
                                        <a :href="`https://instagram.com/${profile.instagram}`" target="_blank"
                                            class="d-flex flex-row align-items-center gap-2 fs-4 text-white">
                                            <i class="ri-instagram-line fs-3 text-white"></i>
                                            {{ profile.instagram }}
                                        </a>
                                        <a :href="`https://wa.me/${profile.whatsapp}`" target="_blank"
                                            class="d-flex flex-row align-items-center gap-2 fs-4 text-white">
                                            <i class="ri-whatsapp-fill fs-3 text-white"></i>
                                            {{ formatWhatsapp(profile.whatsapp) }}
                                        </a>
                                        <a :href="`mailto:${profile.email}`" target="_blank"
                                            class="d-flex flex-row align-items-center gap-2 fs-4 text-white">
                                            <i class="ri-mail-line fs-3 text-white"></i>
                                            {{ profile.email }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-5" style="background-color: var(--bs-myprimary-600);">
                    <div class="container d-flex flex-column flex-md-row gap-3 justify-content-between">
                        <p class="text-white opacity-50 fs-4 mb-0">2025 © GLPINDTIM, All Right Reserved</p>
                        <div class="d-flex flex-column flex-sm-row gap-1 gap-sm-5 gap-md-10">
                            <p class="fw-semibold text-white opacity-75 fs-4 mb-0 text-uppercase"
                                style="letter-spacing: 0.08em;">#PemimpinDariTimur</p>
                            <p class="fw-semibold text-white opacity-75 fs-4 mb-0 text-uppercase"
                                style="letter-spacing: 0.08em;">#DariTimurBeriDampak</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</template>

<script>
    import Navbar from "../../../Components/Navbar/User.vue";
    import Pagination from '../../../Components/Pagination.vue';
    import { Head, Link, router } from '@inertiajs/vue3';
    import { ref } from 'vue';

    export default {
        components: {
            Head,
            Link,
            Navbar,
            Pagination
        },

        props: {
            profile: Object,
            activities: Object,
        },

        methods: {
            stripTags(html) {
                const div = document.createElement("div");
                div.innerHTML = html;
                return div.textContent || div.innerText || "";
            },

            formatDate(dateStr) {
                const date = new Date(dateStr);
                return new Intl.DateTimeFormat('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                }).format(date);
            },

            formatWhatsapp(number) {
                if (!number.startsWith('62') || number.length < 10) return number;

                const prefix = '+62';
                const main = number.slice(2);
                const part1 = main.slice(0, 3);
                const part2 = main.slice(3, 7);
                const part3 = main.slice(7);

                return `${prefix} ${part1} ${part2} ${part3}`;
            }
        },

        setup() {
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            const handleSearch = () => {
                router.get('/activities', {
                    q: search.value,
                });
            }

            return {
                search,
                handleSearch
            }
        }
    };
</script>

<style scoped>

</style>
