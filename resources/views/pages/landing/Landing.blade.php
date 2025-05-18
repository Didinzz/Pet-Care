@extends('layout.app')

@section('content')
<!-- Hero Section -->
    <x-landing.partials.heroSection />

    <!-- Services Section -->
    <x-landing.partials.serviceSection />

    <!-- Feedback Section -->
    <section id="feedback" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 section-heading">Umpan Balik Anda</h2>
            <p class="text-center text-gray-600 mb-8 max-w-2xl mx-auto">Bantu kami meningkatkan layanan dengan
                memberikan penilaian dan saran Anda. Pendapat Anda sangat berarti bagi kami!</p>

            <div class="max-w-4xl mx-auto">
                <form id="feedback-form" class="space-y-8">
                    <!-- Identitas Pemilik & Hewan -->
                    <x-landing.cardFeedback.identitas />

                    <!-- Layanan Category -->
                   <x-landing.cardFeedback.layanan />

                    <!-- Fasilitas Category -->
                    <x-landing.cardFeedback.fasilitas />

                    <!-- Pengalaman Pengguna Category -->
                   <x-landing.cardFeedback.pengalaman />

                    <!-- Additional Comments -->
                    <x-landing.cardFeedback.komentar />
                </form>

                <!-- Feedback Confirmation (hidden by default) -->
                <div id="feedback-confirmation"
                    class="hidden mt-6 p-6 bg-green-50 border border-green-200 rounded-lg text-center">
                    <div class="flex flex-col items-center">
                        <svg class="w-16 h-16 text-green-500 mb-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-green-800 mb-2">Terima Kasih!</h3>
                        <p class="text-green-700">Umpan balik Anda telah berhasil dikirim. Kami sangat menghargai
                            masukan Anda untuk meningkatkan layanan kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
   <x-landing.partials.testimonials /> 
@endsection