@props(['product'])
<!-- Tailwind and alpine made by AI -->
<div x-data="{ updateProduct: false }">
    <!-- Open modal -->
    <button type="button" @click="updateProduct = true" class="rounded-lg bg-amber-400 px-5 py-2.5 font-bold text-black transition hover:bg-amber-300">
        Update
    </button>

    <!-- Modal -->
    <div x-show="updateProduct" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-6">
        <!-- Modal container -->
        <div @click.outside="updateProduct = false" class="relative max-h-[90vh] w-full max-w-5xl overflow-y-auto rounded-2xl bg-gray-950 shadow-2xl">

            <!-- Header -->
            <div class="flex items-center justify-between border-b border-gray-800 px-8 py-5">
                <div>
                    <h2 class="text-2xl font-bold text-white">
                        Update Product
                    </h2>

                    <p class="mt-1 text-sm text-gray-400">
                        Edit your product information and images.
                    </p>
                </div>

                <button type="button" @click="updateProduct = false" class="flex h-9 w-9 items-center justify-center rounded-lg bg-gray-800 text-gray-400 transition hover:bg-red-500 hover:text-white">
                    ✕
                </button>
            </div>


            <!-- Content -->
            <div class="grid grid-cols-1 gap-8 p-8 lg:grid-cols-2">

                <!-- Product information -->
                <div class="rounded-xl border border-gray-800 bg-gray-900 p-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-white">
                            Product information
                        </h3>

                        <p class="text-sm text-gray-400">
                            Update the details of your product.
                        </p>
                    </div>

                    <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PATCH')
                        <x-admin.product.form title="Update" button="Update" :product="$product"/>
                    </form>
                </div>


                <!-- Images -->
                <div class="rounded-xl border border-gray-800 bg-gray-900 p-6">

                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-white">
                            Product images
                        </h3>

                        <p class="text-sm text-gray-400">
                            Add or remove images from your product.
                        </p>
                    </div>

                    <!-- Add image -->
                    <form action="{{ route('products.images.store', $product) }}" method="POST" enctype="multipart/form-data" class="mb-6 rounded-xl border border-dashed border-gray-700 bg-gray-950 p-5">
                        @csrf
                        <x-admin.product.image-form :product="$product"/>
                    </form>


                    <!-- Images grid -->
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                        @forelse($product->images as $image)

                            <div class="group relative overflow-hidden rounded-xl border border-gray-800 bg-gray-950">
                                <img src="{{ asset('storage/' . $image->image) }}" class="aspect-square w-full object-cover transition duration-300 group-hover:scale-105">

                                <!-- Delete -->
                                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 to-transparent p-3 pt-8">
                                    <div x-data="{ confirmDelete: false }">
                                        <x-admin.product.modal-image-delete :image="$image"/>
                                    </div>
                                </div>
                            </div>
                            
                        @empty
                            <div class="col-span-full rounded-xl border border-gray-800 bg-gray-950 p-10 text-center">
                                <div class="mb-3 text-4xl">
                                    🖼️
                                </div>

                                <p class="font-semibold text-white">
                                    No images yet
                                </p>

                                <p class="mt-1 text-sm text-gray-500">
                                    Add an image using the form above.
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-end border-t border-gray-800 px-8 py-5">
                <button type="button"  @click="updateProduct = false" class="rounded-lg bg-gray-800 px-6 py-2.5 font-bold text-white transition hover:bg-gray-700">
                    Close
                </button>
            </div>
            
        </div>
    </div>
</div>