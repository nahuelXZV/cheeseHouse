<div>
    <nav class="flex px-3 py-3 mb-5 text-gray-700 justify-between border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <x-iconos.home />
                    Home
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <x-iconos.flecha />
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Pedidos</span>
                </div>
            </li>
        </ol>
        <div>
            @can('reportes')
                <input type="month" wire:model='mouthReport' value="{{ $mouthReport }}"
                    class="inline-flex items-center justify-center h-9 px-4 text-sm font-medium text-black bg-white rounded-lg hover:bg-white focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-50">
                <a href="{{ route('reportes.ventasMensuales', $mouthReport) }}"
                    class="inline-flex items-center justify-center h-9 px-4 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-500 focus:ring-opacity-50">
                    Reporte Mensual
                </a>
                <a href="{{ route('reportes.ventasAnuales') }}"
                    class="inline-flex items-center justify-center h-9 px-4 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-500 focus:ring-opacity-50">
                    Reporte Anual
                </a>
            @endcan
            <a href="{{ route('pedidos.new') }}"
                class="inline-flex items-center justify-center h-9 px-4 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
                Nuevo
            </a>
        </div>
    </nav>
    <x-shared.notificacion :message='$message' :showMessage='$showMessage' />
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div>
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <x-iconos.search />
                </div>
                <input type="search" id="search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" wire:model.lazy='attribute'>
            </div>
        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Cliente
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Vendedor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Monto Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $pedido->cliente }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pedido->user_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pedido->fecha }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pedido->hora }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pedido->monto_total }} Bs
                        </td>
                        <td class="px-6 py-4">
                            {{ $pedido->estado }}
                        </td>
                        <td class="px-6 py-4">
                            {{ Str::limit($pedido->detalles, 40, '...') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    @can('editar.venta')
                                        <a type="button" href="{{ route('pedidos.edit', $pedido->id) }}"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 ">
                                            <x-iconos.edit />
                                        </a>
                                    @endcan
                                    <a type="button" href="{{ route('pedidos.show', $pedido->id) }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-green-700  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 ">
                                        <x-iconos.view />
                                    </a>
                                    @can('eliminar')
                                        <button type="button" wire:click="delete({{ $pedido->id }})"
                                            onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-red-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 ">
                                            <x-iconos.delete />
                                        </button>
                                    @endcan
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <x-shared.pagination :modelo='$pedidos' />
    </div>
</div>
