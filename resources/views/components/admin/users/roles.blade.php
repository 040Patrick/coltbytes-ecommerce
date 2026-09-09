@props(['user', 'roles'])

<div x-data="{ status: false }"> 
    <!-- Header --> 
    <div class="flex items-center"> <p class="px-10"> <strong class="text-black">Roles:</strong> </p>
        <button type="button" @click="status = true" class="rounded p-1 hover:bg-amber-100">
            <x-icons.dropdown />
        </button>
    </div>

    <!-- Modal -->
    <div x-show="status" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 px-4">

        <div class="w-full max-w-md rounded-xl border border-gray-200 bg-white p-6 shadow-2xl">

            <!-- Title -->
            <div class="mb-6 text-center">
                <p class="text-2xl font-bold text-black">
                    Manage Roles
                </p>

                <p class="mt-1 text-sm font-bold text-gray-500">
                    <span class="text-amber-500">Roles of</span>
                    {{ $user->fullName }}
                </p>
            </div>

            <form action="{{ route('admin.users.update', $user) }}" method="post">
                @csrf
                @method('patch')

                <!-- Roles -->
                <div class="space-y-3">
                    @foreach($roles as $role)
                        <label for="role-{{ $user->id }}-{{ $role->id }}" class="flex cursor-pointer items-center justify-between rounded-lg border border-gray-200 px-4 py-3 transition hover:border-amber-400 hover:bg-amber-50">
                            <span class="font-bold capitalize text-gray-800">
                                {{ $role->slug }}
                            </span>

                            <input type="checkbox" id="role-{{ $user->id }}-{{ $role->id }}" name="roles[]" value="{{ $role->id }}" class="h-5 w-5 rounded border-gray-300 text-amber-500 focus:ring-amber-400" @checked($user->roles->contains($role->id))>
                        </label>
                    @endforeach
                </div>

                <!-- Actions -->
                <div class="mt-6 flex gap-3">
                    <button type="submit" class="flex-1 rounded-lg bg-amber-400 px-4 py-2.5 font-bold text-black transition hover:bg-amber-300">
                        Update
                    </button>

                    <button type="button" @click="status = false" class="flex-1 rounded-lg bg-red-500 px-4 py-2.5 font-bold text-black transition hover:bg-red-400">
                        Close
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>