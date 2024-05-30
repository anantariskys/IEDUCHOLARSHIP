<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
        <section class="container mx-auto lg:px-24 md:px-10 px-4 py-5">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight">{{$beasiswa->nama}}</h2>
        </section>

     <section class="container mx-auto lg:px-24 md:px-10 px-4 py-5 flex flex-col gap-5 ">
        <div class="flex-end w-fit ms-auto">MULAI : <span class="text-green-400">{{\Carbon\Carbon::parse($beasiswa->mulai_tanggal)->translatedFormat('d F Y')}}</span> | <span class="text-red-500">DEADLINE {{\Carbon\Carbon::parse($beasiswa->deadline_tanggal)->translatedFormat('d F Y')}}</span> </div>
        <div class="bg-[#8ECAE6] p-5">
            <h1 class="text-3xl font-bold">Syarat dan Ketentuan </h1>
            <p class="p-5 text-base">{{$beasiswa->syarat_ketentuan}}</p>

        </div>

     </section>

       
    </x-slot>
</x-app-layout>