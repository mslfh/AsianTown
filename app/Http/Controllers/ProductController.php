<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryItem;
use App\Models\Unit;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Product;
use Phpml\CrossValidation\StratifiedRandomSplit;
use Phpml\Dataset\CsvDataset;
use Phpml\Regression\LeastSquares;
use Phpml\Metric\Regression\MeanAbsoluteError;
use Phpml\Metric\Regression\MeanSquaredError;
use Phpml\ModelManager;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all()->toArray();
        return view('products.index', ['products' => $products]);
    }

    public function getAllProductName()
    {

        $product = Product::query()->select(['id','main_name','abbreviation'])->get()->toArray();
        return [
            'product' => $product
        ];
    }


    public function create()
    {
        $units = Unit::all()->toArray();

        $categories = ProductCategoryItem::all();

        $select2_categories = $this->mapCategories(0, $categories);

        return view('products.create',[
            'units' => $units,
            'select2_categories' => $select2_categories,
        ]);
    }

    function mapCategories($pid, $categories) {
        return $categories->filter(function ($category) use ($pid) {
            return $category->pid == $pid;
        })->map(function ($category) use ($categories) {
            $children = $this->mapCategories($category->id, $categories);
            $result = [
                'id' => $category->id,
                'text' => $category->name
            ];
            if (count($children) > 0) {
                $result['children'] = $children;
            }
            return $result;
        })->values()->all();
    }


    public function store(Request $request)
    {
        $data = $request->only([
            'main_name',
            'chinese_name',
            'barcode',
            'image_url',
            'type',
            'description',
            'basic_price'
        ]);
        $product = new Product($data);
        $product->save();
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
