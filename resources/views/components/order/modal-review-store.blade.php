@props(['order'])

@foreach($order->orderItems as $item)
    @can('store', $order) 
        @if(!auth()->user()->reviews()->where('product_id', $item->product_id)->where('order_id', $order->id)->exists())
            <button type="button" @click="open = true" class="group cursor-pointer rounded-xl border border-gray-200 bg-white px-4 py-3 text-left shadow-sm transition hover:border-amber-400 hover:shadow-md"> 
                <span class="block text-sm font-semibold text-gray-800">
                    You haven't reviewed this product yet.
                </span> 
                <span class="mt-1 flex items-center gap-2 text-sm font-bold text-amber-600 transition group-hover:text-amber-500">
                    Do you want to review it? 
                </span>    
            </button> 
        @else 
            <p class="group rounded-xl border border-gray-200 bg-white px-4 py-3 text-left shadow-sm transition hover:shadow-md">You have already reviewed this product.</p>
        @endif
    @endcan
@endforeach