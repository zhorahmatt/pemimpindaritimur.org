<template>
    <main data-kt-name="metronic" id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu"
        class="bg-white position-relative app-blank">
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="mb-0" id="home">
                <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                    style="background-image: url(assets/media/svg/illustrations/landing.svg)">
                    <Navbar />
                    <slot />
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    import Navbar from "../Components/Navbar/User.vue";

    export default {
        components: {
            Navbar,
        },
    }
</script>

<style>

</style>
