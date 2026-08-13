<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="color-scheme" content="light only">
    <link rel="icon" href="{{ asset('assets/media/logos/glp-indtim-logo.png') }}" type="image/svg+xml" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pathway+Extreme:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4Z7R41WYPB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-4Z7R41WYPB');
    </script>

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PNRJRHSR');</script>
    <!-- End Google Tag Manager -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if(request()->is('hpi'))
    <title>High Performing Individual (HPI) | Miqala</title>
    <meta name="description" content="High Performing Individual (HPI) — Exclusive Training untuk Upgrade Sistem Operasi Diri Anda. Makassar (To Be Confirmed), 3-4 September 2026. Dibawakan oleh Syaikh Sy Ali Muhammad Jawdi &amp; Dr. Indrawan Nugroho." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://pemimpindaritimur.org/hpi" />
    <meta property="og:title" content="High Performing Individual (HPI) | Miqala" />
    <meta property="og:description" content="Exclusive Training untuk Upgrade Sistem Operasi Diri Anda. Makassar (To Be Confirmed), 3-4 September 2026. Daftar sekarang — kuota terbatas." />
    <meta property="og:image" content="https://pemimpindaritimur.org/hpi_soon.jpeg" />
    <meta property="og:image:width" content="1024" />
    <meta property="og:image:height" content="1280" />
    <meta property="og:site_name" content="Miqala" />
    <meta property="og:locale" content="id_ID" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="https://pemimpindaritimur.org/hpi" />
    <meta name="twitter:title" content="High Performing Individual (HPI) | Miqala" />
    <meta name="twitter:description" content="Exclusive Training untuk Upgrade Sistem Operasi Diri Anda. Makassar (To Be Confirmed), 3-4 September 2026." />
    <meta name="twitter:image" content="https://pemimpindaritimur.org/hpi_soon.jpeg" />
    @endif
    @inertiaHead
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PNRJRHSR" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @inertia
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>

</body>

</html>