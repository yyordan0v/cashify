<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreAccountRequest;
use App\Http\Requests\Category\UpdateAccountRequest;
use App\Models\Account;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    protected array $availableColors;
    protected string $selectedColor;

    public function __construct()
    {
        $this->availableColors = Account::getAvailableColors();
        $this->selectedColor = Account::getDefaultColor();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
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
    public function update(UpdateAccountRequest $request, Category $category)
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
