<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
        <section class="container mx-auto lg:px-24 md:px-10 px-4 py-5">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight">Hello Admin !</h2>
        </section>

        {{-- Button Group
        <section class="container mx-auto lg:px-24 md:px-10 px-4 py-5 flex justify-center gap-5">
            <button class="px-3 py-2 rounded w-fit text-xl font-semibold bg-[#8ECAE6]">DATA TERSIMPAN</button>
            <a href="{{ route('admin.create') }}" class="px-3 py-2 rounded w-fit text-xl font-semibold bg-[#8ECAE6]">+ TAMBAHKAN BEASISWA</a>
        </section> --}}

       
    </x-slot>
</x-app-layout>