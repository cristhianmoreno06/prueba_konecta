<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::all();

        return view('home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name_product = $request->get('name_product');
        $product->reference = $request->get('reference');
        $product->price = $request->get('price');
        $product->weight = $request->get('weight');
        $product->category = $request->get('category');
        $product->stock = $request->get('stock');

        if ($product->save()) {
            Alert::success('Creación de producto', 'Producto creado correctamente');
            return redirect()->route('admin.create');
        }
        Alert::error('', 'No se pudo crear el producto')->persistent();

        return redirect()->route('admin.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $product = Product::whereId($id)->first();

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $editProduct = Product::whereId($id)->first();
        $editProduct->name_product = $request->get('name_product');
        $editProduct->reference = $request->get('reference');
        $editProduct->price = $request->get('price');
        $editProduct->weight = $request->get('weight');
        $editProduct->category = $request->get('category');
        $editProduct->stock = $request->get('stock');

        if ($editProduct->save()) {
            Alert::success('Edición de producto', 'Producto editado correctamente');

            return redirect()->route('admin.list');
        }
        Alert::error('', 'No se pudo editar el producto')->persistent();

        return redirect()->route('admin.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        if(Product::whereId($id)->delete()) {
            Alert::success('Eliminación de producto', 'Producto eliminado correctamente');
        }else {
            Alert::error('', 'No se pudo eliminar el producto')->persistent();
        }

        return redirect()->route('admin.list');
    }
}
