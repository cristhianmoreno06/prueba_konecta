<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::all();

        return view('sale.list', compact('products'));
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

        return view('sale.form', compact('product'));
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
        $finalStock = $editProduct->stock - $request->get('quantity');

        if ($finalStock < 0) {
            Alert::info('Venta de producto', 'El producto no tiene las cantidades necesarias para venderse');

            return redirect()->back();
        }

        $editProduct->stock = $finalStock;

        if ($editProduct->save()) {
            $sale = new Sale();
            $sale->product_id = $editProduct->id;
            $sale->quantity = $request->get('quantity');

            if ($sale->save()) {
                Alert::success('Venta de producto', 'Producto vendido correctamente');

                return redirect()->route('sale.list');
            } else {
                Alert::error('', 'No se pudo vender el producto')->persistent();

                return redirect()->route('sale.list');
            }
        }
        Alert::error('', 'No se pudo vender el producto')->persistent();

        return redirect()->route('sale.list');
    }
}
