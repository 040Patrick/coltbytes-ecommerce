<div x-data="{open : false}" >
    <button type="button" @click="open = true" class="relative rounded p-3 text-gray-200 transition duration-200 hover:bg-amber-400 hover:text-black">
        <x-icons.cart />

        @php 
            $cart = session()->get('cart', []);

            $cartCount = array_sum($cart);

            $products =  \App\Models\Product::whereIn('id', array_keys($cart))->with('images')->get();

            $subtotal = $products->sum(
                fn ($product) => $product->price * ($cart[$product->id] ?? 0)
            );
        @endphp 

        @if($cartCount > 0)     
            <span class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-amber-400 px-1 text-xs font-bold text-black ring-2 ring-gray-950">
                {{ $cartCount }}
            </span>
        @endif
    </button>

    <div x-show="open" x-cloak @click.self="open = false" @keydown.escape.window="open = false" class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4">
        <div class="flex max-h-[80vh] w-full max-w-md flex-col rounded-2xl border border-gray-800 bg-gray-950 p-5">

            <!-- Header -->
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-white">My Cart</h2>

                <button type="button" @click="open = false" class="text-xl text-gray-400 hover:text-white">
                    &times;
                </button>
            </div>

        

            <!-- Products -->
            <div class="flex-1 space-y-3 overflow-y-auto">

                @if(!empty($cart))
                    <!-- Remove all-->
                    <form action="{{ route('cart.removeAll') }}" method="post">
                        @csrf 
                        @method('DELETE')

                        <button type="submit" class="text-red-600 text-1xl font-semibold hover:text-red-400">
                            Clear Cart
                        </button>
                    </form>
                @endif

                @forelse ($products as $product)
                    <div class="flex items-center gap-3 rounded-xl bg-gray-900 p-3">

                        <!-- Image -->
                        <div class="h-16 w-16 shrink-0 overflow-hidden rounded-lg bg-gray-800">
                            @if ($product->images->isNotEmpty())
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($product->images->first()->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                            @endif
                        </div>

                        <!-- Info -->
                        <div class="min-w-0 flex-1">
                            <p class="truncate font-semibold text-white">
                                {{ $product->name }}
                            </p>

                            <p class="mt-1 text-sm text-amber-400">
                                R$ {{ number_format($product->price, 2, ',', '.') }}
                            </p>

                            <a href="{{ route('product.show', $product) }}" class="text-xs text-gray-400 hover:text-white">
                                See product
                            </a>

                            <form action="{{ route('cart.destroy', $product->id) }}" method="post" class="text-xs text-gray-400 hover:text-white">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-semibold hover:text-red-400">
                                    Remove
                                </button>
                            </form>
                            
                        </div>

                        <!-- Quantity -->
                        <div class="flex gap-1">

                            <form action="{{ route('cart.minus', $product) }}" method="post">
                                @csrf
                                <button type="submit" class="rounded-xl bg-gray-800 px-2 py-1 text-sm text-gray-200 hover:bg-gray-900">
                                    -
                                </button>
                            </form>

                            <form action="{{ route('cart.plus', $product) }}" method="post">
                                @csrf
                                <button type="submit" class="rounded-xl bg-gray-800 px-2 py-1 text-sm text-gray-200 hover:bg-gray-900">
                                    +
                                </button>
                            </form>

                            <span class="rounded-lg bg-gray-800 px-2 py-1 text-sm text-gray-200">
                                {{ $cart[$product->id ]}}x
                            </span>
                        </div>
                    </div>
                @empty
                    <p class="py-8 text-center text-sm text-gray-400">
                        Your cart is empty.
                    </p>
                @endforelse

            </div>

            <!-- Footer -->
            @if ($products->isNotEmpty())
                <div class="mt-4 border-t border-gray-800 pt-4">
                    <div class="mb-4 flex justify-between">
                        <span class="text-gray-400">Subtotal</span>

                        <span class="font-bold text-white">
                            R$ {{ number_format($subtotal, 2, ',', '.') }}
                        </span>
                    </div>

                    <a href="#" class="block rounded-xl bg-amber-400 p-3 text-center font-bold text-black transition hover:bg-amber-300">
                        Checkout
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>