<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cobros') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-2 text-2xl font-medium text-gray-900">
                        Cobros
                    </h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">
                    <table class="w-full border-collapse border-2 border-gray-500">
                        <thead>
                            <tr>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Código</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Fecha</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Hora</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Empleado
                                    Asignado</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Cliente
                                </th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Servicios
                                </th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Total
                                </th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Acción</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviciosdiarioscobros as $serviciodiario)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->id }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->fecha }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->hora }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->nombre }}
                                        {{ $serviciodiario->apellido }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->servicios }}</td>
                                    @php
                                        $serviciosArray = explode(',', $serviciodiario->servicios);
                                        $total = 0;
                                        foreach ($servicios as $servicio) {
                                            in_array($servicio->descripcion_servicio, $serviciosArray) ? ($precio = $servicio->precio) : ($precio = 0);
                                            $total += $precio;
                                        }
                                    @endphp
                                    <td class="border border-gray-400 px-4 py-2">${{ $total }}</td>
                                    <td class="border border-gray-400 px-4 py-2">
                                        <!-- Modal toggle -->
                                        <button
                                            data-modal-target="modificar-serviciodiario-modal-{{ $serviciodiario->id }}"
                                            data-modal-toggle="modificar-serviciodiario-modal-{{ $serviciodiario->id }}"
                                            class="shadow my-1 bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            type="button">
                                            Precesar Cobro
                                        </button>

                                        <!-- Main modal -->
                                        <div id="modificar-serviciodiario-modal-{{ $serviciodiario->id }}"
                                            tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-hide="modificar-serviciodiario-modal-{{ $serviciodiario->id }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Cerrar</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3
                                                            class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            Procesar Cobro
                                                        </h3>
                                                        <form action="/cobros" method="POST" target="_blank"
                                                            onsubmit="actualizar()">
                                                            @csrf
                                                            <input type="hidden" name="cliente"
                                                                value="{{ $serviciodiario->nombre }}
                                                            {{ $serviciodiario->apellido }}">
                                                            <input type="hidden" name="total"
                                                                value="{{ $total }}">
                                                            <input type="hidden" name="id"
                                                                value="{{ $serviciodiario->id }}">
                                                            <input type="hidden" name="servicios"
                                                                value="{{ $serviciodiario->servicios }}">
                                                            <button
                                                                class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                                type="submit">
                                                                Generar factura
                                                            </button>
                                                        </form>
                                                        <script>
                                                            function actualizar() {
                                                                setTimeout(function() {
                                                                    location.reload(); // Actualizar la página
                                                                }, 1500);
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
