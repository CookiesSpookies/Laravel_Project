<x-layout>
    <x-card class="!p-10 max-w-lg mx-auto mt-24">
        <header class="text-center mb-5">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Add Transaction
            </h2>
        </header>
        <form method="POST" action="/transaction/store">
            @csrf
            <div class="mb-6">
                <label for="kode_toko" class="inline-block text-lg mb-2">Kode Toko</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="kode_toko"
                    value="{{ old('kode_toko') }}" />
                @error('kode_toko')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="nominal_transaksi" class="inline-block text-lg mb-2">Nominal Transaksi</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nominal_transaksi" value="{{ old('nominal_transaksi') }}" />
                @error('nominal_transaksi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Add Transaction
                </button>
                <a href="/transaction" class="text-black ml-4"> Back </a>
            </div>
        </form>
        </div>
    </x-card>
</x-layout>
