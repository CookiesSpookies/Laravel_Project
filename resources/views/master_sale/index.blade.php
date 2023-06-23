<x-layout>
    <x-card class="!p-10 m-20 rounded">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Master Sales
            </h1>
            <form action="/master_sale/file_import" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <input type="file" name="file">
                    <button
                        class="mr-10 px-4 py-4 text-white font-bold bg-lime-600 rounded hover:bg-lime-800 cursor-pointer">
                        Import Excel
                    </button>
                    <a href="/master_sale/file_export"
                        class="mr-10 px-4 py-4 text-white font-bold bg-laravel rounded hover:bg-red-700 cursor-pointer">
                        Export Excel
                    </a>
                    <a href="/master_sale/pdf"
                        class="px-4 py-4 text-white font-bold bg-orange-600 rounded hover:bg-orange-700 cursor-pointer">
                        Export PDF
                    </a>
                </div>
            </form>
        </header>
        <x-table>
            <x-slot name="head">
                <td class="px-4 py-8 border-b border-gray-300 text-lg font-bold">
                    Kode Sales
                </td>
                <td class="px-4 py-8 border-b border-gray-300 text-lg font-bold">
                    Nama Sales
                </td>
                <td class="px-9 py-8 border-b border-gray-300 text-lg font-bold">
                    Action
                </td>
            </x-slot>
            @unless ($master_sales->isEmpty())
                @foreach ($master_sales as $master_sale)
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            {{ $master_sale->kode_sales }}
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            {{ $master_sale->nama_sales }}
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="/master_sale/{{ $master_sale->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <form method="POST" action="/master_sale/{{ $master_sale->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="pc-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Master Sales Found</p>
                    </td>
                </tr>
            @endunless
        </x-table>
        <div class="mt-6 p-4">
            {{ $master_sales->links() }}
        </div>
    </x-card>
    <footer
    <x-footer>
        <a href="/master_sale/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Add Master Sale</a>
    </x-footer>
    </footer>
</x-layout>

