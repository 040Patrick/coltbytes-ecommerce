@props(['order'])
<div x-data="{ open: false }">

    <!-- Review Store --> 
    <x-order.modal-review-store :order="$order" />

    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4" @click.self="open = false" @keydown.escape.window="open = false">
        <div class="w-full max-w-xl overflow-y-auto rounded-2xl border border-gray-800 bg-gray-950 p-6 shadow-xl">

            <div class="mb-6 flex items-center justify-between border-b border-gray-800 pb-4">
                <h2 class="text-2xl font-bold text-white">
                    Rate your order
                </h2>

                <button type="button" @click="open = false" class="text-2xl text-gray-400 transition hover:text-white">&times;</button>
            </div>

            @foreach($order->orderItems as $item)
                <form action="{{ route('review.store', [$order->id, $item->product_id]) }}" method="post" class="space-y-5">
                    @csrf

                    <!-- Rating --> 
                    <div x-data="{ rating : 0}" class="flex flex-col gap-2">
                        <div class="flex justify-center gap-2">
                            <template x-for="star in 5" :key="star">
                                <button type="button" @click="rating = star" class="font-bold text-5xl transition-colors durations-700" :class="star <= rating ? 'text-amber-400' : 'text-gray-200'">
                                    ★
                                </button>
                            </template>

                        </div>
                            <input type="hidden" name="rating" :value="rating">
                            <p class="text-center text-gray-200 font-bold">You rated: <span x-text="rating"></span> / 5</p>
                        @error('rating')
                            <p class="text-center text-red-500 font-bold pt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Comment -->
                    <div class="space-y-2">
                        <label for="comment-{{ $item->product_id }}" class="font-semibold text-gray-200">Comment <span class="text-gray-500">(optional)</span></label>
                        <textarea name="comment" id="comment-{{ $item->product_id }}" maxlength="500" rows="4" placeholder="Write your review..." class="w-full resize-none rounded-xl border border-gray-700 bg-gray-900 p-3 text-gray-200 outline-none focus:border-amber-400"></textarea>
                        @error('comment')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3 border-t border-gray-800 pt-4">
                        <button type="submit" class="flex-1 rounded-xl bg-amber-400 px-4 py-2 font-bold text-black transition hover:bg-amber-300">
                            Send review
                        </button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</div>