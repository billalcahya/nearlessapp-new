<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navbar></x-navbar>
    <main class="max-w-screen-xl mx-auto px-4 pt-32 pb-8 text-center font-sans">
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

    <div class="max-w-6xl mx-auto px-4 py-8 font-sans">
        <div class="flex items-center space-x-3 mb-8">
            <div class="w-1.5 h-8 bg-blue-900 rounded-full"></div>
            <h2 class="text-2xl font-bold text-slate-800">{{ $category->name ?? 'Our Services' }}</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

            @foreach($services as $service)
            @php
            $whatsIncluded = is_array($service->whats_included)
            ? $service->whats_included
            : json_decode($service->whats_included, true) ?? [];
            @endphp

            <div class="relative bg-white rounded-2xl p-8 shadow-sm flex flex-col justify-between min-h-[500px] border 
                {{ $service->is_top_seller ? 'border-2 border-blue-950 shadow-md md:-mt-2' : 'border-slate-100' }}">

                @if($service->is_top_seller)
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-blue-950 text-white text-[10px] uppercase tracking-wider font-extrabold px-4 py-1 rounded-full whitespace-nowrap">
                    Popular
                </div>
                @endif

                <div>
                    <div class="text-blue-600 mb-4 {{ $service->is_top_seller ? 'mt-2' : '' }}">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-slate-800 mb-2">{{ $service->name }}</h3>
                    <p class="text-sm text-slate-500 mb-6">{{ $service->description }}</p>

                    <div class="{{ $service->is_top_seller ? 'bg-blue-50/60 rounded-xl p-4' : '' }} mb-6">
                        <div class="text-2xl font-bold text-slate-800">
                            Rp {{ number_format($service->base_price, 0, ',', '.') }}
                            <span class="text-sm font-normal text-slate-400">/ pair</span>
                        </div>
                    </div>

                    <ul class="space-y-3 text-sm text-slate-600 mb-8">
                        @foreach($whatsIncluded as $item)
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ $item['title'] ?? '' }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <a href="{{ route('services.show', $service->slug) }}" class="w-full text-center py-3 font-semibold rounded-xl transition-colors
                    {{ $service->is_top_seller 
                        ? 'bg-blue-950 text-white hover:bg-blue-900' 
                        : 'border-2 border-blue-950 text-blue-950 hover:bg-slate-50' }}">
                    Book Now
                </a>
            </div>
            @endforeach

        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-12 font-sans">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">

            @foreach($categories as $category)
            @php
            $allServices = $category->services->where('is_active', true);
            @endphp

            @if($allServices->count() > 0)
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm mb-8">
                <div class="bg-slate-50/80 px-6 py-4 border-b border-slate-200">
                    <h3 class="text-lg font-bold text-blue-950">{{ $category->name }}</h3>
                </div>

                <div class="divide-y divide-slate-100 px-6">
                    @foreach($allServices as $service)
                    <div class="py-5 flex justify-between items-start space-x-4">
                        <div class="space-y-1">
                            <h4 class="font-bold text-slate-800 text-sm md:text-base">
                                {{ $service->name }}
                                @if($service->is_top_seller)
                                <span class="ml-2 text-[10px] bg-blue-100 text-blue-800 font-extrabold px-2 py-0.5 rounded-full uppercase">Top</span>
                                @endif
                            </h4>
                            <p class="text-xs md:text-sm text-slate-400">{{ $service->description }}</p>
                        </div>
                        <div class="text-right shrink-0">
                            <div class="font-semibold text-slate-700 text-sm mb-1">
                                Rp {{ number_format($service->base_price, 0, ',', '.') }}
                            </div>
                            <a href="{{ route('services.show', $service->slug) }}" class="text-xs font-semibold text-slate-600 hover:text-blue-900 inline-flex items-center">
                                Book <span class="ml-1">→</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <div class="max-w-6xl mx-auto px-4 py-16 font-sans">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="relative rounded-2xl overflow-hidden shadow-lg">
                <img
                    
                    src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Sneaker cleaning process"
                    class="w-full h-[350px] md:h-[400px] object-cover">
            </div>

            <div class="space-y-8">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-950">Why Sneaker Lab?</h2>

                <div class="space-y-6">

                    <div class="flex items-start space-x-4">
                        <div class="p-3 bg-blue-50 text-blue-800 rounded-xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-lg font-bold text-slate-800">Clinical Precision</h3>
                            <p class="text-sm md:text-base text-slate-500 leading-relaxed">
                                We use pH-neutral chemicals and medical-grade equipment to ensure zero structural damage.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="p-3 bg-blue-50 text-blue-800 rounded-xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-lg font-bold text-slate-800">72-Hour Turnaround</h3>
                            <p class="text-sm md:text-base text-slate-500 leading-relaxed">
                                Our optimized workflow gets your sneakers back on your feet faster without compromising quality.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="p-3 bg-blue-50 text-blue-800 rounded-xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-lg font-bold text-slate-800">Insurance Guaranteed</h3>
                            <p class="text-sm md:text-base text-slate-500 leading-relaxed">
                                Every pair is fully insured from the moment it enters our facility until it's back in your hands.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="max-w-screen-2xl mx-auto px-4 py-12 font-sans">
        <div class="bg-blue-950 rounded-2xl py-16 px-6 text-center shadow-lg">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">
                Ready for the Aura treatment?
            </h2>

            <p class="text-sm md:text-base text-slate-300 max-w-2xl mx-auto mb-8 leading-relaxed">
                Book your slot now. We offer pickup and delivery in select urban centers.
            </p>

            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="#" class="w-full sm:w-auto px-8 py-3 bg-white text-blue-950 font-bold rounded-xl hover:bg-slate-100 transition-colors text-center shadow-sm">
                    Schedule Pickup
                </a>

                <a href="#" class="w-full sm:w-auto px-8 py-3 bg-transparent text-white font-bold rounded-xl border border-white hover:bg-white/10 transition-colors text-center">
                    Find a Drop Point
                </a>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>

</html>