<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;    
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = $this->categoryRepository->allCategories();
        return view("categories.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $this->categoryRepository->storeCategories($data);

        return redirect()->route('categories.index')->with("message", "Categoria criada");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = $this->categoryRepository->findCategories($id);
        return view("categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nome' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $this->categoryRepository->updateCategories($request->all(), $id);

        return redirect()->route('categories.index')->with("message", 'atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->categoryRepository->destroyCategories($id);

        return redirect()->route('categories.index')->with("message", "deletado com sucesso");
    }
}
