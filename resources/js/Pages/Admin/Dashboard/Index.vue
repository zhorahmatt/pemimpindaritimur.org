<template>

    <Head>
        <title>Dashboard - GLP INDTIM</title>
    </Head>

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-7 py-lg-8">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0 mb-2">
                            Dashboard Admin
                        </h1>
                        <p class="fs-4 text-gray-600 m-0">Selamat Datang {{ $page . props . auth . user . name }}</p>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl px-0">
                    <div class="row g-6">
                        <div class="col-12 col-sm-4">
                            <div class="card border border-gray-300 h-100">
                                <div class="card-body d-flex align-items-center gap-5 p-6">
                                    <div
                                        class="p-6 bg-mysecondary rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-team-fill text-mysecondary fs-2hx"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <p class="fs-4 fw-semibold text-gray-800 mb-1">Kegiatan Internal</p>
                                        <h1 class="fs-2hx mb-0">0</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="card border border-gray-300 h-100">
                                <div class="card-body d-flex align-items-center gap-5 p-6">
                                    <div
                                        class="p-6 bg-mysecondary rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-hand-heart-fill text-mysecondary fs-2hx"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <p class="fs-4 fw-semibold text-gray-800 mb-1">Program Amal</p>
                                        <h1 class="fs-2hx mb-0">0</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="card border border-gray-300 h-100">
                                <div class="card-body d-flex align-items-center gap-5 p-6">
                                    <div
                                        class="p-6 bg-mysecondary rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-article-fill text-mysecondary fs-2hx"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <p class="fs-4 fw-semibold text-gray-800 mb-1">Blog</p>
                                        <h1 class="fs-2hx mb-0">0</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LayoutAdmin from '../../../Layouts/Admin.vue';
    import {
        Head,
        Link,
    } from '@inertiajs/vue3';

    export default {
        layout: LayoutAdmin,

        components: {
            Head,
            Link,
        },

    };
</script>
