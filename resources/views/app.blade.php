<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Listings</title>
    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white; /* Semi-transparent background */
            z-index: 9999;
        }
    </style>
    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body class="font-medium text-slate-700 font-mono dark:text-slate-500 bg-slate-50 dark:bg-slate-900">
<div id="preloader" class="preloader">
    <!-- Preloader HTML code -->
    Loading...
</div>
@inertia
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const preloader = document.getElementById('preloader');

        // Show the preloader on page refresh
        window.addEventListener('beforeunload', function () {
            preloader.style.display = 'flex';
            document.body.style.overflow = 'hidden'; // Disable scrolling
            // Disable interaction with other elements
            const interactiveElements = document.querySelectorAll('a, button, input, select, textarea');
            interactiveElements.forEach(function (element) {
                element.setAttribute('disabled', 'disabled');
            });
        });

        // Hide the preloader after the page has finished loading
        window.addEventListener('load', function () {
            preloader.style.display = 'none';
            document.body.style.overflow = ''; // Restore scrolling
            // Restore interaction with other elements
            const interactiveElements = document.querySelectorAll('a, button, input, select, textarea');
            interactiveElements.forEach(function (element) {
                element.removeAttribute('disabled');
            });
        });
    });
</script>
</body>
</html>
