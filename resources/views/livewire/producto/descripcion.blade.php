<div>
    <form wire:submit.prevent = "submit">
        @csrf
        <x-wire-card class="flex justify-center items-center ml-10 mr-10">
        <div class="grid grid-rows-1 gap-1">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-1">
                {{--Codigo--}}
                <div class="mt-4">
                    <div class="flex justify-center items-center mr-2">
                        <p class="text-red-500 font-semibold">¿Qué descripción desea agregar a la base de datos?</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-red-700">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="select">
                        <select wire:model="descripcion" class="rounded w-full">
                            <option value="">Seleccione una descripción</option>
                            @if ($descripciones)
                               @foreach ($descripciones as $descripcion)
                                  <option value="{{ $descripcion->nombre }}">{{ $descripcion->nombre }}</option>
                               @endforeach
                            @endif
                         </select>
                    </div>
                </div> 

                @if ($descipcionSeleccionada === 'Marca')
                    <div class="mt-4">
                        <div class="flex justify-center items-center">
                            <p class="text-red-500 font-semibold text-center">Marca</p>
                        </div>
                        <x-input wire:model.lazy="marca" placeholder="Marca " id="marca" class="block mt-1 w-full {{$errors->has('marca') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="marca" :value="old('marca')" autocomplete="marca"  />
                       
                    </div>
                @endif
                @if ($descipcionSeleccionada === 'Talle')
                    <div class="mt-4">
                        <div class="flex justify-center items-center">
                            <p class="text-red-500 font-semibold text-center">Talle</p>
                        </div>
                        <x-input wire:model.lazy="talle" placeholder="Talle " id="talle" class="block mt-1 w-full {{$errors->has('talle') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="talle" :value="old('talle')" autocomplete="talle"  />
                       
                    </div>
                @endif
                @if ($descipcionSeleccionada === 'Tipo de prenda')
                    <div class="mt-4">
                        <div class="flex justify-center items-center">
                            <p class="text-red-500 font-semibold">Tipo de prenda</p>
                        </div>
                        <x-input wire:model.lazy="tipodeprenda" placeholder="Tipo de prenda " id="tipodeprenda" class="block mt-1 w-full {{$errors->has('tipodeprenda') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="tipodeprenda" :value="old('tipodeprenda')" autocomplete="tipodeprenda"  />
                       
                    </div>
                @endif
                @if ($descipcionSeleccionada === 'Color')
                <div class="mt-4">
                    <div class="flex justify-center items-center">
                        <p class="text-red-500 font-semibold">Color</p>
                    </div>
                    <x-input wire:model.lazy="color" placeholder="Color" id="color" class="block mt-1 w-full {{$errors->has('color') ? 'border-red-500 focus:border-red-500 focus:ring-0' : ''}}" type="text" name="color" :value="old('color')" autocomplete="color"  />
                   
                </div>
            @endif
                

            </div>
        </div>
    </x-wire-card>
        <div class="flex justify-center mt-8 mb-8">
            <x-wire-button class="rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium" type="submit">Agregar</x-wire-button>
        </div>
    </form>

    <div class="lg:flex lg:flex-wrap sm:block">
        <div class="lg:w-1/4 sm:w-full lg:pr-4 lg:mb-0 mb-4">
            <x-wire-card>
                <div class="flex justify-center items-center">
                    <p class="text-red-500 font-semibold">Marca</p>
                </div>
                <div>
                    @if($marcaslista)
                        @foreach ($marcaslista as $marca)
                            <li>{{$marca->nombre}}</li>
                         @endforeach
                    @endif
                </div>
            </x-wire-card>
        </div>
        
        <div class="lg:w-1/4 sm:w-full lg:pr-4 lg:mb-0 mb-4">
            <x-wire-card>
                <div class="flex justify-center items-center">
                    <p class="text-red-500 font-semibold">Tipo de prenda</p>
                </div>
                <div>
                    @if($tiposdeprendalista)
                        @foreach ($tiposdeprendalista as $marca)
                            <li>{{$marca->nombre}}</li>
                         @endforeach
                    @endif
                </div>
            </x-wire-card>
        </div>
        
        <div class="lg:w-1/4 sm:w-full lg:pr-4 lg:mb-0 mb-4">
            <x-wire-card>
                <div class="flex justify-center items-center">
                    <p class="text-red-500 font-semibold">Talles</p>
                </div>
                <div>
                    @if($talleslista)
                        @foreach ($talleslista as $marca)
                            <li>{{$marca->nombre}}</li>
                         @endforeach
                    @endif
                </div>
            </x-wire-card>
        </div>
        
        <div class="lg:w-1/4 sm:w-full">
            <x-wire-card>
                <div class="flex justify-center items-center">
                    <p class="text-red-500 font-semibold">Color</p>
                </div>
                <div>
                    @if($coloreslista)
                        @foreach ($coloreslista as $marca)
                            <li>{{$marca->nombre}}</li>
                         @endforeach
                    @endif
                </div>
            </x-wire-card>
        </div>
    </div>
</div>