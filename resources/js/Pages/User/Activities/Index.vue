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
                    <Navbar :profile="profile" />
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
            <Footer :profile="profile" />
        </div>
    </main>
</template>

<script>
    import Navbar from "../../../Components/Navbar/User.vue";
    import Footer from "../../../Components/Footer.vue";
    import Pagination from '../../../Components/Pagination.vue';
    import { Head, Link, router } from '@inertiajs/vue3';
    import { ref } from 'vue';

    export default {
        components: {
            Head,
            Link,
            Navbar,
            Pagination,
            Footer
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
