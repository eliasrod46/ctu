<x-app-layout>
    <div>
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="my-12">
                <div class="mb-10 text-center">
                    <h3 class="font-bold text-2xl mb-4 text-center">Detalle de la compra</h3>
                </div>
                <div>
                    <div class="text-center">
                        <a href="{{route('compras.listado')}}" class="text-white bg-gray-800 font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-2 mb-2">
                                Listado de compras
                        </a>
                    </div>
                    <div class="mx-6">
                        @livewire('compra.detalle', ['compra' => $compra])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>