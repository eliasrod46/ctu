<div>
    <form wire:submit.prevent = "submit" >
        @csrf
        <div class="flex flex-row">
        <div class="w-1/2 mr-6">
                    <div>
                        {{--Codigo--}}
                        <div class="mt-4">
                            <div class="select">
                                <p class="text-red-500 font-semibold">Seleccione un producto</p>

                                <select wire:model="opcionSeleccionada" id="opcion" class="rounded w-full" >
                                    <option value="">Seleccione un Producto</option>
                                    @if ($productos)
                                       @foreach ($productos as $producto)
                                          <option value="{{ $producto->id }}">{{ $producto->codigo }}</option>
                                       @endforeach
                                    @endif
                                 </select>
                            </div>
                        </div>
                        @if($propiedades)
                        <div class="mt-8" >
                            <x-card>
                            <ul>
                                    <li class="text-red-500 font-semibold mt-4 text-lg">Descripción: {{$propiedades->descripcion}}</li>
                                    
                                    <li class="text-red-500 font-semibold mt-4 text-lg">Precio de venta: {{$propiedades->precioFinal}}</li>

                                    @if($propiedades->cantidad > 0)
                                    <li class="text-red-500 font-semibold mt-4 text-lg">Stock disponible: {{$propiedades->cantidad}}</li>
                                    @endif

                                    @if($propiedades->cantidad < 1)
                                    <li class="text-red-500 font-semibold mt-4 text-lg">Stock disponible: NO HAY STOCK DE ESTA PRENDA DISPONIBLE</li>
                                    @endif

                             </ul>
                            </x-card>
                        </div>
                        @endif
                </div>
            </div> 
            <div class="w-1/2">
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Cantidad de prendas</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="cantidadprenda" placeholder="Cantidad de prendas " id="cantidadprenda" class="block mt-1 w-full {{$errors->has('cantidadprenda') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="cantidadprenda" :value="old('cantidadprenda')" autocomplete="cantidadprenda"  />
                    @error('cantidadprenda') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            @if($propiedades)  
                @if($propiedades->cantidad < $cantidadprenda)
                <p class="text-red-500 font-semibold">No hay stock disponible para la cantidad seleccionada</p>
                @endif
            @endif  
              
                {{--Precio de Costo--}}
                <div class="mt-4">
                    <p class="text-red-500 font-semibold">Descuento</p>
                    <div class="select">
                        <select wire:model="descuento" class="rounded w-full">
                            <option value="">Seleccione si aplicará descuento</option>
                            @if ($descuentos)
                                @foreach ($descuentos as $descuento)
                                    <option value="{{ $descuento->nombre }}">{{ $descuento->nombre }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                
                @if ($descuentoSeleccionado === 'SI')
                    <div class="mt-4">
                        <div class="flex justify-start items-center">
                            <p class="text-red-500 font-semibold">Cantidad de descuento</p>
                        </div>
                        <x-input wire:model.lazy="cantidaddescuento" placeholder="Cantidad de prendas " id="cantidaddescuento" class="block mt-1 w-full {{$errors->has('cantidaddescuento') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="cantidaddescuento" :value="old('cantidaddescuento')" autocomplete="cantidaddescuento"  />
                        @error('cantidaddescuento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                @endif
                <div class="mt-4">
                    <p class="text-red-500 font-semibold">Forma de pago</p>
                    <div class="select">
                        <select wire:model="formadepago" class="rounded w-full">
                            <option value="">Seleccione forma depago</option>
                            @if ($formasdepago)
                               @foreach ($formasdepago as $formadepago)
                                  <option value="{{ $formadepago->nombre }}">{{ $formadepago->nombre }}</option>
                               @endforeach
                            @endif
                         </select>
                    </div>
                </div>
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
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Observación (opcional)</p>
                    </div>
                    <x-input wire:model.lazy="descripcion" placeholder="Observación" id="descripcion" class="block mt-1 w-full {{$errors->has('descripcion') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="descripcion" :value="old('descripcion')" autocomplete="descripcion"  />
                    @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-8 mb-8">
            <x-button class="text-white bg-gray-800 font-medium" type="submit">Modificar</x-button>
        </div>
    </form>
</div>