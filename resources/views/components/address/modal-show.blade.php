@props(['addresses', 'countries'])

@foreach($addresses as $address)
    <div class="flex bg-white rounded-xl mt-5">
        
        <div class="bg-gray-900 p-5 rounded-xl flex-1 min-w-0 flex flex-col justify-cemn text-black font-bold border border-gray-700">
            <p class="text-2xl text-gray-300 font-bold" >{{ $address->street }} - {{ $address->number}}</p>
            <p class="text-2xl text-gray-300 font-bold" >{{ $address->neighborhood }}</p>
            <p class="text-2xl text-gray-300 font-bold" >{{ $address->city }} - {{ $address->state}}</p>
            <p class="text-2xl text-gray-300 font-bold" >{{ $address->postal_code }}</p>

            <!-- Edit dropdown --> 
            <div class=" flex flex-col gap-3 p-5 mt-5">
                <x-address.modal-edit :countries="$countries" :address="$address" title="Edit address"/>
                <x-address.modal-delete :address="$address"/>
            </div>
        </div>
    </div>
@endforeach