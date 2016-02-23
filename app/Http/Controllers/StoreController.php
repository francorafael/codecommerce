<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;


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


    public function create(Category $category) {
        $categories = $category->lists('name', 'id');
        return view ('products.create', compact('categories'));
    }

//    public function categories($id)
//    {
//        $category = Category::find($id);
//        $products = $this->productModel->category()->paginate(10);
//        //$products= Product::listagem($id)->get();
//        $categories = Category::all();
//        return view ('store.categories', compact('products', 'categories', 'category'));
//    }

    public function categories($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id','=',$id)->paginate(2);
        $categories = Category::all();
        return view ('store.categories', compact('products', 'categories', 'category'));
    }
}
