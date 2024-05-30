<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
        <section class="container mx-auto lg:px-24 md:px-10 px-4 py-5">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight">Update Beasiswa</h2>
        </section>
        {{-- Form untuk memperbarui beasiswa --}}
        <div class="container mx-auto mt-8 lg:px-24 md:px-10 px-4 py-5">
            <form action="{{ route('admin.beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data"
                class="gap-10 bg-white p-6 rounded shadow-md grid grid-cols-2 grid-rows-1">
                @csrf
                @method('PUT')
                <div>
                    <div class="mb-4">
                        <label for="nama" class="block text-black text-xl font-bold">Nama Beasiswa</label>
                        <input type="text" id="nama" name="nama"
                            class="w-full border-gray-300 rounded mt-2 text-base " value="{{ old('nama', $beasiswa->nama) }}">
                        @error('nama')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="asal_negara" class="block text-black text-xl font-bold">Asal Beasiswa</label>
                        <label for="asal_negara" class="block text-black text-sm">Asal Negara</label>
                        <input type="text" id="asal_negara" name="asal_negara"
                            class="w-full border-gray-300 rounded mt-2 text-base " value="{{ old('asal_negara', $beasiswa->asal_negara) }}">
                        @error('asal_negara')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mulai_tanggal" class="block text-black text-xl font-bold">Periode</label>
                        <label for="mulai_tanggal" class="block text-black text-sm">Awal</label>
                        <input type="date" id="mulai_tanggal" name="mulai_tanggal"
                            class="w-1/2 border-gray-300 rounded mt-2 text-base " value="{{ old('mulai_tanggal', $beasiswa->mulai_tanggal) }}">
                        @error('mulai_tanggal')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deadline_tanggal" class="block text-black text-sm">Akhir</label>
                        <input type="date" id="deadline_tanggal" name="deadline_tanggal"
                            class="w-1/2 border-gray-300 rounded mt-2 text-base " value="{{ old('deadline_tanggal', $beasiswa->deadline_tanggal) }}">
                        @error('deadline_tanggal')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="block text-black text-xl font-bold">Gambar</label>
                        <input type="file" id="gambar" name="gambar"
                            class="w-full border-gray-300 rounded mt-2 text-base ">
                        @error('gambar')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        @if ($beasiswa->gambar)
                            <img src="{{ asset('storage/' . $beasiswa->gambar) }}" alt="{{ $beasiswa->nama }}" class="h-16 w-16 object-cover mt-2">
                        @endif
                    </div>

                    <div class="flex gap-5">
                        <a href="{{ route('admin.beasiswa.index') }}" class="bg-white text-blue-500 px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </div>

                <div>
                    <div class="mb-4">
                        <label for="tipe_id" class="block text-black text-xl font-bold">Kriteria Beasiswa</label>
                        <label for="tipe_id" class="block text-black text-sm">Tipe</label>
                        <select id="tipe_id" name="tipe_id"
                            class="w-full py-2 px-2 border-gray-300 rounded mt-2 text-base ">
                            @foreach ($tipes as $tipe)
                                <option value="{{ $tipe->id }}" {{ $beasiswa->tipe_id == $tipe->id ? 'selected' : '' }}>{{ $tipe->nama }}</option>
                            @endforeach
                        </select>
                        @error('tipe_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">                
                             <label for="jenjang_id" class="block text-black text-sm">Jenjang</label>
                        <select id="jenjang_id" name="jenjang_id"
                            class="w-full py-2 px-2 border-gray-300 rounded mt-2 text-base ">
                            @foreach ($jenjangs as $jenjang)
                                <option value="{{ $jenjang->id }}" {{ $beasiswa->jenjang_id == $jenjang->id ? 'selected' : '' }}>{{ $jenjang->nama }}</option>
                            @endforeach
                        </select>
                        @error('jenjang_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="syarat_ketentuan" class="block text-black text-sm">Syarat & Ketentuan</label>
                        <textarea id="syarat_ketentuan" name="syarat_ketentuan" class="w-full border-gray-300 rounded mt-2 text-base ">{{ old('syarat_ketentuan', $beasiswa->syarat_ketentuan) }}</textarea>
                        @error('syarat_ketentuan')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="link_pendaftaran" class="block text-black text-sm">Link Pendaftaran</label>
                        <input type="url" id="link_pendaftaran" name="link_pendaftaran"
                            class="w-full border-gray-300 rounded mt-2 text-base "
                            value="{{ old('link_pendaftaran', $beasiswa->link_pendaftaran) }}">
                        @error('link_pendaftaran')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>

