@props(['categories' => null, 'product'])

<div x-data="{ addCategory: false }">
    <!-- Add Category Button -->
    <button type="button" @click="addCategory = true" x-show="!addCategory" class="w-full rounded-xl bg-amber-400 px-8 py-3 font-bold text-black transition hover:bg-amber-300">
        + Category
    </button>

    <!-- Category Form -->
    <div x-show="addCategory" x-cloak class="mt-5 w-full rounded-2xl border border-gray-700 p-6 shadow-lg">
        <div class="flex gap-8">

            <!-- Add Category -->
            <div class="w-1/2">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-white">Add Category</h2>
                    <div class="mt-2 h-1 w-12 rounded-full bg-amber-400"></div>
                </div>

                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <!-- Name -->
                    <div class="flex flex-col gap-2">
                        <label for="name" class="font-bold text-gray-200">Name</label>
                        <input id="name" type="text" name="name" placeholder="Category name" class="rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400">
                    </div>

                    <!-- Slug -->
                    <div class="mt-4 flex flex-col gap-2">
                        <label for="slug" class="font-bold text-gray-200">Slug</label>
                        <input id="slug" type="text" name="slug" placeholder="Category slug" class="rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400">
                    </div>

                    <button type="submit" class="mt-6 w-full rounded-xl bg-amber-400 px-5 py-3 font-bold text-black transition hover:bg-amber-300">
                        Create
                    </button>
                </form>
            </div>

            <!-- Sync Category -->
            <div class="w-1/2">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-white">Sync Category</h2>
                    <div class="mt-2 h-1 w-12 rounded-full bg-amber-400"></div>
                </div>

                <form action="{{ route('products.categories.sync', $product) }}" method="post">
                    @csrf

                    @foreach($categories as $category)
                        <div class="flex flex-col gap-2">
                            <label for="categories" class="font-bold text-gray-200">{{ $category->name }}</label>
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400"
                            @checked($product->categories->contains($category->id))>
                        </div>
                    @endforeach
                    
                    <button type="submit" class="mt-6 w-full rounded-xl bg-amber-400 px-5 py-3 font-bold text-black transition hover:bg-amber-300">
                        Assign to Product
                    </button>
                </form>
            </div>
        </div>

        <button type="button" @click="addCategory = false" class="w-full rounded-xl bg-red-500 mt-6 px-8 py-3 font-bold text-black transition hover:bg-amber-400">
            Close
        </button>
    </div>
</div>
