<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <x-navbar />

    <main class="max-w-screen-xl mx-auto px-4 pt-32 pb-12 text-center font-sans">
        <div class="max-w-3xl mx-auto">
            <p class="text-sm font-bold tracking-[0.2em] text-[#0a2540] uppercase mb-4">
                OUR EXPERTISE
            </p>
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#0a2540] mb-6 tracking-tight">
                Our Restoration Services
            </h2>
            <p class="text-lg text-slate-600 leading-relaxed">
                Experience laboratory-grade care for your footwear. We combine artisanal precision with clinical techniques to revive every fiber of your sneakers.
            </p>
        </div>
    </main>

    <section class="max-w-screen-xl mx-auto px-4 pb-16 font-sans">

        <div class="border-b border-gray-200 mb-8">
            <ul class="flex flex-wrap justify-center -mb-px text-sm font-medium text-center text-gray-500" id="services-tab" data-tabs-toggle="#services-tab-content" role="tablist">

                @foreach($categories as $index => $category)
                @if($category->is_active)
                <li class="mr-2" role="presentation">
                    <button class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group transition-colors duration-200 {{ $index === 0 ? 'border-[#0a2540] text-[#0a2540]' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}"
                        id="{{ $category->slug }}-tab"
                        data-tabs-target="#{{ $category->slug }}"
                        type="button"
                        role="tab"
                        aria-controls="{{ $category->slug }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">

                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.1 7.9 12.5 10" />
                            <path d="M17.4 10.1 16 12" />
                            <path d="M2 16a2 2 0 0 0 2 2h13c2.8 0 5-2.2 5-5a2 2 0 0 0-2-2c-.8 0-1.6-.2-2.2-.7l-6.2-4.2c-.4-.3-.9-.2-1.3.1 0 0-.6.8-1.2 1.1a3.5 3.5 0 0 1-4.2.1C4.4 7 3.7 6.3 3.7 6.3A.92.92 0 0 0 2 7Z" />
                            <path d="M2 11c0 1.7 1.3 3 3 3h7" />
                        </svg>
                        {{ $category->name }}
                    </button>
                </li>
                @endif
                @endforeach

            </ul>
        </div>

        <div id="services-tab-content">

            @foreach($categories as $index => $category)
            @if($category->is_active)
            <div class="{{ $index === 0 ? '' : 'hidden' }}" id="{{ $category->slug }}" role="tabpanel" aria-labelledby="{{ $category->slug }}-tab">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-left">

                    @forelse($category->services->where('is_active', true) as $service)
                    <div class="border border-gray-200 rounded-lg p-6 bg-white flex flex-col justify-between shadow-sm">
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded tracking-wider">
                                    {{ $service->estimated_duration ? $service->estimated_duration . ' DAYS' : 'SERVICE' }}
                                </span>
                                <span class="text-[#0a2540] font-bold text-lg">
                                    Rp {{ number_format($service->base_price, 0, ',', '.') }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-[#0a2540] mb-2">{{ $service->name }}</h3>
                            <p class="text-sm text-gray-500 mb-6 leading-relaxed">{{ $service->description }}</p>
                        </div>
                        <a href="{{ url('/services/' . $service->slug) }}" class="w-full text-center border border-[#0a2540] text-[#0a2540] font-medium py-2.5 rounded-md hover:bg-[#0a2540] hover:text-white transition-colors duration-300">
                            Book Now
                        </a>
                    </div>
                    @empty
                    <div class="col-span-full text-center text-gray-400 py-8">
                        Belum ada layanan untuk kategori ini.
                    </div>
                    @endforelse

                </div>
            </div>
            @endif
            @endforeach

        </div>
    </section>
    <section class="py-16 bg-[#f8f9fa]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">

            <div class="mb-14">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-[#0f2b4b] tracking-tight">
                    The Clinical Process
                </h2>
                <p class="mt-3 text-slate-500 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">
                    Our methodical approach ensures consistent, premium results every time.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto items-start">

                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 rounded-full border-2 border-[#0f2b4b] flex items-center justify-center text-[#0f2b4b] bg-white transition-transform duration-300 hover:scale-105 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#0f2b4b] text-base md:text-lg tracking-tight">Registration</h3>
                        <p class="mt-1.5 text-xs md:text-sm text-slate-500 font-medium leading-relaxed max-w-[220px] mx-auto">
                            Digital tagging and logging of sneaker condition.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 rounded-full border-2 border-[#0f2b4b] flex items-center justify-center text-[#0f2b4b] bg-white transition-transform duration-300 hover:scale-105 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 21l-4.35-4.35" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#0f2b4b] text-base md:text-lg tracking-tight">Inspection</h3>
                        <p class="mt-1.5 text-xs md:text-sm text-slate-500 font-medium leading-relaxed max-w-[220px] mx-auto">
                            Material analysis to determine cleaning agents.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 rounded-full border-2 border-[#0f2b4b] flex items-center justify-center text-[#0f2b4b] bg-white transition-transform duration-300 hover:scale-105 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.67 2.67 0 1021 17.25l-5.83-5.83m-3.75 3.75a4.87 4.87 0 11-6.89-6.89 4.87 4.87 0 016.89 6.89z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#0f2b4b] text-base md:text-lg tracking-tight">Clinical Clean</h3>
                        <p class="mt-1.5 text-xs md:text-sm text-slate-500 font-medium leading-relaxed max-w-[220px] mx-auto">
                            Hands-on treatment using specialized brushes.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 rounded-full border-2 border-[#0f2b4b] flex items-center justify-center text-[#0f2b4b] bg-white transition-transform duration-300 hover:scale-105 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#0f2b4b] text-base md:text-lg tracking-tight">Final Polish</h3>
                        <p class="mt-1.5 text-xs md:text-sm text-slate-500 font-medium leading-relaxed max-w-[220px] mx-auto">
                            Conditioning and quality control check.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        <div class="mb-10 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#0f2b4b] tracking-tight">
                Frequently Asked Questions
            </h2>
        </div>

        <div class="space-y-4 max-w-3xl mx-auto">

            @foreach($faqs as $faq)
                <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm overflow-hidden" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left font-bold text-[#0f2b4b] text-sm md:text-base hover:bg-gray-50/50 focus:outline-none">
                        <span>{{ $faq->question }}</span>
                        <svg class="w-4 h-4 text-slate-400 transform transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="border-t border-gray-100 bg-gray-50/30">
                        <div class="p-5 text-sm md:text-base text-slate-600 leading-relaxed">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

    <section class="py-28 bg-[#0f2b4b]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center space-y-8">

            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight">
                Ready to restore your pair?
            </h2>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">

                <a href="{{ url('/checkout') }}"
                    class="w-full sm:w-auto px-8 py-3.5 bg-white text-[#0f2b4b] font-bold text-sm md:text-base rounded-xl transition-all duration-200 hover:bg-gray-100 active:scale-98 text-center shadow-md">
                    Book Now
                </a>

                <a href="https://wa.me/628xxxxxxxxxx" target="_blank"
                    class="w-full sm:w-auto px-8 py-3.5 bg-transparent text-white font-bold text-sm md:text-base rounded-xl border border-white transition-all duration-200 hover:bg-white/10 active:scale-98 text-center">
                    Contact Specialist
                </a>

            </div>

        </div>
    </section>
    <x-footer />
</body>

</html>