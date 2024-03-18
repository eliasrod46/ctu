<div>
    <form wire:submit.prevent = "submit"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-rows-1 gap-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                {{--Codigo--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Código del Producto</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="codigo" placeholder="Código" id="codigo" class="block mt-1 w-full {{$errors->has('codigo') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="codigo" :value="old('codigo')" autocomplete="codigo" />
                    @error('codigo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Marca</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="select">
                        <select wire:model="marca" class="rounded w-full">
                            <option value="">Seleccione una marca</option>
                            @if ($marcas)
                               @foreach ($marcas as $marca)
                                  <option value="{{ $marca->nombre }}">{{ $marca->nombre }}</option>
                               @endforeach
                            @endif
                         </select>
                    </div>
                    @error('marca') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Tipo de prenda</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="select">
                        <select wire:model="tipodeprenda" class="rounded w-full">
                            <option value="">Seleccione un tipo de prenda</option>
                            @if ($marcas)
                               @foreach ($tiposdeprenda as $tipodeprenda)
                                  <option value="{{ $tipodeprenda->nombre }}">{{ $tipodeprenda->nombre }}</option>
                               @endforeach
                            @endif
                         </select>
                    </div>
                    @error('tipodeprenda') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Talle</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="select">
                        <select wire:model="talle" class="rounded w-full">
                            <option value="">Seleccione talle</option>
                            @if ($talles)
                               @foreach ($talles as $talle)
                                  <option value="{{ $talle->nombre }}">{{ $talle->nombre }}</option>
                               @endforeach
                            @endif
                         </select>
                    </div>
                    @error('talle') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Color</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="select">
                        <select wire:model="color" class="rounded w-full">
                            <option value="">Seleccione un color</option>
                            @if ($colores)
                               @foreach ($colores as $color)
                                  <option value="{{ $color->nombre }}">{{ $color->nombre }}</option>
                               @endforeach
                            @endif
                         </select>
                    </div>
                    @error('color') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                {{--Descripcion--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Descripción (opcional)</p>
                        
                    </div>
                    <x-wire-textarea wire:model="descripcion" />
                        @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                {{--Precio de Costo--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center mr-2">
                        <p class="text-red-500 font-semibold">Precio de Costo</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="precioCosto" placeholder="Precio de Costo" id="precioCosto" class="block mt-1 w-full {{$errors->has('precioCosto') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="precioCosto" :value="old('precioCosto')" autocomplete="precioCosto" :value="number_format(floatval($precioCosto), 2, '.', ',')"/>
                        
                    @error('precioCosto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                {{--precioFinal--}}
                {{--<div class="mt-4">
                    <div class="flex justify-start items-center">
                        <x-label class="mr-2" for="precioFinal" value="{{ __('Precio Final') }}" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="precioFinal" placeholder="Precio Final" id="precioFinal" class="block mt-1 w-full {{$errors->has('precioFinal') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="precioFinal" :value="old('precioFinal')" autocomplete="precioFinal"  :value="number_format(floatval($precioFinal), 2, '.', ',')"/>
                    @error('precioFinal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>--}}
                {{--cantidad--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Cantidad en stock</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-input wire:model.lazy="cantidad" placeholder="Cantidad de Stock" id="cantidad" class="block mt-1 w-full {{$errors->has('cantidad') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="number" name="cantidad" :value="old('cantidad')" autocomplete="cantidad"  />
                    @error('cantidad') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <div class="flex justify-start items-center mr-2">
                        <p class="text-red-500 font-semibold">Proveedor</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="select">
                        <select wire:model="proveedor" class="rounded w-full">
                            <option value="">Seleccione un proveedor</option>
                            @if ($proveedores)
                               @foreach ($proveedores as $proveedor)
                                  <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                               @endforeach
                            @endif
                         </select>
                    </div>
                </div> 
                {{--foto--}}
                <div class="mt-4">
                    <div class="flex justify-start items-center">
                        <p class="text-red-500 font-semibold">Foto del producto</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input accept=".png, .jpg, .jpeg" name="imagen" id="imagen" wire:model="imagen" class="block w-full mt-1 text-sm rounded-full bg-slate-100 text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" type="file" multiple>
                    @error('imagen') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-8 mb-8">
            <x-wire-button class="rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium" type="submit">Agregar</x-wire-button>
        </div>
    </form>
</div>