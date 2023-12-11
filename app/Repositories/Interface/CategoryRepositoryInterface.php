<?php 

namespace App\Repositories\Interface;

Interface CategoryRepositoryInterface{
    public function allCategories();
    public function storeCategories($data);
    public function findCategories($id);
    public function updateCategories($data, $id);
    public function destroyCategories($id);
}