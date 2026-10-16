<article class="group relative flex flex-col overflow-hidden rounded-3xl border border-coffee-latte/40 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-amber-500/30">
    
    <!-- Image Header with Hover Zoom -->
    <div class="relative h-56 w-full overflow-hidden bg-stone-100">
        <img class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
             src="{{ $product->image_url }}"
             alt="{{ $product->name }}"
             loading="lazy">
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-40 transition-opacity group-hover:opacity-20"></div>

        <!-- Badges: Featured & Price -->
        <div class="absolute top-3 right-3 flex flex-col gap-1.5 items-end">
            @if($product->is_featured)
                <span class="inline-flex items-center gap-1 rounded-full bg-amber-500/90 px-3 py-1 text-xs font-bold text-white shadow-md backdrop-blur-md">
                    <span>✨</span>
                    <span>مُميز</span>
                </span>
            @endif
        </div>

        <!-- Price Tag Floating on Image Bottom -->
        <div class="absolute bottom-3 left-3">
            <span class="inline-flex items-baseline gap-1 rounded-2xl bg-coffee-dark/85 px-3 py-1.5 text-sm font-black text-amber-200 backdrop-blur-md shadow-md border border-amber-500/20">
                <span>{{ number_format((float)$product->price, 2) }}</span>
                <span class="text-[10px] font-normal text-amber-300/80">ر.س</span>
            </span>
        </div>
    </div>

    <!-- Product Details Content -->
    <div class="flex flex-1 flex-col justify-between p-5">
        <div>
            <!-- Category Chip if available -->
            @if($product->category)
                <span class="text-[11px] font-bold tracking-wider text-amber-700 uppercase">
                    {{ $product->category->name }}
                </span>
            @endif

            <!-- Title -->
            <h2 class="mt-1 text-lg font-black text-coffee-dark line-clamp-1 group-hover:text-amber-700 transition-colors">
                <a href="{{ route('menu.show', $product) }}">
                    {{ $product->name }}
                </a>
            </h2>

            <!-- Description -->
            <p class="mt-2 text-xs leading-relaxed text-stone-500 line-clamp-2">
                {{ $product->description }}
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="mt-5 flex items-center gap-2 pt-2 border-t border-stone-100">
            <a class="flex-1 text-center rounded-xl border border-coffee-latte/60 bg-transparent px-3 py-2 text-xs font-bold text-coffee-dark transition-all hover:bg-coffee-latte/20 active:scale-95"
               href="{{ route('menu.show', $product) }}">
                التفاصيل
            </a>

            <form method="POST" action="{{ route('cart.store') }}" class="flex-1">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit"
                        class="w-full inline-flex items-center justify-center gap-1.5 rounded-xl bg-coffee-dark px-3 py-2 text-xs font-bold text-amber-100 shadow-md transition-all hover:bg-coffee-mocha hover:scale-[1.02] active:scale-95">
                    <span>🛒</span>
                    <span>أضف للسلة</span>
                </button>
            </form>
        </div>
    </div>

</article>