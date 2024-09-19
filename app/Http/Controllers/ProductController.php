<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return response()->json(['status' => 'success','data' =>$products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $product = Product::create($request->all());
            return response()->json(['status' => 'success', 'message' => 'Producto creado exitosamente','data' => $product]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $product = Product::findOrFail($id);
            return response()->json(['status' => 'success','data' => $product]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $product = Product::findOrFail($id);
            $product->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Producto actualizado exitosamente',
                'data' => $product]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error',
            'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Producto eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()]);
        }
    }
}
