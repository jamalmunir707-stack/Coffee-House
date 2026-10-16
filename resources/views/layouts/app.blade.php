<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'كوفي هاوس') | Zero Gravity Coffee House</title>

    <!-- Google Fonts: Cairo (Arabic luxury) & Plus Jakarta Sans (English clean modern) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Official Tailwind CSS CDN (Strictly Zero Node/npm Build Steps) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'coffee-dark': '#2B1A13',
                        'coffee-espresso': '#180E09',
                        'coffee-mocha': '#6F4129',
                        'coffee-latte': '#D4B89B',
                        'coffee-cream': '#FBF8F3',
                        'coffee-amber': '#D97706',
                        'coffee-gold': '#F59E0B',
                        'coffee-glow': '#FDE68A',
                    },
                    fontFamily: {
                        sans: ['Cairo', 'Plus Jakarta Sans', 'system-ui', 'sans-serif'],
                        arabic: ['Cairo', 'sans-serif'],
                        latin: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Cairo', 'Plus Jakarta Sans', system-ui, sans-serif;
            background-color: #FBF8F3;
            color: #2B1A13;
        }
    </style>
</head>
<body class="min-h-screen bg-coffee-cream text-coffee-dark antialiased selection:bg-amber-500 selection:text-white flex flex-col justify-between">

    <!-- =====================================================================
         ANTI-GRAVITY WELCOME EXPERIENCE (SPLASH SCREEN)
         Displays on load, levitating 3D artwork, auto-dismisses after 2.5s
         or on click / ESC key. Strictly standalone without npm dependencies.
    ====================================================================== -->
    @include('partials.welcome-splash')

    <!-- =====================================================================
         SITE HEADER & NAVIGATION
    ====================================================================== -->
    <header class="sticky top-0 z-40 border-b border-coffee-latte/40 bg-coffee-cream/90 backdrop-blur-md transition-all">
        <nav class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
            
            <!-- Brand Logo -->
            <a class="group flex items-center gap-3 transition-transform hover:scale-[1.02]" href="{{ route('home') }}">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-tr from-coffee-dark to-coffee-mocha text-amber-300 shadow-md transition-shadow group-hover:shadow-amber-500/20">
                    <!-- Levitating mini coffee cup icon -->
                    <svg class="h-6 w-6 transition-transform duration-300 group-hover:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2zM17 21v-8H7v8M7 3v5h8" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8h3a2 2 0 012 2v2a2 2 0 01-2 2h-3" />
                    </svg>
                </div>
                <div>
                    <span class="block text-xl font-black leading-tight text-coffee-dark">كوفي هاوس</span>
                    <span class="block text-[10px] font-semibold tracking-widest text-coffee-mocha uppercase font-latin">ZERO GRAVITY COFFEE</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <div class="flex flex-wrap items-center gap-1 sm:gap-2 text-sm font-bold text-coffee-mocha">
                <a href="{{ route('home') }}" class="rounded-lg px-3 py-2 transition-colors hover:bg-coffee-latte/30 hover:text-coffee-dark {{ request()->routeIs('home') ? 'bg-coffee-latte/30 text-coffee-dark' : '' }}">
                    الرئيسية
                </a>
                <a href="{{ route('menu.index') }}" class="rounded-lg px-3 py-2 transition-colors hover:bg-coffee-latte/30 hover:text-coffee-dark {{ request()->routeIs('menu.*') ? 'bg-coffee-latte/30 text-coffee-dark' : '' }}">
                    القائمة
                </a>
                <a href="{{ route('about') }}" class="rounded-lg px-3 py-2 transition-colors hover:bg-coffee-latte/30 hover:text-coffee-dark {{ request()->routeIs('about') ? 'bg-coffee-latte/30 text-coffee-dark' : '' }}">
                    من نحن
                </a>
                <a href="{{ route('gallery') }}" class="rounded-lg px-3 py-2 transition-colors hover:bg-coffee-latte/30 hover:text-coffee-dark {{ request()->routeIs('gallery') ? 'bg-coffee-latte/30 text-coffee-dark' : '' }}">
                    المعرض
                </a>
                <a href="{{ route('contact') }}" class="rounded-lg px-3 py-2 transition-colors hover:bg-coffee-latte/30 hover:text-coffee-dark {{ request()->routeIs('contact') ? 'bg-coffee-latte/30 text-coffee-dark' : '' }}">
                    تواصل
                </a>
                <a href="{{ route('cart.index') }}" class="flex items-center gap-1.5 rounded-xl bg-amber-500/15 border border-amber-500/30 px-3.5 py-1.5 text-coffee-dark transition-all hover:bg-amber-500/25">
                    <span>🛒 السلة</span>
                    <span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-coffee-dark text-xs text-amber-200">
                        {{ collect(session('cart', []))->sum('quantity') }}
                    </span>
                </a>

                <!-- Interactive Trigger to Replay the Anti-Gravity Splash Screen -->
                <button type="button"
                        onclick="window.replayZeroGravitySplash && window.replayZeroGravitySplash()"
                        title="أعد مشاهدة تجربة انعدام الجاذبية"
                        class="ml-2 inline-flex items-center gap-1.5 rounded-full border border-amber-600/30 bg-coffee-dark px-3 py-1.5 text-xs font-semibold text-amber-300 shadow-sm transition-all hover:scale-105 hover:bg-coffee-mocha hover:shadow-amber-500/20 active:scale-95">
                    <span class="text-amber-400">✨</span>
                    <span class="hidden sm:inline">انعدام الجاذبية</span>
                    <span class="sm:hidden">Zero-G</span>
                </button>
            </div>
        </nav>
    </header>

    <!-- =====================================================================
         FLASH NOTIFICATIONS & ALERTS
    ====================================================================== -->
    @if(session('success'))
        <div class="mx-auto mt-4 w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-900 shadow-sm">
                <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <p class="text-sm font-semibold">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mx-auto mt-4 w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-900 shadow-sm">
                <svg class="h-5 w-5 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <p class="text-sm font-semibold">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="mx-auto mt-4 w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-red-200 bg-red-50 p-4 text-red-900 shadow-sm space-y-1">
                @foreach($errors->all() as $e)
                    <div class="flex items-center gap-2 text-sm font-semibold">
                        <span class="text-red-500">•</span>
                        <p>{{ $e }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- =====================================================================
         MAIN VIEW CONTENT
    ====================================================================== -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- =====================================================================
         SITE FOOTER
    ====================================================================== -->
    <footer class="mt-20 border-t border-coffee-latte/30 bg-coffee-dark text-coffee-cream">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6 border-b border-coffee-mocha/40 pb-8 text-center md:text-right">
                <div>
                    <div class="flex items-center justify-center md:justify-start gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-500/20 text-amber-300">
                            ☕
                        </div>
                        <span class="text-2xl font-black">كوفي هاوس</span>
                        <span class="rounded bg-amber-500/20 px-2 py-0.5 text-xs text-amber-300 font-latin">ZERO GRAVITY</span>
                    </div>
                    <p class="mt-2 text-sm text-coffee-latte">
                        قهوة مختصة محضرة بعناية وحرفية تتحدى المألوف والجاذبية.
                    </p>
                </div>

                <!-- Replay Splash Button in Footer -->
                <div>
                    <button type="button"
                            onclick="window.replayZeroGravitySplash && window.replayZeroGravitySplash()"
                            class="inline-flex items-center gap-2 rounded-xl border border-amber-500/30 bg-coffee-espresso/80 px-4 py-2.5 text-xs font-semibold text-amber-300 shadow-md backdrop-blur-sm transition-all hover:border-amber-400 hover:bg-amber-950/40 hover:text-amber-200">
                        <span>✨ إعادة تشغيل شاشة الترحيب (انعدام الجاذبية)</span>
                    </button>
                </div>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-coffee-latte/80 text-center sm:text-right">
                <p>أضف عنوان الكافيه وساعات العمل الفعلية هنا.</p>
                <p class="font-latin">© {{ date('Y') }} Zero Gravity Coffee House. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>