<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones ' . auth()->user()->unreadNotifications->count()) }}
        </h2>
        <a href="{{route('notificacioneshistorial.index')}}" class="font-semibold text-sm text-gray-400 dark:text-gray-200 leading-tight mt-4">
              {{__('Notificaciones leidas')}}

        </a>
       
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                   <h1 class="text-3xl font-bold text-center mb-5">
                     Mis Notificaciones
                   </h1>

                    @forelse ($notificaciones as $notificacion )
                                    <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-300 md:flex justify-between md:items-center">
                                        <div>
                                                <p> Tienes un nuevo candidato en : 
                                                    <span class="font-bold">
                                                        {{ $notificacion->data['nombre_vacante']}}
                                                    </span>
                                                </p>
                                                <p> 
                                                    <span class="font-bold">
                                                    {{ $notificacion->created_at->diffForHumans()}}
                                                </span>
                                                </p>
                                        </div>
                                    <div  class="flex  flex-col  md:flex-row gap-3 items-strech md:mt-0">
                                        <a 
                                        class="bg-indigo-500 font-bold p-4 text-white text-sm uppercase rounded-lg text-center"
                                        href="{{route('candidatos.index', $notificacion->data['id_vacante'])}}"
                                        target="_blank"
                                        rel="noreferrer noopener"
                                        >
                                          Ver candidatos
                                        </a>
                                    </div>
                                </div>

                    @empty
                            <p class="text-center text-gray-600">
                                No hay notificaciones
                            </p>
                    @endforelse
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>