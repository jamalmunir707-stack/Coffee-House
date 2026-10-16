@extends('layouts.admin')

@section('title', 'بيانات المنتج')
@section('heading', $product->exists ? 'تعديل منتج' : 'إضافة منتج جديد')

@section('content')
<form method="POST"
      enctype="multipart/form-data"
      action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}"
      class="max-w-3xl space-y-6 rounded-2xl bg-white p-8 shadow-sm border border-stone-200">
    @csrf
    @if($product->exists)
        @method('PUT')
    @endif

    <!-- Product Name -->
    <div>
        <label class="mb-2 block font-bold text-coffee-dark" for="name">اسم المنتج</label>
        <input class="w-full rounded-xl border-stone-300 focus:border-amber-500 focus:ring-amber-500"
               id="name"
               name="name"
               required
               placeholder="مثال: سبانش لاتيه فاخر"
               value="{{ old('name', $product->name) }}">
    </div>

    <!-- Category -->
    <div>
        <label class="mb-2 block font-bold text-coffee-dark" for="category_id">التصنيف</label>
        <select class="w-full rounded-xl border-stone-300 focus:border-amber-500 focus:ring-amber-500"
                id="category_id"
                name="category_id"
                required>
            <option value="">اختر تصنيفًا</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}" @selected(old('category_id', $product->category_id) == $c->id)>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Description -->
    <div>
        <label class="mb-2 block font-bold text-coffee-dark" for="description">وصف المنتج ومكوناته</label>
        <textarea class="w-full rounded-xl border-stone-300 focus:border-amber-500 focus:ring-amber-500 rows-3"
                  id="description"
                  name="description"
                  placeholder="مزيج ساحر من الإسبريسو والحليب المكثف...">{{ old('description', $product->description) }}</textarea>
    </div>

    <!-- Prices -->
    <div class="grid gap-6 sm:grid-cols-2">
        <div>
            <label for="price" class="mb-2 block font-bold text-coffee-dark">سعر البيع (ر.س)</label>
            <input class="w-full rounded-xl border-stone-300 focus:border-amber-500 focus:ring-amber-500"
                   id="price"
                   type="number"
                   min="0"
                   step=".01"
                   name="price"
                   required
                   value="{{ old('price', $product->price) }}">
        </div>
        <div>
            <label for="cost_price" class="mb-2 block font-bold text-coffee-dark">سعر التكلفة (ر.س)</label>
            <input class="w-full rounded-xl border-stone-300 focus:border-amber-500 focus:ring-amber-500"
                   id="cost_price"
                   type="number"
                   min="0"
                   step=".01"
                   name="cost_price"
                   value="{{ old('cost_price', $product->cost_price) }}">
        </div>
    </div>

    <!-- Image Upload & Preview -->
    <div>
        <label for="image" class="mb-2 block font-bold text-coffee-dark">صورة المنتج</label>
        
        @if($product->image)
            <div class="mb-4 flex items-center gap-4 rounded-xl border border-stone-200 bg-stone-50 p-3">
                <img class="h-20 w-20 rounded-xl object-cover shadow-sm border border-stone-300"
                     src="{{ $product->image_url }}"
                     alt="{{ $product->name }}">
                <div>
                    <span class="block text-xs font-bold text-stone-700">الصورة الحالية للمنتج</span>
                    <span class="block text-xs text-stone-500 font-mono mt-0.5">{{ $product->image }}</span>
                    <span class="block text-[11px] text-amber-700 mt-1">اختر ملفاً جديداً لاستبدالها</span>
                </div>
            </div>
        @endif

        <input id="image"
               type="file"
               name="image"
               accept="image/*"
               class="block w-full text-sm text-stone-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-coffee-dark file:text-amber-200 hover:file:bg-coffee-mocha">
    </div>

    <!-- Checkboxes -->
    <div class="flex flex-wrap gap-6 pt-2 border-t border-stone-200">
        <label class="flex items-center gap-2 text-sm font-semibold text-coffee-dark cursor-pointer">
            <input type="checkbox"
                   name="is_available"
                   value="1"
                   class="rounded text-coffee-dark focus:ring-amber-500"
                   @checked(old('is_available', $product->exists ? $product->is_available : true))>
            <span>متاح للطلب</span>
        </label>

        <label class="flex items-center gap-2 text-sm font-semibold text-coffee-dark cursor-pointer">
            <input type="checkbox"
                   name="is_featured"
                   value="1"
                   class="rounded text-amber-600 focus:ring-amber-500"
                   @checked(old('is_featured', $product->is_featured) > 0)>
            <span>عرض كمنتج مميز في الصفحة الرئيسية (✨ Featured)</span>
        </label>
    </div>

    <!-- Submit buttons -->
    <div class="flex items-center gap-4 pt-4 border-t border-stone-200">
        <button type="submit"
                class="rounded-xl bg-coffee-dark px-7 py-3 text-sm font-bold text-amber-100 shadow-md transition-all hover:bg-coffee-mocha hover:scale-105 active:scale-95">
            {{ $product->exists ? 'تحديث بيانات المنتج' : 'حفظ المنتج الجديد' }}
        </button>
        <a class="text-sm font-semibold text-stone-500 hover:text-stone-800"
           href="{{ route('admin.products.index') }}">
            إلغاء
        </a>
    </div>
</form>
@endsection