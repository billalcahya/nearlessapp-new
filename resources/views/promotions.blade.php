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

    <div class="max-w-6xl mx-auto px-4 py-12 font-sans">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($promos as $promo)
            <div class="bg-blue-50/50 rounded-2xl border border-blue-100 p-6 flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow">

                <div>
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-[10px] md:text-xs font-black bg-blue-950 text-white px-3 py-1 rounded-full uppercase tracking-wider">
                            @if($promo->type === 'bundle') EDUCATION
                            @elseif($promo->type === 'partnership_bonus') FREE GIFT
                            @else LOYALTY @endif
                        </span>

                        <div class="text-blue-950">
                            @if($promo->type === 'bundle')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            </svg>
                            @elseif($promo->type === 'partnership_bonus')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            @endif
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-blue-950 mb-1">{{ $promo->name }}</h3>

                    <div class="text-3xl md:text-4xl font-black text-blue-950 mb-4 tracking-tight">
                        @if($promo->type === 'bundle' && $promo->package_price)
                        Rp {{ number_format($promo->package_price, 0, ',', '.') }}
                        @elseif($promo->type === 'partnership_bonus')
                        {{ $promo->bonus_item_name }}
                        @else
                        15% OFF
                        @endif
                    </div>

                    <p class="text-sm text-slate-500 leading-relaxed mb-6">
                        {{ $promo->description }}
                    </p>
                </div>

                <div>
                    <div class="border-t border-blue-100/70 my-4"></div>

                    <div class="flex items-center space-x-2 text-xs text-slate-500 mb-5">
                        <svg class="w-4 h-4 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>
                            @if($promo->end_date)
                            Valid until: {{ $promo->end_date->format('d M Y') }}
                            @else
                            Ongoing Campaign
                            @endif
                        </span>
                    </div>

                    <a href="{{ route('services.index', ['promo' => $promo->slug]) }}" class="w-full bg-blue-950 hover:bg-blue-900 text-white font-bold text-sm py-3 px-4 rounded-xl flex justify-center items-center gap-2 transition-colors shadow-sm">
                        Claim Promo <span>→</span>
                    </a>
                </div>

            </div>
            @endforeach

        </div>
    </div>
    <div class="max-w-6xl mx-auto px-4 py-12 font-sans">
        <div class="bg-slate-100 rounded-2xl overflow-hidden shadow-sm grid grid-cols-1 lg:grid-cols-2 items-center">

            <div class="p-8 md:p-12 space-y-6">
                <h2 class="text-2xl md:text-3xl font-bold text-blue-950">
                    Meticulous Care for Every Pair
                </h2>

                <p class="text-sm md:text-base text-slate-500 leading-relaxed">
                    Our technicians use laboratory-grade cleaning agents and surgical precision to restore your footwear to factory condition. Subscribe to our newsletter for early access to drops and exclusive digital coupons.
                </p>

                <form action="#" method="POST" class="flex flex-col sm:flex-row items-center gap-4">
                    @csrf
                    <div class="w-full sm:flex-1">
                        <input
                            type="email"
                            name="email"
                            placeholder="Enter your email"
                            required
                            class="w-full px-4 py-3 bg-white text-slate-700 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-950 text-sm md:text-base">
                    </div>
                    <button
                        type="submit"
                        class="w-full sm:w-auto px-6 py-3 bg-blue-950 text-white font-bold text-sm md:text-base rounded-xl hover:bg-blue-900 transition-colors shrink-0 whitespace-nowrap">
                        Join Lab Access
                    </button>
                </form>
            </div>

            <div class="h-full min-h-[250px] lg:min-h-[380px] relative">
                <img
                    src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    
                    alt="Meticulous shoe care process"
                    class="w-full h-full object-cover">
            </div>

        </div>
    </div>
    <x-footer></x-footer>
</body>

</html>