<template>
    <Head>
        <title>Blog - GLP INDTIM</title>
    </Head>

    <main id="kt_body" class="bg-light position-relative app-blank" data-kt-name="metronic" data-bs-spy="scroll"
        data-bs-target="#kt_landing_menu">
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="flex-grow-1">
                <!-- Hero Section -->
                <section id="hero" class="bg-white border-bottom border-gray-200 py-0">
                    <Navbar :profile="profile" />
                    <div class="container d-flex flex-column align-items-center text-center pt-10 pb-10 pb-lg-20">
                        <p class="fw-semibold text-myprimary fs-4 text-uppercase mb-3 px-4 py-1 d-inline-block rounded-pill bg-myprimary-light"
                            style="letter-spacing: 0.08em;">
                            #CeritaDariTimur
                        </p>
                        <h1 class="fw-bolder text-dark lh-base fs-3x mb-3">
                            Catatan Kebaikan ✍️
                        </h1>
                        <p class="fw-semibold text-gray-600 fs-2 mb-8">
                            Kisah, refleksi, dan inspirasi dari perjalanan kami
                            <span class="fw-bolder text-mydanger">menebar kebaikan</span>.
                        </p>

                        <form @submit.prevent="handleSearch"
                            class="d-flex align-items-center position-relative my-1 w-100 w-lg-75">
                            <i class="bi bi-search position-absolute ms-7 fs-3"></i>
                            <input type="text"
                                class="form-control form-control-solid border border-gray-200 rounded-pill ps-16 fs-4 h-55px"
                                placeholder="Cari judul blog disini..." v-model="search" />
                        </form>
                    </div>
                </section>

                <!-- Blogs Section -->
                <section id="blogs" class="py-10 py-lg-20">
                    <div class="container">
                        <div v-if="blogs.data.length === 0" class="text-center">
                            <img src="/assets/media/illustrations/empty.png"
                                alt="Tidak ada data" class="mh-300px">
                            <h2 class="text-gray-800 mb-4">Blog Tidak Ditemukan</h2>
                            <p class="text-gray-600 fs-4 mb-10">Belum ada blog atau pencarian tidak sesuai.</p>
                        </div>
                        <div class="d-flex flex-column gap-10" v-else>
                            <div v-for="(blog, index) in blogs.data" :key="index">
                                <Link :href="`/blogs/${blog.slug}`" class="d-flex flex-row gap-5 gap-sm-6 gap-md-7 text-start" id="blog-card">
                                    <div
                                        class="overflow-hidden position-relative rounded-4 mw-125px mw-md-200px ratio ratio-4x3 order-3 order-md-0 flex-shrink-0">
                                        <img :src="`/storage/${blog.image}`"
                                            class="img-blog img-fluid object-fit-cover h-md-100 mt-9 mt-md-0" alt="" />
                                    </div>
                                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                                        <div class="flex-grow-1">
                                            <p class="fw-bold text-myprimary fs-5 mb-1 text-uppercase"
                                                style="letter-spacing: 0.06em;">{{ blog.category }}</p>
                                            <p class="fw-bold text-dark fs-2 mb-2 text-truncate-2">{{ blog.title }}</p>
                                            <p class="text-gray-600 fs-4 mb-0 text-truncate-2">{{ stripTags(blog.content) }}</p>
                                        </div>
                                        <p class="fw-semibold text-gray-500 fs-6 mb-0 mt-8 text-uppercase"
                                            style="letter-spacing: 0.04em;">{{ formatDate(blog.created_at) }}</p>
                                    </div>
                                </Link>
                            </div>
                            <Pagination :links="blogs.links" class="mt-8" align="center" />
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
            blogs: Object,
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
        },

        setup() {
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            const handleSearch = () => {
                router.get('/blogs', {
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
