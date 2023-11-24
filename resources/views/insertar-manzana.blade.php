<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<x-guest-layout> 

    <form method="POST" action="{{ route('insertar-manzana') }}"> @csrf  <div> <x-input-label for="tipoManzana"
        :value="__('Tipo Manzana')" /> <x-text-input id="tipoManzana" class="block mt-1 w-full" type="text" name="tipoManzana"
        :value="old('tipoManzana')" required autofocus autocomplete="tipoManzana" /> <x-input-error
        :messages="$errors->get('tipoManzana')" class="mt-2" /> </div>

       
        <div class="mt-4">
            <x-input-label for="precioKilo" :value="__('Precio Kilo')" />
            <x-text-input id="precioKilo" class="block mt-1 w-full" type="text" name="precioKilo" :value="old('precioKilo')"
                required autocomplete="precioKilo" />
            <x-input-error :messages="$errors->get('precioKilo')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Insertar Manzana') }}
            </x-primary-button>
        </div>
    </form>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <x-primary-button class="ms-4">
    <a href="dashboard">Atras</a>
    </x-primary-button>

    </x-guest-layout>