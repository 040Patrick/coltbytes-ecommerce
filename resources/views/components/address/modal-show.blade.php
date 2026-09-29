@props(['addresses', 'countries'])

@foreach($addresses as $address)
    <div class="flex bg-white rounded-xl mt-5">
        <div class="bg-white p-5 rounded-xl flex-1 min-w-0 flex flex-col justify-cemn text-black font-bold">
            <p class="text-2xl" >{{ $address->street }} - {{ $address->number}}</p>
            <p class="text-2xl" >{{ $address->neighborhood }}</p>
            <p class="text-2xl" >{{ $address->city }} - {{ $address->state}}</p>
            <p class="text-2xl" >{{ $address->postal_code }}</p>

                <!-- Edit dropdown --> 
                    <div class="p-5 mt-5">
                <x-address.modal-edit :countries="$countries" :address="$address" title="Edit address"/>
            </div>
        </div>
    </div>
@endforeach