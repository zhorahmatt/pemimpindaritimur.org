<template>
    <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center flex-equal">
                    <button class="btn btn-icon btn-myicon ms-n3 me-3 d-flex d-lg-none"
                        id="kt_landing_menu_toggle">
                        <i class="ri-menu-line fs-1"></i>
                    </button>
                    <a href="#home" data-kt-scroll-toggle="true">
                        <img alt="Logo" src="assets/media/logos/glp-indtim-logo.png"
                            class="logo-default d-none d-lg-block h-35px h-lg-55px" />
                    </a>
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
                                <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#home"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Beranda</a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#about"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tentang</a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#activities"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Kegiatan</a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#programs"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Program</a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#blogs"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Blog</a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#testimonials"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Testimoni</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-equal text-end ms-4">
                    <Link href="#" class="btn btn-sm btn-myprimary rounded-pill fs-5 d-inline-flex align-items-center gap-1 text-nowrap">
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
    }
</script>

<style>

</style>
