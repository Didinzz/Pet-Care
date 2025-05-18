<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Hewan Sehat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
        }

        .hero-pattern {
            background-color: #e0f2fe;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2394d3a2' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .star {
            cursor: pointer;
            transition: transform 0.2s, color 0.2s;
        }

        .star:hover {
            transform: scale(1.2);
        }

        .star.selected {
            color: #f59e0b;
        }

        .paw-icon {
            display: inline-block;
            margin-right: 0.5rem;
        }

        .btn-primary {
            background-color: #60a5fa;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3b82f6;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .section-heading::after {
            content: "";
            display: block;
            width: 60px;
            height: 3px;
            background-color: #94d3a2;
            margin: 0.5rem auto 1.5rem;
        }

        .category-heading {
            position: relative;
            padding-left: 2rem;
        }

        .category-heading::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1.5rem;
            height: 1.5rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2360a5fa'%3E%3Cpath d='M8.5,13.5c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S9.6,13.5,8.5,13.5z M15.5,13.5c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S16.6,13.5,15.5,13.5z M12,6c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S13.1,6,12,6z M18.5,9c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S19.6,9,18.5,9z M5.5,9c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S6.6,9,5.5,9z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-size: contain;
        }

        .rating-question {
            border-left: 3px solid #94d3a2;
            padding-left: 1rem;
            margin-bottom: 1.5rem;
        }

        .rating-question:last-child {
            margin-bottom: 0;
        }

        .category-container {
            background-color: #ffffff;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-top: 4px solid #60a5fa;
        }

        .category-container:nth-child(even) {
            border-top-color: #94d3a2;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.2);
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4b5563;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .required-field::after {
            content: "*";
            color: #ef4444;
            margin-left: 0.25rem;
        }

        .pet-type-option {
            display: inline-flex;
            align-items: center;
            margin-right: 1rem;
            margin-bottom: 0.5rem;
            cursor: pointer;
        }

        .pet-type-option input {
            margin-right: 0.5rem;
        }

        @media (max-width: 640px) {
            .rating-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .stars-container {
                margin-top: 0.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <x-landing.partials.navbar />

    @yield('content')

    <x-landing.partials.footer />

    <script src="{{ asset('landing/landing.js') }}"></script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'94180baa60869d24',t:'MTc0NzUzNjYxMS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
</body>

</html>
