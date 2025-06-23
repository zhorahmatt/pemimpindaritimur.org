<template>
    <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
        data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
        <div class="app-sidebar-logo px-6 border-end border-gray-300" id="kt_app_sidebar_logo">
            <Link href="/admin/dashboard">
            <img alt="Logo" src="/assets/media/logos/glp-indtim-logo.png"
                class="h-40px app-sidebar-logo-default theme-light-show" />
            <img alt="Logo" src="/assets/media/logos/glp-indtim-logo.png"
                class="h-25px app-sidebar-logo-minimize" />
            </Link>
        </div>
        <div class="app-sidebar-menu overflow-hidden flex-column-fluid border-end border-gray-300">
            <div id="kt_app_sidebar_menu_wrapper"
                class="app-sidebar-wrapper d-flex flex-column justify-content-between gap-8 hover-scroll-overlay-y mt-5 mb-2"
                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <div class="menu menu-column menu-rounded menu-sub-indention px-4" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">
                    <div class="menu-item">
                        <Link class="menu-link menu-link-mysecondary"
                            :class="{ 'active': $page.url.startsWith('/admin/dashboard') }" href="/admin/dashboard">
                        <span class="menu-icon">
                            <i
                                :class="[$page.url.startsWith('/admin/dashboard') ? 'ri-dashboard-fill' : 'ri-dashboard-line',
                                    'fs-2'
                                ]"></i>
                        </span>
                        <span
                            :class="[$page.url.startsWith('/admin/dashboard') ? 'fw-bold' : 'fw-semibold', 'menu-title fs-5']">Dashboard</span>
                        </Link>
                    </div>
                    <div class="menu-item pt-4">
                        <div class="menu-content py-1">
                            <span class="text-gray-500 fw-semibold text-uppercase fs-7" style="letter-spacing: 0.06em;">Publikasi</span>
                        </div>
                    </div>
                    <div class="menu-item">
                        <Link class="menu-link menu-link-mysecondary"
                            :class="{ 'active': $page.url.startsWith('/admin/galleries') }" href="/admin/galleries">
                        <span class="menu-icon">
                            <i
                                :class="[$page.url.startsWith('/admin/galleries') ? 'ri-folder-image-fill' :
                                    'ri-folder-image-line', 'fs-2'
                                ]"></i>
                        </span>
                        <span
                            :class="[$page.url.startsWith('/admin/galleries') ? 'fw-bold' : 'fw-semibold', 'menu-title fs-5']">Galeri</span>
                        </Link>
                    </div>
                    <div class="menu-item">
                        <Link class="menu-link menu-link-mysecondary"
                            :class="{ 'active': $page.url.startsWith('/admin/activities') }" href="/admin/activities">
                        <span class="menu-icon">
                            <i
                                :class="[$page.url.startsWith('/admin/activities') ? 'ri-team-fill' :
                                    'ri-team-line', 'fs-2'
                                ]"></i>
                        </span>
                        <span
                            :class="[$page.url.startsWith('/admin/activities') ? 'fw-bold' : 'fw-semibold', 'menu-title fs-5']">Kegiatan Internal</span>
                        </Link>
                    </div>
                    <div class="menu-item">
                        <Link class="menu-link menu-link-mysecondary"
                            :class="{ 'active': $page.url.startsWith('/admin/programs') }" href="/admin/programs">
                        <span class="menu-icon">
                            <i
                                :class="[$page.url.startsWith('/admin/programs') ? 'ri-hand-heart-fill' :
                                    'ri-hand-heart-line', 'fs-2'
                                ]"></i>
                        </span>
                        <span
                            :class="[$page.url.startsWith('/admin/programs') ? 'fw-bold' : 'fw-semibold', 'menu-title fs-5']">Program Amal</span>
                        </Link>
                    </div>
                    <div class="menu-item">
                        <Link class="menu-link menu-link-mysecondary"
                            :class="{ 'active': $page.url.startsWith('/admin/blogs') }" href="/admin/blogs">
                        <span class="menu-icon">
                            <i
                                :class="[$page.url.startsWith('/admin/blogs') ? 'ri-article-fill' : 'ri-article-line', 'fs-2']"></i>
                        </span>
                        <span
                            :class="[$page.url.startsWith('/admin/blogs') ? 'fw-bold' : 'fw-semibold', 'menu-title fs-5']">Blog</span>
                        </Link>
                    </div>
                    <div class="menu-item">
                        <Link class="menu-link menu-link-mysecondary"
                            :class="{ 'active': $page.url.startsWith('/admin/testimonials') }" href="/admin/testimonials">
                        <span class="menu-icon">
                            <i
                                :class="[$page.url.startsWith('/admin/testimonials') ? 'ri-chat-quote-fill' : 'ri-chat-quote-line', 'fs-2']"></i>
                        </span>
                        <span
                            :class="[$page.url.startsWith('/admin/testimonials') ? 'fw-bold' : 'fw-semibold', 'menu-title fs-5']">Testimoni</span>
                        </Link>
                    </div>
                    <div class="menu-item pt-4">
                        <div class="menu-content py-1">
                            <span class="text-gray-500 fw-semibold text-uppercase fs-7" style="letter-spacing: 0.06em;">Lainnya</span>
                        </div>
                    </div>
                    <div class="menu-item">
                        <Link class="menu-link menu-link-mysecondary"
                            :class="{ 'active': $page.url.startsWith('/admin/partners') }" href="/admin/partners">
                        <span class="menu-icon">
                            <i
                                :class="[$page.url.startsWith('/admin/partners') ? 'ri-service-fill' :
                                    'ri-service-line', 'fs-2'
                                ]"></i>
                        </span>
                        <span
                            :class="[$page.url.startsWith('/admin/partners') ? 'fw-bold' : 'fw-semibold', 'menu-title fs-5']">Logo Partner</span>
                        </Link>
                    </div>
                    <div class="menu-item">
                        <Link class="menu-link menu-link-mysecondary"
                            :class="{ 'active': $page.url.startsWith('/admin/profile') }" href="/admin/profile">
                        <span class="menu-icon">
                            <i
                                :class="[$page.url.startsWith('/admin/profile') ? 'ri-community-fill' :
                                    'ri-community-line', 'fs-2'
                                ]"></i>
                        </span>
                        <span
                            :class="[$page.url.startsWith('/admin/profile') ? 'fw-bold' : 'fw-semibold', 'menu-title fs-5']">Profil Yayasan</span>
                        </Link>
                    </div>
                    <div class="menu-item">
                        <Link class="menu-link menu-link-mysecondary"
                            :class="{ 'active': $page.url.startsWith('/admin/user') }" href="/admin/user">
                        <span class="menu-icon">
                            <i
                                :class="[$page.url.startsWith('/admin/user') ? 'ri-account-circle-fill' : 'ri-account-circle-line',
                                    'fs-2'
                                ]"></i>
                        </span>
                        <span
                            :class="[$page.url.startsWith('/admin/user') ? 'fw-bold' : 'fw-semibold', 'menu-title fs-5']">Akun</span>
                        </Link>
                    </div>
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
