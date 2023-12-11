<?php

namespace App\Repositories;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Models\Category;
class CategoryRepository 
{
    public function allCategories(){
        return Category::latest()->paginate(10);
    }
    public function storeCategories($data){
        return Category::create($data);
    }
    public function findCategories($id){
        return Category::find($id);
    }
    public function updateCategories($data, $id){
        $category = Category::where('id', $id)->first();
        $category->name = $data['name'];
        $category->name = $data['slug'];
        $category->save();
    }
    public function destroyCategories($id){
        $category = Category::find($id);
        $category->delete();
    }

}