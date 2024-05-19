<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h1 class="text-2xl font-bold text-center my-10"> 
                        Mis notificaciones
                   </h1>

                   @forelse ($notificaciones as $notificacion)
                       <div class="p-5 border border-gray-300 dark:border-gray-700 lg:flex lg:justify-between lg:items-center rounded-lg mb-3">
                           <div>
                                <p class="mb-2">Tienes un nuevo candidato en: <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span></p>
                                <p class="">{{ $notificacion->created_at->diffForHumans() }}</p>
                           </div>

                           <div class="mt-4 lg:mt-0">
                                <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}"
                                class="bg-teal-500 dark:bg-teal-400 text-white text-sm dark:text-gray-900 font-bold py-2 px-4 rounded-lg inline-block text-center hover:bg-teal-600 dark:hover:bg-teal-500">
                                    Ver candidatos
                                </a>
                           </div>
                       </div>
                   @empty
                        <div class="p-5 border border-gray-300 dark:border-gray-700 lg:flex lg:justify-between lg:items-center rounded-lg mb-3 items-center">
                            <p>No tienes notificaciones</p>
                        </div>
                   @endforelse                     

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
