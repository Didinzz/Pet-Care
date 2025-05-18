<header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <svg class="w-10 h-10 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M8.5,13.5c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S9.6,13.5,8.5,13.5z M15.5,13.5c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2
                    S16.6,13.5,15.5,13.5z M12,6c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S13.1,6,12,6z M18.5,9c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2
                    S19.6,9,18.5,9z M5.5,9c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S6.6,9,5.5,9z M12,22c-0.6,0-1.1-0.3-1.5-0.7l-3.7-3.7
                    c-1.4-1.4-2.2-3.3-2.2-5.3c0-4.1,3.4-7.5,7.5-7.5s7.5,3.4,7.5,7.5c0,2-0.8,3.9-2.2,5.3l-3.7,3.7C13.1,21.7,12.6,22,12,22z" />
                </svg>
                <h1 class="ml-2 text-xl font-bold text-gray-800">Klinik Hewan Sehat</h1>
            </div>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#heroSection" class="text-blue-500 hover:text-blue-700">Beranda</a></li>
                    <li><a href="#layanan" class="text-gray-600 hover:text-blue-700">Layanan</a></li>
                    <li><a href="#feedback" class="text-gray-600 hover:text-blue-700">Umpan Balik</a></li>
                    <li><a href="#testimoni" class="text-gray-600 hover:text-blue-700">Testimoni</a></li>
                    <li><a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-700">{{ auth()->check() ? 'Dashboard' : 'Login' }}</a></li>

                </ul>
            </nav>
        </div>
    </header>