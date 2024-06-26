<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class SearchController extends Controller
{
    public function searchCategories(Request $request, $type)
    {
        $search = $request->input('search');

        $categories = Category::query()
            ->latest()
            ->with('transactions')
            ->where('user_id', Auth::user()->id)
            ->where('type', $type)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->get();

        return view('categories.partials.results', compact('categories'));
    }

    public function searchIcons(Request $request)
    {
        $query = strtolower($request->input('icon-search', ''));
        $iconMetadata = Config::get('icons');

        usort($iconMetadata, function ($a, $b) {
            return strcmp($a['icon'], $b['icon']);
        });

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
