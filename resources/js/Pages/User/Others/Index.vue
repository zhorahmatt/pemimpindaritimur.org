<template>
    <Head>
        <title>Smart Financial Map</title>
        <link rel="icon" type="image/png" href="https://static.wixstatic.com/media/abd792_d2396960b539400081a5ba95b65f311a~mv2.png/v1/fill/w_500,h_500,al_c/abd792_d2396960b539400081a5ba95b65f311a~mv2.png">
    </Head>

    <main id="kt_body" class="bg-light position-relative app-blank" data-kt-name="metronic" data-bs-spy="scroll"
        data-bs-target="#kt_landing_menu">
        <div class="d-flex flex-column flex-root" id="kt_app_root">

            <!-- Hero Section -->
            <section id="home" class="py-0">
                <div class="bg-landing-sfm bgi-no-repeat bgi-size-cover bgi-position-center bg-dark position-relative min-vh-100"
                    style="background-image: url(assets/media/illustrations/landing-sfm.png);">
                    <div
                        class="container d-flex flex-column justify-content-center align-items-center align-items-lg-start min-vh-100 text-center text-lg-start px-5">
                        <h1 class="fw-bolder text-white lh-base fs-3hx fs-md-3tx mb-8">
                            Smart Financial Map <br> Workshop Batch #33
                        </h1>
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <i class="text-white ri-map-pin-fill fs-2"></i>
                            <p class="text-white fs-3 fs-lg-2 fw-semibold mb-0">Afila Media Karya Hotel, Makassar</p>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-12">
                            <i class="text-white ri-calendar-event-fill fs-2"></i>
                            <p class="text-white fs-3 fs-lg-2 fw-semibold mb-0">27 - 28 November 2025</p>
                        </div>
                        <div class="d-flex flex-wrap justify-content-center gap-5">
                            <a href="#register" data-kt-scroll-toggle
                                class="btn btn-sm btn-myprimary rounded-pill fs-5 d-inline-flex align-items-center gap-1 text-nowrap">
                                <i class="ri-user-add-fill fs-2"></i>
                                Daftar Sekarang
                            </a>
                            <a :href="`https://wa.me/6281232040682?text=${encodeURIComponent('Halo Admin Yanti, Mohon info Workshop Smart Financial Map')}`" target="_blank" class="btn btn-sm btn-mywhite rounded-pill fs-5 d-inline-flex align-items-center gap-1 text-nowrap">
                                <i class="ri-whatsapp-fill fs-2"></i>
                                Hubungi Kami
                            </a>
                        </div>
                        
                    </div>
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

            <section id="why" class="pt-20">
                <div class="container pt-20 d-flex flex-column justify-content-center align-items-center text-center">
                    <p class="fw-semibold text-gray-500 fs-4 text-uppercase mb-4" style="letter-spacing: 0.08em;">
                        Kenapa Harus Ikut
                    </p>
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-3">
                        Smart Financial Map
                    </h1>
                    <p class="fw-semibold text-gray-600 fs-2 mb-10 mb-lg-12 mx-md-20 mx-lg-0">
                        Semua yang Anda butuhkan untuk <span class="fw-bolder text-mydanger">memahami</span>, <span class="fw-bolder text-mydanger">menganalisa</span> dan 
                        <span class="fw-bolder text-mydanger">menumbuhkan</span> bisnis.
                    </p>
                    <div class="row g-4 g-md-6 justify-content-center">
                        <div class="col-md-6">
                            <div class="card h-100 p-7 p-md-8 align-items-start text-start rounded-4 border border-gray-300 shadow-none">
                                <h4 class="fs-2 fw-bolder mb-5 lh-base">Valuasi dan Pendanaan Perusahaan  🧮</h4>
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-funds-box-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menghitung nilai perusahaan berdasarkan industri dan model bisnis dengan beberapa metode
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-calculator-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menentukan kebutuhan pendanaan perusahaan
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-exchange-dollar-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menentukan tipe pendanaan yang tepat bagi perusahaan. apakah loan atau equity
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-bar-chart-2-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membuat feasibility sebuah bisnis atau proyek
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-shield-check-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menganalisa resiko dan membuat bisnis menjadi sustain
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-slideshow-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menganalisa sensitivity bagi perusahaan
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-bank-card-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menganalisa kredit untuk kebutuhan pendanaan
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-dashboard-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membuat dashboard keuangan untuk pengambilan keputusan dibisnis
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-more-fill"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Dan masih banyak lagi....
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 p-7 p-md-8 align-items-start text-start rounded-4 border border-gray-300 shadow-none">
                                <h4 class="fs-2 fw-bolder mb-5 lh-base">Perencanaan, Forecasting & Ekspansi  📈</h4>
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-clipboard-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membuat perencanaan bisnis yang terukur
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-road-map-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membuat road map bisnis sampai 5 tahun kedepan
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-bar-chart-box-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membuat proyeksi keuangan yang lengkap dan mudah dimengerti oleh investor atau kreditur anda
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-function-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membuat forecast penjualan yang akurat dengan beberapa metode statistik
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-global-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana analisa faktor faktor ekonomi yang akan berpengaruh terhadap keuangan perusahaan
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-price-tag-3-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menentukan harga jual dan memproyeksi kenaikan harga berdasarkan inflasi
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-building-2-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membuat rencana CAPEX untuk ekspansi bisnis
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-more-fill"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Dan masih banyak lagi....
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-8 col-xl-7">
                            <div class="card h-100 p-7 p-md-8 align-items-start text-start rounded-4 border border-gray-300 shadow-none">
                                <h4 class="fs-2 fw-bolder mb-5 lh-base">Analisis Laporan Keuangan  📊</h4>
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-file-chart-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membaca laporan Laba dan rugi
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-exchange-funds-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membaca laporan arus kas
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-scales-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membaca laporan neraca dan perubahan modal
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-line-chart-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menganalisa penjualan dan faktor pertumbuhan penjualan
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-pie-chart-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menganalisa struktur biaya dan membuatnya menjadi lebih efesien dan efektif
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-rocket-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menentukan agar profit perusahaan semakin besar
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-arrow-up-circle-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menentukan agar perusahaan memiliki arus kas yang positif
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-equalizer-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menganalisa rasio vertikal dan horisontal bagi perusahaan
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-compass-3-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana menentukan strategi bisnis yang tepat dengan data laporan keuangan
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-wallet-3-line"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Bagaimana membuat anggaran
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="fs-4 mt-1 text-myprimary ri-more-fill"></i>
                                        <p class="text-gray-600 fs-5 mb-0">
                                            Dan masih banyak lagi....
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="profile" class="container mt-20 pt-20">
                <div class="bg-gradient-myprimary rounded-4 px-8 pt-8 p-md-12 p-lg-14 w-100 d-flex flex-column flex-md-row align-items-center align-items-md-start position-relative">
                    <div class="d-none d-md-block w-50 w-impact"></div>
                    <div class="w-100 w-md-50 text-center d-flex flex-column flex-center flex-md-start text-md-start">
                        <p class="text-white fs-4 mb-6 opacity-75">
                            Dibawakan langsung oleh
                        </p>
                        <h2 class="text-white lh-sm fs-3tx fw-bolder fs-md-2tx mb-2 me-xl-20 pe-xxl-20">
                            Yuszak M. Yahya
                        </h2>
                        <p class="text-white fs-4 mb-5 fw-semibold">
                            Praktisi Bisnis & Financial Expert
                        </p>
                        <div class="d-flex flex-column gap-2 text-start mb-8 mb-md-0">
                            <div class="d-flex align-items-start gap-3">
                                <i class="fs-4 mt-1 text-white ri-verified-badge-line"></i>
                                <p class="text-white fs-5 mb-0 opacity-75">
                                    CEO and founder of Serasa Food
                                </p>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <i class="fs-4 mt-1 text-white ri-verified-badge-line"></i>
                                <p class="text-white fs-5 mb-0 opacity-75">
                                    Co Founder Smart Business Map
                                </p>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <i class="fs-4 mt-1 text-white ri-verified-badge-line"></i>
                                <p class="text-white fs-5 mb-0 opacity-75">
                                    Founder Smart Financial Map
                                </p>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <i class="fs-4 mt-1 text-white ri-verified-badge-line"></i>
                                <p class="text-white fs-5 mb-0 opacity-75">
                                    Business Advisor in several companies
                                </p>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <i class="fs-4 mt-1 text-white ri-verified-badge-line"></i>
                                <p class="text-white fs-5 mb-0 opacity-75">
                                    International Certified Financial Modeler and valuation analyst
                                </p>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <i class="fs-4 mt-1 text-white ri-verified-badge-line"></i>
                                <p class="text-white fs-5 mb-0 opacity-75">
                                    Financial Expert at Foodizz & Biznis.id
                                </p>
                            </div>
                        </div>
                    </div>
                    <img class="img-impact position-md-absolute h-auto w-100 mw-325px mw-350px bottom-0"
                        src="/assets/media/illustrations/pemateri.png" alt="Pemateri Smart Financial Map" />
                </div>
            </section>

            <section id="usps" class="pt-20">
                <div class="container pt-20 d-flex flex-column justify-content-center align-items-center text-center">
                    <p class="fw-semibold text-gray-500 fs-4 text-uppercase mb-4" style="letter-spacing: 0.08em;">
                        Bukan Sekadar Workshop
                    </p>
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-10 mb-lg-12">
                        Kunci Bisnis Lebih Kuat  🚀
                    </h1>
                    <div class="row g-6 g-lg-8 justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="d-flex flex-column h-100">
                                <img class="w-100 rounded-4 mb-5"
                                    src="/assets/media/illustrations/key-1.png" alt="" />
                                <h4 class="fs-2 fw-bolder mb-2 lh-base">PRAKTISI BISNIS</h4>
                                <p class="text-gray-600 fs-5 mb-0">
                                    Pembicara adalah seorang pakar keuangan dan juga praktisi bisnis. jadi mengetahui bagaimana menerapkan ilmu keuangan dibisnis
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="d-flex flex-column h-100">
                                <img class="w-100 rounded-4 mb-5"
                                    src="/assets/media/illustrations/key-2.png" alt="" />
                                <h4 class="fs-2 fw-bolder mb-2 lh-base">MUDAH DIPAHAMI</h4>
                                <p class="text-gray-600 fs-5 mb-0">
                                    Materi akan dibawakan dengan bahasa yang sederhana dan banyak contoh kasus. sehingga peserta dengan mudah menerima
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="d-flex flex-column h-100">
                                <img class="w-100 rounded-4 mb-5"
                                    src="/assets/media/illustrations/key-3.png" alt="" />
                                <h4 class="fs-2 fw-bolder mb-2 lh-base">GROUP NETWORKING</h4>
                                <p class="text-gray-600 fs-5 mb-0">
                                    Setelah ikut workshop SFM , Anda dapat bergabung dan networking bersama sesama alumni SFM
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="d-flex flex-column h-100">
                                <img class="w-100 rounded-4 mb-5"
                                    src="/assets/media/illustrations/key-4.png" alt="" />
                                <h4 class="fs-2 fw-bolder mb-2 lh-base">PROVEN!</h4>
                                <p class="text-gray-600 fs-5 mb-0">
                                    Workshop Smart Financial Map diikuti oleh ratusan pemilik bisnis dan pengelola bisnis. Bisnis mereka mulai tertata rapi sejak mengikuti workshop ini.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="d-flex flex-column h-100">
                                <img class="w-100 rounded-4 mb-5"
                                    src="/assets/media/illustrations/key-5.png" alt="" />
                                <h4 class="fs-2 fw-bolder mb-2 lh-base">100% MONEY BACK GUARANTEE</h4>
                                <p class="text-gray-600 fs-5 mb-0">
                                    Jika setelah workshop Anda kecewa dan tidak mendapatkan manfaat apapun, 100% uang dikembalikan, tanpa rumit
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="statement" class="container mt-20 pt-20">
                <div class="bg-gradient-myprimary rounded-4 p-10 p-md-12 p-lg-14">
                    <p class="text-white fs-4 text-uppercase mb-6 mb-md-8"
                        style="letter-spacing: 0.08em;">
                        Basic hingga advance 🌟🌟🌟
                    </p>
                    <h3 class="fw-bolder text-white opacity-100 lh-base fs-2tx fs-md-2x mb-0">
                        <span class="fw-normal opacity-75">Sebagai</span> praktisi bisnis
                        <span class="fw-normal opacity-75">dan</span> financial expert.
                        <span class="fw-normal opacity-75">Narasumber tidak hanya mengajarkan</span> teori keuangan,
                        <span class="fw-normal opacity-75">tetapi bagaimana</span> implementasi
                        <span class="fw-normal opacity-75">ke</span> bisnis
                        <span class="fw-normal opacity-75">dengan</span> bahasa
                        <span class="fw-normal opacity-75">yang</span> mudah dimengerti
                        <span class="fw-normal opacity-75">dan banyak</span> contoh kasus
                    </h3>
                </div>
            </section>

            <section id="facilities" class="pt-20">
                <div class="container pt-20 d-flex flex-column justify-content-center align-items-center text-center">
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-3">
                        Fasilitas yang Didapatkan
                    </h1>
                    <p class="fw-semibold text-gray-600 fs-2 mb-10 mb-lg-12 mx-md-20 mx-lg-0">
                        Kami siapkan semua agar pengalaman belajar Anda 
                        <span class="fw-bolder text-mydanger">nyaman</span>, 
                        <span class="fw-bolder text-mydanger">efektif</span> dan 
                        <span class="fw-bolder text-mydanger">bermakna</span>. 
                    </p>
                    <div class="row g-4 g-md-6 justify-content-center">
                        <div class="col-6 col-md-4">
                            <div class="card h-100 p-8 p-lg-10 px-xxl-16 align-items-center text-center rounded-4 border border-gray-300 shadow-none">
                                <i class="ri-git-repository-fill text-myprimary fs-3x bg-mysecondary rounded-pill p-6 mb-6"></i>
                                <p class="text-dark fw-bold fs-5 fs-md-4 fs-xl-3 mb-0">
                                    Print Out Modul Materi Workshop
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="card h-100 p-8 p-lg-10 px-xxl-16 align-items-center text-center rounded-4 border border-gray-300 shadow-none">
                                <i class="ri-team-fill text-myprimary fs-3x bg-mysecondary rounded-pill p-6 mb-6"></i>
                                <p class="text-dark fw-bold fs-5 fs-md-4 fs-xl-3 mb-0">
                                    Free Akses ke Grup Networking
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="card h-100 p-8 p-lg-10 px-xxl-16 align-items-center text-center rounded-4 border border-gray-300 shadow-none">
                                <i class="ri-bar-chart-box-ai-fill text-myprimary fs-3x bg-mysecondary rounded-pill p-6 mb-6"></i>
                                <p class="text-dark fw-bold fs-5 fs-md-4 fs-xl-3 mb-0">
                                    Tools Dashboard Keuangan & Financial Projection
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="card h-100 p-8 p-lg-10 px-xxl-16 align-items-center text-center rounded-4 border border-gray-300 shadow-none">
                                <i class="ri-shirt-fill text-myprimary fs-3x bg-mysecondary rounded-pill p-6 mb-6"></i>
                                <p class="text-dark fw-bold fs-5 fs-md-4 fs-xl-3 mb-0">
                                    Jaket SFM Akan Dapatkan di Venue
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="card h-100 p-8 p-lg-10 px-xxl-16 align-items-center text-center rounded-4 border border-gray-300 shadow-none">
                                <i class="ri-service-fill text-myprimary fs-3x bg-mysecondary rounded-pill p-6 mb-6"></i>
                                <p class="text-dark fw-bold fs-5 fs-md-4 fs-xl-3 mb-0">
                                    Free Konsultasi dengan Team Ilmu Keuangan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="galleries" class="pt-20">
                <div class="container pt-20 d-flex flex-column justify-content-center align-items-center text-center">
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-3">
                        Jejak Perjalanan SFM  📸
                    </h1>
                    <p class="fw-semibold text-gray-600 fs-2 mb-10 mb-lg-12 mx-md-20 mx-lg-0">
                        Cuplikan momen
                        <span class="fw-bolder text-mydanger">batch sebelumnya</span> dalam 
                        <span class="fw-bolder text-mydanger">transformasi finansial</span> mereka. 
                    </p>
                    <div class="row g-3 g-md-5">
                        <div v-for="(img, index) in lightboxSourcesGallery" :key="index" 
                            class="col-6 col-md-4 col-lg-3 cursor-pointer" @click="openLightboxGallery(index)">
                            <img class="w-100 rounded-4 img-gallery" :src="img" alt="" />
                        </div>
                    </div>
                    <FsLightbox :toggler="lightboxTogglerGallery" :slide="currentIndexGallery" :sources="lightboxSourcesGallery" />
                </div>
            </section>

            <section id="testimonials" class="pt-20">
                <div class="container pt-20 d-flex flex-column justify-content-center align-items-center text-center">
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-10 mb-lg-12 ">
                        Apa Kata Mereka?  💬
                    </h1>
                    <div class="container px-0 px-md-12 w-lg-800px w-xl-1000px position-relative">
                        <swiper
                            :loop="true"
                            :slides-per-view="1"    
                            :space-between="20"
                            :navigation="{ prevEl: '.my-prev', nextEl: '.my-next' }"
                            :autoplay="{
                                delay: 5000,
                                disableOnInteraction: false,
                            }"
                            :modules="modules">
                            <swiper-slide v-for="(item, index) in testimonials" :key="index">
                                <div class="d-flex flex-column flex-md-row gap-10 gap-md-12 align-items-center align-items-md-start px-0 px-md-6">
                                    <div class="position-relative d-inline-block cursor-pointer"
                                        @click="openLightboxTesti(index)">
                                        <img class="w-175px bg-white p-3 rounded border border-gray-300"
                                            :src="item.image" alt="Foto Testimoni" style="transform: rotate(2.5deg);">
                                        <img class="w-50px position-absolute top-50 start-50 translate-middle"
                                            src="/assets/media/elements/icon_play.png" alt="play">
                                    </div>
                                    <div class="d-flex flex-column gap-5 w-100">
                                        <p class="order-2 order-md-1 text-dark text-center text-md-start fw-medium fs-3">
                                            {{ item.text }}
                                        </p>
                                        <div class="order-1 order-md-2 d-flex flex-column flex-center flex-md-start">
                                            <h4 class="text-dark text-start lh-sm fs-2qx fs-md-2 mb-2">{{ item.name }}</h4>
                                            <p class="text-gray-600 text-start fs-4 mb-0">{{ item.business }}</p>
                                        </div>
                                    </div>
                                </div>
                            </swiper-slide>
                        </swiper>
                        <button class="my-prev btn btn-icon btn-sm btn-mysecondary rounded-pill position-absolute top-50 translate-middle-y z-3">
                            <i class="ri-arrow-left-s-line fs-1"></i>
                        </button>
                        <button class="my-next btn btn-icon btn-sm btn-mysecondary rounded-pill position-absolute top-50 translate-middle-y z-3">
                            <i class="ri-arrow-right-s-line fs-1"></i>
                        </button>
                        <FsLightbox :toggler="lightboxTogglerTesti" :slide="currentIndexTesti" :sources="testimonials.map(t => t.youtube)" />
                    </div>  
                </div>
            </section>

            <section id="register" class="py-20">
                <div class="container py-20 d-flex flex-column justify-content-center align-items-center text-center">
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-4 mb-md-2">
                        Anda Cukup <br> Membayar <span class="text-gray-500"><del>Rp7.5jt</del></span> 
                    </h1>
                    <div class="d-flex gap-2 mb-5">
                        <h1 class="fw-boldest text-myprimary lh-base fs-3tx my-1 my-md-5">
                            Rp
                        </h1>
                        <h1 class="donate-number fw-boldest text-myprimary mb-0" data-kt-countup="true"
                            data-kt-countup-duration="5" data-kt-countup-value="6500000" data-kt-countup-separator=".">
                            0
                        </h1>
                    </div>
                    <p class="fw-semibold text-gray-600 w-100 mw-800px fs-2 mb-10 mx-md-20 mx-lg-0">
                        Workshop
                        <span class="fw-bolder text-myprimary">Smart Financial Map</span> Mempelajari 
                        <span class="fw-bolder text-myprimary">Basic</span>, 
                        <span class="fw-bolder text-myprimary">Intermediate</span>, Hingga
                        <span class="fw-bolder text-myprimary">Advance</span> Business FInance.
                    </p>
                    <button data-bs-toggle="modal" data-bs-target="#kt_modal_register"  
                        @click="() => { resetForm(); }"
                        class="btn btn-sm btn-myprimary rounded-pill fs-5 d-inline-flex align-items-center gap-1 text-nowrap">
                        <i class="ri-user-add-fill fs-2"></i>
                        Daftar Sekarang
                    </button>
                    <div class="modal fade" id="kt_modal_register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered justify-content-center">
                            <div class="modal-content rounded-4 mw-700px w-md-800px">
                                <div class="modal-header ps-6 pe-3 border-bottom border-gray-300 h-60px h-lg-70px">
                                    <h2 class="modal-title text-start">
                                        Smart Financial Map Workshop
                                    </h2>
                                    <div id="close-modal" 
                                        class="btn btn-sm btn-icon btn-mylighten rounded-pill" data-bs-dismiss="modal">
                                        <i class="bi bi-x-lg fs-3"></i>
                                    </div>
                                </div>
                                <div class="modal-body p-0 align-items-start text-start">
                                    <form @submit.prevent="submit">
                                        <p class="fs-5 px-6 py-4 mb-0 bg-gray-200 text-gray-700 fw-bold">Informasi Pribadi</p>
                                        <div class="p-6">
                                            <div class="mb-5 fv-row">
                                                <label class="required form-label fs-6">Nama Lengkap</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="ri-user-fill fs-3"></i>
                                                    </span>
                                                    <input type="text" class="form-control fs-5" placeholder="Masukkan nama lengkap disini..."
                                                        required v-model="form.name" :class="{ 'is-invalid': errors.name }"/>
                                                    <div v-if="errors.name" class="text-mydanger mt-2">
                                                        {{ errors . name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-5 fv-row">
                                                <label class="required form-label fs-6">Alamat Email</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="ri-mail-fill fs-3"></i>
                                                    </span>
                                                    <input type="email" class="form-control fs-5" placeholder="Masukkan alamat email disini..."
                                                        required v-model="form.email" :class="{ 'is-invalid': errors.email }"/>
                                                    <div v-if="errors.email" class="text-mydanger mt-2">
                                                        {{ errors . email }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-5 fv-row">
                                                <label class="required form-label fs-6">No. WhatsApp</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="ri-whatsapp-fill fs-3"></i>
                                                    </span>
                                                    <input type="number" class="form-control fs-5" placeholder="Masukkan no. whatsapp disini..."
                                                        required v-model="form.whatsapp" :class="{ 'is-invalid': errors.whatsapp }"/>
                                                    <div v-if="errors.whatsapp" class="text-mydanger mt-2">
                                                        {{ errors . whatsapp }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-5">
                                                <div class="col-7 fv-row">
                                                    <label class="required form-label fs-6">Asal Kab/Kota</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon2">
                                                            <i class="ri-global-fill fs-3"></i>
                                                        </span>
                                                        <input type="text" class="form-control fs-5" placeholder="Masukkan asal kab/kota disini..."
                                                            required v-model="form.city" :class="{ 'is-invalid': errors.city }" />
                                                        <div v-if="errors.city" class="text-mydanger mt-2">
                                                            {{ errors . city }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-5 fv-row">
                                                    <label class="required form-label fs-6">Ukuran Jaket</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon2">
                                                            <i class="ri-shirt-fill fs-3"></i>
                                                        </span>
                                                        <select class="form-select fs-5" required
                                                            v-model="form.size" 
                                                            :class="[
                                                                { 'is-invalid': errors.size },
                                                                !form.size ? 'text-gray-400' : 'text-dark'
                                                            ]">
                                                            <option disabled value="">Pilih ukuran disini...</option>
                                                            <option class="text-dark" value="M">M</option>
                                                            <option class="text-dark" value="L">L</option>
                                                            <option class="text-dark" value="XL">XL</option>
                                                            <option class="text-dark" value="XXL">XXL</option>
                                                            <option class="text-dark" value="XXXL">XXXL</option>
                                                        </select>
                                                        <div v-if="errors.size" class="text-mydanger mt-2">
                                                            {{ errors . size }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="fs-5 px-6 py-4 mb-0 bg-gray-200 text-gray-700 fw-bold">Informasi Usaha</p>
                                        <div class="p-6">
                                            <div class="mb-5 fv-row">
                                                <label class="required form-label fs-6">Nama Usaha/Brand</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="ri-store-2-fill fs-3"></i>
                                                    </span>
                                                    <input type="text" class="form-control fs-5" placeholder="Masukkan nama lengkap disini..."
                                                        required v-model="form.business_name" :class="{ 'is-invalid': errors.business_name }" />
                                                    <div v-if="errors.business_name" class="text-mydanger mt-2">
                                                        {{ errors . business_name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-5">
                                                <div class="col-lg-6 fv-row">
                                                    <label class="required form-label fs-6">Bidang Usaha</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon2">
                                                            <i class="ri-suitcase-fill fs-3"></i>
                                                        </span>
                                                        <!-- <select class="form-select fs-5" required>
                                                            <option value="Lorem">Lorem</option>
                                                        </select> -->
                                                        <input type="text" class="form-control fs-5" placeholder="Masukkan bidang usaha disini..."
                                                            required v-model="form.business_field" :class="{ 'is-invalid': errors.business_field }"/>
                                                        <div v-if="errors.business_field" class="text-mydanger mt-2">
                                                            {{ errors . business_field }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 fv-row">
                                                    <label class="required form-label fs-6">Jabatan</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon2">
                                                            <i class="ri-user-settings-fill fs-3"></i>
                                                        </span>
                                                        <input type="text" class="form-control fs-5" placeholder="Masukkan jabatan disini..."
                                                            required v-model="form.position" :class="{ 'is-invalid': errors.position }"/>
                                                        <div v-if="errors.position" class="text-mydanger mt-2">
                                                            {{ errors . position }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="fs-5 px-6 py-4 mb-0 bg-gray-200 text-gray-700 fw-bold">Informasi Lainnya</p>
                                        <div class="p-6">
                                            <div class="mb-5 fv-row">
                                                <label class="required form-label fs-6">Masalah Keuangan Bisnis</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="ri-mail-fill fs-3"></i>
                                                    </span>
                                                    <textarea class="form-control fs-5" data-kt-autosize="true" rows="2"
                                                        required v-model="form.problem" :class="{ 'is-invalid': errors.problem }"
                                                        placeholder="Masukkan masalah yang dialami seputar keuangan bisnis disini...">
                                                    </textarea>
                                                    <div v-if="errors.problem" class="text-mydanger mt-2">
                                                        {{ errors . problem }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-5 fv-row">
                                                <label class="required form-label fs-6">Harapan Setelah Workshop</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="ri-mail-fill fs-3"></i>
                                                    </span>
                                                    <textarea class="form-control fs-5" data-kt-autosize="true" rows="2"
                                                        required v-model="form.hope" :class="{ 'is-invalid': errors.hope }" 
                                                        placeholder="Masukkan harapan setelah mengikuti workshop SFM disini...">
                                                    </textarea>
                                                    <div v-if="errors.hope" class="text-mydanger mt-2">
                                                        {{ errors . hope }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-5 fv-row">
                                                <label class="required form-label fs-6">Darimana Mendapatkan Informasi Ini?</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="ri-suitcase-fill fs-3"></i>
                                                    </span>
                                                    <select class="form-select fs-5" required
                                                        v-model="form.from"
                                                        :class="[
                                                            { 'is-invalid': errors.from },
                                                            !form.from ? 'text-gray-400' : 'text-dark'
                                                        ]">
                                                        <option disabled value="">Pilih sumber disini...</option>
                                                        <option class="text-dark" value="Instagram @ilmukeuangan">Instagram @ilmukeuangan</option>
                                                        <option class="text-dark" value="Instagram Coach @yuszakmyahya">Instagram Coach @yuszakmyahya</option>
                                                        <option class="text-dark" value="Kelas CFO / BFM / Alumni">Kelas CFO / BFM / Alumni</option>
                                                        <option class="text-dark" value="Youtube @ilmukeuangan">Youtube @ilmukeuangan</option>
                                                        <option class="text-dark" value="Youtube @kasisolusi">Youtube @kasisolusi</option>
                                                        <option class="text-dark" value="Teman / Relasi / Client">Teman / Relasi / Client</option>
                                                    </select>
                                                    <div v-if="errors.from" class="text-mydanger mt-2">
                                                        {{ errors . from }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fv-row">
                                                <label class="required form-label fs-6">Bukti Transfer</label>
                                                <div id="proof-dropzone" class="dropzone border-dashed border-myprimary rounded p-5 text-center">
                                                    <div class="dz-message needsclick flex-column text-center gap-5 p-5">
                                                        <i class="ri-image-add-line text-myprimary fs-3x"></i>
                                                        <div>
                                                            <h3 class="fs-5 fw-bold text-gray-900 mb-2">Jatuhkan file di sini / klik untuk mengunggah.</h3>
                                                            <span class="fs-7 fw-semibold text-gray-400">Maksimal 10 MB</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div v-if="errors.image" class="text-mydanger mt-2">
                                                    {{ errors . image }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end p-6 border-top border-gray-300">
                                            <button type="reset" class="btn btn-sm btn-mylight fs-5 me-3"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" id="submit_button"
                                                class="btn btn-sm btn-myprimary fs-5">
                                                <span class="indicator-label">
                                                    Daftar Smart Financial Map
                                                </span>
                                                <span class="indicator-progress">
                                                    Mohon Tunggu... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                    </form>
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
    import Dropzone from 'dropzone';
    import Swal from 'sweetalert2';
    import FsLightbox from "fslightbox-vue";
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import 'swiper/css';
    import 'swiper/css/pagination';
    import 'swiper/css/navigation';
    import { Autoplay, Pagination, Navigation } from 'swiper/modules';

    export default {
        components: {
            Head,
            Link,
            FsLightbox,
            Swiper,
            SwiperSlide,
        },

        props: {
            errors: Object,
        },

        setup() {
            const form = reactive({
                name: '',
                email: '',
                whatsapp: '',
                city: '',
                size: '',
                business_name: '',
                business_field: '',
                position: '',
                problem: '',
                hope: '',
                from: '',
                image: null,
            });

            onMounted(() => {
                const link = document.querySelector("link[rel~='icon']")
                if (link) {
                    link.href = "https://static.wixstatic.com/media/abd792_d2396960b539400081a5ba95b65f311a~mv2.png/v1/fill/w_500,h_500,al_c/abd792_d2396960b539400081a5ba95b65f311a~mv2.png"
                } else {
                    const newLink = document.createElement("link")
                    newLink.rel = "icon"
                    newLink.href = "https://static.wixstatic.com/media/abd792_d2396960b539400081a5ba95b65f311a~mv2.png/v1/fill/w_500,h_500,al_c/abd792_d2396960b539400081a5ba95b65f311a~mv2.png"
                    document.head.appendChild(newLink)
                }

                const dz = new Dropzone('#proof-dropzone', {
                    url: '/', 
                    paramName: 'image',
                    maxFiles: 1,
                    maxFilesize: 10,
                    acceptedFiles: 'image/jpeg,image/png',
                    autoProcessQueue: false,
                    addRemoveLinks: true,
                    dictRemoveFile: 'Hapus',
                    init: function () {
                        this.on('addedfile', function (file) {
                            form.image = file;
                        });
                        this.on('removedfile', function () {
                            form.image = null;
                        });
                    },
                });
            });

            const lightboxTogglerGallery = ref(false)
            const currentIndexGallery = ref(0)
            const lightboxSourcesGallery = [
                '/assets/media/illustrations/doc-1.jpg',
                '/assets/media/illustrations/doc-2.jpg',
                '/assets/media/illustrations/doc-3.jpg',
                '/assets/media/illustrations/doc-4.jpg',
                '/assets/media/illustrations/doc-5.jpg',
                '/assets/media/illustrations/doc-6.jpg',
                '/assets/media/illustrations/doc-7.jpg',
                '/assets/media/illustrations/doc-8.jpg',
                '/assets/media/illustrations/doc-9.jpg',
                '/assets/media/illustrations/doc-10.jpg',
                '/assets/media/illustrations/doc-11.jpg',
                '/assets/media/illustrations/doc-12.jpg',
                '/assets/media/illustrations/doc-13.jpg',
                '/assets/media/illustrations/doc-14.jpg',
                '/assets/media/illustrations/doc-15.jpg',
                '/assets/media/illustrations/doc-16.jpg'
            ]

            const lightboxTogglerTesti = ref(false)
            const currentIndexTesti = ref(0)
            const testimonials = [
                {
                    image: '/assets/media/illustrations/testi-1.png',
                    name: 'Aditya',
                    business: 'Media & Marketing, Jakarta',
                    youtube: 'https://www.youtube.com/watch?v=c6CYblRSVEU',
                    text: 'Bisnis saya bergerak di bidang media dan marketing. Menurut saya, pembahasannya jujur, realistis, dan membantu saya dalam menentukan arah atau keputusan-keputusan strategis di bisnis saya. Kalau teman-teman suka pembelajaran tentang bisnis, strategic partnership, atau investasi keuangan, saya rasa menarik untuk mengikuti Smart Financial Map, karena bagi saya itu sangat membantu.'
                },
                {
                    image: '/assets/media/illustrations/testi-1.png',
                    name: 'Aditya',
                    business: 'Media & Marketing, Jakarta',
                    youtube: 'https://www.youtube.com/watch?v=c6CYblRSVEU',
                    text: 'Bisnis saya bergerak di bidang media dan marketing. Menurut saya, pembahasannya jujur, realistis, dan membantu saya dalam menentukan arah atau keputusan-keputusan strategis di bisnis saya. Kalau teman-teman suka pembelajaran tentang bisnis, strategic partnership, atau investasi keuangan, saya rasa menarik untuk mengikuti Smart Financial Map, karena bagi saya itu sangat membantu.'
                },
                {
                    image: '/assets/media/illustrations/testi-1.png',
                    name: 'Aditya',
                    business: 'Media & Marketing, Jakarta',
                    youtube: 'https://www.youtube.com/watch?v=c6CYblRSVEU',
                    text: 'Bisnis saya bergerak di bidang media dan marketing. Menurut saya, pembahasannya jujur, realistis, dan membantu saya dalam menentukan arah atau keputusan-keputusan strategis di bisnis saya. Kalau teman-teman suka pembelajaran tentang bisnis, strategic partnership, atau investasi keuangan, saya rasa menarik untuk mengikuti Smart Financial Map, karena bagi saya itu sangat membantu.'
                },
                {
                    image: '/assets/media/illustrations/testi-1.png',
                    name: 'Aditya',
                    business: 'Media & Marketing, Jakarta',
                    youtube: 'https://www.youtube.com/watch?v=c6CYblRSVEU',
                    text: 'Bisnis saya bergerak di bidang media dan marketing. Menurut saya, pembahasannya jujur, realistis, dan membantu saya dalam menentukan arah atau keputusan-keputusan strategis di bisnis saya. Kalau teman-teman suka pembelajaran tentang bisnis, strategic partnership, atau investasi keuangan, saya rasa menarik untuk mengikuti Smart Financial Map, karena bagi saya itu sangat membantu.'
                },
                {
                    image: '/assets/media/illustrations/testi-1.png',
                    name: 'Aditya',
                    business: 'Media & Marketing, Jakarta',
                    youtube: 'https://www.youtube.com/watch?v=c6CYblRSVEU',
                    text: 'Bisnis saya bergerak di bidang media dan marketing. Menurut saya, pembahasannya jujur, realistis, dan membantu saya dalam menentukan arah atau keputusan-keputusan strategis di bisnis saya. Kalau teman-teman suka pembelajaran tentang bisnis, strategic partnership, atau investasi keuangan, saya rasa menarik untuk mengikuti Smart Financial Map, karena bagi saya itu sangat membantu.'
                },
            ]

            const openLightboxGallery = (index) => {
                currentIndexGallery.value = index + 1 
                lightboxTogglerGallery.value = !lightboxTogglerGallery.value
            }

            const openLightboxTesti = (index) => {
                currentIndexTesti.value = index + 1 
                lightboxTogglerTesti.value = !lightboxTogglerTesti.value
            }

            const resetForm = () => {
                form.name = '';
                form.email = '';
                form.whatsapp = '';
                form.city = '';
                form.size = '';
                form.business_name = '';
                form.business_field = '';
                form.position = '';
                form.problem = '';
                form.hope = '';
                form.from = '';
                form.image = null;

                if (dropzoneRef.value) {
                    dropzoneRef.value.removeAllFiles(true);
                }
            };

            const submit = () => {
                const submitBtn = document.querySelector('#submit_button');
                if (submitBtn) {
                    submitBtn.setAttribute('data-kt-indicator', 'on');
                    submitBtn.setAttribute('disabled', true);
                }

                const payload = new FormData();
                payload.append('name', form.name);
                payload.append('email', form.email);
                payload.append('whatsapp', form.whatsapp);
                payload.append('city', form.city);
                payload.append('size', form.size);
                payload.append('business_name', form.business_name);
                payload.append('business_field', form.business_field);
                payload.append('position', form.position);
                payload.append('problem', form.problem);
                payload.append('hope', form.hope);
                payload.append('from', form.from);
                if (form.image && (form.image instanceof File || form.image instanceof Blob)) {
                    payload.append('image', form.image);
                }

                const cleanup = () => {
                    if (submitBtn) {
                        submitBtn.removeAttribute('data-kt-indicator');
                        submitBtn.removeAttribute('disabled');
                    }
                };

                router.post('/ilmu-keuangan', payload, {
                    onSuccess: () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pendaftaran Berhasil!',
                            text: 'Terima kasih telah mendaftar di Smart Financial Map Workshop Batch #33. Tim kami akan segera menghubungi Anda untuk informasi selanjutnya.',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            customClass: {
                                popup: 'swal-custom-icon',
                            }
                        }).then(() => {
                            window.location.reload();
                        });
                        const modalCloseBtn = document.querySelector('#close-modal');
                        if (modalCloseBtn) modalCloseBtn.click();
                        resetForm();
                    },
                    onFinish: cleanup
                });
            }

            return {
                modules: [Autoplay, Pagination, Navigation],
                lightboxTogglerGallery,
                currentIndexGallery,
                lightboxSourcesGallery,
                lightboxTogglerTesti,
                currentIndexTesti,
                testimonials,
                openLightboxGallery,
                openLightboxTesti,
                form,
                submit,
                resetForm
            }
        }
    };
</script>

<style scoped>
    .bg-landing-sfm {
        background-image: url('assets/media/illustrations/landing-sfm.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .my-prev { left: 2.5%; top: 18% !important; }
    .my-next { right: 2.5%; top: 18% !important; }

    .img-gallery {
        transition: transform 0.3s ease;
    }

    .img-gallery:hover {
        transform: scale(1.025);
    }

    @media (max-width: 768px) {
        .bg-landing-sfm {
            background-position: right center;
        }
    }

    @media (min-width: 768px) {
        .img-impact {
            left: 1.75rem;
        }

        .my-prev { left: 0; top: 100px !important; }
        .my-next { right: 0; top: 100px !important; }
    }

    @media (min-width: 992px) {
        .w-impact {
            width: 45% !important;
        }

        .img-impact {
            left: 2.5rem;
        }

        .my-prev { left: -24px; }
        .my-next { right: -24px; }
    }

    @media (min-width: 1200px) {
        .img-impact {
            left: 7rem;
            max-width: 336px !important;
        }
    }

    @media (min-width: 1400px) {
        .img-impact {
            left: 14rem;
        }
    }

</style>
