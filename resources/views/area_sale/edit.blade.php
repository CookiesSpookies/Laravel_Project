<x-layout>
    <x-card class="!p-10 max-w-lg mx-auto mt-24">
        <header class="text-center mb-5">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Area Sale
            </h2>
        </header>
        <form method="POST" action="/area_sale/{{ $area_sale->id }}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="kode_toko" class="inline-block text-lg mb-2">Kode Toko</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="kode_toko"
                    value="{{ $area_sale->kode_toko }}" />
                @error('kode_toko')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="area_sale" class="inline-block text-lg mb-2">Area Sales</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="area_sale" value="{{ $area_sale->area_sale }}" />
                @error('area_sale')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Area Sale
                </button>
                <a href="/area_sale" class="text-black ml-4"> Back </a>
            </div>
        </form>
        </div>
    </x-card>
</x-layout>
