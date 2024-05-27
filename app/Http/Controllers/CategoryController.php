<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    protected array $availableColors;
    protected string $selectedColor;

    public function __construct()
    {
        $this->availableColors = Category::getAvailableColors();
        $this->selectedColor = Category::getDefaultColor();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Auth::user()
            ->categories()
            ->latest()
            ->with('user')
            ->get()
            ->groupBy('type');

        return view('categories.index', [
            'incomeCategories' => $categories['income'] ?? [],
            'expenseCategories' => $categories['expense'] ?? [],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $icons = File::files(resource_path("images/categories"));

        return view('categories.create', [
            'availableColors' => $this->availableColors,
            'selectedColor' => $this->selectedColor,
            'icons' => $icons,
            'selectedIcon' => 'image',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $attributes = $request->validated();

        $category = Auth::user()->categories()->create($attributes);

        return Redirect::route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->view('categories.show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $icons = File::files(resource_path("images/categories"));

        return view('categories.edit', [
            'category' => $category,
            'availableColors' => $this->availableColors,
            'selectedColor' => $category->color,
            'icons' => $icons,
            'selectedIcon' => $category->icon,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
