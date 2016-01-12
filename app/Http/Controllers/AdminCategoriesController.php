<?php

namespace CodeCommerce\Http\Controllers;




use CodeCommerce\Category;

class AdminCategoriesController extends Controller
{

    private $categories;
    public function __construct(Category $category)
    {
        $this->categories = $category;
    }


    public function index() {
        $categories = $this->categories->all();
        return view('category', compact('categories'));
    }

    public function inserir() {
    return "oi";
    }
}