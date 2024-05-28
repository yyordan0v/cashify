<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

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
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(HtmxRequest $request)
    {
        $icons = File::files(resource_path("images/categories"));
        $data = [
            'availableColors' => $this->availableColors,
            'selectedColor' => $this->selectedColor,
            'icons' => $icons,
            'selectedIcon' => 'image',
        ];

        if ($request->isHtmxRequest()) {
            return HtmxResponse::addFragment('categories.create', 'form', $data);
        }

        return view('categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $attributes = $request->validated();

        $category = Auth::user()->categories()->create($attributes);

        return HtmxResponse::addFragment('categories.show', 'panel', ['category' => $category]);
    }

    /**
     * Display the specified resource.
     */
    public function show(HtmxRequest $request, Category $category)
    {
        if ($request->isHtmxRequest()) {
            return HtmxResponse::addFragment('categories.show', 'panel', [
                'category' => $category,
            ]);
        }

        return view('categories.show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HtmxRequest $request, Category $category)
    {
        $icons = File::files(resource_path("images/categories"));
        $data = [
            'category' => $category,
            'availableColors' => $this->availableColors,
            'selectedColor' => $category->color,
            'icons' => $icons,
            'selectedIcon' => $category->icon,
        ];

        if ($request->isHtmxRequest()) {
            return HtmxResponse::addFragment('categories.edit', 'form', $data);
        }

        return view('categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category = Category::findOrFail($category->id);

        $attributes = $request->validated();

        $category->update($attributes);

        return HtmxResponse::addFragment('categories.show', 'panel', ['category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return '';
    }

    public function loadTab($type)
    {
        $categories = Auth::user()
            ->categories()
            ->latest()
            ->with('user')
            ->get()
            ->groupBy('type');


        if ($type == 'expense') {
            return HtmxResponse::addFragment('categories.index', 'expense', [
                'expenseCategories' => $categories['expense'] ?? [],
                'type' => $type
            ]);
        } elseif ($type == 'income') {
            return HtmxResponse::addFragment('categories.index', 'income', [
                'incomeCategories' => $categories['income'] ?? [],
                'type' => $type
            ]);
        }

        return response()->json(['message' => 'Invalid category type'], 400);
    }
}
