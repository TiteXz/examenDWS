<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Manzana') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form action="{{ route('actualizar-manzana', ['id' => $manzana->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Your form fields go here -->
                        <div class="mb-4">
                            <label for="tipoManzana" class="block text-sm font-medium text-gray-700">Tipo</label>
                            <input type="text" name="tipoManzana" id="tipoManzana" value="{{ $manzana->tipoManzana }}" class="mt-1 p-2 w-full border rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="precioKilo" class="block text-sm font-medium text-gray-700">Precio/Kg</label>
                            <input type="text" name="precioKilo" id="precioKilo" value="{{ $manzana->precioKilo }}" class="mt-1 p-2 w-full border rounded-md">
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-black p-2 rounded-md">Actualizar Manzana</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
