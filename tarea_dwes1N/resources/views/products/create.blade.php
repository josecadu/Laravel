@extends('plantillas.base')
@section('titulo')
CREAR
@endsection
@section('cabecera')
Crear Productos
@endsection
@section('contenido')
<div class="w-4/6 bg-gray-500 mx-auto rounded-xl border flex items-center justify-center p-6">
    <div class="w-full max-w-lg bg-gray-800 rounded-lg shadow-md">
        <!-- Formulario -->
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <!-- Contenedor de campos -->
            <div class="p-6 space-y-4">
                <!-- Campo: Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-300">Nombre</label>
                    <input type="text" id="nombre" name="nombre"
                        class="mt-1 block w-full rounded-md bg-gray-500 pl-2 shadow-sm "
                        >
                </div>

                <!-- Campo: Descripción -->
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-300">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="3"
                        class="mt-1 block w-full pl-2 rounded-md  shadow-sm bg-gray-500 "
                        ></textarea>
                </div>

                <!-- Campo: Stock y Categoría en la misma línea -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Campo: Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-300">Stock</label>
                        <input type="number" id="stock" name="stock" min="0"
                            class="mt-1 block w-full pl-2 rounded-md  shadow-sm bg-gray-500"
                            >
                    </div>
                    <!-- Campo: Categoría -->
                    <div>
                        <label for="categoria" class="block text-sm font-medium text-gray-300">Categoría</label>
                        <select id="categoria" name="categoria"
                            class="mt-1 block w-full pl-2 rounded-md  shadow-sm bg-gray-500"
                            >
                            <option value="" disabled selected>Seleccione una categoría</option>
                            @foreach ($categorias as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Campo: Imagen -->
                <div class="my-2">
                    <label for="imagen" class="block text-sm font.medium text-gray-500">Imagen</label>
                    <div class="flex justify-between align-center py-5">
                        <div class="pt-4">
                            <input type="file" name="imagen" accept="image/*" id="imagen"
                                oninput="preview.src=window.URL.createObjectURL(this.files[0])" />
                        </div>

                        <div class="ml-2 ">
                            <img id="preview" src="{{Storage::url('images/products/noImage.png')}}" alt="" class="w.80 p.80  object-fill border-2 rounded-xl">
                        </div>
                    </div>
                </div>
                <!-- Contenedor de botones -->
                <div class="p-4 flex justify-center space-x-4">
                    <button type="reset"
                        class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Reset
                    </button>
                    <button type="button"
                        class="px-6 py-2 bg-red-500 text-white rounded-lg shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-2 bg-green-500 text-white rounded-lg shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Aceptar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection