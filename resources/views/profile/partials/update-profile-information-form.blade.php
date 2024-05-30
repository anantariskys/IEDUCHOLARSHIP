<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <img src="{{asset('storage/'.$user->gambar)}}" alt="{{ $user->nama }}" class="aspect-square w-40 rounded-full  mx-auto object-cover">

        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

    

        <div>
            <x-input-label for="provinsi" :value="__('Provinsi')" />
            <input id="provinsi" name="provinsi" type="text" class="mt-1 block w-full" value="{{ old('provinsi', $user->provinsi) }}" required autocomplete="provinsi" />
            <x-input-error class="mt-2" :messages="$errors->get('provinsi')" />
        </div>
        
        <div>
            <x-input-label for="kota" :value="__('Kota')" />
            <input id="kota" name="kota" type="text" class="mt-1 block w-full" value="{{ old('kota', $user->kota) }}" required autocomplete="kota" />
            <x-input-error class="mt-2" :messages="$errors->get('kota')" />
        </div>
        
        <div>
            <x-input-label for="kecamatan" :value="__('Kecamatan')" />
            <input id="kecamatan" name="kecamatan" type="text" class="mt-1 block w-full" value="{{ old('kecamatan', $user->kecamatan) }}" required autocomplete="kecamatan" />
            <x-input-error class="mt-2" :messages="$errors->get('kecamatan')" />
        </div>
        
        <div>
            <x-input-label for="alamat_lengkap" :value="__('Alamat Lengkap')" />
            <input id="alamat_lengkap" name="alamat_lengkap" type="text" class="mt-1 block w-full" value="{{ old('alamat_lengkap', $user->alamat_lengkap) }}" required autocomplete="alamat_lengkap" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat_lengkap')" />
        </div>
        
        <div>
            <x-input-label for="alamat_domisili" :value="__('Alamat Domisili')" />
            <input id="alamat_domisili" name="alamat_domisili" type="text" class="mt-1 block w-full" value="{{ old('alamat_domisili', $user->alamat_domisili) }}" required autocomplete="alamat_domisili" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat_domisili')" />
        </div>
        
        <div>
            <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
            <input id="nomor_telepon" name="nomor_telepon" type="text" class="mt-1 block w-full" value="{{ old('nomor_telepon', $user->nomor_telepon) }}" required autocomplete="nomor_telepon" />
            <x-input-error class="mt-2" :messages="$errors->get('nomor_telepon')" />
        </div>
        
        <div>
            <x-input-label for="gambar" :value="__('Gambar')" />
            <input id="gambar" name="gambar" type="file" class="mt-1 block w-full" required autocomplete="gambar" />
            <x-input-error class="mt-2" :messages="$errors->get('gambar')" />
        </div>
        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

