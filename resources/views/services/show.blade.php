<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $service->name }} - Detail Service</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ---- Swiper pagination: expandable dot ---- */
        .transformation-swiper .swiper-pagination-bullet {
            background: #cbd5e1;
            opacity: 1;
            width: 8px;
            height: 8px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .transformation-swiper .swiper-pagination-bullet-active {
            background: #0f2b4b;
            width: 28px;
            border-radius: 6px;
        }

        /* ---- Beautiful Premium Mesh Gradient on Hero ---- */
        .hero-shape {
            background:
                radial-gradient(circle at 10% 20%, rgba(59, 130, 246, 0.04) 0%, transparent 45%),
                radial-gradient(circle at 90% 80%, rgba(16, 185, 129, 0.02) 0%, transparent 45%),
                radial-gradient(circle at 50% 50%, rgba(15, 43, 75, 0.01) 0%, transparent 80%);
        }
    </style>
</head>

<body class="bg-[#fafbfc] font-sans text-slate-700 antialiased selection:bg-[#0f2b4b]/15">

    <x-navbar />

    <!-- ===== Hero Section ===== -->
    <main class="max-w-screen-2xl mx-auto sm:px-6 pt-28 pb-8 lg:pb-0">
        <div class="relative bg-white rounded-none sm:rounded-3xl border border-gray-100/80 shadow-xl shadow-slate-200/20 overflow-hidden">
            <div class="absolute inset-0 hero-shape pointer-events-none"></div>

            <div class="relative flex flex-col-reverse lg:grid lg:grid-cols-12 gap-0">
                <div class="lg:col-span-7 p-8 md:p-16 lg:p-24 xl:pl-32 flex flex-col justify-center space-y-8 z-10">
                    @if($service->category)
                    <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500/10 to-indigo-500/10 border border-blue-200/30 text-blue-700 text-xs font-semibold px-3.5 py-1.5 rounded-full uppercase tracking-wider backdrop-blur-sm self-start shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                        {{ $service->category->name }}
                    </div>
                    @endif

                    <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-[#0f2b4b] tracking-tight leading-[1.12]">
                        {{ $service->name }}
                    </h1>

                    <p class="text-base md:text-lg lg:text-xl text-slate-500 leading-relaxed max-w-3xl">
                        {{ $service->description }}
                    </p>

                    <div class="flex flex-wrap items-center gap-6 pt-4">
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl px-5 py-3.5 flex items-baseline gap-2">
                            <span class="text-4xl font-extrabold text-[#0f2b4b] tracking-tight">
                                Rp {{ number_format($service->base_price, 0, ',', '.') }}
                            </span>
                            <span class="text-sm font-medium text-slate-400">/ pair</span>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ url('/checkout?service=' . $service->id) }}"
                                class="group relative inline-flex items-center justify-center bg-[#0f2b4b] text-white font-bold px-8 py-4.5 rounded-2xl overflow-hidden shadow-lg shadow-[#0f2b4b]/15 transition-all duration-300 hover:shadow-xl hover:shadow-[#0f2b4b]/35">
                                <span class="relative z-10 flex items-center gap-2">
                                    Book This Clean
                                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-[#0f2b4b] to-[#1a4a7a] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </a>
                            <a href="{{ url('/services#services-tab') }}"
                                class="inline-flex items-center justify-center border border-slate-200 bg-white text-[#0f2b4b] font-bold px-8 py-4.5 rounded-2xl hover:bg-slate-50 hover:border-slate-300 transition-all duration-300">
                                Compare Services
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 flex items-stretch w-full">
                    <div class="w-full h-full aspect-[16/9] lg:aspect-auto min-h-0 lg:min-h-0 bg-slate-100 overflow-hidden">
                        @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}"
                            alt="{{ $service->name }} transformation example"
                            class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300 bg-slate-50">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0 0 22.5 18.75V5.25A2.25 2.25 0 0 0 20.25 3H3.75A2.25 2.25 0 0 0 1.5 5.25v13.5A2.25 2.25 0 0 0 3.75 21Z" />
                            </svg>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ===== Features & Specs ===== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- What's Included (spans 2 columns) -->
            <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-100 p-8 md:p-12 shadow-sm shadow-slate-100/50 space-y-10">
                <div class="flex items-center gap-3">
                    <div class="h-6 w-1.5 rounded-full bg-blue-600"></div>
                    <h3 class="text-2xl font-extrabold text-[#0f2b4b] tracking-tight">What's Included</h3>
                </div>

                @if(!empty($service->whats_included) && is_array($service->whats_included))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">
                    @foreach($service->whats_included as $feature)
                    <div class="flex gap-4 group items-start hover:translate-x-1 transition-transform duration-300">
                        <div class="flex-shrink-0 w-12 h-12 bg-slate-50 border border-slate-100/80 rounded-2xl flex items-center justify-center text-[#0f2b4b] group-hover:bg-[#0f2b4b] group-hover:text-white group-hover:scale-105 group-hover:rotate-3 transition-all duration-300">
                            @if($feature['icon'] === 'brush')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 21l5.904-.813a2 2 0 001.12-.562l5.4-5.4a2 2 0 00-2.828-2.828l-5.4 5.4a2 2 0 00-.562 1.12z" />
                            </svg>
                            @elseif($feature['icon'] === 'cleaning_services')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                            </svg>
                            @elseif($feature['icon'] === 'waves')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6h16.5" />
                            </svg>
                            @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                            </svg>
                            @endif
                        </div>
                        <div>
                            <h4 class="font-bold text-[#0f2b4b] text-base leading-snug group-hover:text-blue-600 transition-colors duration-300">{{ $feature['title'] }}</h4>
                            <p class="text-sm text-slate-500 mt-1.5 leading-relaxed">{{ $feature['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-slate-400 italic text-sm">No specific inclusions listed for this service.</p>
                @endif
            </div>

            <!-- Specs Card (dark) -->
            <div class="bg-gradient-to-br from-[#0f2b4b] via-[#0a2540] to-[#0b3454] text-white rounded-3xl p-8 md:p-10 border border-white/10 shadow-xl shadow-[#0f2b4b]/15 space-y-8 self-start">
                <div class="flex items-center gap-3">
                    <div class="h-6 w-1.5 rounded-full bg-cyan-400"></div>
                    <h3 class="text-2xl font-bold tracking-tight">Specifications</h3>
                </div>
                <div class="space-y-4 text-sm font-medium">
                    <div class="flex justify-between items-center pb-4 border-b border-white/10">
                        <div class="flex items-center gap-3 text-white/75">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 6v6l4 2" />
                            </svg>
                            <span>Turnaround</span>
                        </div>
                        <span class="font-bold text-white text-base">{{ $service->estimated_duration ? $service->estimated_duration . ' Days' : '-' }}</span>
                    </div>
                    <div class="flex justify-between items-center pb-4 border-b border-white/10">
                        <div class="flex items-center gap-3 text-white/75">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Suitability</span>
                        </div>
                        <span class="font-bold text-white text-base truncate ml-2 max-w-[140px]" title="{{ $service->suitability }}">{{ $service->suitability ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between items-center pb-4 border-b border-white/10">
                        <div class="flex items-center gap-3 text-white/75">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <span>Intensity</span>
                        </div>
                        <span class="font-bold text-white text-base capitalize">{{ $service->intensity ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between items-center pb-1">
                        <div class="flex items-center gap-3 text-white/75">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.27 5.82 21 7 14.14l-5-4.87 6.91-1.01L12 2z" />
                            </svg>
                            <span>Sanitization</span>
                        </div>
                        <span class="font-bold text-white text-base text-right max-w-[150px] truncate" title="{{ $service->sanitazion }}">{{ $service->sanitazion ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Transformation Gallery (if images exist) ===== -->
    @if($service->images && is_array($service->images))
    <section class="w-full bg-white py-16 lg:py-24 border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <h3 class="text-3xl lg:text-4xl font-extrabold text-[#0f2b4b] tracking-tight">Transformation Gallery</h3>
                <p class="mt-3 text-slate-500 max-w-xl mx-auto leading-relaxed text-sm md:text-base">
                    See the visible difference our {{ $service->name }} process makes on real sneakers.
                </p>
            </div>

            <div class="swiper transformation-swiper !pb-14 max-w-7xl mx-auto">
                <div class="swiper-wrapper">
                    @foreach(array_chunk($service->images, 2) as $pair)
                    <div class="swiper-slide p-2">
                        <div class="gallery-card relative flex border border-slate-200/60 rounded-3xl overflow-hidden shadow-sm bg-white group">
                            

                            @foreach($pair as $subIndex => $img)
                            <div class="w-1/2 aspect-square bg-slate-50 border-r last:border-r-0 border-slate-100 relative overflow-hidden">
                                <img src="{{ asset('storage/' . $img) }}"
                                    class="w-full h-full object-cover"
                                    alt="Sneaker {{ $subIndex === 0 ? 'before' : 'after' }} treatment"
                                    loading="lazy"
                                    draggable="false">
                                <span class="absolute top-3.5 left-3.5 bg-black/60 backdrop-blur-md border border-white/10 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-full shadow-sm">
                                    {{ $subIndex === 0 ? 'Before' : 'After' }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiperEl = document.querySelector('.transformation-swiper');
            if (swiperEl) {
                new Swiper(swiperEl, {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    grabCursor: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 24
                        }
                    }
                });
            }
        });
    </script>
    @endif

    <!-- ===== Service Comparison ===== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-8 lg:py-10">
        <div class="text-center mb-8">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#0f2b4b] tracking-tight">Compare Services</h2>
            <p class="mt-3 text-slate-500 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">
                How does <span class="font-semibold text-[#0f2b4b]">{{ $service->name }}</span> stack up against our other treatments?
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto items-stretch">
            <!-- Current service (highlighted) -->
            <div class="comparison-card bg-white rounded-3xl p-5 border-2 border-blue-600/80 shadow-xl shadow-blue-900/5 relative flex flex-col justify-between">
                <span class="absolute -top-3.5 right-6 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-[10px] font-bold uppercase tracking-wider px-3.5 py-1.5 rounded-full shadow-md shadow-blue-500/10">
                    You're viewing
                </span>
                <div>
                    <h3 class="text-xl font-bold text-[#0f2b4b] mt-2">{{ $service->name }}</h3>
                    <p class="text-sm text-slate-400 mt-2 line-clamp-2">{{ $service->description }}</p>
                    <ul class="mt-4 space-y-2.5">
                        @if(!empty($service->whats_included) && is_array($service->whats_included))
                        @foreach($service->whats_included as $feature)
                        <li class="flex items-center gap-3 text-slate-700 text-sm font-medium">
                            <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            <span>{{ $feature['title'] }}</span>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="font-extrabold text-2xl text-[#0f2b4b] tracking-tight">Rp {{ number_format($service->base_price, 0, ',', '.') }}</span>
                    <a href="{{ url('/checkout?service=' . $service->id) }}"
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-all shadow-md shadow-blue-500/15 hover:shadow-lg hover:shadow-blue-500/25 active:scale-98">
                        Book Now
                    </a>
                </div>
            </div>

            @foreach($services as $otherService)
            @php
            $isRecommended = $otherService->slug === 'deep-clean';
            @endphp
            <div class="comparison-card bg-white rounded-3xl p-5 border border-slate-100 shadow-sm shadow-slate-100/50 hover:border-slate-200 relative flex flex-col justify-between">
                @if($isRecommended)
                <span class="absolute -top-3.5 right-6 bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-[10px] font-bold uppercase tracking-wider px-3.5 py-1.5 rounded-full shadow-md shadow-emerald-500/10">
                    Recommended
                </span>
                @endif
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mt-2">{{ $otherService->name }}</h3>
                    <p class="text-sm text-slate-500 mt-2 line-clamp-2">{{ $otherService->description }}</p>
                    <ul class="mt-4 space-y-2.5">
                        @if(!empty($otherService->whats_included) && is_array($otherService->whats_included))
                        @foreach($otherService->whats_included as $feature)
                        <li class="flex items-center gap-3 text-slate-700 text-sm font-medium">
                            <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            <span>{{ $feature['title'] }}</span>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="font-extrabold text-2xl text-slate-900 tracking-tight">Rp {{ number_format($otherService->base_price, 0, ',', '.') }}</span>
                    <a href="/services/{{ $otherService->slug }}"
                        class="inline-flex items-center gap-1 text-sm font-extrabold text-[#0f2b4b] hover:text-blue-600 transition-colors group/link">
                        Details
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- ===== Floating CTA (mobile) ===== -->
    <div class="fixed bottom-6 left-1/2 -translate-x-1/2 z-40 md:hidden w-[calc(100%-2rem)] max-w-sm">
        <a href="{{ url('/checkout?service=' . $service->id) }}"
            class="flex items-center justify-center bg-[#0f2b4b] text-white font-bold py-4 px-8 rounded-2xl shadow-2xl shadow-[#0f2b4b]/25 active:scale-[0.98] transition-transform duration-200">
            Book This Clean - Rp {{ number_format($service->base_price, 0, ',', '.') }}
        </a>
    </div>

    <div class="w-full bg-white border-t border-slate-100 py-16 lg:py-20 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8 relative overflow-hidden">

            <div class="absolute right-0 bottom-0 top-0 w-48 pointer-events-none hidden md:block opacity-5 select-none">
                <svg class="w-full h-full object-right-bottom text-[#0f2b4b]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17 1H7c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm-5 21c-.83 0-1.5-.67-1.5-1.5S11.17 19 12 19s1.5.67 1.5 1.5S12.83 22 12 22zm5-4H7V4h10v14z" />
                </svg>
            </div>

            <div class="space-y-3 max-w-2xl relative z-10 text-left">
                <h3 class="text-2xl md:text-3xl font-bold text-[#0f2b4b] tracking-tight">
                    Have questions about specific materials?
                </h3>
                <p class="text-sm md:text-base text-slate-500 leading-relaxed">
                    Our sneaker technicians are available to provide custom consultations for high-value collectibles and rare materials.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row lg:flex-row gap-3 min-w-[240px] relative z-10">
                <a href="#" class="inline-flex items-center justify-center border border-slate-200 bg-white text-[#0f2b4b] text-sm font-semibold px-6 py-3.5 rounded-xl hover:bg-slate-50 transition-colors duration-200">
                    Chat with an Expert
                </a>
                <a href="#" class="inline-flex items-center justify-center bg-[#0f2b4b] text-white text-sm font-semibold px-6 py-3.5 rounded-xl hover:bg-[#0a1e35] transition-colors duration-200">
                    Read Care Guide
                </a>
            </div>

        </div>
    </div>

    <section class="py-16 bg-[#f8f9fa]">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6">

            <div class="mb-10 text-left">
                <h2 class="text-3xl font-bold text-[#0f2b4b] tracking-tight">
                    Verified Client Logs
                </h2>
            </div>

            @if(!empty($service->reviews) && is_array($service->reviews))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">

                @foreach($service->reviews as $review)
                <div class="bg-white p-8 rounded-2xl shadow-lg shadow-gray-200/40 border border-gray-100/50 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <!-- Rating Bintang -->
                        <div class="flex text-amber-400 gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <=($review['rating'] ?? 5))
                                <!-- Bintang Penuh -->
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                @else
                                <!-- Bintang Kosong -->
                                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499c.173-.437.681-.437.854 0l1.426 3.63a.5a.5 0 0 0 .382.285l3.847.18c.472.022.66.586.306.892l-2.88 2.493a.5a.5 0 0 0-.155.44l.84 3.63c.104.45-.39.795-.783.551l-3.327-2.073a.5a.5 0 0 0-.486 0l-3.328 2.073c-.393.244-.888-.102-.783-.551l.84-3.63a.5a.5 0 0 0-.155-.44L3.478 8.484c-.354-.306-.166-.87.306-.892l3.848-.18a.5a.5 0 0 0 .382-.285l1.426-3.63Z" />
                                </svg>
                                @endif
                                @endfor
                        </div>

                        <!-- Isi Review -->
                        <p class="text-slate-600 font-medium italic leading-relaxed text-sm md:text-base">
                            "{{ $review['comment'] ?? '' }}"
                        </p>
                    </div>

                    <!-- Info Reviewer -->
                    <div class="flex items-center gap-4 pt-2">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center font-bold text-sm text-[#0f2b4b] shrink-0">
                            @php
                            $initials = '';
                            if (!empty($review['name_reviewer'])) {
                            $words = explode(' ', $review['name_reviewer']);
                            $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
                            }
                            @endphp
                            {{ $initials ?: 'AN' }}
                        </div>
                        <div class="text-left">
                            <h4 class="font-bold text-slate-800 text-sm md:text-base">
                                {{ $review['name_reviewer'] ?? 'Anonymous' }}
                            </h4>
                            <span class="text-[10px] font-bold text-gray-400 tracking-wider uppercase">Verified Order</span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            @else
            <!-- Tampilan jika belum ada review -->
            <div class="text-center py-8 text-gray-500 italic">
                Belum ada review untuk layanan ini.
            </div>
            @endif

        </div>
    </section>


    <x-footer />

</body>

</html>