<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class CategoryController extends Controller
{
    protected array $availableColors;
    protected string $selectedColor;
    protected string $colorShade;

    public function __construct()
    {
        $category = new Category();
        $this->colorShade = $category->shade ?? 300;
        $this->availableColors = $category::getAvailableColors();
        $this->selectedColor = $category::getDefaultColor();
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
            ->orderBy('name', 'asc')
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
    public function create(HtmxRequest $request)
    {
        $icons = File::files(resource_path("images/categories"));
        $data = [
            'availableColors' => $this->availableColors,
            'selectedColor' => $this->selectedColor,
            'colorShade' => $this->colorShade,
            'icons' => $icons,
            'selectedIcon' => 'image',
        ];

        return view('categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $attributes = $request->validated();

        Auth::user()->categories()->create($attributes);

        $urlParams = $attributes['type'] === 'income' ? ['tab' => '2'] : [];

        flashToast('success', 'Category created successfully.');

        return Redirect::route('categories.index', $urlParams);
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
            'colorShade' => $this->colorShade,
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
        $oldType = $category->type;

        $category = Category::findOrFail($category->id);

        $attributes = $request->validated();

        $category->update($attributes);

        if ($oldType !== $category->type) {
            $urlParams = $category->type === 'income' ? ['tab' => '2'] : [];

            return HtmxResponse::addFragment('categories.show', 'panel', ['category' => $category])
                ->location(route('categories.index', $urlParams))
                ->retarget('#'.$category->type.'-list')
                ->reswap('afterbegin');
        }

        return HtmxResponse::addFragment('categories.show', 'panel', ['category' => $category])
            ->pushUrl(route('categories.index'))
            ->retarget('this')
            ->reswap('outerHTML');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return '';
    }
}
