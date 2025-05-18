@extends('layout.auth')

@section('content')
    <!-- Logo and Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 text-white mb-4">
            <svg class="w-15 h-15 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M8.5,13.5c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S9.6,13.5,8.5,13.5z M15.5,13.5c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2
                        S16.6,13.5,15.5,13.5z M12,6c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S13.1,6,12,6z M18.5,9c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2
                        S19.6,9,18.5,9z M5.5,9c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S6.6,9,5.5,9z M12,22c-0.6,0-1.1-0.3-1.5-0.7l-3.7-3.7
                        c-1.4-1.4-2.2-3.3-2.2-5.3c0-4.1,3.4-7.5,7.5-7.5s7.5,3.4,7.5,7.5c0,2-0.8,3.9-2.2,5.3l-3.7,3.7C13.1,21.7,12.6,22,12,22z" />
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-800">Klinik Hewan Sehat</h1>
        <p class="text-gray-600 mt-2">Pelayanan Hewan Anda</p>
    </div>

    <!-- Login Form -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <!-- Error Alert (hidden by default) -->
        <div id="errorAlert" class="hidden error-alert mb-4 p-3 rounded-lg bg-red-50 border border-red-200">
            <div class="flex items-center">
                <svg class="h-5 w-5 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-sm text-red-600 font-medium" id="errorMessage">Invalid email or password. Please try
                    again.</p>
            </div>
        </div>

        <form id="loginForm">
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input type="email" id="email"
                    class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                    placeholder="your@email.com" required>
            </div>

            <div class="mb-6">
                <div class="flex justify-between items-center mb-2">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                </div>
                <div class="relative">
                    <input type="password" id="password"
                        class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                        placeholder="••••••••" required>
                    <button type="button" id="togglePassword"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center mb-6">
                <input type="checkbox" id="remember"
                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
            </div>

            <button type="submit"
                class="w-full bg-primary hover:bg-primary-dark text-white font-medium py-3 px-4 rounded-lg transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Sign In
            </button>
        </form>


    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form submission handler
        const loginForm = document.getElementById('loginForm');
        const errorAlert = document.getElementById('errorAlert');
        const errorMessage = document.getElementById('errorMessage');

        if (loginForm) {
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const remember = document.getElementById('remember').checked;

                // Show loading animation
                const submitButton = this.querySelector('button[type="submit"]');
                submitButton.disabled = true;
                submitButton.innerHTML =
                    '<span class="flex items-center justify-center"><svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Signing in...</span>';

                // Get CSRF token from meta tag
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                // Send login request
                fetch('/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            email: email,
                            password: password,
                            remember: remember
                        })
                    })
                    .then(response => {
                        // Check if the response is a redirect or successful (successful login)
                        if (response.redirected || response.ok) {
                            // Show success animation
                            setTimeout(() => {
                                submitButton.innerHTML =
                                    '<span class="flex items-center justify-center"><svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Success!</span>';
                                submitButton.classList.remove('bg-primary');
                                submitButton.classList.add('bg-green-600');

                                setTimeout(() => {
                                    if (response.redirected) {
                                        window.location.href = response.url;
                                    } else {
                                        // If the API returns success but not a redirect
                                        response.json().then(data => {
                                            if (data.redirect) {
                                                window.location.href = data
                                                    .redirect;
                                            } else {
                                                // Reset form if no redirect URL
                                                submitButton.disabled =
                                                    false;
                                                submitButton.innerHTML =
                                                    'Sign In';
                                                submitButton.classList
                                                    .remove('bg-green-600');
                                                submitButton.classList.add(
                                                    'bg-primary');
                                                loginForm.reset();
                                            }
                                        });
                                    }
                                }, 1500);
                            }, 1500);
                            return;
                        }

                        // If response is not OK, parse the JSON response for errors
                        return response.json().then(data => {
                            // Handle error response
                            if (data.errors) {
                                // Show error alert
                                errorAlert.classList.remove('hidden');

                                // Display the first error message
                                if (data.errors.email) {
                                    errorMessage.textContent = data.errors.email[0];
                                } else if (data.errors.password) {
                                    errorMessage.textContent = data.errors.password[0];
                                } else {
                                    errorMessage.textContent =
                                        'An error occurred during login. Please try again.';
                                }
                            }

                            // Reset button state
                            submitButton.disabled = false;
                            submitButton.innerHTML = 'Sign In';
                        });
                    })
                    .catch(error => {
                        console.error('Login error:', error);
                        errorAlert.classList.remove('hidden');
                        errorMessage.textContent =
                            'An error occurred during login. Please try again.';

                        // Reset button state
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Sign In';
                    });
            });
        }

        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Change the eye icon based on password visibility
                const eyeIcon = togglePassword.querySelector('svg');
                if (type === 'text') {
                    eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
                } else {
                    eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                `;
                }
            });
        }

        // Check for Laravel validation errors from redirected requests
        // This handles the case when the form is submitted traditionally (not via fetch)
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('errors')) {
            try {
                const errors = JSON.parse(decodeURIComponent(urlParams.get('errors')));
                if (errors && Object.keys(errors).length > 0) {
                    errorAlert.classList.remove('hidden');

                    // Display the first error message
                    const firstError = Object.values(errors)[0];
                    if (Array.isArray(firstError) && firstError.length > 0) {
                        errorMessage.textContent = firstError[0];
                    }
                }
            } catch (e) {
                console.error('Error parsing validation errors:', e);
            }

            // Reset button state in case of a redirect with errors
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            }
        }
    });
</script>
