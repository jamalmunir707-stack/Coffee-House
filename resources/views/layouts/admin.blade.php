<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - @yield('title', 'إدارة الكافيه')</title>

    <!-- خط كايرو -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS عبر CDN الرسمي -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Cairo', 'sans-serif'],
                    },
                    colors: {
                        coffee: {
                            50: '#faf6f0',
                            100: '#f4ebd9',
                            200: '#e8d5b5',
                            300: '#d9ba8b',
                            400: '#c99a61',
                            500: '#b87d3b',
                            600: '#9b622e',
                            700: '#7c4c26',
                            800: '#643d23',
                            900: '#4e301d',
                        }
                    }
                }
            }
        }
    </script>

    <!-- الأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>
<body class="bg-stone-100 text-stone-800 min-h-screen flex">

    <!-- القائمة الجانبية (Sidebar) -->
    <aside class="w-64 bg-stone-900 text-stone-200 flex flex-col justify-between shrink-0 min-h-screen shadow-xl">
        <div>
            <div class="h-20 flex items-center gap-3 px-6 border-b border-stone-800">
                <span class="w-10 h-10 rounded-xl bg-amber-600 flex items-center justify-center text-white font-bold text-xl shadow">☕</span>
                <span class="font-bold text-lg text-amber-500">إدارة الكافيه</span>
            </div>
            
            <nav class="p-4 space-y-1.5 font-medium text-sm">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-amber-600 text-white shadow' : 'hover:bg-stone-800 text-stone-400 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie text-base w-5"></i>
                    <span>لوحة التحكم</span>
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.products.*') ? 'bg-amber-600 text-white shadow' : 'hover:bg-stone-800 text-stone-400 hover:text-white' }}">
                    <i class="fa-solid fa-mug-hot text-base w-5"></i>
                    <span>المنتجات</span>
                </a>
                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.categories.*') ? 'bg-amber-600 text-white shadow' : 'hover:bg-stone-800 text-stone-400 hover:text-white' }}">
                    <i class="fa-solid fa-tags text-base w-5"></i>
                    <span>التصنيفات</span>
                </a>
                <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.orders.*') ? 'bg-amber-600 text-white shadow' : 'hover:bg-stone-800 text-stone-400 hover:text-white' }}">
                    <i class="fa-solid fa-bag-shopping text-base w-5"></i>
                    <span>الطلبات</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-stone-800 space-y-2">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-stone-800 text-stone-400 hover:text-amber-400 transition text-sm">
                <i class="fa-solid fa-arrow-up-right-from-square w-5"></i>
                <span>عرض المتجر</span>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-red-950/40 text-red-400 hover:text-red-300 transition text-sm">
                    <i class="fa-solid fa-arrow-right-from-bracket w-5"></i>
                    <span>تسجيل الخروج</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- المحتوى الرئيسي -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- شريط علوي -->
        <header class="h-20 bg-white border-b border-stone-200 flex items-center justify-between px-8 shadow-sm">
            <h1 class="text-xl font-bold text-stone-800">@yield('heading', 'نظرة عامة')</h1>
            <div class="flex items-center gap-3">
                <span class="text-xs bg-amber-100 text-amber-800 font-bold px-3 py-1 rounded-full border border-amber-200">المدير</span>
            </div>
        </header>

        <!-- جسم الصفحة -->
        <main class="p-8 flex-1 overflow-y-auto">
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>