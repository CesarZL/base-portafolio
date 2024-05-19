<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse($vacantes as $vacante)
            <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700 {{ $loop->last-1 ? '' : 'border-b-0' }} md:flex md:justify-between md:items-center">
                <div class="space-y-3"> 
                    <a href="{{ route('vacantes.show', $vacante) }}" 
                    class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $vacante->empresa }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}
                    </p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="{{ route('candidatos.index', $vacante) }}"
                    class="bg-slate-600 dark:bg-slate-500 text-white dark:text-gray-100 text-sm py-2 px-4 font-bold rounded-lg uppercase text-center">
                        {{ $vacante->candidatos->count() }} Candidatos
                    </a>

                    <a href="{{route('vacantes.edit', $vacante->id)}}" class="bg-indigo-600 dark:bg-indigo-500 text-white dark:text-gray-100 text-sm py-2 px-4 font-bold rounded-lg uppercase text-center">
                        Editar
                    </a>

                    <button
                        wire:click="$dispatch('mostrarAlerta', { id: {{ $vacante->id }} })"
                        class="bg-red-600 dark:bg-red-500 text-white dark:text-gray-100 text-sm py-2 px-4 font-bold rounded-lg uppercase text-center">
                            Eliminar
                    </button>

                </div>
            </div>
        @empty
            <div class="p-6 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-700 text-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    No hay vacantes disponibles
                </p>
            </div>
        @endforelse

    </div>


    <div class="mt-10">
            {{ $vacantes->links() }}
    </div>

    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Livewire.on('mostrarAlerta', vacanteID => {
                Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esto",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, bórralo',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.dispatch('eliminarVacante', vacanteID)

                    Swal.fire(
                    'Borrado',
                    'El registro ha sido eliminado',
                    'success'
                    )
                }
                })
            })           

        </script>
    @endpush

</div>
