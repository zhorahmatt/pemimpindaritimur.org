<template>
    <Head>
        <title>Smart Financial Map</title>
        <link rel="icon" type="image/png" href="https://static.wixstatic.com/media/abd792_d2396960b539400081a5ba95b65f311a~mv2.png/v1/fill/w_500,h_500,al_c/abd792_d2396960b539400081a5ba95b65f311a~mv2.png">
    </Head>

    <main id="kt_body" class="bg-light position-relative app-blank" data-kt-name="metronic" data-bs-spy="scroll"
        data-bs-target="#kt_landing_menu">
        <div class="d-flex flex-column flex-root" id="kt_app_root">

            <!-- Hero Section -->
            <section id="hero" class="bg-white border-bottom border-gray-300 py-0">
                <div class="container d-flex flex-column align-items-center text-center py-20">
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-3">
                        Smart Financial Map Workshop Chapter Makassar
                    </h1>
                    <p class="fw-semibold text-gray-600 fs-2 mb-0 mx-md-20 mx-lg-0">
                        Mereka yang siap <span class="fw-bolder text-mydanger">melangkah</span> menuju <span class="fw-bolder text-mydanger">pengelolaan keuangan bisnis</span> yang lebih <span class="fw-bolder text-mydanger">cerdas</span> dan <span class="fw-bolder text-mydanger">terarah</span>.
                    </p>
                </div>
            </section>


            <section id="who" class="pt-20">
                <div class="container pt-20">
                    <div class="row g-10">
                        <div class="col-lg-6 text-center text-lg-start align-self-center pe-lg-10 pe-xl-20">
                            <p class="fw-semibold text-myprimary fs-4 text-uppercase mb-6 px-4 py-1 d-inline-block rounded-pill bg-myprimary-light"
                                style="letter-spacing: 0.08em;">
                                Ilmu Keuangan
                            </p>
                            <h1 class="fw-bolder text-dark fs-3x fs-lg-2hx mb-5">
                                Bisnis yang Tangguh Dimulai dari Keputusan yang Tepat!
                            </h1>
                            <p class="fw-semibold text-gray-600 fs-2 fs-lg-3 fs-xl-2 mb-0 me-xl-10">
                                Workshop ini membantu Anda memahami risiko di balik setiap keputusan bisnis dan membangun roadmap finansial yang aman.
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <div class="row g-3 g-md-5 g-lg-3">
                                <div class="col-4 position-relative">
                                    <img src="/assets/media/illustrations/img-1.png" class="rounded-4 w-100" alt="" />
                                    <p class="position-absolute bottom-0 start-50 translate-middle-x fw-semibold fs-8 fs-sm-3 fs-lg-6 text-center text-uppercase mb-4 mb-sm-7 mb-lg-4 mb-xl-5 text-white"
                                        style="letter-spacing: 0.08em;">
                                        Business Owner
                                    </p>
                                </div>
                                <div class="col-4 position-relative">
                                    <img src="/assets/media/illustrations/img-2.png" class="rounded-4 w-100" alt="" />
                                    <p class="position-absolute bottom-0 start-50 translate-middle-x fw-semibold fs-8 fs-sm-3 fs-lg-6 text-center text-uppercase mb-4 mb-sm-7 mb-lg-4 mb-xl-5 text-white"
                                        style="letter-spacing: 0.08em;">
                                        CEO
                                    </p>
                                </div>
                                <div class="col-4 position-relative">
                                    <img src="/assets/media/illustrations/img-3.png" class="rounded-4 w-100" alt="" />
                                    <p class="position-absolute bottom-0 start-50 translate-middle-x fw-semibold fs-8 fs-sm-3 fs-lg-6 text-center text-uppercase mb-4 mb-sm-7 mb-lg-4 mb-xl-5 text-white"
                                        style="letter-spacing: 0.08em;">
                                        Finance Manager
                                    </p>
                                </div>
                                <div class="col-4 position-relative">
                                    <img src="/assets/media/illustrations/img-4.png" class="rounded-4 w-100" alt="" />
                                    <p class="position-absolute bottom-0 start-50 translate-middle-x fw-semibold fs-8 fs-sm-3 fs-lg-6 text-center text-uppercase mb-4 mb-sm-7 mb-lg-4 mb-xl-5 text-white"
                                        style="letter-spacing: 0.08em;">
                                        Business Couch
                                    </p>
                                </div>
                                <div class="col-4 position-relative">
                                    <img src="/assets/media/illustrations/img-5.png" class="rounded-4 w-100" alt="" />
                                    <p class="position-absolute bottom-0 start-50 translate-middle-x fw-semibold fs-8 fs-sm-3 fs-lg-6 text-center text-uppercase mb-4 mb-sm-7 mb-lg-4 mb-xl-5 text-white"
                                        style="letter-spacing: 0.08em;">
                                        Investor
                                    </p>
                                </div>
                                <div class="col-4 position-relative">
                                    <img src="/assets/media/illustrations/img-6.png" class="rounded-4 w-100" alt="" />
                                    <p class="position-absolute bottom-0 start-50 translate-middle-x fw-semibold fs-8 fs-sm-3 fs-lg-6 text-center text-uppercase mb-4 mb-sm-7 mb-lg-4 mb-xl-5 text-white"
                                        style="letter-spacing: 0.08em;">
                                        You!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</template>

<script>
    import { Head, Link, router } from '@inertiajs/vue3';
    import { ref, reactive, onMounted } from 'vue'
    import Swal from 'sweetalert2';

    export default {
        components: {
            Head,
            Link,
        },

        props: {
            errors: Object,
        },
    };
</script>

<style scoped>
</style>
