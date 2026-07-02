<x-layouts.app>
    <x-slot name="title">Collaborations</x-slot>

    <div class="py-12 md:py-20 w-full text-left">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-[#002B5B] leading-tight mb-6">
                Kolaborasi Bersama Brand Terpercaya
            </h1>

            <p class="text-gray-600 text-lg md:text-xl leading-relaxed mb-10 max-w-3xl">
                Kami telah bekerja sama dengan berbagai brand ternama untuk memberikan layanan restorasi terbaik bagi koleksi Anda melalui standarisasi klinis dan teknis yang presisi.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="#" class="bg-[#002B5B] text-white font-medium px-8 py-3.5 rounded-lg border border-[#002B5B] hover:bg-[#001f42] transition duration-200">
                    Ajukan Kolaborasi
                </a>
                <a href="#" class="bg-white text-[#002B5B] font-medium px-8 py-3.5 rounded-lg border-2 border-[#002B5B] hover:bg-slate-50 transition duration-200">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <div class="bg-slate-50 py-16 w-full text-center font-sans">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-[#002B5B] mb-12">
                Partner Resmi Kami
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach($partnerships as $partner)
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 flex flex-col items-center justify-between min-h-[320px]">

                    <div class="flex-1 flex items-center justify-center mb-6">
                        <img src="{{ asset('storage/' . $partner->logo_path) }}"
                            alt="{{ $partner->brand_name }} Logo"
                            class="max-h-16 object-contain">
                    </div>

                    <div class="w-full">
                        <h3 class="text-xl font-bold text-[#002B5B] mb-1">
                            {{ $partner->brand_name }}
                        </h3>

                        <p class="text-xs font-semibold text-slate-400 tracking-widest uppercase mb-4">
                            {{ $partner->drop_point_name ?? 'Official Partner' }}
                        </p>

                        @if($partner->collaboration_type)
                        <span class="inline-block bg-[#E8F0FE] text-[#1A73E8] text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider">
                            {{ $partner->collaboration_type }}
                        </span>
                        @endif
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="py-16 w-full font-sans">
        <div class="max-w-7xl mx-auto px-4 md:px-8">

            @if(isset($featured_partnership))
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 grid grid-cols-1 md:grid-cols-2">

                <div class="relative h-64 md:h-auto min-h-[350px]">
                    <img src="{{ asset('storage/' . $featured_partnership->logo_path) }}"
                        alt="{{ $featured_partnership->brand_name }}"
                        class="absolute inset-0 w-full h-full object-cover">
                </div>

                <div class="p-8 md:p-12 lg:p-16 flex flex-col justify-center text-left">
                    <span class="text-xs font-bold text-[#002B5B] tracking-widest uppercase mb-3 block">
                        {{ $featured_partnership->collaboration_type ?? 'Featured Partnership' }}
                    </span>

                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-[#002B5B] leading-tight mb-6">
                        SoleFresh x {{ $featured_partnership->brand_name }}: The Union of Precision
                    </h2>

                    <p class="text-gray-500 text-sm md:text-base leading-relaxed mb-6">
                        {{ $featured_partnership->reason_for_partnership }}
                    </p>

                    @if($featured_partnership->project_outcome)
                    <ul class="space-y-3 mb-8 text-sm md:text-base text-gray-700 font-medium">
                        {{-- Memecah string berdasarkan koma (,) menjadi array agar otomatis jadi list --}}
                        @foreach(explode(',', $featured_partnership->project_outcome) as $outcome)
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#002B5B] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ trim($outcome) }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    <div>
                        <a href="{{ $featured_partnership->website_url ?? '#' }}"
                            target="_blank"
                            class="inline-block bg-[#002B5B] text-white font-medium px-8 py-3 rounded-xl border border-[#002B5B] hover:bg-[#001f42] transition duration-200 text-sm md:text-base">
                            Lihat Detail
                        </a>
                    </div>
                </div>

            </div>
            @else
            <p class="text-center text-slate-400">Belum ada partnership utama yang ditampilkan.</p>
            @endif

        </div>
    </div>

    <div class="bg-slate-50 py-20 w-full font-sans text-center">
        <div class="max-w-7xl mx-auto px-4 md:px-8">

            <h2 class="text-3xl md:text-4xl font-bold text-[#002B5B] mb-3">
                Langkah Menuju Kesuksesesan
            </h2>
            <p class="text-gray-500 text-sm md:text-base mb-16 max-w-2xl mx-auto">
                Bagaimana kami membangun hubungan strategis yang berkelanjutan
            </p>

            <div class="relative max-w-4xl mx-auto">

                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 top-0 bottom-0 w-0.5 bg-slate-300"></div>

                <div class="space-y-12 md:space-y-0 relative">

                    <div class="flex flex-col md:flex-row items-center md:mb-16">
                        <div class="w-full md:w-1/2 md:pr-12 text-center md:text-right order-2 md:order-1">
                            <h3 class="text-lg font-bold text-[#002B5B] mb-1">Initial Meeting</h3>
                            <p class="text-gray-500 text-sm leading-relaxed max-w-md mx-auto md:ml-auto md:mr-0">
                                Diskusi awal mengenai keselarasan visi dan identifikasi peluang kolaborasi strategis.
                            </p>
                        </div>
                        <div class="z-10 order-1 md:order-2 my-4 md:my-0 flex items-center justify-center w-8 h-8 rounded-full bg-white border-4 border-[#002B5B]">
                            <div class="w-2 h-2 rounded-full bg-[#002B5B]"></div>
                        </div>
                        <div class="hidden md:block w-full md:w-1/2 order-3"></div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center md:mb-16">
                        <div class="hidden md:block w-full md:w-1/2"></div>
                        <div class="z-10 my-4 md:my-0 flex items-center justify-center w-8 h-8 rounded-full bg-white border-4 border-[#002B5B]">
                            <div class="w-2 h-2 rounded-full bg-[#002B5B]"></div>
                        </div>
                        <div class="w-full md:w-1/2 md:pl-12 text-center md:text-left">
                            <h3 class="text-lg font-bold text-[#002B5B] mb-1">Strategic Agreement</h3>
                            <p class="text-gray-500 text-sm leading-relaxed max-w-md mx-auto md:mr-auto md:ml-0">
                                Finalisasi detail operasional, standar kualitas, dan penandatanganan nota kesepahaman.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center md:mb-16">
                        <div class="w-full md:w-1/2 md:pr-12 text-center md:text-right order-2 md:order-1">
                            <h3 class="text-lg font-bold text-[#002B5B] mb-1">Launch Event</h3>
                            <p class="text-gray-500 text-sm leading-relaxed max-w-md mx-auto md:ml-auto md:mr-0">
                                Peluncuran kampanye kolaborasi secara publik melalui aktivasi brand dan media sosial.
                            </p>
                        </div>
                        <div class="z-10 order-1 md:order-2 my-4 md:my-0 flex items-center justify-center w-8 h-8 rounded-full bg-white border-4 border-[#002B5B]">
                            <div class="w-2 h-2 rounded-full bg-[#002B5B]"></div>
                        </div>
                        <div class="hidden md:block w-full md:w-1/2 order-3"></div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center">
                        <div class="hidden md:block w-full md:w-1/2"></div>
                        <div class="z-10 my-4 md:my-0 flex items-center justify-center w-8 h-8 rounded-full bg-[#002B5B]">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        <div class="w-full md:w-1/2 md:pl-12 text-center md:text-left">
                            <h3 class="text-lg font-bold text-[#002B5B] mb-1">Current Results</h3>
                            <p class="text-gray-500 text-sm leading-relaxed max-w-md mx-auto md:mr-auto md:ml-0">
                                Evaluasi berkelanjutan dan optimalisasi layanan untuk kepuasan pelanggan bersama.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class=" py-16 w-full font-sans text-left">
        <div class="max-w-7xl mx-auto px-4 md:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 flex flex-col min-h-[250px]">
                    <div class="text-[#002B5B] mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Kualitas Layanan Prima</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Standar operasional prosedur yang telah teruji dan tersertifikasi internasional.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 flex flex-col min-h-[250px]">
                    <div class="text-[#002B5B] mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.6 9h16.8M3.6 15h16.8M12 3a15.3 15.3 0 014.5 9 15.3 15.3 0 01-4.5 9 15.3 15.3 0 01-4.5-9 15.3 15.3 0 014.5-9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Jangkauan Luas</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Akses ke jaringan distribusi dan basis pelanggan yang solid di seluruh penjuru negeri.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 flex flex-col min-h-[250px]">
                    <div class="text-[#002B5B] mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.5 8.518a7 7 0 00-3.518-3.518M9.5 14.518l-2.5 2.5m1.5-6.5l-3 3M21 3l-6 6m0 0V6m0 3h3M4.318 19.682a4.5 4.5 0 01-1.242-2.524 4.5 4.5 0 011.242-2.525l2.525-2.525 5.05 5.05-2.525 2.525a4.5 4.5 0 01-5.05 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Inovasi Bersama</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Kolaborasi teknis untuk menghadirkan solusi perawatan sepatu masa depan.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 flex flex-col min-h-[250px]">
                    <div class="text-[#002B5B] mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Program Eksklusif</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Penawaran khusus dan akses prioritas bagi pelanggan brand partner.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-[#002B5B] py-16 md:py-20 w-full font-sans text-center text-white px-4 md:px-8">
        <div class="max-w-4xl mx-auto flex flex-col items-center">

            <div class="text-white/20 mb-6">
                <svg class="w-14 h-14 fill-current" viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.748-9.762 9-10.361l.412.814c-3.24 1.279-4.162 4.079-4.215 5.938h5.811v11h-11zm-14 0v-7.391c0-5.704 3.748-9.762 9-10.361l.412.814c-3.24 1.279-4.162 4.079-4.215 5.938h5.811v11h-11z" />
                </svg>
            </div>

            <p class="text-lg md:text-xl font-medium italic max-w-3xl leading-relaxed mb-8 text-slate-100">
                "Bekerja sama dengan SoleFresh Labs telah meningkatkan standar kepuasan pelanggan kami. Layanan restorasi mereka adalah pelengkap sempurna bagi produk high-performance kami."
            </p>

            <div>
                <h4 class="text-base md:text-lg font-bold tracking-wide">
                    Marcus Vander
                </h4>
                <p class="text-xs md:text-sm text-slate-300/80 mt-1">
                    Director of Operations, Apex Athletics
                </p>
            </div>

        </div>
    </div>

    <div class="py-16 md:py-24 w-full font-sans px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="bg-[#002B5B] rounded-[32px] px-6 py-16 md:py-20 text-center text-white shadow-lg flex flex-col items-center justify-center">

                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 tracking-tight">
                    Mari Bangun Kolaborasi Bersama
                </h2>

                <p class="text-slate-200 text-sm md:text-base max-w-2xl leading-relaxed mb-10 opacity-90">
                    Jadilah bagian dari revolusi perawatan footwear modern. Mari bicarakan bagaimana visi brand Anda dapat bersinergi dengan keahlian teknis kami.
                </p>

                <div>
                    <a href="#" class="inline-block bg-white text-[#002B5B] font-semibold px-8 py-3.5 rounded-xl hover:bg-slate-100 transition duration-200 shadow-sm text-sm md:text-base">
                        Ajukan Kerja Sama
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>