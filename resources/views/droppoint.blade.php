<x-layouts.app>
    <x-slot name="title">Drop Points</x-slot>
    <div class="bg-white py-16 w-full font-sans text-left">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-3xl">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-6 tracking-tight">
                    Our Network of Care
                </h2>

                <p class="text-gray-600 text-lg md:text-xl leading-relaxed max-w-2xl">
                    Find the nearest Sneaker Lab drop-off location or schedule a professional pickup. Every pair is treated with clinical precision, regardless of where you hand them over.
                </p>
            </div>
        </div>
    </div>

    <div class="bg-slate-50 py-16 w-full font-sans text-left">
        <div class="max-w-7xl mx-auto px-4 md:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @forelse($dropPoints as $point)
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex flex-col justify-between min-h-[500px]">
                    <div>
                        <div class="rounded-xl overflow-hidden mb-6 h-48 w-full bg-slate-100">
                            @if($point->image_path)
                            <img src="{{ asset('storage/' . $point->image_path) }}"
                                alt="{{ $point->name }}"
                                class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375 0 11-.75 0 .375 0 01.75 0z"></path>
                                </svg>
                            </div>
                            @endif
                        </div>

                        <div class="flex items-start gap-2 mb-4">
                            <svg class="w-5 h-5 text-slate-700 shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72M6.75 18h3.5a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75v3.75c0 .414.336.75.75.75z"></path>
                            </svg>
                            <h3 class="text-xl font-bold text-gray-900">{{ $point->name }}</h3>
                        </div>

                        <div class="flex items-start gap-2.5 mb-4 text-gray-500 text-sm leading-relaxed">
                            <svg class="w-4 h-4 shrink-0 mt-1 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path>
                            </svg>
                            <span>{{ $point->address }}</span>
                        </div>

                        <div class="flex items-start gap-2.5 mb-6 text-gray-500 text-sm">
                            <svg class="w-4 h-4 shrink-0 mt-0.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                @if($point->operational_hours)
                                @foreach($point->operational_hours as $day => $time)
                                <p>{{ $day }}: {{ $time }}</p>
                                @endforeach
                                @else
                                <p>Jam operasional belum diatur.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div>
                        @if($point->coordinates)
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($point->coordinates) }}"
                            target="_blank"
                            class="w-full text-center inline-block bg-white text-[#002B5B] font-semibold px-6 py-3 rounded-xl border-2 border-[#002B5B] hover:bg-slate-50 transition duration-200 text-sm">
                            View on Google Maps
                        </a>
                        @else
                        <button disabled
                            class="w-full text-center inline-block bg-slate-100 text-slate-400 font-semibold px-6 py-3 rounded-xl border border-slate-200 text-sm cursor-not-allowed">
                            Map Unavailable
                        </button>
                        @endif
                    </div>
                </div>
                @empty
                <p class="text-center text-slate-400 col-span-full">Belum ada lokasi drop-off yang aktif.</p>
                @endforelse

            </div>
        </div>
    </div>

    <div class="py-20 w-full font-sans text-center">
        <div class="max-w-7xl mx-auto px-4 md:px-8">

            <h2 class="text-3xl md:text-4xl font-bold text-[#002B5B] mb-3">
                How It Works
            </h2>
            <p class="text-gray-500 text-sm md:text-base mb-16 max-w-2xl mx-auto">
                The seamless journey from dirty soles to clinical freshness.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">

                <div class="flex flex-col items-center p-4">
                    <div class="w-10 h-10 rounded-full bg-[#002B5B] text-white flex items-center justify-center font-bold text-sm mb-6 shadow-sm">
                        1
                    </div>
                    <h3 class="text-xs font-bold tracking-widest text-gray-900 uppercase mb-3">
                        REGISTRATION
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                        Create an order via our app or at the drop-off counter.
                    </p>
                </div>

                <div class="flex flex-col items-center p-4">
                    <div class="w-10 h-10 rounded-full bg-[#002B5B] text-white flex items-center justify-center font-bold text-sm mb-6 shadow-sm">
                        2
                    </div>
                    <h3 class="text-xs font-bold tracking-widest text-gray-900 uppercase mb-3">
                        INSPECTION
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                        Our technicians assess material health and staining levels.
                    </p>
                </div>

                <div class="flex flex-col items-center p-4">
                    <div class="w-10 h-10 rounded-full bg-[#002B5B] text-white flex items-center justify-center font-bold text-sm mb-6 shadow-sm">
                        3
                    </div>
                    <h3 class="text-xs font-bold tracking-widest text-gray-900 uppercase mb-3">
                        CLINICAL CLEAN
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                        Shoes undergo our proprietary 12-step restoration process.
                    </p>
                </div>

                <div class="flex flex-col items-center p-4">
                    <div class="w-10 h-10 rounded-full bg-[#002B5B] text-white flex items-center justify-center font-bold text-sm mb-6 shadow-sm">
                        4
                    </div>
                    <h3 class="text-xs font-bold tracking-widest text-gray-900 uppercase mb-3">
                        NOTIFICATION
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                        Receive a high-res gallery of results before collection.
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-layouts.app>