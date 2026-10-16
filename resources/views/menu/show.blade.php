@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
    
    <!-- Breadcrumb -->
    <nav class="mb-8 flex items-center gap-2 text-sm text-stone-500">
        <a href="{{ route('home') }}" class="hover:text-amber-700">الرئيسية</a>
        <span>/</span>
        <a href="{{ route('menu.index') }}" class="hover:text-amber-700">القائمة</a>
        <span>/</span>
        <span class="text-coffee-dark font-bold">{{ $product->name }}</span>
    </nav>

    <div class="grid items-center gap-12 lg:grid-cols-2">
        <!-- Product Image Showcase -->
        <div class="relative overflow-hidden rounded-3xl border border-coffee-latte/40 bg-stone-100 shadow-xl">
            <img class="h-[480px] w-full object-cover transition-transform duration-700 hover:scale-105"
                 src="{{ $product->image_url }}"
                 alt="{{ $product->name }}">
            
            @if($product->is_featured)
                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-500/90 px-4 py-1.5 text-xs font-bold text-white shadow-lg backdrop-blur-md">
                        <span>✨</span>
                        <span>مشروب مميز • Signature</span>
                    </span>
                </div>
            @endif
        </div>

        <!-- Details & Order Form -->
        <div class="flex flex-col justify-center">
            @if($product->category)
                <span class="text-xs font-bold tracking-widest text-amber-700 uppercase">
                    {{ $product->category->name }}
                </span>
            @endif

            <h1 class="mt-2 text-3xl sm:text-4xl lg:text-5xl font-black text-coffee-dark">
                {{ $product->name }}
            </h1>

            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl sm:text-4xl font-black text-coffee-dark">
                    {{ number_format((float)$product->price, 2) }}
                </span>
                <span class="text-sm font-bold text-stone-500">ريال سعودي</span>
            </div>

            <p class="mt-6 text-base leading-relaxed text-stone-600">
                {{ $product->description }}
            </p>

            <!-- Specialty Badges -->
            <div class="mt-6 grid grid-cols-3 gap-3 border-y border-stone-200 py-4 text-center">
                <div class="p-2">
                    <span class="block text-lg">🌱</span>
                    <span class="block text-xs font-semibold text-stone-600 mt-1">محصول مختص 100%</span>
                </div>
                <div class="p-2 border-x border-stone-200">
                    <span class="block text-lg">⚖️</span>
                    <span class="block text-xs font-semibold text-stone-600 mt-1">تحضير متقن</span>
                </div>
                <div class="p-2">
                    <span class="block text-lg">☕</span>
                    <span class="block text-xs font-semibold text-stone-600 mt-1">تحميص طازج</span>
                </div>
            </div>

            <!-- Add to Cart Form -->
            <form class="mt-8 flex flex-wrap items-end gap-4" method="POST" action="{{ route('cart.store') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                <div>
                    <label class="block text-xs font-bold text-stone-600 mb-1.5">الكمية</label>
                    <input class="block w-24 rounded-xl border border-stone-300 px-3 py-3 text-center font-bold text-coffee-dark focus:border-amber-500 focus:ring-amber-500"
                           type="number"
                           name="quantity"
                           value="1"
                           min="1"
                           max="20">
                </div>

                <button type="submit"
                        class="flex-1 inline-flex items-center justify-center gap-2 rounded-xl bg-coffee-dark px-8 py-3.5 font-bold text-amber-100 shadow-lg transition-all hover:bg-coffee-mocha hover:scale-[1.02] active:scale-95">
                    <span>🛒</span>
                    <span>إضافة إلى سلة المشتريات</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection