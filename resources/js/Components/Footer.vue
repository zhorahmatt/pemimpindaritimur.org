<template>
    <section id="footer">
        <div class="bg-myprimary py-10">
            <div class="container">
                <div class="row g-10">
                    <div class="col-12 col-md-6 d-flex flex-column gap-5 justify-content-between">
                        <div class="d-flex align-items-center gap-4">
                            <img alt="Logo" :src="`/storage/${profile.logo}`"
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
                                <Link href="/galleries" class="fw-semibold text-white fs-4">Galeri Kami</Link>
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
</template>

<script setup>
    import { Link } from '@inertiajs/vue3'

    defineProps({
        profile: Object
    })

    function formatWhatsapp(number) {
        if (!number.startsWith('62') || number.length < 10) return number;
        const prefix = '+62';
        const main = number.slice(2);
        return `${prefix} ${main.slice(0, 3)} ${main.slice(3, 7)} ${main.slice(7)}`;
    }
</script>