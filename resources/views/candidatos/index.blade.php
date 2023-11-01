<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-b border-gray-200 ">
                <div class="p-6 text-gray-900 dark:text-gray-100  ">

                   <h1 class="text-2xl font-bold text-center mb-5">
                   Candidatos de la vacante : {{ $vacante->titulo}}.
                   </h1>
                
                 
                  <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                   
                        
                    @forelse ($vacante->candidatos as $candidato)
                    <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-300 md:flex justify-between md:items-center">
                                <div class="leading-10">
                                    <p class="text-xl font-medium text-gray-800  p-1">
                                        {{$candidato->user->name}}
                                    </p>
                                    <p class="text-sm font-medium text-gray-600  p-1">
                                        {{$candidato->user->email}}
                                    </p>
                                    <p class="text-sm font-medium text-gray-600  p-1">
                                        {{$candidato->created_at->diffForHumans()}}
                                    </p>
                                </div>
            
                                <div class="flex  flex-col  md:flex-row gap-3 items-strech md:mt-0"> 
                                    <a 
                                    class="inline-flex items-center shadow-sm p-4 px-2.5 py-0.5 border border-gray-300  
                                    text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                    href="{{ asset('storage/cv/'.$candidato->cv) }}"
                                    >
                                                Ver cv
                                    </a>
                                </div>
                      
                    </div>
                    @empty
                              <p class="p-3 text-center text-sm text-gray-600">
                                No hay candidatos aún.
                              </p>
                    @endforelse
                   
            
                </div>

                
               

                    
                           
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>