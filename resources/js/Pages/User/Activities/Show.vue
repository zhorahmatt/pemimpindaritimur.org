<template>
    <Head>
        <title>Detail Kegiatan - GLP INDTIM</title>
    </Head>

    <main id="kt_body" class="bg-light position-relative app-blank" data-kt-name="metronic" data-bs-spy="scroll"
        data-bs-target="#kt_landing_menu">
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="flex-grow-1">
                <!-- Hero Section -->
                <section id="hero" class="py-0">
                    <Navbar />
                    <div class="container pt-8">
                        <img :src="`/storage/${activity.image}`"
                            class="img-fluid object-fit-cover rounded-4 w-100 mh-500px" alt="Gambar kegiatan" />
                        <h1 class="fw-bold text-dark text-center lh-base fs-3x pt-8 pt-md-10 px-md-10 px-lg-20 mb-0">
                            {{ activity.title }}
                        </h1>
                        <div class="d-flex justify-content-center gap-3 pt-5 px-md-10 px-lg-20">
                            <p class="fw-bold fs-5 mb-0 text-uppercase"
                                :class="{
                                    'text-mywarning': activity.phase === 'Akan Datang',
                                    'text-mysuccess': activity.phase === 'Dibuka',
                                    'text-mydanger': activity.phase === 'Ditutup',
                                    'text-myprimary': activity.phase === 'Terlaksana'
                                }"
                                style="letter-spacing: 0.06em;">{{ activity.phase }}</p>
                        </div>
                    </div>
                </section>

                <!-- Content Section -->
                <section id="activities" class="pt-15 pb-20">
                    <div class="container px-md-10 px-lg-20">
                        <div id="content-editor" class="fs-4 px-md-10 px-lg-20" v-html="activity.content"></div>
                        <div class="mt-14 px-md-10 px-lg-20 d-flex align-items-center gap-4">
                            <p class="text-gray-700 fs-4 mb-0">Bagikan kegiatan ini</p>
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
                                        <a href="#home" class="fw-semibold text-white fs-4">Beranda</a>
                                        <a href="#about" class="fw-semibold text-white fs-4">Galeri Kami</a>
                                        <a href="#activities" class="fw-semibold text-white fs-4">Kegiatan
                                            Internal</a>
                                        <a href="#programs" class="fw-semibold text-white fs-4">Program Amal</a>
                                        <a href="#testimonials" class="fw-semibold text-white fs-4">Testimoni</a>
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
    import { Head, Link, router } from '@inertiajs/vue3';
    import { ref } from 'vue';
    import Swal from 'sweetalert2';

    export default {
        components: {
            Head,
            Link,
            Navbar,
        },

        props: {
            profile: Object,
            activity: Object,
        },

        data() {
            return {
                currentUrl: window.location.href
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
                        title: 'Link kegiatan berhasil disalin!',
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
    };
</script>

<style scoped>

</style>
