<x-app-layout>
    <div>
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="my-12">
                <div class="text-center mb-9">
                    <a href="{{route('venta.listado')}}" class="rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium text-sm px-3 py-1.5 text-center mr-2 mb-2">
                            Volver al listado de ventas
                    </a>
                </div>
                <div class="mb-4">
                    <h3 class="font-bold text-2xl mb-4 text-center">Detalle de la  Venta</h3>
                </div>
                <div>
                    <div class="mx-6">
                        @livewire('venta.detalle', ['venta' => $venta])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>