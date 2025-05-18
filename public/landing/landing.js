document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const submitButton = document.getElementById('submit-feedback');
    const feedbackForm = document.getElementById('feedback-form');
    const feedbackConfirmation = document.getElementById('feedback-confirmation');

    // Add click event to all stars
    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = parseInt(this.getAttribute('data-rating'));
            const question = this.getAttribute('data-question');

            // Update hidden input value
            document.getElementById(`${question}-rating`).value = rating;

            // Update star appearance
            const questionStars = document.querySelectorAll(
                `.star[data-question="${question}"]`);
            questionStars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.add('selected');
                } else {
                    s.classList.remove('selected');
                }
            });

            // Announce to screen readers
            const questionLabel = document.getElementById(`${question}-label`).textContent;
            const announcement =
                `${rating} bintang dipilih untuk pertanyaan: ${questionLabel}`;
            announceToScreenReader(announcement);
        });

        // Add keyboard support
        star.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                const nextStar = this.nextElementSibling;
                if (nextStar) nextStar.focus();
            } else if (e.key === 'ArrowLeft') {
                e.preventDefault();
                const prevStar = this.previousElementSibling;
                if (prevStar && prevStar.classList.contains('star')) prevStar.focus();
            }
        });
    });

    // Function to announce messages to screen readers
    function announceToScreenReader(message) {
        let announcer = document.getElementById('sr-announcer');
        if (!announcer) {
            announcer = document.createElement('div');
            announcer.id = 'sr-announcer';
            announcer.setAttribute('aria-live', 'polite');
            announcer.classList.add('sr-only');
            document.body.appendChild(announcer);
        }
        announcer.textContent = message;
    }

    // Submit button functionality
    submitButton.addEventListener('click', function () {
        // Basic form validation
        const requiredFields = document.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value) {
                isValid = false;
                field.classList.add('border-red-500');
            } else {
                field.classList.remove('border-red-500');
            }
        });

        if (!isValid) {
            announceToScreenReader('Mohon lengkapi semua kolom yang wajib diisi.');
            return;
        }

        // Kumpulkan inputan rating langsung sebagai field terpisah
        const ratings = {};
        for (let i = 1; i <= 12; i++) {
            ratings[`q${i}_rating`] = document.getElementById(`q${i}-rating`).value;
        }

        // Informasi tambahan
        const payload = {
            name: document.getElementById('owner-name').value,
            contact: document.getElementById('contact').value,
            visit_date: document.getElementById('visit-date').value,
            comments: document.getElementById('comments').value,
            ...ratings
        };

        console.log("Payload yang dikirim:", payload); // debug frontend

        // Get CSRF token if using Laravel
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        // Send data to server via fetch API - perbaikan headers
        fetch('/api/feedback', {  // Gunakan path relatif alih-alih URL lengkap
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,  // Tambahkan CSRF token jika ada
                'X-Requested-With': 'XMLHttpRequest'  // Untuk menandai ini sebagai request AJAX
            },
            body: JSON.stringify(payload)
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Feedback submitted successfully:', data);

                // Hide form and show confirmation
                feedbackForm.classList.add('hidden');
                feedbackConfirmation.classList.remove('hidden');

                // Announce submission to screen readers
                announceToScreenReader('Umpan balik Anda telah berhasil dikirim. Terima kasih!');

                // Scroll to confirmation message
                feedbackConfirmation.scrollIntoView({
                    behavior: 'smooth'
                });
            })
            .catch(error => {
                announceToScreenReader('Terjadi kesalahan saat mengirim umpan balik. Silakan coba lagi.');
                console.error('Error submitting feedback:', error);
            });
    });
});