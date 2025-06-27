<template>
    <Head>
        <title>GLP INDTIM</title>
    </Head>

    <main id="kt_body" class="bg-light position-relative app-blank" data-kt-name="metronic" data-bs-spy="scroll"
        data-bs-target="#kt_landing_menu">
        <div class="d-flex flex-column flex-root" id="kt_app_root">

            <!-- Hero Section -->
            <section id="home" class="py-0">
                <div class="bgi-no-repeat bgi-size-cover bgi-position-center bg-dark position-relative min-vh-100"
                    style="background-image: url(assets/media/illustrations/landing-hero.jpg);">
                    <div class="position-absolute top-0 start-0 end-0 z-index-2">
                        <Navbar />
                    </div>
                    <div
                        class="d-flex flex-column justify-content-center align-items-center min-vh-100 text-center px-5">
                        <p class="fw-semibold text-white fs-2 text-uppercase mb-4" style="letter-spacing: 0.08em;">
                            {{ profile.name }}
                        </p>
                        <h1 class="fw-bolder text-white lh-base fs-4x fs-md-4x mb-0">
                            <span class="d-none d-sm-inline">{{ profile.tagline }}</span>
                            <span class="d-inline d-sm-none" v-html="formatTagline(profile.tagline)"></span>
                        </h1>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section id="about" class="mt-20 py-20">
                <div class="container d-flex flex-column justify-content-center align-items-center text-center">
                    <p class="fw-semibold text-gray-500 fs-4 text-uppercase mb-4" style="letter-spacing: 0.08em;">
                        Tentang Kami
                    </p>
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-3">
                        {{ profile.name }}
                    </h1>
                    <p class="fw-semibold text-gray-600 fs-2 mb-0">
                        didirikan sebagai <span class="fw-bolder text-mydanger">wadah kolabrasi</span> 🤝 dan
                        <span class="fw-bolder text-mydanger">kontribusi nyata</span> 🚀 dari para lulusan program
                        kepemimpinan yang memiliki visi besar untuk
                        <span class="fw-bolder text-mydanger">membangun Indonesia dari wilayah timur</span>.
                    </p>

                    <!-- Statistics Section -->
                    <div class="row g-8 w-100 my-8 px-xl-20">
                        <div class="col-6 col-sm-3 d-flex flex-column justify-content-center">
                            <p class="fs-2 fw-bold text-dark mb-0 mb-md-n2">Berdiri Sejak</p>
                            <h1 class="fw-boldest text-myprimary lh-base fs-4x fs-md-4x mb-0" data-kt-countup="true"
                                data-kt-countup-duration="3" :data-kt-countup-value="profile.year" data-kt-countup-separator="">
                                0
                            </h1>
                        </div>
                        <div class="col-6 col-sm-3 d-flex flex-column justify-content-center">
                            <p class="fs-2 fw-bold text-dark mb-0 mb-md-n2">Anggota</p>
                            <h1 class="fw-boldest text-myprimary lh-base fs-4x fs-md-4x mb-0" data-kt-countup="true"
                                data-kt-countup-duration="3" :data-kt-countup-value="profile.members">
                                0
                            </h1>
                        </div>
                        <div class="col-6 col-sm-3 d-flex flex-column justify-content-center">
                            <p class="fs-2 fw-bold text-dark mb-0 mb-md-n2">Kegiatan Internal</p>
                            <h1 class="fw-boldest text-myprimary lh-base fs-4x fs-md-4x mb-0" data-kt-countup="true"
                                data-kt-countup-duration="3" :data-kt-countup-value="total_activities">
                                0
                            </h1>
                        </div>
                        <div class="col-6 col-sm-3 d-flex flex-column justify-content-center">
                            <p class="fs-2 fw-bold text-dark mb-0 mb-md-n2">Program Amal</p>
                            <h1 class="fw-boldest text-myprimary lh-base fs-4x fs-md-4x mb-0" data-kt-countup="true"
                                data-kt-countup-duration="3" :data-kt-countup-value="total_programs">
                                0
                            </h1>
                        </div>
                    </div>

                    <!-- Mission Statement Section -->
                    <div class="d-flex flex-column flex-lg-row gap-5 gap-lg-10 mt-2">
                        <p class="fw-semibold text-gray-600 text-center text-lg-end fs-4 mb-0 flex-grow-1"
                            style="line-height: 1.75">
                            Yayasan ini lahir dari semangat dan keyakinan bahwa perubahan positif dimulai dari pemimpin
                            yang hadir, peduli, dan bertindak. Kami percaya bahwa potensi Indonesia Timur sangat besar
                            dan perlu terus didorong melalui pendekatan yang berkelanjutan dan berdampak. Karena itu,
                            kami berfokus pada tiga pilar utama:
                        </p>
                        <div
                            class="d-inline-flex flex-column flex-md-row flex-lg-column gap-1 gap-md-6 gap-lg-1 align-self-center align-self-lg-start text-center text-lg-start text-nowrap">
                            <p class="fw-bold fs-2 mb-0 text-dark">
                                <span class="fw-bolder text-mydanger d-inline-block w-lg-40px text-end me-3">01.</span>
                                Kegiatan Sosial
                            </p>
                            <p class="fw-bold fs-2 mb-0 text-dark">
                                <span class="fw-bolder text-mydanger d-inline-block w-lg-40px text-end me-3">02.</span>
                                Keagamaan
                            </p>
                            <p class="fw-bold fs-2 mb-0 text-dark">
                                <span class="fw-bolder text-mydanger d-inline-block w-lg-40px text-end me-3">03.</span>
                                Pemberdayaan Masyarakat
                            </p>
                        </div>
                    </div>

                    <!-- Vision Statement Section -->
                    <div class="mt-10 p-14 bg-gradient-myprimary rounded-4">
                        <p class="custom-flex-text text-white opacity-60 fs-4 text-uppercase mb-4"
                            style="letter-spacing: 0.08em;">
                            Kami Berupaya Menciptakan Ruang-Ruang Perubahan, Memperkuat Kapasitas Lokal, Serta
                            Menumbuhkan Semangat Kepemimpinan yang Melayani
                        </p>
                        <h3 class="fw-bolder text-white opacity-100 lh-base fs-3x fs-md-2x mb-0">
                            Yayasan Pemimpin dari Timur <span class="fw-normal opacity-75">hadir bukan hanya sebagai
                                organisasi, tetapi sebagai</span> gerakan untuk menyalakan lilin harapan <span
                                class="fw-normal opacity-75">dan</span> mewujudkan masa depan <span
                                class="fw-normal opacity-75">yang lebih baik dari</span> timur Indonesia—untuk seluruh
                            Indonesia
                        </h3>
                    </div>
                </div>
            </section>

            <!-- Activities Section -->
            <section id="activities" class="py-20" v-if="activities.length > 0">
                <div class="container text-center">
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-3">
                        Bersama Menyatukan Langkah 🚀
                    </h1>
                    <p class="fw-semibold text-gray-600 fs-2 mb-10">
                        Tempat jiwa-jiwa <span class="fw-bolder text-mydanger">bertumbuh</span>,
                        <span class="fw-bolder text-mydanger">berbagi ilmu</span> dan
                        <span class="fw-bolder text-mydanger">semangat</span> dalam
                        <span class="fw-bolder text-mydanger">harmoni kebersamaan</span>.
                    </p>

                    <div class="activities-slider mb-10">
                        <div v-for="(activity, index) in activities" :key="index">
                            <Link :href="`/activities/${activity.slug}`" class="d-flex flex-column gap-4 text-start m-5" id="activity-card">
                                <div class="ribbon ribbon-start ribbon-clip">
                                    <div class="ribbon-label fs-6">
                                        {{ activity.phase }}
                                        <span class="ribbon-inner"
                                            :class="{
                                                'bg-mywarning': activity.phase === 'Akan Datang',
                                                'bg-mysuccess': activity.phase === 'Dibuka',
                                                'bg-mydanger': activity.phase === 'Ditutup',
                                                'bg-myprimary': activity.phase === 'Terlaksana'
                                            }"
                                        ></span>
                                    </div>
                                    <div class="overflow-hidden position-relative rounded-4 mh-300px">
                                        <img :src="`/storage/${activity.image}`" class="img-fluid object-fit-cover mw-100"
                                            alt="Gambar Kegiatan Internal" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <p class="fw-bold text-dark fs-2 mb-2 text-truncate-2">{{ activity.title }}</p>
                                    <p class="text-gray-600 fs-4 mb-0 text-truncate-3">{{ stripTags(activity.content) }}</p>
                                </div>
                            </Link>
                        </div>
                    </div>
                    <Link href="/activities" class="btn-link-myprimary fw-bold fs-4">Lihat semua kegiatan internal <i
                        class="fw-normal ms-1 ri-arrow-right-s-line fs-3"></i></Link>
                </div>
            </section>

            <!-- Partners Section -->
            <section id="partners" class="py-20" v-if="partners.length > 0">
                <div class="container text-center">
                    <p class="fw-semibold text-gray-600 fs-2 mb-12">
                        Dipercaya oleh mereka yang menyebar <span class="fw-bolder text-mydanger">cahaya harapan
                            ✨</span>
                    </p>
                    <div class="partners-wrapper overflow-hidden position-relative w-100">
                        <div class="partners-content">
                            <a v-for="(partner, index) in partners" :key="index" :href="partner.link" target="_blank" rel="noopener">
                                <img class="me-12 h-50px" :src="`/storage/${partner.logo}`" :alt="partner.name" />
                            </a>
                            <a v-for="(partner, index) in partners" :key="index" :href="partner.link" target="_blank" rel="noopener">
                                <img class="me-12 h-50px" :src="`/storage/${partner.logo}`" :alt="partner.name" />
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Programs Section -->
            <section id="programs" class="py-20" v-if="programs.length > 0">
                <div class="container text-center">
                    <p class="fw-semibold text-myprimary fs-4 text-uppercase mb-3 px-4 py-1 d-inline-block rounded-pill bg-myprimary-light"
                        style="letter-spacing: 0.08em;">
                        #DariTimurBeriDampak
                    </p>
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-3">
                        Bersama Menebar Manfaat 🌟
                    </h1>
                    <p class="fw-semibold text-gray-600 fs-2 mb-10">
                        Program dan kegiatan yang <span class="fw-bolder text-mydanger">tumbuh dari hati</span>,
                        demi aksi nyata <span class="fw-bolder text-mydanger">penuh arti</span>.
                    </p>

                    <div class="programs-slider mb-10">
                        <div v-for="(program, index) in programs" :key="index">
                            <Link :href="`/programs/${program.slug}`" class="d-flex flex-column gap-4 text-start m-5" id="program-card">
                                <div class="ribbon ribbon-start ribbon-clip">
                                    <div class="ribbon-label fs-6">
                                        {{ program.phase }}
                                        <span class="ribbon-inner"
                                            :class="{
                                                'bg-mywarning': program.phase === 'Akan Datang',
                                                'bg-mysuccess': program.phase === 'Dibuka',
                                                'bg-mydanger': program.phase === 'Ditutup',
                                                'bg-myprimary': program.phase === 'Terlaksana'
                                            }"
                                        ></span>
                                    </div>
                                    <div class="overflow-hidden position-relative rounded-4 mh-300px">
                                        <img :src="`/storage/${program.image}`" class="img-fluid object-fit-cover mw-100"
                                            alt="Gambar Program Amal" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <p class="fw-bold text-dark fs-2 mb-2 text-truncate-2">{{ program.title }}</p>
                                    <p class="text-gray-600 fs-4 mb-0 text-truncate-3">{{ stripTags(program.content) }}</p>
                                </div>
                            </Link>
                        </div>
                    </div>
                    <Link href="/programs" class="btn-link-myprimary fw-bold fs-4">
                        Lihat semua program amal 
                        <i class="fw-normal ms-1 ri-arrow-right-s-line fs-3"></i></Link>
                </div>
            </section>

            <!-- Quote Section -->
            <section id="quote" class="py-20">
                <div class="container">
                    <div class="p-14 bg-gradient-myprimary rounded-4">
                        <p class="custom-flex-text text-white opacity-60 fs-4 text-uppercase mb-8"
                            style="letter-spacing: 0.08em;">
                            #PemimpinDariTimur
                        </p>
                        <h3 class="fw-bolder text-white opacity-100 lh-base fs-3x fs-md-2x mb-0">
                            Pemimpin sejati <span class="fw-normal opacity-75">adalah</span> cahaya
                            <span class="fw-normal opacity-75">yang tak hanya menuntun, tapi juga</span> tangan
                            <span class="fw-normal opacity-75">yang</span> merangkul,
                            <span class="fw-normal opacity-75">mengangkat</span> jiwa-jiwa
                            <span class="fw-normal opacity-75">bersama dalam</span> satu langkah 🤝
                        </h3>
                    </div>
                </div>
            </section>

            <!-- Blogs Section -->
            <section id="blogs" class="mb-20 py-20" v-if="blogs.length > 0">
                <div class="container">
                    <p class="fw-semibold text-myprimary fs-4 text-uppercase mb-3 px-4 py-1 d-inline-block rounded-pill bg-myprimary-light"
                        style="letter-spacing: 0.08em;">
                        #CeritaDariTimur
                    </p>
                    <h1 class="fw-bolder text-dark lh-base fs-3x fs-md-3x mb-3">
                        Catatan Kebaikan ✍️
                    </h1>
                    <p class="fw-semibold text-gray-600 fs-2 mb-15">
                        Kisah, refleksi, dan inspirasi dari perjalanan kami
                        <span class="fw-bolder text-mydanger">menebar kebaikan</span>.
                    </p>
                    <div class="d-flex flex-column gap-10 mb-15">
                        <div v-for="(blog, index) in blogs" :key="index">
                            <Link :href="`/blogs/${blog.slug}`" class="d-flex flex-row gap-5 gap-sm-6 gap-md-7 text-start" id="blog-card">
                                <div
                                    class="overflow-hidden position-relative rounded-4 w-125px w-md-200px order-3 order-md-0 flex-shrink-0">
                                    <img :src="`/storage/${blog.image}`"
                                        class="img-blog img-fluid object-fit-cover h-md-100 mt-9 mt-md-0" alt="" />
                                </div>
                                <div class="d-flex flex-column justify-content-between flex-grow-1">
                                    <div class="flex-grow-1">
                                        <p class="fw-bold text-myprimary fs-5 mb-1 text-uppercase"
                                            style="letter-spacing: 0.06em;">{{ blog.category }}</p>
                                        <p class="fw-bold text-dark fs-2 mb-2 text-truncate-2">{{ blog.title }}</p>
                                        <p class="text-gray-600 fs-4 mb-0 text-truncate-2">{{ stripTags(blog.content) }}</p>
                                    </div>
                                    <p class="fw-semibold text-gray-500 fs-6 mb-0 mt-8 text-uppercase"
                                        style="letter-spacing: 0.04em;">{{ formatDate(blog.created_at) }}</p>
                                </div>
                            </Link>
                        </div>
                    </div>
                    <div class="text-center">
                        <Link href="/blogs" class="btn-link-myprimary fw-bold fs-4">
                            Lihat semua blog 
                            <i class="fw-normal ms-1 ri-arrow-right-s-line fs-3"></i>
                        </Link>
                    </div>
                </div>
            </section>

            <!-- Testimonials Section -->
            <section id="testimonials" class="bg-myprimary py-0" v-if="testimonials.length > 0">
                <div class="container d-flex flex-row justify-content-center align-items-center ">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 mb-20 mb-md-0 mt-20 pt-20 mt-md-0 pt-md-0">
                            <h1 class="fw-bolder text-white lh-base fs-3x fs-md-3x mb-3 text-center text-md-start">
                                <span class="d-none d-md-inline">Jejak Kebaikan, <br>Suara dari Hati 🤍</span>
                                <span class="d-inline d-md-none">Jejak Kebaikan, Suara dari Hati 🤍</span>
                            </h1>
                            <p class="fw-medium text-white opacity-75 fs-2 mb-0 text-center text-md-start">
                                <span class="d-none d-md-inline">Dari tangan yang memberi <br>hingga yang
                                    menerima.</span>
                                <span class="d-inline d-md-none">Dari tangan yang memberi hingga yang menerima.</span>
                            </p>
                        </div>
                        <div class="testimonial-cards col-12 col-md-6 position-relative overflow-hidden h-700px">
                            <div class="testimonial-scroll d-flex flex-column gap-5 gap-lg-10">
                                <div class="d-flex flex-column gap-8 text-start bg-white p-10 rounded-4"
                                    v-for="(testimonial, index) in testimonials" :key="index">
                                    <img src="/assets/media/elements/quotation_marks.png" class="w-45px"
                                        alt="" />
                                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                                        <p class="text-dark fs-4 mb-0 fw-semibold">{{ testimonial.testimonial }}</p>
                                        <div class="d-flex flex-row gap-5 mt-5 align-items-center">
                                            <img :src="`/storage/${testimonial.photo}`"
                                                class="object-fit-cover w-50px h-50px rounded-pill" alt="" />
                                            <div>
                                                <p class="text-dark fs-4 fw-bolder mb-0">{{ testimonial.name }}</p>
                                                <p class="text-gray-600 fs-6 mb-0">{{ testimonial.title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-8 text-start bg-white p-10 rounded-4"
                                    v-for="(testimonial, index) in testimonials" :key="index">
                                    <img src="/assets/media/elements/quotation_marks.png" class="w-45px"
                                        alt="" />
                                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                                        <p class="text-dark fs-4 mb-0 fw-semibold">{{ testimonial.testimonial }}</p>
                                        <div class="d-flex flex-row gap-5 mt-5 align-items-center">
                                            <img :src="`/storage/${testimonial.photo}`"
                                                class="object-fit-cover w-50px h-50px rounded-pill" alt="" />
                                            <div>
                                                <p class="text-dark fs-4 fw-bolder mb-0">{{ testimonial.name }}</p>
                                                <p class="text-gray-600 fs-6 mb-0">{{ testimonial.title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Donate Section -->
            <section id="donate" class="mt-20 pt-20">
                <div class="container d-flex flex-column justify-content-center align-items-center text-center">
                    <h3 class="fw-bolder text-dark lh-base fs-3x fs-md-2x mb-3 mb-md-0">
                        <span class="d-none d-md-inline">Jadi Bagian dari Kebaikan 👋</span>
                        <span class="d-inline d-md-none">Jadi Bagian <br>dari Kebaikan 👋</span>
                    </h3>
                    <h1 class="donate-number fw-boldest text-myprimary mb-6 mb-md-2" data-kt-countup="true"
                        data-kt-countup-duration="3" data-kt-countup-value="100000" data-kt-countup-suffix="+">
                        0
                    </h1>
                    <p class="fw-semibold text-gray-600 fs-2 mb-0">
                        Orang telah berkontribusi dalam <span class="fw-bolder text-myprimary">aksi kebaikan</span> ini
                    </p>


                    <div class="position-relative d-flex justify-content-center mt-15">
                        <img src="/assets/media/elements/mockup-phone.png" class="w-75 w-sm-325px" alt="" />

                        <!-- Bank Account Card -->
                        <div
                            class="bank-card mt-10 p-10 bg-gradient-myprimary text-start w-100 w-sm-400px position-absolute z-index-1">
                            <div class="d-flex align-items-center gap-3 mb-10">
                                <h1 class="fw-bolder text-white lh-base fs-4x fs-md-3x mb-0">
                                    BSI
                                </h1>
                                <p class="custom-flex-text text-white opacity-75 fs-8 mt-1 text-uppercase mb-0"
                                    style="letter-spacing: 0.08em;">
                                    Bank Syariah <br>Indonesia
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <h3 id="bank-number"
                                    class="fw-bolder text-white opacity-100 lh-base fs-3x fs-md-2hx mb-0">
                                    9508335430
                                </h3>
                                <i id="copy-icon" class="ri-file-copy-2-line text-white fs-1 cursor-pointer"></i>
                            </div>
                            <p class="text-white opacity-75 fs-4 mb-0">
                                a.n Aldi Perdana Asri
                            </p>
                        </div>
                    </div>
                </div>
            </section>

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
    import { Head, Link } from '@inertiajs/vue3';
    import VanillaTilt from "vanilla-tilt";
    import { tns } from "tiny-slider";
    import Swal from 'sweetalert2';

    export default {
        components: {
            Head,
            Link,
            Navbar,
        },

        props: {
            profile: Object,
            total_activities: Number,
            activities: Array,
            total_programs: Number,
            programs: Array,
            blogs: Array,
            partners: Array,
            testimonials: Array,
        },

        mounted() {
            const elements = document.querySelectorAll('.bg-gradient-myprimary');
            VanillaTilt.init(elements, {
                max: 4,
                speed: 800,
                glare: true,
                "max-glare": 0.2,
            });

            this.initSlider('.activities-slider');
            this.initSlider('.programs-slider');

            document.getElementById('copy-icon').addEventListener('click', this.copyToClipboard);
        },

        methods: {
            formatTagline(text) {
                const parts = text.match(/[A-Z][a-z]+|#[A-Z][a-z]+/g);
                if (!parts || parts.length < 2) return text;

                const lastWord = parts.pop();
                return parts.join('') + '<br>' + lastWord;
            },

            initSlider(container) {
                const element = document.querySelector(container);
                if (!element) return;

                tns({
                    container: container,
                    items: 1,
                    mouseDrag: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    controls: false,
                    autoplayButtonOutput: false,
                    responsive: {
                        768: {
                            items: 2
                        },
                        1200: {
                            items: 3
                        }
                    }
                });
            },

            stripTags(html) {
                const div = document.createElement("div");
                div.innerHTML = html;
                return div.textContent || div.innerText || "";
            },

            formatDate(dateStr) {
                const date = new Date(dateStr);
                return new Intl.DateTimeFormat('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                }).format(date);
            },

            copyToClipboard() {
                const bankNumber = document.getElementById('bank-number').innerText;

                navigator.clipboard.writeText(bankNumber).then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Nomor rekening berhasil disalin!',
                        text: 'Setiap langkah kebaikan yang Anda berikan, menjadi bagian dari perjalanan bersama ✨',
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
        }
    };
</script>

<style scoped>

</style>
