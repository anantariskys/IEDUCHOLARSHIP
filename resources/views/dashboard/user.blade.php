<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Tambahkan form untuk filter tanggal --}}
            <form action="{{ route('dashboard.filter') }}" method="POST" class="flex items-center gap-2">
                @csrf
                <select name="bulan" class="border-gray-300 rounded mt-2 text-base px-3">
                    @foreach (range(1, 12) as $month)
                        <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}</option>
                    @endforeach
                </select>
                <select name="tahun" class="border-gray-300 rounded mt-2 text-base px-8">
                    @foreach (range(date('Y'), date('Y') + 5) as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
            </form>
        </h2>
    </x-slot>
    <div class=" w-full flex">
        <aside class="w-1/5  p-4 border-r-2 border-black">
            <h3 class="text-2xl font-semibold">Filter</h3>
            <form action="{{ route('dashboard.filter') }}" method="POST" class="mt-4 flex flex-col gap-2">
                @csrf

                <h5 class="text-base font-semibold">Jenjang</h5>
                @foreach ($jenjangs as $jenjang)
                <div class="flex gap-3">
                    <input type="checkbox" name="jenjang[]" value="{{ $jenjang->id }}">
                    <label>{{ $jenjang->nama }}</label>
                </div>
                @endforeach

                <h5 class="text-base font-semibold">Tipe</h5>
                @foreach ($tipes as $tipe)
                <div class="flex gap-3">
                    <input type="checkbox" name="tipe[]" value="{{ $tipe->id }}">
                    <label>{{ $tipe->nama }}</label>
                </div>
                @endforeach

                <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
            </form>
        </aside>

        <main class="w-4/5 p-4">
        
            <div class="grid grid-cols-1 grid-rows-1 gap-4">
                @foreach ($beasiswas as $beasiswa)
                    <a href="{{route('dashboard.show',$beasiswa->id)}}" class="bg-neutral-50 p-4 rounded shadow-xl flex items-center  justify-between w-4/5 mx-auto">
                        <div class=" flex flex-col gap-2">
                            <img src="{{asset('storage/'.$beasiswa->gambar)}}" alt="{{ $beasiswa->nama }}" class="aspect-square w-24  mx-auto object-contain">
               
                            <p class="text-gray-800 font-semibold">Mulai Tanggal: {{ \Carbon\Carbon::parse($beasiswa->mulai_tanggal)->translatedFormat('d F Y') }}</p>
                            <p class="text-red-600 font-semibold">Deadline Tanggal: {{ \Carbon\Carbon::parse($beasiswa->deadline_tanggal)->translatedFormat('d F Y') }}</p>

                        </div>
                        <div class="flex flex-col items-end">
                            <h4 class="font-semibold  text-3xl">{{ $beasiswa->nama }}</h4>
                            <p class="text-gray-600">{{ $beasiswa->asal_negara }}</p>
                          

                        </div>
                    </a>
                @endforeach
            </div>
        </main>
    </div>
</x-app-layout>
