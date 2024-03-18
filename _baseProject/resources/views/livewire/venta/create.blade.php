<div>
    <form wire:submit.prevent = "submit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-1/2 lg:mr-6">
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

                                 @error('opcionSeleccionada') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @if($propiedades)
                        <div class="mt-8 mb-8" >
                            <x-wire-card>
                            <ul>
                                    <li class="text-red-500 font-semibold mt-4 text-lg">Descripción: {{$propiedades->descripcion}}</li>
                                    
                                    <li class="text-red-500 font-semibold mt-4 text-lg">Precio de venta: {{$propiedades->precioFinal}}</li>

                                    <li class="text-red-500 font-semibold mt-4 text-lg">Stock disponible: 
                                    
                                    @if($propiedades->cantidad < 1)
                                        <p class="text-red-500 font-semibold">No hay stock disponible de este producto</p>
                                    @else
                                    {{$propiedades->cantidad}}
                                    @endif
                                </li>
                             </ul>
                            </x-wire-card>
                        </div>
                        @endif
                </div>
            </div> 
            <div class="w-full lg:w-1/2">
                
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Número de comprobante de venta</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="codigotransaccion" placeholder="Código de la venta" id="codigotransaccion" class="block mt-1 w-full {{$errors->has('codigotransaccion') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="codigotransaccion" :value="old('codigotransaccion')" autocomplete="codigotransaccion"  />
                    @error('codigotransaccion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
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
                <p class="text-black font-semibold">No hay stock disponible para la cantidad seleccionada</p>
                @endif
            @endif  
              
                {{--Precio de Costo--}}
                <div class="mt-4">
                    <p class="text-red-500 font-semibold">¿Desea realizar alguna operación?</p>
                    <div class="select">
                        <select wire:model="operacion" class="rounded w-full">
                            <option value="">Seleccione si aplicará alguna operación</option>
                            @if ($operaciones)
                                @foreach ($operaciones as $operacion)
                                    <option value="{{ $operacion->nombre }}">{{ $operacion->nombre }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                @error('operacion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                
                @if ($descuentoSeleccionado === 'Descuento')
                    <div class="mt-4">
                        <div class="flex justify-start items-center">
                            <p class="text-red-500 font-semibold">Cantidad de descuento</p>
                        </div>
                        <x-input wire:model.lazy="cantidaddelooperado" placeholder="Cantidad de descuento " id="cantidaddelooperado" class="block mt-1 w-full {{$errors->has('cantidaddelooperado') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="cantidaddelooperado" :value="old('cantidaddelooperado')" autocomplete="cantidaddelooperado"  />
                       
                    </div>
                @endif
                @if ($descuentoSeleccionado === 'Recargo')
                    <div class="mt-4">
                        <div class="flex justify-start items-center">
                            <p class="text-red-500 font-semibold">Cantidad de recargo</p>
                        </div>
                        <x-input wire:model.lazy="cantidaddelooperado" placeholder="Cantidad de recargo " id="cantidaddelooperado" class="block mt-1 w-full {{$errors->has('cantidaddelooperado') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="cantidaddelooperado" :value="old('cantidaddelooperado')" autocomplete="cantidaddelooperado"  />
                       
                    </div>
                @endif
                <div class="mt-4">
                    <p class="text-red-500 font-semibold">Forma de pago</p>
                    <div class="select">
                        <select wire:model="formadepago" class="rounded w-full">
                            <option value="">Seleccione forma de pago</option>
                            @if ($formasdepago)
                               @foreach ($formasdepago as $formadepago)
                                  <option value="{{ $formadepago->nombre }}">{{ $formadepago->nombre }}</option>
                               @endforeach
                            @endif
                         </select>
                    </div>
                    @error('formadepago') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
                    <x-wire-textarea wire:model="descripcion" placeholder="Observación" />
                        @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Comprobante de pago recibido</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input accept=".png, .jpg, .jpeg" name="comprobantepago" id="comprobantepago" wire:model="comprobantepago" class="block w-full mt-1 text-sm rounded-full bg-slate-100 text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" type="file" multiple>
                    @error('comprobantepago') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-8 mb-8">
            <x-wire-button class="rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium" type="submit">Agregar</x-wire-button>
        </div>
    </form>
</div>