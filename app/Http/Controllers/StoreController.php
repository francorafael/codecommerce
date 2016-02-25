<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;


class StoreController extends Controller
{

    private $productModel;
    private $categoryModel;
    public function __construct(Product $productModel, Category $categoryModel) {
        $this->productModel = $productModel;
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $pFeatured = Product::featured()->get();
        $pRecommend= Product::recommend()->get();
        $categories = Category::all();
        return view ('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::ofCategory($id)->get();
        return view ('store.category', compact('categories', 'products',  'category'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $tags = Product::find($id)->tags;
        return view ('store.product', compact('categories', 'product', 'tags'));
    }

    public function tag($id)
    {
        $categories = Category::all();
        $tag = Tag::find($id);
        $products = Tag::find($id)->products;
        return view ('store.tag', compact('categories', 'products',  'tag'));
    }






}
