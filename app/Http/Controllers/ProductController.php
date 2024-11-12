<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('pages.dashboard.new-product');
    }

    public function store(StoreProductRequest $request)
    {
        $productData = $request->validated();

        $productCreated = Product::create($productData);

        if (!$productCreated) {
            return redirect()
                ->back()
                ->withErrors(['internal_server_error' => 'Erro ao cadastrar produto, tente novamente mais tarde!']);
        }

        return redirect()->route('dashboard');
    }

    public function show($productId)
    {
        $product = Product::query()->findOrFail($productId);
        return view('pages.dashboard.edit-product', compact('product'));
    }

    public function update(UpdateProductRequest $request, $productId)
    {
        $product = Product::query()->findOrFail($productId);
        $productData = $request->validated();

        $productUpdated = $product->update($productData);

        $total = $product->price * $productData['quantity'];

        StockMovement::create([
            'product_id' => $product->id,
            'quantity' => $productData['quantity'],
            'status' => true,
            'total' => $total,
        ]);

        if (!$productUpdated) {
            return redirect()
                ->back()
                ->withErrors(['product_update_error' => 'Erro ao atualizar produto, tente novamente mais tarde!']);
        }

        return redirect()
            ->route('dashboard')
            ->with('product_updated', "Produto atualizado com sucesso (ID: $product->id).");
    }

    public function destroy($productId)
    {
        Product::destroy($productId);
    }
}
