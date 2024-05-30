<x-app-layout>
    <x-slot name="header">
        <section class="container mx-auto lg:px-24 md:px-10 px-4 py-5">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight">Update User</h2>
        </section>
        <div class="container mx-auto mt-8 lg:px-24 md:px-10 px-4 py-5">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                class="gap-10 bg-white p-6 rounded shadow-md grid grid-cols-2 grid-rows-1">
                @csrf
                @method('PUT')
                <div>
                    <div class="mb-4">
                        <label for="name" class="block text-black text-xl font-bold">Nama</label>
                        <input type="text" id="name" name="name"
                            class="w-full border-gray-300 rounded mt-2 text-base" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-black text-xl font-bold">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full border-gray-300 rounded mt-2 text-base" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-black text-xl font-bold">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full border-gray-300 rounded mt-2 text-base">
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex gap-5">
                        <a href="{{ route('admin.user.index') }}" class="bg-white text-blue-500 px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <label for="nomor_telepon" class="block text-black text-xl font-bold">Nomor Telepon</label>
                        <input type="text" id="nomor_telepon" name="nomor_telepon"
                            class="w-full border-gray-300 rounded mt-2 text-base" value="{{ old('nomor_telepon', $user->nomor_telepon) }}">
                        @error('nomor_telepon')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
