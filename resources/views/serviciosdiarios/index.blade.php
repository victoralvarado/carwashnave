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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">
                    <form class="w-full">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-fecha">
                                    Fecha
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-fecha" type="date"
                                    value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
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
                                    id="grid-persona-asignada">
                                    <option>Usuario 1</option>
                                    <option>Usuario 2</option>
                                    <option>Usuario 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-tipo-servicio">
                                    Tipo de Servcicio
                                </label>
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-tipo-servicio">
                                    <option>Servicio 1</option>
                                    <option>Servicio 2</option>
                                    <option>Servicio 3</option>
                                </select>
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
                                    id="grid-cliente">
                                    <option>Cliente 1</option>
                                    <option>Cliente 2</option>
                                    <option>Cliente 3</option>
                                </select>
                            </div>
                        </div>
                        <button
                            class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Guardar
                        </button>
                    </form>
                    <table class="w-full border-collapse border-2 border-gray-500">
                        <thead>
                            <tr>
                                <th class="border border-gray-400 px-4 py-2 text-gray-800">Código</th>
                                <th class="border border-gray-400 px-4 py-2 text-gray-800">Fecha</th>
                                <th class="border border-gray-400 px-4 py-2 text-gray-800">Hora</th>
                                <th class="border border-gray-400 px-4 py-2 text-gray-800">Persona Asignada</th>
                                <th class="border border-gray-400 px-4 py-2 text-gray-800">Tipo Servicio</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-400 px-4 py-2">1</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-400 px-4 py-2">2</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-400 px-4 py-2">3</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
