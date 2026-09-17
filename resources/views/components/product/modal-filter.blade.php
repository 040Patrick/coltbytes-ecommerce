<div x-data="{ open : false, filters : {field: '', operator: '', value: ''} }">

    <button type="button" @click="open = true" class="rounded-lg bg-blue-700 px-4 py-2 font-bold text-black hover:bg-blue-600">
        Filters
    </button>

    <div x-show="open" class="fixed left-1/2 top-1/2 z-50 w-96 -translate-x-1/2 -translate-y-1/2 bg-gray-950 p-5 rounded-2xl">

        <form method="get" class="bg-gray-950 p-5 rounded-2xl flex flex-col gap-5 justify-center">
            
            <!-- Field -->
            <div class="flex flex-col gap-2">
                <label for="field" class="font-bold text-center text-gray-300">Field</label>
                <select id="field" x-model="filters.field" class="text-white p-3 text-center outline-none bg-gray-900 border border-gray-700 w-full rounded">
                    <option value="price">Price</option>
                    <option value="stock">Stock</option>
                </select>
            </div>

            <!-- Operator -->
            <div class="flex flex-col gap-2">
                <label for="field" class="font-bold text-gray-300 text-center">Operator</label>

                <p x-text="filters.field" class="text-white"></p>
                <p x-text="filters.operator" class="text-white"></p>
                <p x-text="filters.value" class="text-white"></p>

                <select id="operator" x-model="filters.operator" class="text-white p-3 bg-gray-900 outline-non border border-gray-700 text-center w-full rounded">
                    <option value="gt">Bigger than</option>
                    <option value="gte">Bigger or equal </option>
                    <option value="lt">Lower than</option>
                    <option value="lte">Lower or equal than</option>
                    <option value="eq">Equal</option>
                    <option value="ne">Not equal</option>
                    <option value="in">In</option>
                </select>   
            </div>

            <!-- Value -->
            <div class="flex items-center gap-2 text-white">
                <p class="whitespace-nowrap">Min 0</p>
                <input x-model="filters.value" type="range" min="0" max="50000" class="flex-1"  :name="filters.operator ? filters.field + '[' + filters.operator + ']' : filters.field" :value="filters.value">
                <p class="whitespace-nowrap" x-text="filters.value"></p>
            </div>

            <!-- Action -->
            <div class="flex justify-center gap-3">
                <button type="submit" class="rounded bg-amber-400 p-2 px-5 mt-5 text-center font-bold text-black w-full hover:bg-amber-300">
                    Apply
                </button>
                
                <button type="button" @click="open = false" class="rounded bg-red-500 p-2 px-5 mt-5 text-center font-bold text-black w-full hover:bg-red-400">
                    Close
                </button>
            </div>

        </form>

    </div>
</div>