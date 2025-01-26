<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos=Product::with('category')->orderBy('id','desc')->paginate(5);
        return view('products.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias=Category::all();
        return view('products.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto=Product::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'stock'=>$request->stock,
            'category_id'=>$request->categoria,
            'imagen'=>($request->imagen) ? $request->imagen->store('images/products') : 'images/products/noImage.png'
        ]);
        return redirect()->route('products.index')->with('mensage', 'producto creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if(basename($product->imagen)!='noImage.png'){
            Storage::delete($product->imagen);
        }
        $product->delete();
        return redirect()->route('products.index')->with('mensage', 'producto borrado');
    }
}
