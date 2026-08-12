<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3'
import Auth from '@/Layouts/Auth.vue'
import { computed } from 'vue'

const page = usePage()
const props = computed(() => page.props)
</script>

<template>
    <Head title="Peak Performance Program" />
    <Auth>
        <!-- 1. Hero Section -->
        <div class="w-full min-h-screen bg-zinc-950 flex flex-col items-center justify-center relative overflow-hidden pt-20"
            style="background-image: url('https://glp-indonesia.com/img/noise.png');">
            
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-paper/5 rounded-full blur-[100px] pointer-events-none"></div>
            
            <div class="relative z-10 w-[90%] md:w-[80%] max-w-7xl mx-auto flex flex-col items-center text-center gap-6">
                <div class="px-5 py-2 border border-paper/10 rounded-full text-paper/60 text-xs tracking-[0.3em] uppercase backdrop-blur-sm mb-4">
                    Yayasan Pemimpin Dari Timur
                </div>
                
                <h1 class="text-6xl md:text-8xl lg:text-[110px] font-display font-medium text-paper leading-[0.85] uppercase tracking-tighter mix-blend-lighten">
                    Journey <span class="text-paper/30 font-serif italic lowercase font-light">of</span> Iman
                </h1>
                
                <p class="text-2xl md:text-4xl font-light text-paper/90 max-w-4xl leading-tight font-serif mt-6">
                    Empowering Heart, Inspiring Change.
                </p>
                
                <div class="w-16 h-px bg-paper/20 my-6"></div>
                
                <p class="text-lg md:text-xl text-paper/70 max-w-2xl font-light tracking-wide uppercase px-4">
                    Kepemimpinan adalah amanah, bukan sekadar gelar atau posisi.
                </p>
                
                <div class="mt-12 mb-8 relative group">
                    <div class="absolute -inset-2 bg-paper/20 rounded-full blur-md opacity-0 group-hover:opacity-100 transition duration-500"></div>
                    <a href="#join" class="relative block px-12 py-5 bg-paper text-zinc-950 rounded-full uppercase text-sm font-bold tracking-[0.2em] hover:scale-105 transition-transform duration-300">
                        Explore The Program
                    </a>
                </div>
            </div>

            <div class="absolute bottom-12 left-1/2 -translate-x-1/2 flex flex-col items-center gap-3 text-paper/30 animate-bounce">
                <span class="text-[10px] uppercase tracking-[0.3em]">Scroll</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
            </div>
        </div>

        <!-- 2. The Problem Section -->
        <div class="w-full bg-paper text-zinc-900 py-32 relative">
            <div class="w-[90%] md:w-[80%] max-w-7xl mx-auto flex flex-col md:flex-row gap-20">
                <div class="w-full md:w-[45%] lg:w-[40%] flex flex-col gap-10 sticky top-32 self-start">
                    <h2 class="text-6xl lg:text-8xl font-display font-bold uppercase leading-[0.85] tracking-tighter">The<br>Reality<br><span class="text-zinc-400">We Face</span></h2>
                    <div class="text-xl lg:text-2xl font-serif italic text-zinc-600 border-l border-zinc-900 pl-8 py-2">
                        "Setiap kalian adalah pemimpin dan setiap kalian akan dimintai pertanggungjawaban." 
                        <span class="block text-xs font-sans not-italic uppercase tracking-[0.2em] mt-6 text-zinc-400 font-bold">- HR Bukhari & Muslim</span>
                    </div>
                </div>
                
                <div class="w-full md:w-[55%] lg:w-[60%] flex flex-col gap-24 pt-10">
                    <div class="flex flex-col gap-4 group">
                        <div class="flex items-center gap-6">
                            <span class="w-12 h-px bg-zinc-300 group-hover:bg-zinc-900 transition-colors duration-500"></span>
                            <span class="text-xs font-bold uppercase tracking-[0.3em] text-zinc-400 group-hover:text-zinc-900 transition-colors duration-500">The Reality</span>
                        </div>
                        <p class="text-3xl lg:text-5xl font-light leading-[1.1] text-zinc-900">
                            Dunia semakin maju, tetapi keadilan terasa semakin jauh.
                        </p>
                    </div>
                    
                    <div class="flex flex-col gap-4 group">
                        <div class="flex items-center gap-6">
                            <span class="w-12 h-px bg-zinc-300 group-hover:bg-zinc-900 transition-colors duration-500"></span>
                            <span class="text-xs font-bold uppercase tracking-[0.3em] text-zinc-400 group-hover:text-zinc-900 transition-colors duration-500">The Gap</span>
                        </div>
                        <p class="text-3xl lg:text-5xl font-light leading-[1.1] text-zinc-900">
                            Dunia tidak kekurangan orang pintar, melainkan kekurangan <span class="font-serif italic font-normal text-zinc-600">pemimpin berkarakter.</span>
                        </p>
                    </div>
                    
                    <div class="flex flex-col gap-4 group">
                        <div class="flex items-center gap-6">
                            <span class="w-12 h-px bg-zinc-300 group-hover:bg-red-800 transition-colors duration-500"></span>
                            <span class="text-xs font-bold uppercase tracking-[0.3em] text-zinc-400 group-hover:text-red-800 transition-colors duration-500">The Danger</span>
                        </div>
                        <p class="text-3xl lg:text-5xl font-light leading-[1.1] text-zinc-900">
                            Ketika kekuasaan kehilangan karakter, ia berubah menjadi alat kerusakan.
                        </p>
                    </div>
                    
                    <div class="p-12 lg:p-16 bg-zinc-950 text-paper mt-10 relative overflow-hidden rounded-2xl">
                        <div class="absolute -top-20 -right-20 w-64 h-64 bg-red-900/20 rounded-full blur-[80px]"></div>
                        <div class="text-xs font-bold uppercase tracking-[0.3em] text-paper/40 mb-8">The Cycle of Destruction</div>
                        <p class="text-2xl lg:text-4xl font-light leading-snug">
                            Kekuasaan mutlak berujung pada hilangnya karakter, yang menyebabkan kesewenang-wenangan, dan akhirnya membawa kehancuran.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 & 5. Philosophy / Solution Section -->
        <div class="w-full bg-[#E5E0D8] text-zinc-900 py-32 lg:py-48 rounded-t-[4rem] -mt-16 relative z-10 shadow-[0_-20px_60px_-15px_rgba(0,0,0,0.1)]">
            <div class="w-[90%] md:w-[80%] max-w-7xl mx-auto flex flex-col items-center">
                <div class="w-20 h-20 rounded-full border border-zinc-900 flex items-center justify-center text-4xl font-serif italic mb-10 text-zinc-900">?</div>
                <h2 class="text-4xl md:text-6xl lg:text-7xl font-display font-bold uppercase tracking-tighter leading-[0.9] text-center max-w-5xl mb-12">
                    Bagaimana melahirkan pemimpin yang kuat secara karakter?
                </h2>
                
                <p class="text-2xl lg:text-3xl text-zinc-600 font-light text-center max-w-4xl leading-relaxed mb-32">
                    Kepemimpinan bukan tentang jabatan, melainkan amanah. Mengerjakan tugas ini menuntut kesiapan untuk mempertanggungjawabkannya kelak di hadapan Allah.
                </p>

                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-0 border border-zinc-300 rounded-[2rem] overflow-hidden">
                    <div class="p-12 lg:p-20 flex flex-col justify-center bg-white/50 backdrop-blur-sm">
                        <h3 class="text-4xl md:text-5xl font-display font-medium uppercase leading-[1.1] tracking-tight">
                            Kepemimpinan <br>
                            <span class="text-zinc-400 font-serif italic lowercase font-light text-5xl md:text-6xl leading-[0.8] block my-4">bukan seperti</span>
                            naik lift, melainkan sebuah pendakian.
                        </h3>
                    </div>
                    <div class="p-12 lg:p-20 bg-zinc-950 text-paper flex flex-col justify-center">
                        <div class="text-paper/40 uppercase tracking-[0.3em] text-xs font-bold mb-8">The Solution</div>
                        <h4 class="text-3xl lg:text-5xl font-display font-bold mb-6 tracking-tight leading-none uppercase">Peak Performance Program</h4>
                        <p class="text-paper/70 leading-relaxed font-light text-xl">
                            Sebuah perjalanan pendakian karakter. Program ini dirancang sebagai <strong class="text-paper font-normal">180 Hari Pendakian Karakter</strong> untuk membangun istiqamah dan konsistensi.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Methodology Section -->
        <div class="w-full bg-zinc-950 text-paper py-32 lg:py-48 relative" style="background-image: url('https://glp-indonesia.com/img/noise.png');">
            <div class="w-[90%] md:w-[80%] max-w-7xl mx-auto flex flex-col gap-32">
                <div class="text-center md:text-left flex flex-col md:flex-row justify-between items-end gap-10">
                    <h2 class="text-5xl md:text-7xl lg:text-8xl font-display font-bold uppercase tracking-tighter leading-[0.85]">
                        <span class="block text-sm font-bold tracking-[0.3em] text-paper/40 mb-6 font-sans normal-case">Methodology & Framework</span>
                        The Pillars &<br>Study Focus
                    </h2>
                    <p class="text-2xl font-light text-paper/60 max-w-md font-serif italic">
                        Memadukan keyakinan, wawasan, standar tertinggi, dan dampak nyata.
                    </p>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-2 gap-24">
                    <!-- Four Pillars -->
                    <div class="flex flex-col gap-12">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Card 1 -->
                            <div class="bg-paper/5 border border-paper/10 p-10 hover:bg-paper hover:text-zinc-950 transition-all duration-500 group rounded-2xl">
                                <div class="text-6xl font-display font-bold text-paper/10 group-hover:text-zinc-900/10 mb-8 transition-colors">01</div>
                                <h4 class="text-2xl font-bold uppercase tracking-widest mb-3">Iman</h4>
                                <p class="text-paper/60 group-hover:text-zinc-600 font-light text-lg">Sebagai fondasi.</p>
                            </div>
                            <!-- Card 2 -->
                            <div class="bg-paper/5 border border-paper/10 p-10 hover:bg-paper hover:text-zinc-950 transition-all duration-500 group rounded-2xl">
                                <div class="text-6xl font-display font-bold text-paper/10 group-hover:text-zinc-900/10 mb-8 transition-colors">02</div>
                                <h4 class="text-2xl font-bold uppercase tracking-widest mb-3">Ilmu</h4>
                                <p class="text-paper/60 group-hover:text-zinc-600 font-light text-lg">Sebagai wawasan.</p>
                            </div>
                            <!-- Card 3 -->
                            <div class="bg-paper/5 border border-paper/10 p-10 hover:bg-paper hover:text-zinc-950 transition-all duration-500 group rounded-2xl">
                                <div class="text-6xl font-display font-bold text-paper/10 group-hover:text-zinc-900/10 mb-8 transition-colors">03</div>
                                <h4 class="text-2xl font-bold uppercase tracking-widest mb-3">Ihsan</h4>
                                <p class="text-paper/60 group-hover:text-zinc-600 font-light text-lg">Sebagai standar kualitas.</p>
                            </div>
                            <!-- Card 4 -->
                            <div class="bg-paper/5 border border-paper/10 p-10 hover:bg-paper hover:text-zinc-950 transition-all duration-500 group rounded-2xl">
                                <div class="text-6xl font-display font-bold text-paper/10 group-hover:text-zinc-900/10 mb-8 transition-colors">04</div>
                                <h4 class="text-2xl font-bold uppercase tracking-widest mb-3">Impact</h4>
                                <p class="text-paper/60 group-hover:text-zinc-600 font-light text-lg">Sebagai manfaat.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Curriculum -->
                    <div class="flex flex-col justify-center gap-8">
                        <div class="flex flex-col border-l border-paper/20 pl-8 lg:pl-16 gap-16">
                            <div class="relative">
                                <div class="absolute -left-[33px] lg:-left-[65px] top-2 w-4 h-4 rounded-full bg-paper outline outline-8 outline-zinc-950"></div>
                                <h4 class="font-display font-bold text-3xl uppercase tracking-wide mb-4">Tadabbur Firman Allah</h4>
                                <p class="text-paper/60 font-light text-xl">Menggunakan Al-Qur'an sebagai cetak biru kehidupan.</p>
                            </div>
                            <div class="relative">
                                <div class="absolute -left-[33px] lg:-left-[65px] top-2 w-4 h-4 rounded-full bg-paper outline outline-8 outline-zinc-950"></div>
                                <h4 class="font-display font-bold text-3xl uppercase tracking-wide mb-4">Leadership Study</h4>
                                <p class="text-paper/60 font-light text-xl">Mempelajari Rasulullah sebagai role model sempurna.</p>
                            </div>
                            <div class="relative">
                                <div class="absolute -left-[33px] lg:-left-[65px] top-2 w-4 h-4 rounded-full bg-paper outline outline-8 outline-zinc-950"></div>
                                <h4 class="font-display font-bold text-3xl uppercase tracking-wide mb-4">Character Study</h4>
                                <p class="text-paper/60 font-light text-xl">Mengamati Para Sahabat sebagai bukti keberhasilan sejati.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. Call to Action -->
        <div id="join" class="w-full bg-paper py-32 lg:py-48 text-zinc-900 relative overflow-hidden">
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 40px 40px;"></div>

            <div class="w-[90%] md:w-[80%] max-w-6xl mx-auto flex flex-col items-center text-center relative z-10">
                
                <h2 class="text-6xl md:text-8xl lg:text-[120px] font-display font-bold uppercase tracking-tighter leading-[0.85] mb-12">
                    The True Price <br>
                    <span class="font-serif italic lowercase text-zinc-400 font-normal text-5xl md:text-7xl lg:text-[100px] leading-[0.5]">of</span> Character
                </h2>
                
                <div class="w-full max-w-3xl flex flex-col items-center mb-24 relative">
                    <div class="absolute top-1/2 left-0 w-full h-px bg-zinc-300 -z-10"></div>
                    <div class="bg-paper px-12 py-6 border border-zinc-900 rounded-full inline-flex flex-col items-center">
                        <span class="text-sm font-bold tracking-[0.3em] uppercase text-zinc-500 mb-2">Investment</span>
                        <span class="text-6xl md:text-8xl font-display font-bold tracking-tighter text-zinc-900">Rp 0</span>
                    </div>
                    <p class="text-xl md:text-3xl font-light leading-snug text-zinc-700 mt-12 px-4">
                        Biaya pendaftaran adalah Gratis. Tapi pendakian karakter tidak bisa dibeli dengan uang, melainkan dibayar dengan <strong class="font-bold text-zinc-900">100% komitmen, konsistensi, dan kesungguhan.</strong>
                    </p>
                </div>

                <div class="w-full flex flex-col md:flex-row justify-center items-center md:items-start gap-12 md:gap-0 lg:gap-20 mb-20 text-center uppercase tracking-widest px-4">
                    <div class="flex flex-col items-center w-full md:w-1/3">
                        <h3 class="text-2xl font-bold mb-3">Step Up</h3>
                        <p class="text-zinc-500 font-serif normal-case italic">Ambil inisiatif</p>
                    </div>
                    <div class="w-12 h-px md:w-px md:h-12 bg-zinc-300 my-4 md:my-0 mt-5"></div>
                    <div class="flex flex-col items-center w-full md:w-1/3">
                        <h3 class="text-2xl font-bold mb-3">Sign Up</h3>
                        <p class="text-zinc-500 font-serif normal-case italic">Komitmenkan diri</p>
                    </div>
                    <div class="w-12 h-px md:w-px md:h-12 bg-zinc-300 my-4 md:my-0 mt-5"></div>
                    <div class="flex flex-col items-center w-full md:w-1/3">
                        <h3 class="text-2xl font-bold mb-3">Level Up</h3>
                        <p class="text-zinc-500 font-serif normal-case italic">Tingkatkan kapasitas</p>
                    </div>
                </div>

                <div class="w-full max-w-lg mt-8 flex flex-col items-center">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSdBB1m4buXwZQyA4xB_JVLPYq7Vjo_NI8Ff3mV7KosEedzIFg/viewform" target="_blank"
                        class="px-10 py-6 w-full bg-zinc-950 text-paper text-center rounded-full uppercase font-bold tracking-[0.2em] text-sm md:text-base hover:bg-zinc-800 transition-colors duration-300 flex items-center justify-center gap-4">
                        Daftar Peak Performance
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </Auth>
</template>
