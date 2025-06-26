<template>
    <main data-kt-name="metronic" id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-layout="light-header"
        data-kt-app-toolbar-enabled="true" class="app-default">
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                <Navbar />
                <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
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
