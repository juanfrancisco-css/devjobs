<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- redirecionada una vez publicada la vacante con un mensaje -->
            @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 text-sm  bg-green-100  text-green-600 p-3 font-bold my-3">
            {{ session('mensaje')}}
        </div>
            @endif
           
            @if (session()->has('mensaje_eliminada'))
            <div class="uppercase border border-red-600 text-sm  bg-green-100  text-red-600 p-3 font-bold my-3">
                {{ session('mensaje_eliminada')}}
            </div>
                @endif
           

                    <livewire:mostrar-vacante />
                
        </div>
    </div>
</x-app-layout>
