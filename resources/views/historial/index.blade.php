<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial Clientes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-2 text-2xl font-medium text-gray-900">
                        Historial de Clientes
                    </h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto">
                        <table class="w-full border-collapse border-2 border-gray-500">
                            <thead>
                                <tr>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Código
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Fecha
                                        de Servicio
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">Nombres
                                    </th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">
                                        Apellidos</th>
                                    <th class="border text-xs uppercase border-gray-400 px-4 py-2 text-gray-800">
                                        Descripcion de Servicio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historialClientes as $historial)
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">{{ $historial->id }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $historial->fecha_servicio }}
                                        </td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $historial->nombre }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $historial->apellido }}</td>
                                        <td class="border border-gray-400 px-4 py-2">
                                            {{ $historial->descripcion_servicio_realizado }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $historialClientes->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
