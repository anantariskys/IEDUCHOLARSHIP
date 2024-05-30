<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
        <section class="container mx-auto lg:px-24 md:px-10 px-4 py-5">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight">Daftar Beasiswa</h2>
        </section>

        {{-- Button Group --}}
        <section class="container mx-auto lg:px-24 md:px-10 px-4 py-5 flex justify-center gap-5">
            <button class="px-3 py-2 rounded w-fit text-xl font-semibold bg-[#8ECAE6]">DATA TERSIMPAN</button>
            <a href="{{ route('admin.beasiswa.create') }}" class="px-3 py-2 rounded w-fit text-xl font-semibold bg-[#8ECAE6]">+ TAMBAHKAN BEASISWA</a>
        </section>
        

        {{-- Container untuk list beasiswa --}}
        <main class="container mx-auto lg:px-24 md:px-10 px-4">
            @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif
            <div class="overflow-x-auto">
                <table class="table w-full border border-neutral-900">
                    <thead class="bg-[#8ECAE6] text-2xl border-b border-neutral-900">
                        <tr>
                            <th class="border-r border-neutral-900">No</th>
                            <th class="border-r border-neutral-900">Nama Beasiswa</th>
                            <th class="border-r border-neutral-900">Gambar</th>
                            <th class="border-r border-neutral-900">Tipe</th>
                            <th class="border-r border-neutral-900">Jenjang</th>
                            <th class="border-r border-neutral-900">Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beasiswas as $i)
                            <tr class="hover:bg-neutral-50 ease-in-out duration-200 border-b border-neutral-900">
                                <th class="border-r border-neutral-900">{{ $loop->iteration }}</th>
                                <td class="border-r border-neutral-900 px-1">{{ $i->nama }}</td>
                                <td class="border-r border-neutral-900 py-1">
                                    <img src="{{asset('storage/'.$i->gambar)}}" alt="{{ $i->nama }}" class="aspect-square w-20  mx-auto object-contain">
                                </td>
                                
                             
                                <td class="border-r py-1 border-neutral-900">
                                    <p>{{ $i->tipe->nama }}</p>
                                </td>
                                <td class="border-r py-1 border-neutral-900">
                                    <p>{{ $i->jenjang->nama }}</p>

                                </td>
                                <td class="border-r py-1 border-neutral-900">
                                    <div class="flex justify-center">
                                        <a href="{{ route('admin.beasiswa.edit', $i->id) }}" class="px-1 py-2 text-neutral-50 rounded w-fit mx-auto bg-[#0077B6]">+ Update</a>
                                    </div>
                                </td>
                                <td class="py-1">
                                    <div class="flex justify-center">
                                        <form action="{{ route('admin.beasiswa.destroy', $i->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-1 py-2 text-neutral-50 rounded w-fit mx-auto bg-[#0077B6]">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </x-slot>
</x-app-layout>