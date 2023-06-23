<x-layout>
    <x-card class="!p-10 max-w-lg mx-auto mt-24">.
        <header class="text-center mb-5">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Master Sales
            </h2>
        </header>
        {{-- enctype="multipart/form-data" --}}
        <form method="POST" action="/master_sale/{{ $master_sale->id }}">
            @csrf
            @method('PUT')
            {{-- @method => we can use PUT instead of POST, because form only able to do POST or GET --}}
            <div class="mb-6">
                <label for="kode_sales" class="inline-block text-lg mb-2">Kode Sales</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="kode_sales"
                    value="{{ $master_sale->kode_sales }}" />
                @error('kode_sales')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="nama_sales" class="inline-block text-lg mb-2">Nama Sales</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nama_sales" value="{{ $master_sale->nama_sales }}" />
                @error('nama_sales')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Master Sale
                </button>
                <a href="/master_sale" class="text-black ml-4"> Back </a>
            </div>
        </form>
        </div>
    </x-card>
</x-layout>
