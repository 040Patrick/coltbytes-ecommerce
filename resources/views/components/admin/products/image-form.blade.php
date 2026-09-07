@props(['product'])

<div x-data="{current: 0,total: {{ $product->images->count() }}}" class="w-full max-w-2xl mx-auto space-y-6">
    <!-- Image Preview -->
    <div class="relative overflow-hidden rounded-xl bg-gray-900 shadow-lg">
        @forelse($product->images as $index => $image)
            <div x-show="current === {{ $index }}" x-transition class="relative flex aspect-video items-center justify-center">
                <img src="{{ Illuminate\Support\Facades\Storage::url($image->image) }}" alt="Imagem do produto" class="h-full w-full object-contain">
            </div>
        @empty
            <div class="flex aspect-video items-center justify-center text-gray-400">No imagens registered yet.</div>
        @endforelse

        @if($product->images->count() > 1)
            <!-- Previous -->
            <button type="button" @click="current = current === 0 ? total - 1 : current - 1" class="absolute left-3 top-1/2 z-20 -translate-y-1/2 rounded-full bg-black/60 px-4 py-3 text-xl font-bold text-white transition hover:bg-black/80">‹</button>

            <!-- Next -->
            <button type="button" @click="current = current === total - 1 ? 0 : current + 1" class="absolute right-3 top-1/2 z-20 -translate-y-1/2 rounded-full bg-black/60 px-4 py-3 text-xl font-bold text-white transition hover:bg-black/80">›</button>

            <!-- Counter -->
            <div class="absolute bottom-3 left-1/2 z-20 -translate-x-1/2 rounded-full bg-black/70 px-4 py-1 text-sm font-semibold text-white">
                <span x-text="current + 1"></span> / <span x-text="total"></span>
            </div>
        @endif
    </div>

    <!-- Upload -->
    <div class="rounded-xl bg-white p-6 shadow-lg">
        <label for="images-{{ $product->id }}" class="mb-3 block text-lg font-bold text-gray-800">Add Image</label>
        <input id="images-{{ $product->id }}" type="file" name="images[]" multiple accept="image/*" class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-amber-400 file:px-4 file:py-2 file:font-bold file:text-black hover:file:bg-amber-300">
        <p class="mt-2 text-sm text-gray-500">Product can have up to 10 images.</p>
    </div>

    @error('images')
        <p class="mt-2 text-center font-bold text-red-500">{{ $message }}</p>
    @enderror

    @error('images.*')
        <p class="mt-2 text-center font-bold text-red-500">{{ $message }}</p>
    @enderror

    <!-- Submit -->
    <button type="submit" class="w-full rounded-lg bg-amber-400 px-5 py-3 font-bold text-black shadow transition hover:bg-amber-300 hover:shadow-lg">Enviar</button>
</div>