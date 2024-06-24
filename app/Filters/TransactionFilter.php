<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TransactionFilter
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $query): Builder
    {
        $this->applyTypeFilter($query);
        $this->applyCategoryFilter($query);
        $this->applyAmountFilter($query);
        $this->applyTitleFilter($query);
        $this->applyDetailsFilter($query);
        $this->applyDateRangeFilter($query);

        return $query;
    }

    protected function applyTypeFilter(Builder $query): void
    {
        if ($this->request->filled('types')) {
            $types = $this->request->get('types');

            $query->whereHas('category', function ($q) use ($types) {
                $q->whereIn('type', $types);
            });
        }
    }

    protected function applyCategoryFilter(Builder $query): void
    {
        if ($this->request->filled('categories')) {
            $categoryIds = $this->request->input('categories');
            $query->whereIn('category_id', $categoryIds);
        }
    }

    protected function applyTitleFilter(Builder $query): void
    {
        if ($this->request->filled('title')) {
            $query->where('title', 'like', '%'.$this->request->title.'%');
        }
    }

    protected function applyAmountFilter(Builder $query): void
    {
        if ($this->request->filled('min_amount') && $this->request->filled('max_amount')) {
            $query->whereBetween('amount', [$this->request->min_amount, $this->request->max_amount]);
        } elseif ($this->request->filled('min_amount')) {
            $query->where('amount', '>=', $this->request->min_amount);
        } elseif ($this->request->filled('max_amount')) {
            $query->where('amount', '<=', $this->request->max_amount);
        }
    }

    protected function applyDetailsFilter(Builder $query): void
    {
        if ($this->request->filled('details')) {
            $query->where('details', 'like', '%'.$this->request->details.'%');
        }
    }

    protected function applyDateRangeFilter(Builder $query): void
    {
        if ($this->request->filled('date_range')) {
            [$startDate, $endDate] = parseDateRange($this->request->input('date_range'));
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    }
}
