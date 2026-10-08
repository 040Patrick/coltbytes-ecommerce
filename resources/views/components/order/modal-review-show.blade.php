@props(['order'])
<div x-data="{ open : false }">

    @can('store', $order) 
        <div> 
            <button type="button" @click="open = true" class="cursor-pointer rounded-xl p-2 text-center font-bold text-black"> You haven't reviewed this product yet. 
                <span class="text-orange-600 transition-transform duration-200 hover:scale-110 hover:underline">Do you want to review it?</span> 
            </button> 
        </div> 
    @endcan 
    

    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-5">
        <div class="w-full max-w-3xl max-h-[90vh] overflow-y-auto rounded-2xl bg-gray-950 p-5">
            @foreach($order->orderItems as $item)
                <form action="{{ route('review.store', $item->product_id) }}" method="post" class="space-y-5 p-5 bg-gray-900 rounded-xl border border-gray-700">
                    <h1 class="text-gray-200 text-2xl p-2 font-bold text-center">
                        Tell us what you think of your order
                    </h1>

                    <!-- Fields -->
                    <div class="flex flex-col gap-5">
                        <!-- Rating -->
                        <div x-data="{ current: 0 }">
                            @error('rating')
                                <div class="text-center font-bold text-red-600">{{ $message }}</div>
                             @enderror  
                            <label for="comment" class="text-gray-200 font-bold">Rate:</label>
                            <input name="rating" type="number" value="3">
                        </div>

                        <!-- Comment -->
                        <div class="flex w-full flex-col gap-5">
                            @error('comment')
                                <div class="text-center font-bold text-red-600">{{ $message }}</div>
                            @enderror   

                            <label for="comment" class="text-gray-200 font-bold">Comment:</label>
                            <textarea name="comment" id="comment" maxnlength="500" rows="5" class="w-full resize-none rounded-xl border border-gray-700 bg-gray-950 p-3 text-gray-200 outline-none focus:border-amber-400""></textarea>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3">
                        <button type="submit" @click="open = true" class="w-full bg-amber-400 text-black text-center font-bold rounded-xl p-2 hover:bg-amber-300">
                            Review
                        </button>

                        <button type="button" @click="open = false" class="w-1/3 bg-gray-950 hover:bg-gray-900 text-gray-200 text-center border border-gray-700 font-bold rounded-xl p-2">
                            Close
                        </button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</div>