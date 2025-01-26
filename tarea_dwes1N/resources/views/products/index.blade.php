@extends('plantillas.base')
@section('titulo')
Inicio
@endsection
@section('cabecera')
LISTA DE PRODUCTOS
@endsection
@section('contenido')
<div class="flex flex-row-reverse">
    <a href="{{route('products.create')}}" class=" text-white border rounded-lg hover:bg-green-400 bg-green-600 mx-6 my-1 py-1 px-2 mt-5">
        <i class="fas fa-add text-white mr-2"></i>NEW
    </a>
</div>
<div>
    <table class=" rounded-lg w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full border" src="{{Storage::url($item->imagen)}}" alt="{{$item->nombre}}">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$item->nombre}}</div>

                    </div>
                </th>
                <td class="px-6 py-4 text-grey-900">
                    {{$item->descripcion}}
                </td>
                <td class="px-6 py-4">
                    <div @class([ "p-1.5 h-7 w-7 rounded-full" , "bg-green-600 text-white"=>$item->stock>20,
                        "bg-yellow-400 text-black"=>$item->stock>10 && $item->stock<=19, "bg-orange-600 text-white pl-2.5"=>$item->stock<10, "bg-red-500"=>$item->stock==0
                                ])
                                > {{$item->stock}}</div>
                </td>
                <td class="px-4 py-4">
                    <div style="background-color:{{$item->category->color}}" class="border border-black rounded-xl text-center px-1">
                        <a href="" class="font-medium text-blue-600 dark:text-black hover:underline ">{{$item->category->nombre}}</a>
                    </div>
                </td>
                <td class="px-8 py-4 ">
                    <form action="{{route('products.destroy',$item)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('products.edit',$item)}}">
                            <i class="fas fa-edit text-blue-400"></i>
                        </a>
                        <button type="submit">
                            <i class="fas fa-trash text-red-500"></i>
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="mt-2">
        {{$productos->links()}}
    </div>
</div>

@endsection