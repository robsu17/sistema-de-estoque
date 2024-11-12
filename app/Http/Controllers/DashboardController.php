<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $querySearch = $request->query('query');
        $category = $request->query('category');
        $location = $request->query('location');

        $products = $this->getProducts($querySearch, $category, $location);

        return view(
            'pages.dashboard.index',
            compact('products')
        );
    }

    public function reports()
    {
        $total = Product::query()->sum('quantity');
        $excessProducts = Product::query()
            ->orderBy('quantity', 'desc')
            ->limit(5)->get();

        $lowStockProduct = Product::query()
            ->orderBy('quantity', 'asc')
            ->limit(5)->get();

        $location1 = Location::query()->with('products')->find(1);
        $location2 = Location::query()->with('products')->find(2);
        $location3 = Location::query()->with('products')->find(3);
        $location4 = Location::query()->with('products')->find(4);

        $locations = [$location1, $location2, $location3, $location4];

        return view(
            'pages.dashboard.reports',
            compact(
                'total',
                'excessProducts',
                'lowStockProduct',
                'locations',
            )
        );
    }

    public function movements()
    {
        $stockMovements = StockMovement::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'pages.dashboard.stock-movements',
            compact(
                'stockMovements'
            )
        );
    }

    public function baixa(Request $request, $productId)
    {
        $product = Product::query()->find($productId);

        $resultStock = $product->quantity - $request->quantidade;

        $product->update([
            'quantity' => $resultStock
        ]);

        $total = $request->quantidade * $product->price;

        StockMovement::create([
            'total' => $total,
            'quantity' => $request->quantidade,
            'product_id' => $productId,
            'status' => false
        ]);

        return redirect()->back()->with('success.baixa', "Produto atualizado com sucesso! (ID: $product->id)");
    }

    private function getProducts(array|string|null $querySearch, array|string|null $category, array|string|null $location): \Illuminate\Database\Eloquent\Collection
    {
        return Product::query()
            ->when($querySearch, function ($query) use ($querySearch) {
                $query->where('name', 'like', '%' . $querySearch . '%');
            })
            ->when($category, function ($query) use ($category) {
                $query->whereHas('category', function ($query) use ($category) {
                    $query->where('id', $category);
                });
            })
            ->when($location, function ($query) use ($location) {
                $query->whereHas('location', function ($query) use ($location) {
                    $query->where('id', $location);
                });
            })
            ->get();
    }
}
