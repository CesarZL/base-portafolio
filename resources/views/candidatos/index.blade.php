<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos de vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h1 class="text-2xl font-bold text-center my-10"> 
                        Candidatos para la vacante: {{ $vacante->titulo }}
                   </h1>

                   <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 dark:gray-100 w-full bg-gray-50 dark:bg-gray-700 rounded-lg">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-900 dark:text-gray-100">{{ $candidato->user->name }}</p>    
                                        <p class="text-sm text-gray-900 dark:text-gray-100">{{ $candidato->user->email }}</p>   
                                        <p class="text-sm text-gray-900 dark:text-gray-100">{{ $candidato->created_at->diffForHumans() }}</p>                        
                                    </div>

                                    <div>
                                        <a href="{{ asset('storage/cv/' . $candidato->cv) }}" 
                                        rel="noopener noreferrer nofollow" target="_blank"
                                        class="inline-flex items-center shadow-sm px-3 py-2 border border-gray-300 font-medium rounded-full text-sm leading-5 text-gray-700 dark:text-gray-100 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150"
                                        >
                                            Ver curriculum
                                        </a>
                                    </div>

                                </li> 
                            @empty
                                <p class="text-center text-gray-500 dark:text-gray-400">
                                    No hay candidatos para esta vacante
                                </p>
                            @endforelse

                        </ul>
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
