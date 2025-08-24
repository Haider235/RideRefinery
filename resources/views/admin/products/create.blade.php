<x-app-layout>
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Add Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border px-3 py-2 rounded">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Product Type --}}
        <div class="mb-4">
            <label class="block mb-1">Product Type</label>
            <select name="product_type" class="w-full border px-3 py-2 rounded">
                <option value="product" {{ old('product_type','product') === 'product' ? 'selected' : '' }}>Product</option>
                <option value="spare_part" {{ old('product_type') === 'spare_part' ? 'selected' : '' }}>Spare Part</option>
            </select>
            @error('product_type') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Category</label>
            <select name="category_id" class="w-full border px-3 py-2 rounded">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Brand</label>
            <select name="brand_id" class="w-full border px-3 py-2 rounded">
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            @error('brand_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Price</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}" class="w-full border px-3 py-2 rounded">
            @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Stock</label>
            <input type="number" name="stock" value="{{ old('stock') }}" class="w-full border px-3 py-2 rounded">
            @error('stock') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded">
                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Image</label>
            <input type="file" name="image">
            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('admin.products.index') }}" class="ml-2 text-gray-700">Cancel</a>
    </form>
</div>
</x-app-layout>
