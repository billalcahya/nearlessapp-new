<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body>
    
<x-navbar />

<section class="relative h-screen w-full flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?q=80&w=2000&auto=format&fit=crop');">
    
    <div class="absolute inset-0 bg-slate-800/70"></div>

    <div class="relative z-10 text-center px-4 max-w-3xl mx-auto flex flex-col items-center mt-12">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 tracking-tight">
            Revitalize Your Sneakers
        </h1>
        
        <p class="text-base md:text-lg text-gray-200 mb-8 leading-relaxed max-w-2xl">
            Meticulous cleaning and premium restoration for your most valued footwear.<br class="hidden md:block">
            Experience the laboratory-grade care your sneakers deserve.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
            <a href="#" class="w-full sm:w-auto flex items-center justify-center gap-2 bg-[#0A2E5C] hover:bg-[#072247] text-white font-semibold py-3 px-6 rounded-md transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                Order via WhatsApp
            </a>

            <a href="#" class="w-full sm:w-auto bg-white/20 hover:bg-white/30 backdrop-blur-md border border-white/10 text-white font-semibold py-3 px-6 rounded-md transition-all duration-300 shadow-sm">
                Explore Services
            </a>
        </div>
    </div>
</section>

<section class="py-16 px-4 max-w-6xl mx-auto font-sans ">
    
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-[#0a2540]">Meticulous Service Tiers</h2>
        <div class="w-16 h-1 bg-[#0a2540] mx-auto mt-4"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
        
        <div class="flex flex-col gap-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex gap-6">
                <div class="bg-gray-100 p-4 rounded-md h-fit">
                    <svg class="w-6 h-6 text-[#0a2540]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-[#0a2540] mb-2">Deep Clean</h3>
                    <p class="text-gray-500 text-sm mb-4 leading-relaxed">Our signature service. We treat every stitch, eyelet, and mesh panel with specialized solutions tailored to the material.</p>
                    <p class="text-[#0a2540] font-bold">Starts from Rp 80.000</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex gap-6">
                <div class="bg-gray-100 p-4 rounded-md h-fit">
                    <svg class="w-6 h-6 text-[#0a2540]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-[#0a2540] mb-2">Un-yellowing</h3>
                    <p class="text-gray-500 text-sm mb-4 leading-relaxed">Restore oxidized soles to their original factory white using our proprietary UV-activated chemical treatment.</p>
                    <p class="text-[#0a2540] font-bold">Starts from Rp 120.000</p>
                </div>
            </div>
        </div>

        <div class="border border-[#0a2540] rounded-lg overflow-hidden bg-white shadow-sm">
            <div class="bg-[#e0eaff] py-6 px-8 text-center flex flex-col items-center">
                <span class="bg-[#0a2540] text-white text-[10px] font-bold px-3 py-1 rounded-full mb-3 tracking-wider">BEST VALUE</span>
                <h3 class="text-xl font-bold text-[#0a2540]">Bundle Promotions</h3>
            </div>
            
            <div class="px-8 py-6">
                <ul class="flex flex-col text-sm font-medium">
                    <li class="flex justify-between items-center py-4 border-b border-gray-100">
                        <span class="text-gray-800">3 Pairs Deep Clean</span>
                        <span class="text-[#0a2540] font-bold">Rp 210.000</span>
                    </li>
                    <li class="flex justify-between items-center py-4 border-b border-gray-100">
                        <span class="text-gray-800">5 Pairs Deep Clean</span>
                        <span class="text-[#0a2540] font-bold">Rp 325.000</span>
                    </li>
                    <li class="flex justify-between items-center py-4 border-b border-gray-100">
                        <span class="text-gray-800">Sole & Midsole Paint</span>
                        <span class="text-[#0a2540] font-bold">Rp 150.000</span>
                    </li>
                    <li class="flex justify-between items-center py-4">
                        <span class="text-gray-800">Leather Restoration</span>
                        <span class="text-[#0a2540] font-bold">Rp 200.000</span>
                    </li>
                </ul>

                <div class="mt-6 text-center">
                    <p class="text-gray-500 text-xs italic mb-6">*All bundles include free pick-up within 5km of our lab.</p>
                    <button class="w-full border border-[#0a2540] text-[#0a2540] font-bold py-3 rounded-md hover:bg-[#0a2540] hover:text-white transition-colors duration-300">
                        Order Bundle Service
                    </button>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="bg-[#f4f5f7] py-16 px-4 font-sans">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-bold text-[#0a2540] text-center mb-10">Current Flash Promos</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="relative bg-[#eaf2fb] border border-[#d1e3f8] p-6 rounded-lg overflow-hidden">
                <svg class="absolute top-0 right-0 w-32 h-32 text-[#d1e3f8] opacity-60 -mt-6 -mr-6 transform rotate-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 7.5h.008v.008H6V7.5z"></path>
                </svg>

                <div class="relative z-10">
                    <h3 class="text-xl font-bold text-[#0a2540] mb-3">Student Discount</h3>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed min-h-[60px]">
                        Show your valid student ID and get 15% OFF for all basic cleaning services every Tuesday.
                    </p>
                    <button class="text-[#0a2540] text-sm font-bold flex items-center gap-1 hover:text-blue-700 transition">
                        View Details 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                </div>
            </div>

            <div class="relative bg-[#eaf2fb] border border-[#d1e3f8] p-6 rounded-lg overflow-hidden">
                <svg class="absolute top-0 right-0 w-32 h-32 text-[#d1e3f8] opacity-60 -mt-6 -mr-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"></path>
                </svg>

                <div class="relative z-10">
                    <h3 class="text-xl font-bold text-[#0a2540] mb-3">Weekend Special</h3>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed min-h-[60px]">
                        Drop off on Saturday and get a FREE sneaker perfume and water-repellent spray treatment.
                    </p>
                    <button class="text-[#0a2540] text-sm font-bold flex items-center gap-1 hover:text-blue-700 transition">
                        View Details 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                </div>
            </div>

            <div class="relative bg-[#eaf2fb] border border-[#d1e3f8] p-6 rounded-lg overflow-hidden">
                <svg class="absolute top-0 right-0 w-32 h-32 text-[#d1e3f8] opacity-60 -mt-4 -mr-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                </svg>

                <div class="relative z-10">
                    <h3 class="text-xl font-bold text-[#0a2540] mb-3">Refer-a-Friend</h3>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed min-h-[60px]">
                        Both you and your friend get Rp 25.000 credit for your next professional clean.
                    </p>
                    <button class="text-[#0a2540] text-sm font-bold flex items-center gap-1 hover:text-blue-700 transition">
                        View Details 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>