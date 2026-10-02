<div x-data="{ openFilter : false, filter : {field: 'slug', operator: 'eq', value: ''} }">

    <!--  Product Filters -->
    <button type="button" @click="openFilter = true" class="w-full rounded-xl bg-amber-400 mb-10 py-3 mt-3 font-bold text-black transition hover:bg-amber-300 w-full max-w-xl ">
        Filters
    </button>

    <!-- Modal -->
    <div x-show="openFilter" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950/70">

        <form method="get" class="min-w-100 min-h-75 bg-gray-950 rounded-xl p-3">
            
            <div class=" p-5">

                <div class="flex flex-col gap-5">
                    <!-- Field -->
                    <div class="flex items-center gap-5">
                        <label for="field" class="text-gray-300 font-bold text-lg text-center">Field: </label>

                        <select x-model="filter.field" class="w-full p-2 rounded-xl font-bold bg-gray-900 text-gray-200 text-center" id="field">
                            <option value="name" class="w-full p-2 text-gray-200 text-center font-bold">Name</option>
                            <option value="slug" class="w-full p-2 text-gray-200 text-center font-bold">Slug</option>
                            <option value="price" class="w-full p-2 text-gray-200 text-center font-bold">Price</option>
                            <option value="stock" class="w-full p-2 text-gray-200 text-center font-bold">Stock</option>
                        </select>
                    </div>

                    <!-- Operator --> 
                    <div class="flex items-center gap-5">
                        <label for="Operator" class="text-gray-300 font-bold text-lg text-center">Operator:</label>

                        <select x-model="filter.operator" class="w-full p-2 rounded-xl font-bold bg-gray-900 text-gray-200 text-center" id="operator">
                            <option value="gt" class="w-full p-2 text-gray-200 text-center font-bold">Bigger than</option>
                            <option value="gte" class="w-full p-2 text-gray-200 text-center font-bold">Bigger or equal </option>
                            <option value="lt" class="w-full p-2 text-gray-200 text-center font-bold">Less than</option>
                            <option value="lte" class="w-full p-2 text-gray-200 text-center font-bold">Less than or equal</option>
                            <option value="eq" class="w-full p-2 text-gray-200 text-center font-bold">Equal</option>
                            <option value="ne" class="w-full p-2 text-gray-200 text-center font-bold">Different</option>
                            <option value="in"class="w-full p-2 text-gray-200 text-center font-bold">In</option>
                        </select>
                    </div>

                    <!-- Value -->
                    <div class="flex items-center gap-5  ">
                        <label for="option" class="text-gray-300 font-bold text-lg text-center">Value:</label>

                       <input x-model="filter.value" @input="filter.value = filter.value.replace(/\s/g, '')" type="text" class="bg-gray-900 font-bold text-gray-200 p-3 w-full rounded-xl mb-5" placeholder="Name or Number value here">
                    </div>

                    <input type="hidden" :name="filter.field + '[' + filter.operator + ']'" :value="filter.value">
                </div>

                <!-- Actions -->
                <div class="flex gap-5">
                    <button type="submit" class="w-full bg-amber-400 p-3 rounded-xl font-bold text-black text-center hover:bg-amber-300">
                        Filter
                    </button>

                    <button type="button" @click="openFilter=false" class="w-full bg-red-500 p-3 rounded-xl font-bold text-black text-center hover:bg-red-400"> 
                        Close
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>