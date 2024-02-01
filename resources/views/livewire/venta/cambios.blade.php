<div>
    <form wire:submit.prevent = "submit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-1/2 lg:mr-6">
                    <div class="mt-10">
                        {{--Codigo--}}
                        <select wire:model="venta" class="rounded w-full">
                            <option value="">Seleccione una venta realizada</option>
                            @if ($ventas)
                                @foreach ($ventas as $venta)
                                    <option value="{{ $venta->id }}">{{ $venta->codigotransaccion }}</option>
                                @endforeach
                            @endif
                        </select>

                        @if($infoProducto)
                            @if($tipodeTransaccion === 'NO')
                                <div class="mt-8 mb-8" >
                                    <x-wire-card>
                                        <ul>
                                            <li class="text-red-500 font-semibold mt-4 text-lg">Código del producto: {{$infoProducto->codigo}}</li>
                                    
                                            <li class="text-red-500 font-semibold mt-4 text-lg">Monto de la venta: {{$infodeventa->monto}}</li>

                                            <li class="text-red-500 font-semibold mt-4 text-lg">Cantidad de prendas vendidas: {{$infodeventa->cantidadprenda}}</li>

                                            <li class="text-red-500 font-semibold mt-4 text-lg">Medio de pago: {{$infodeventa->formadepago}}</li>

                                            <li class="text-red-500 font-semibold mt-4 text-lg">Vendedor: {{$infodeventa->vendedor}}</li>

                                            <li class="text-red-500 font-semibold mt-4 text-lg">Fecha: {{$infodeventa->fecha_y_hora}}</li>

                                            <li class="text-red-500 font-semibold mt-10 text-lg">
                                                @if($infoProducto->imagen)
        
                                                <p class="text-lime-600 font-semibold mb-5">Imagen del producto vendido</p>
                                                <div class="mt-4"></div>
                                                <x-wire-card class="mb-10">
                                                    <img src="{{ asset('storage/' . $infoProducto->imagen) }}" alt="Imagen del Producto">
                                                </x-wire-card>
                                                @else
                                                <p class="text-lime-600 font-semibold">Imagen del producto vendido</p>
                                                <div class="mt-4"></div>
                                                <x-wire-card >
                                                    <p class="text-red-500 font-semibold">Aún no se cargó la imagen de la prenda</p>
                                                </x-wire-card>
                                                @endif
                                            </li>
                                        </ul>
                                    </x-wire-card>
                                </div>
                            @endif
                             @if($tipodeTransaccion === 'SI')
                              <div class="mt-8 mb-8" >
                                <x-wire-card>
                                <ul>
                                        <li class="text-red-500 font-semibold mt-4 text-lg">Código del producto: {{$infoProducto->codigo}}</li>

                                        <li class="text-red-500 font-semibold mt-4 text-lg">Tipo de transacción: {{$infodeventa->transacciontipo}}</li>
                                        
                                        <li class="text-red-500 font-semibold mt-4 text-lg">Saldo a favor : {{$infodeventa->monto}}</li>
    
                                        <li class="text-red-500 font-semibold mt-4 text-lg">Cantidad de prendas devueltas: {{$infodeventa->cantidadprenda}}</li>
    
                                        <li class="text-red-500 font-semibold mt-4 text-lg">Vendedor: {{$infodeventa->vendedor}}</li>

                                        <li class="text-red-500 font-semibold mt-4 text-lg">Fecha: {{$infodeventa->fecha_y_hora}}</li>
    
                                 </ul>
                                </x-wire-card>
                            </div>
                        
                            @endif
                        @endif
                </div>
            </div> 
            <div class="w-full lg:w-1/2">
                
                <div class="mt-4">
                    <p class="text-red-500 font-semibold">¿Qué transacción desea realizar?</p>
                    <div class="select">
                        <select wire:model="opcseleccionada" class="rounded w-full">
                            <option value="">Seleccione si aplicará descuento</option>
                            @if ($tipocambios)
                                @foreach ($tipocambios as $tipocambio)
                                    <option value="{{ $tipocambio->nombre }}">{{ $tipocambio->nombre }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                @error('opcseleccionada') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                @if($opcionseleccionada === 'Devolución')
                <div class="mt-4">
                    <p class="text-red-500 font-semibold">¿Que tipo de devolución realizará?</p>
                    <div class="select">
                        <select wire:model="devseleccionada" class="rounded w-full">
                            <option value="">Seleccione el tipo de devolución</option>
                            @if ($tiposdev)
                                @foreach ($tiposdev as $tiposdev)
                                    <option value="{{ $tiposdev->nombre }}">{{ $tiposdev->nombre }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                @error('devseleccionada') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                @if($devolucionsseleccionada === 'Totalidad')
                    <div class="mt-4">
                        <div class="flex justify-start items-center">
                            <ul>
                                <li class="text-black font-semibold">El cliente tiene un saldo a favor de: $ {{$montodevtotal}}</li>
                                <li class="text-black font-semibold">Se devuelve al stock la cantidad de {{$stockdevuelto}} prendas</li>
                            </ul>
                        </div>
                    </div>
                @endif

                @if($devolucionsseleccionada === 'Parcial')
                <div class="mt-4">
                    <p class="text-red-500 font-semibold">¿Cúantas prendas devolverá?</p>
                        <x-input wire:model.lazy="cantidaddevuelto" placeholder="Cantidad de prendas devuelta " id="cantidaddevuelto" class="block mt-1 w-full {{$errors->has('cantidaddevuelto') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="cantidaddevuelto" :value="old('cantidaddevuelto')" autocomplete="cantidaddevuelto"  />
                </div> 
                
                <div class="mt-4">
                        <div class="flex justify-start items-center">
                            <ul>
                                <li class="text-black font-semibold">El cliente tiene un saldo a favor de: $ {{$montodevparcial}}</li>
                                <li class="text-black font-semibold">Se devuelve al stock la cantidad de {{$stockdevuelto}} prendas</li>
                            </ul>
                        </div>
                    </div>


                @endif
                    <div class="mt-4">
                        <p class="text-red-500 font-semibold">Vendedor</p>
                        <div class="select">
                            <select wire:model="vendedor" class="rounded w-full">
                                <option value="">Seleccione vendedor</option>
                                @if ($vendedores)
                                   @foreach ($vendedores as $vendedor)
                                      <option value="{{ $vendedor->nombre }}">{{ $vendedor->nombre }}</option>
                                   @endforeach
                                @endif
                             </select>
                             @error('vendedor') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="text-red-500 font-semibold">Dia y hora de la venta</p>
                        <x-wire-datetime-picker
                            placeholder="Dia y hora de la venta"
                            parse-format="YYYY-MM-DD HH:MM:00"
                            wire:model.defer="fecha_y_hora"
                        />
                    </div>

                    <div class="mt-4">
                        <div class="flex justify-start items-center">
                            <p class="text-red-500 font-semibold">Observación (opcional)</p>
                        </div>
                       
                            <x-wire-textarea wire:model="descripcion" placeholder="Descripción" />
                            @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                @endif

                @if($opcionseleccionada === 'Cambio por otro producto')
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">El cliente tiene un saldo a favor de: $ {{$infodeventa->monto}}</p>
                    </div>
                </div>
               
            @endif
            </div>
        </div>
        <div class="flex justify-center mt-8 mb-8">
            <x-wire-button class="rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium my-7" type="submit">Aceptar</x-wire-button>
        </div>
    </form>
</div>
