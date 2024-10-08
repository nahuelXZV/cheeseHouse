<div>
    <nav class="flex px-5 py-3 mb-5 text-gray-700 justify-between border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <x-iconos.home />
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <x-iconos.flecha />
                    <a href="{{ route('pedidos.list') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Pedidos</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <x-iconos.flecha />
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Ver</span>
                </div>
            </li>
        </ol>
        <div>
            <a href="{{ route('pedidos.ticket', $pedido->id) }}" target="_blank"
                class="inline-flex items-center justify-center h-9 px-4 ml-5 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-500 focus:ring-opacity-50">
                Ticket
            </a>
            @can('editar.venta')
                <a href="{{ route('pedidos.edit', $pedido->id) }}"
                    class="inline-flex items-center justify-center h-9 px-4 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
                    Editar
                </a>
            @endcan
            <a href="{{ route('pedidos.new') }}"
                class="inline-flex items-center justify-center h-9 px-4 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-500 focus:ring-opacity-50">
                Nuevo
            </a>
        </div>
    </nav>
    <div class="grid grid-cols-5 gap-3">

        <div class="mb-1">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo Seguimiento</label>
            <input type="text" wire:model.defer="pedidoArray.codigo_seguimiento" readonly
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="xxxxx">
        </div>

        <div class="mb-1">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Cliente</label>
            <input type="text" wire:model.defer="pedidoArray.cliente"" readonly
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nombre">
            <x-input-error for="pedidoArray.cliente" />
        </div>

        <div class="mb-1">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metodo de pago</label>
            <input type="text" wire:model.defer="pedidoArray.metodo_pago"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="0.00" readonly>
        </div>

        <div class="mb-1">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Proveniencia</label>
            <input type="text" wire:model.defer="pedidoArray.proveniente"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="0.00" readonly>
        </div>
        <div class="mb-1">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Para</label>
            <input type="text" wire:model.defer="pedidoArray.tipo_pedido"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="" readonly>
        </div>

        <div class="mb-6 col-span-3">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detalles</label>
            <textarea id="message" rows="1" wire:model.defer="pedidoArray.detalles"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                readonly placeholder="......"></textarea>
            <x-input-error for="pedidoArray.detalles" />
        </div>
    </div>


    <div>
        <div class="col-span-2 h-32">
            <p>
                <span class="text-lg font-bold text-gray-900 dark:text-white">Lista de Productos</span>
            </p>
            <div class="mb-6">
                <table class="w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-2 py-2">Nombre</th>
                            <th class="px-2 py-2">Cantidad</th>
                            @if ($pedidoArray['descuento'] > 0)
                                <th class="px-2 py-2">SubTotal</th>
                                <th class="px-2 py-2">Descuento</th>
                            @endif
                            <th class="px-2 py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidoArray['productos'] as $ingrediente)
                            <tr class="justify-center items-center text-center">
                                <td class="px-2 py-2">
                                    {{ $ingrediente['nombre'] }}
                                </td>
                                <td class="px-2 py-2">{{ $ingrediente['cantidad'] }}</td>
                                @if ($pedidoArray['descuento'] > 0)
                                    <td class="px-2 py-2">{{ $ingrediente['sub_total'] }} Bs.</td>
                                    <td class="px-2 py-2">-{{ $ingrediente['descuento'] }} Bs.</td>
                                @endif
                                <td class="px-2 py-2">{{ $ingrediente['monto_total'] }} Bs.</td>
                            </tr>
                        @endforeach
                        <tr class="justify-center items-center text-center">
                            <td class="px-2 py-2"></td>
                            <td class="px-2 py-2"></td>
                            @if ($pedidoArray['descuento'] > 0)
                                <td class="px-2 py-2"></td>
                                <td class="px-2 py-2"></td>
                            @endif
                            <td class="px-2 py-2 font-bold">
                                TOTAL: {{ $pedidoArray['monto_total'] }} Bs.
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
