<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

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

        return view('category.index', [
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

        return view('category.create', [
            'availableColors' => $this->availableColors,
            'selectedColor' => $this->selectedColor,
            'icons' => $icons,
            'selectedIcon' => 'image',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->view('category.show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request, Category $category)
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

    public function searchIcons(Request $request)
    {
        $query = strtolower($request->input('icon-search', ''));
        $iconMetadata = Config::get('icons');
        $icons = [];

        foreach ($iconMetadata as $data) {
            if (stripos($data['icon'], $query) !== false || $this->matchesKeywords($query, $data['tags'])) {
                $icons[] = $data['icon'];
            }
        }

        return view('categories.partials.icons', compact('icons'));
    }

    private function matchesKeywords($query, $keywords)
    {
        foreach ($keywords as $keyword) {
            if (stripos($keyword, $query) !== false) {
                return true;
            }
        }
        return false;
    }
}
