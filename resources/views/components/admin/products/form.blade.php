@props(['title', 'button', 'product' => null])

    <div class="mb-8 border-b border-gray-800 pb-5">
        <h2 class="text-2xl font-bold text-white">{{ $title }}</h2>
        <div class="mt-3 h-1 w-16 rounded-full bg-amber-400"></div>
    </div>
    <!-- Form -->
    <div class="space-y-6">
        <!-- Name -->
        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-gray-200">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name', $product?->name) }}" placeholder="Product name" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-4 py-3 text-white placeholder-gray-500 outline-none transition focus:border-amber-400 focus:ring-1 focus:ring-amber-400 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Slug -->
        <div>
            <label for="slug" class="mb-2 block text-sm font-semibold text-gray-200">Slug</label>
            <p class="mb-2 text-xs text-gray-500">The slug is a unique identifier for the product.</p>
            <input id="slug" type="text" name="slug" value="{{ old('slug', $product?->slug) }}" placeholder="product-slug" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-4 py-3 text-white placeholder-gray-500 outline-none transition focus:border-amber-400 focus:ring-1 focus:ring-amber-400 @error('slug') border-red-500 @enderror">
            @error('slug')
                <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="mb-2 block text-sm font-semibold text-gray-200">Description</label>
            <textarea id="description" name="description" rows="5" placeholder="Product description" class="w-full resize-y rounded-lg border border-gray-700 bg-gray-900 px-4 py-3 text-white placeholder-gray-500 outline-none transition focus:border-amber-400 focus:ring-1 focus:ring-amber-400 @error('description') border-red-500 @enderror">{{ old('description', $product?->description) }}</textarea>
            @error('description')
                <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="mb-2 block text-sm font-semibold text-gray-200">Price</label>
            <input id="price" type="number" name="price" value="{{ old('price', $product?->price) }}" placeholder="0.00" min="0" step="0.01" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-4 py-3 text-white placeholder-gray-500 outline-none transition focus:border-amber-400 focus:ring-1 focus:ring-amber-400 @error('price') border-red-500 @enderror">
            @error('price')
                <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stock -->
        <div>
            <label for="stock" class="mb-2 block text-sm font-semibold text-gray-200">Stock</label>
            <input id="stock" type="number" name="stock" value="{{ old('stock', $product?->stock) }}" placeholder="0" min="0" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-4 py-3 text-white placeholder-gray-500 outline-none transition focus:border-amber-400 focus:ring-1 focus:ring-amber-400 @error('stock') border-red-500 @enderror">
            @error('stock')
                <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-amber-400 hover:bg-amber-300 text-black mb-2 text-center font-bold p-3 rounded"> 
            {{ $button }}
        </button>
    </div>