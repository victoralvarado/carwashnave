<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios Diarios') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-2 text-2xl font-medium text-gray-900">
                        Registro de Servicios Diarios
                    </h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">
                    <form action="/serviciosdiarios" method="POST" class="w-5/6 max-[450px]:w-full place-self-center">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-fecha">
                                    Fecha
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-fecha" type="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-hora">
                                    Hora
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-hora" type="time" value="{{ \Carbon\Carbon::now()->format('H:i') }}">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-persona-asignada">
                                    Persona Asignada
                                </label>
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-persona-asignada" required>
                                    <option value="" selected>Seleccionar Persona Asignada</option>
                                    @foreach ($users as $opcion)
                                        <option value="{{ $opcion->id }}">{{ $opcion->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-tipo-servicio">
                                    Tipo de Servcicio
                                </label>
                                @foreach ($servicios as $opcion)
                                    <label>
                                        <input type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                            name="opciones[]" id="grid-tipo-servicio" value="{{ $opcion->id }}">
                                        {{ $opcion->descripcion_servicio }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-cliente">
                                    Cliente
                                </label>
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-cliente" required>
                                    <option value="" selected disabled>Seleccionar Cliente</option>
                                    @foreach ($clientes as $opcion)
                                        <option value="{{ $opcion->id }}">{{ $opcion->nombre }}
                                            {{ $opcion->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button
                                class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                type="submit">
                                Guardar
                            </button>
                            <button
                                class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                type="reset">
                                Cancelar
                            </button>
                        </div>
                    </form>
                    <table class="w-full border-collapse border-2 border-gray-500">
                        <thead>
                            <tr>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Código</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Fecha</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Hora</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Persona
                                    Asignada</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Tipo
                                    Servicio</th>
                                <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Acción</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviciosdiariosI as $serviciodiario)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->id }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->fecha }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->hora }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $serviciodiario->user->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">
                                        {{ $serviciodiario->servicios->descripcion_servicio }}</td>
                                    <td class="border border-gray-400 px-4 py-2">Eliminar</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
