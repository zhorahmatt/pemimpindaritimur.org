<template>
    <Head>
        <title>Terima Undangan - GLP INDTIM</title>
    </Head>

    <div class="card border border-gray-300 w-100">
        <div class="card-body p-10">
            <h2 class="fw-bold mb-3">Selamat Datang</h2>
            <p class="text-gray-600 mb-7">
                Anda diundang untuk bergabung dengan sistem internal Yayasan Pemimpin dari Timur sebagai <strong>{{ invitation.role }}</strong>.
                Silakan atur kata sandi Anda untuk melanjutkan.
            </p>
            <div class="mb-5">
                <label class="form-label fs-6">Nama</label>
                <input type="text" class="form-control" :value="invitation.name" readonly disabled />
            </div>
            <div class="mb-5">
                <label class="form-label fs-6">Email</label>
                <input type="email" class="form-control" :value="invitation.email" readonly disabled />
            </div>
            <form @submit.prevent="submit">
                <div class="mb-5">
                    <label class="required form-label fs-6">Kata Sandi Baru</label>
                    <input type="password" class="form-control" :class="{ 'is-invalid': errors.password }" required v-model="form.password" />
                    <div v-if="errors.password" class="text-danger mt-2">{{ errors.password }}</div>
                </div>
                <div class="mb-7">
                    <label class="required form-label fs-6">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control" required v-model="form.password_confirmation" />
                </div>
                <button type="submit" id="submit_button" class="btn btn-myprimary w-100">
                    <span class="indicator-label">Aktifkan Akun</span>
                    <span class="indicator-progress">Mohon Tunggu... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import AuthLayout from '../../Layouts/Auth.vue';
import { Head, router } from '@inertiajs/vue3';
import { reactive } from 'vue';

export default {
    layout: AuthLayout,
    components: { Head },
    props: {
        errors: Object,
        invitation: Object,
        token: String,
    },
    setup(props) {
        const form = reactive({ password: '', password_confirmation: '' });
        const submit = () => {
            const btn = document.querySelector('#submit_button');
            if (btn) {
                btn.setAttribute('data-kt-indicator', 'on');
                btn.setAttribute('disabled', true);
            }
            router.post(`/invite/${props.token}`, form, {
                onFinish: () => {
                    if (btn) {
                        btn.removeAttribute('data-kt-indicator');
                        btn.removeAttribute('disabled');
                    }
                },
            });
        };
        return { form, submit };
    },
};
</script>
