<div>

    <livewire:filtrar-vacantes />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-3xl text-center text-gray-800 dark:text-gray-200 mb-12">Nuestras vacantes disponibles</h3>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 divide-y divide-gray-200 dark:divide-gray-700">

                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a 
                            href="{{ route('vacantes.show', $vacante) }}"
                            class="text-lg text-gray-800 dark:text-gray-200 font-extrabold"
                            >
                            {{ $vacante->titulo }}
                            </a>
                            <p class="text-sm text-gray-500 dark:text-gray-300">{{ $vacante->empresa}}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-300">Último día para aplicar: {{ $vacante->ultimo_dia->format('d-m-Y') }}</p>              
                       </div>

                       <div class="mt-5 md:mt-0">
                            <a 
                            href="{{ route('vacantes.show', $vacante) }}"
                            class="bg-teal-500 dark:bg-teal-400 text-white text-sm dark:text-gray-900 font-bold py-2 px-4 rounded-lg hover:bg-teal-600 dark:hover:bg-teal-500 block text-center">
                               Ver vacante
                            </a>
                       </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">No hay vacantes disponibles</p>
                @endforelse

            </div>

        </div>
    </div>
   
</div>
