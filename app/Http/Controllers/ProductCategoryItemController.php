<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategoryItem; // Import the ProductCategoryItem class

class ProductCategoryItemController extends Controller
{
    public function index()
    {
        $items = ProductCategoryItem::all();

        $select2_categories = $this->mapCategories(0, $items);
        return view('categories.index',[
            'items' => $select2_categories,
        ]);
    }

    public function getAllCategories()
    {
        $items = ProductCategoryItem::all();

        $select2_categories = $this->mapCategories(0, $items);

        return [
            'items' => $select2_categories,
        ];
    }

    function mapCategories($pid, $categories) {
        return $categories->filter(function ($category) use ($pid) {
            return $category->pid == $pid;
        })->map(function ($category) use ($categories) {
            $children = $this->mapCategories($category->id, $categories);
            $result = [
                'id' => $category->id,
                'text' => $category->name.'【'. $category->chinese_name.'】'
            ];
            if (count($children) > 0) {
                $result['children'] = $children;
            }
            return $result;
        })->values()->all();
    }

    public function create()
    {
        return view('product_category_items.create');
    }

    public function store(Request $request)
    {
        $product_category_item = new ProductCategoryItem;
        $product_category_item->name = $request->input('name');
        $product_category_item->chinese_name = $request->input('chinese_name');
        $product_category_item->pid = $request->input('pid');
        $product_category_item->save();

        return redirect()->route('product_category_item.index');
    }

    public function show(ProductCategoryItem $product_category_item)
    {
        return view('product_category_items.show', compact('item'));
    }

    public function edit(ProductCategoryItem $product_category_item)
    {
        return view('product_category_items.edit', compact('item'));
    }

    public function update(Request $request, ProductCategoryItem $product_category_item)
    {
        $product_category_item->name = $request->input('name');
        $product_category_item->chinese_name = $request->input('chinese_name');
        $product_category_item->pid = $request->input('pid');
        $product_category_item->save();

        return redirect()->route('product_category_item.index');
    }

    public function destroy(ProductCategoryItem $product_category_item)
    {
        // 查找并删除所有的子项
        $children = ProductCategoryItem::where('pid', $product_category_item->id)->get();
        foreach ($children as $child) {
            $child->delete();
        }

        // 删除 product_category_item
        $product_category_item->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
