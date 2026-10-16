@extends('layouts.admin')

@section('title', 'المنتجات')
@section('heading', 'إدارة المنتجات')

@section('content')
<div class="mb-5 flex flex-wrap items-center justify-between gap-4">
    <p class="text-sm text-stone-600">إدارة وعرض قائمة منتجات ومشروبات المقهى المختصة.</p>
    <a class="inline-flex items-center gap-2 rounded-xl bg-coffee-dark px-4 py-2.5 text-sm font-bold text-amber-200 shadow-md transition-all hover:bg-coffee-mocha hover:scale-105"
       href="{{ route('admin.products.create') }}">
        <span>+</span>
        <span>إضافة منتج جديد</span>
    </a>
</div>

<div class="overflow-x-auto rounded-2xl bg-white shadow-sm border border-stone-200">
    <table class="w-full text-right text-sm">
        <thead class="bg-coffee-cream/80 text-coffee-dark border-b border-stone-200">
            <tr>
                <th class="p-4 w-20">الصورة</th>
                <th class="p-4">المنتج</th>
                <th class="p-4">التصنيف</th>
                <th class="p-4">السعر</th>
                <th class="p-4">مميز</th>
                <th class="p-4">الحالة</th>
                <th class="p-4">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-stone-100">
            @forelse($products as $p)
                <tr class="hover:bg-amber-50/40 transition-colors">
                    <td class="p-4">
                        <img class="h-14 w-14 rounded-xl object-cover border border-stone-200 shadow-sm"
                             src="{{ $p->image_url }}"
                             alt="{{ $p->name }}">
                    </td>
                    <td class="p-4">
                        <span class="block font-bold text-coffee-dark">{{ $p->name }}</span>
                        <span class="block text-xs text-stone-400 font-mono">{{ $p->slug }}</span>
                    </td>
                    <td class="p-4">
                        <span class="rounded-lg bg-stone-100 px-2.5 py-1 text-xs font-semibold text-stone-700">
                            {{ $p->category?->name ?? 'غير محدد' }}
                        </span>
                    </td>
                    <td class="p-4 font-black text-coffee-dark">
                        {{ number_format((float)$p->price, 2) }} ر.س
                    </td>
                    <td class="p-4">
                        @if($p->is_featured)
                            <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-bold text-amber-800">
                                <span>✨</span>
                                <span>نعم</span>
                            </span>
                        @else
                            <span class="text-xs text-stone-400">لا</span>
                        @endif
                    </td>
                    <td class="p-4">
                        @if($p->is_available)
                            <span class="inline-flex rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-bold text-green-800">
                                متاح
                            </span>
                        @else
                            <span class="inline-flex rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-bold text-red-800">
                                غير متاح
                            </span>
                        @endif
                    </td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <a class="rounded-lg border border-stone-200 px-3 py-1.5 text-xs font-bold text-coffee-dark hover:bg-stone-50"
                               href="{{ route('admin.products.edit', $p) }}">
                                تعديل
                            </a>
                            <form method="POST" action="{{ route('admin.products.destroy', $p) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-red-600 hover:text-red-800">
                                    حذف
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-8 text-center text-stone-500">
                        لا توجد منتجات مسجلة حتى الآن.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $products->links() }}
</div>
@endsection