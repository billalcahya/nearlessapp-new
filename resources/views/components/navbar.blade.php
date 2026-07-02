<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="#" class="h-7" alt="">
        <span class="self-center text-xl text-gray-900 font-bold whitespace-nowrap">NEARLESS</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 box-border border border-transparent focus:ring-4 focus:ring-blue-300 shadow-xs font-medium leading-5 rounded-lg text-sm px-3 py-2 focus:outline-none">Order Now</button>
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/></svg>
        </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
        <li>
          <a href="{{ route('services.index') }}" 
             class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('services.*') ? 'text-blue-700 font-semibold' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700' }}">
             Services
          </a>
        </li>
        <li>
          <a href="{{ route('pricing.index') }}" 
             class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('pricing.index') ? 'text-blue-700 font-semibold' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700' }}">
             Pricing
          </a>
        </li>
        <li>
          <a href="{{ route('promotions.index') }}" 
             class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('promotions.index') ? 'text-blue-700 font-semibold' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700' }}">
             Promotions
          </a>
        </li>
        <li>
          <a href="{{ route('collaborations.index') }}" 
             class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('collaborations.index') ? 'text-blue-700 font-semibold' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700' }}">
             Collaborations
          </a>
        </li>
        <li>
          <a href="/droppoint" 
             class="block py-2 px-3 rounded md:p-0 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700">
             Drop Point
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>