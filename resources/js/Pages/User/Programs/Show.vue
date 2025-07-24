<template>
    <Head>
        <title>Detail Program - GLP INDTIM</title>
        <meta name="description" :content="metaDescription">

        <meta property="og:type" content="article">
        <meta property="og:title" :content="program.title">
        <meta property="og:description" :content="metaDescription">
        <meta property="og:image" :content="programImageUrl">
        <!-- <meta property="og:image:width" content="800">
        <meta property="og:image:height" content="800"> -->
        <meta property="og:url" :content="currentUrl">
        <meta property="og:site_name" content="GLP INDTIM">
        <meta property="article:author" content="GLP INDTIM">
        <meta property="article:published_time" :content="program.created_at">
        
        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" :content="program.title">
        <meta name="twitter:description" :content="metaDescription">
        <meta name="twitter:image" :content="programImageUrl">
        
        <!-- Additional Meta Tags -->
        <meta name="author" content="GLP INDTIM">
        <link rel="canonical" :href="currentUrl">
    </Head>

    <main id="kt_body" class="bg-light position-relative app-blank" data-kt-name="metronic" data-bs-spy="scroll"
        data-bs-target="#kt_landing_menu">
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="flex-grow-1">
                <!-- Hero Section -->
                <section id="hero" class="py-0">
                    <Navbar :profile="profile" />
                    <div class="container mw-md-750px mw-lg-900px pt-8">
                        <div class="overflow-hidden position-relative rounded-4 ratio ratio-4x3">
                            <img :src="`/storage/${program.image}`"
                                class="img-fluid object-fit-cover mw-100" alt="Gambar Program Amal" />
                        </div>
                        <h1 class="fw-bold text-dark text-center lh-base fs-3x pt-8 pt-md-10 mb-0">
                            {{ program.title }}
                        </h1>
                        <div class="d-flex justify-content-center gap-4 pt-5">
                            <p class="fw-bold fs-5 mb-0 text-uppercase"
                                :class="{
                                    'text-mywarning': program.phase === 'Akan Datang',
                                    'text-mysuccess': program.phase === 'Dibuka',
                                    'text-mydanger': program.phase === 'Ditutup',
                                    'text-myprimary': program.phase === 'Terlaksana'
                                }"
                                style="letter-spacing: 0.06em;">{{ program.phase }}</p>
                        </div>
                    </div>
                </section>

                <!-- Content Section -->
                <section id="programs" class="pt-15 pb-20">
                    <div class="container mw-md-750px mw-lg-900px">
                        <div id="content-editor" class="fs-4" v-html="program.content"></div>
                        <div class="mt-14 d-flex align-items-center gap-4">
                            <p class="text-gray-700 fs-4 mb-0">Bagikan program ini</p>
                            <div class="d-flex gap-2">
                                <a :href="`https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`" target="_blank">
                                    <i class="ri-facebook-box-fill fs-3x fs-sm-2x text-myprimary"></i>
                                </a>
                                <a :href="`https://wa.me/?text=${encodeURIComponent(currentUrl)}`" target="_blank">
                                    <i class="ri-whatsapp-fill fs-3x fs-sm-2x text-myprimary"></i>
                                </a>
                                <i id="copy-icon" class="ri-file-copy-2-line fs-3x fs-sm-2x text-myprimary cursor-pointer"></i>
                            </div>
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
    import { Head, Link, router } from '@inertiajs/vue3';
    import Swal from 'sweetalert2';

    export default {
        components: {
            Head,
            Link,
            Navbar,
            Footer
        },

        props: {
            profile: Object,
            program: Object,
        },

        data() {
            return {
                currentUrl: window.location.href
            }
        },

        computed: {
            metaDescription() {
                const plainText = this.program.content.replace(/<[^>]*>/g, '');
                return plainText.length > 150 ? plainText.substring(0, 150) + '...' : plainText;
            },
            programImageUrl() {
                return window.location.origin + '/storage/' + this.program.image;
            }
        },

        mounted() {
            document.getElementById('copy-icon').addEventListener('click', this.copyToClipboard);
        },

        methods: {
            copyToClipboard() {
                navigator.clipboard.writeText(this.currentUrl).then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Link program berhasil disalin!',
                        text: 'Terima kasih telah membantu menyebarkan informasi ini 🙌',
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        customClass: {
                            popup: 'swal-custom-icon',
                        }
                    });
                }).catch(err => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Menyalin!',
                        text: 'Silakan coba lagi.',
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        customClass: {
                            popup: 'swal-custom-icon',
                        }
                    });
                });
            },
        },
    };
</script>

<style scoped>

</style>
