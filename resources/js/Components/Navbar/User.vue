<template>
    <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
        data-kt-sticky-offset="{default: '400px'}">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between gap-4">
                <div class="d-flex align-items-center flex-equal">
                    <button class="btn btn-icon btn-myicon ms-n3 me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                        <i class="ri-menu-line fs-1"></i>
                    </button>
                    <a v-if="$page.url === '/'" href="#home" data-kt-scroll-toggle="true">
                        <img alt="Logo" :src="`/storage/${profile.logo}`"
                            class="logo-default d-none d-lg-block h-30px h-lg-45px" />
                    </a>
                    <Link v-else href="/">
                        <img alt="Logo" :src="`/storage/${profile.logo}`"
                            class="logo-default d-none d-lg-block h-30px h-lg-45px" />
                    </Link>
                </div>
                <div class="d-lg-block" id="kt_header_nav_wrapper">
                    <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                        data-kt-drawer-width="200px" data-kt-drawer-direction="end"
                        data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                        data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                        <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                            id="kt_landing_menu">
                            <div class="menu-item">
                                <a v-if="$page.url === '/'" href="#home" class="menu-link nav-link py-3 px-4 px-xxl-6 active"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Beranda</a>
                                <Link v-else href="/" class="menu-link nav-link py-3 px-4 px-xxl-6">Beranda</Link>
                            </div>
                            <div class="menu-item">
                                <a v-if="$page.url === '/'" href="#about" class="menu-link nav-link py-3 px-4 px-xxl-6"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tentang</a>
                                <Link v-else @click.prevent="goToSection('about')" class="menu-link nav-link py-3 px-4 px-xxl-6"
                                    data-kt-scroll-toggle="true">Tentang</Link>
                            </div>
                            <div class="menu-item">
                                <a v-if="$page.url === '/'" href="#activities" class="menu-link nav-link py-3 px-4 px-xxl-6"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Kegiatan</a>
                                <Link v-else-if="$page.url.startsWith('/activities')" href="/activities" class="menu-link nav-link py-3 px-4 px-xxl-6 active">Kegiatan</Link>
                                <Link v-else href="/activities" class="menu-link nav-link py-3 px-4 px-xxl-6">Kegiatan</Link>
                            </div>
                            <div class="menu-item">
                                <a v-if="$page.url === '/'" href="#programs" class="menu-link nav-link py-3 px-4 px-xxl-6"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Program</a>
                                <Link v-else-if="$page.url.startsWith('/programs')" href="/programs" class="menu-link nav-link py-3 px-4 px-xxl-6 active">Program</Link>
                                <Link v-else href="/programs" class="menu-link nav-link py-3 px-4 px-xxl-6">Program</Link>
                            </div>
                            <div class="menu-item">
                                <a v-if="$page.url === '/'" href="#blogs" class="menu-link nav-link py-3 px-4 px-xxl-6" 
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Blog</a>
                                <Link v-else-if="$page.url.startsWith('/blogs')" href="/blogs" class="menu-link nav-link py-3 px-4 px-xxl-6 active">Blog</Link>
                                <Link v-else href="/blogs" class="menu-link nav-link py-3 px-4 px-xxl-6">Blog</Link>
                            </div>
                            <div class="menu-item">
                                <a v-if="$page.url === '/'" href="#testimonials" class="menu-link nav-link py-3 px-4 px-xxl-6"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Testimoni</a>
                                <Link v-else @click.prevent="goToSection('testimonials')" class="menu-link nav-link py-3 px-4 px-xxl-6"
                                    data-kt-scroll-toggle="true">Testimoni</Link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-equal text-end">
                    <Link href="/galleries"
                        class="btn btn-sm btn-myprimary rounded-pill fs-5 d-inline-flex align-items-center gap-1 text-nowrap">
                        <i class="ri-gallery-fill fs-2"></i>
                        Galeri Kami
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        Link
    } from '@inertiajs/vue3';

    export default {
        components: {
            Link,
        },

        props: {
            profile: Object
        },

        mounted() {
            this.initDrawer();
        },

        methods: {
            initDrawer() {
                if (window.KTDrawer) {
                    window.KTDrawer.createInstances();
                }
            },

            resetDrawer() {
                const drawerElement = document.querySelector('[data-kt-drawer="on"]');
                if (drawerElement) {
                    drawerElement.setAttribute('data-kt-drawer', 'off');
                }
            },

            goToSection(sectionId) {
                this.$inertia.visit('/', {
                    onFinish: () => {
                        this.resetDrawer();
                        this.initDrawer();
                        setTimeout(() => {
                            const el = document.getElementById(sectionId);
                            if (el) {
                                el.scrollIntoView({ behavior: 'smooth' });
                            }
                        }, 100);
                    }
                });
            }
        },

        watch: {
            '$page.url'(newVal, oldVal) {
                this.$nextTick(() => {
                    this.resetDrawer();
                    this.initDrawer();
                });
            }
        }

    }
</script>

<style>

</style>
