<x-layout>
    <x-card class="!p-10 max-w-lg mx-auto mt-24">
        <header class="text-center mb-5">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Add History
            </h2>
        </header>
        <form method="POST" action="/history/store">
            @csrf
            <div class="mb-6">
                <label for="kode_toko_baru" class="inline-block text-lg mb-2">Kode Toko Baru</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="kode_toko_baru"
                    value="{{ old('kode_toko_baru') }}" />
                @error('kode_toko_baru')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="kode_toko_lama" class="inline-block text-lg mb-2">Kode Toko Lama</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="kode_toko_lama" value="{{ old('kode_toko_lama') }}" />
                @error('kode_toko_lama')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Add History
                </button>
                <a href="/history" class="text-black ml-4"> Back </a>
            </div>
        </form>
        </div>
    </x-card>
</x-layout>
