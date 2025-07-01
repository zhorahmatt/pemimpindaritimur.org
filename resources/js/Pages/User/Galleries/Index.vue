<template>
    <Head>
        <title>Galeri Kami - GLP INDTIM</title>
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
                            Cerita Lewat Lensa 📸
                        </h1>
                        <p class="fw-semibold text-gray-600 fs-2 mb-0">
                            Tempat jiwa-jiwa <span class="fw-bolder text-mydanger">kehidupan</span> 
                            dan <span class="fw-bolder text-mydanger">perjuangan</span> 
                            yang terus kami jalani dan abadikan.
                        </p>
                    </div>
                </section>

                <!-- Galleries Section -->
                <section id="galleries" class="py-10 py-lg-20">
                    <div class="container">
                        <div class="masonry-gallery">
                            <div v-for="(gallery, index) in galleries" :key="index" class="masonry-item">
                                <a href="#" class="d-block overlay position-relative"
                                    @click.prevent="openLightbox(`/storage/${gallery.image}`)">
                                    <img :src="`/storage/${gallery.image}`" :alt="gallery.description"
                                        class="overlay-wrapper rounded-4 w-100" />
                                    <div class="overlay-layer position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25 rounded-4">
                                        <i class="ri-eye-fill text-white fs-3x"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <FsLightbox :toggler="lightboxToggler" :slide="currentIndex" :sources="lightboxSources" />
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
    import { Head, Link } from '@inertiajs/vue3';
    import FsLightbox from "fslightbox-vue";

    export default {
        components: {
            Head,
            Link,
            Navbar,
            FsLightbox,
            Footer
        },

        props: {
            profile: Object,
            galleries: Array,
        },

        data() {
            return {
                lightboxToggler: false,
                lightboxSources: [],
            };
        },

        methods: {
            openLightbox(clickedImageUrl) {
                this.lightboxSources = this.galleries.map(p => `/storage/${p.image}`);
                this.currentIndex = this.lightboxSources.indexOf(clickedImageUrl) + 1;
                this.lightboxToggler = !this.lightboxToggler;
            },
        }
    };
</script>

<style scoped>

</style>
