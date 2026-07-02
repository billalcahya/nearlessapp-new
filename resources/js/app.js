//
import 'flowbite';

// Import Swiper bundle (yang menyertakan semua modul seperti Navigation dan Pagination secara default)
import Swiper from 'swiper/bundle';

// Import CSS Swiper Bundle
import 'swiper/css/bundle';

// Daftarkan Swiper secara global di window agar bisa diakses dari file Blade mana saja
window.Swiper = Swiper;

import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'

// Daftarkan plugin collapse ke Alpine sebelum memulai
Alpine.plugin(collapse)

window.Alpine = Alpine

// Mulai jalankan Alpine
Alpine.start()