<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TransactionFilter
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $query)
    {
        $this->applyTypeFilter($query);
        $this->applyCategoryFilter($query);
        $this->applyStatusFilter($query);
        $this->applyBudgetFilter($query);
        $this->applyGoalFilter($query);
        $this->applyAmountFilter($query);
        $this->applyTitleFilter($query);
        $this->applyNotesFilter($query);

        return $query;
    }

    protected function applyTypeFilter(Builder $query)
    {
        if ($this->request->has('type')) {
            if ($this->request->type === 'income') {
                $query->whereHas('category', function ($q) {
                    $q->where('type', 'income');
                });
            } elseif ($this->request->type === 'expense') {
                $query->whereHas('category', function ($q) {
                    $q->where('type', 'expense');
                });
            }
        }
    }

    protected function applyCategoryFilter(Builder $query)
    {
        if ($this->request->has('category')) {
            $query->where('category_id', $this->request->category);
        }
    }

    protected function applyStatusFilter(Builder $query)
    {
        if ($this->request->has('status')) {
            $query->where('status', $this->request->status);
        }
    }

    protected function applyBudgetFilter(Builder $query)
    {
        if ($this->request->has('budget')) {
            $query->where('budget', $this->request->budget);
        }
    }

    protected function applyGoalFilter(Builder $query)
    {
        if ($this->request->has('goal')) {
            $query->where('goal', $this->request->goal);
        }
    }

    protected function applyAmountFilter(Builder $query)
    {
        if ($this->request->has('min_amount') && $this->request->has('max_amount')) {
            $query->whereBetween('amount', [$this->request->min_amount, $this->request->max_amount]);
        } elseif ($this->request->has('min_amount')) {
            $query->where('amount', '>=', $this->request->min_amount);
        } elseif ($this->request->has('max_amount')) {
            $query->where('amount', '<=', $this->request->max_amount);
        }
    }

    protected function applyTitleFilter(Builder $query)
    {
        if ($this->request->has('title')) {
            $query->where('title', 'like', '%'.$this->request->title.'%');
        }
    }

    protected function applyNotesFilter(Builder $query)
    {
        if ($this->request->has('notes')) {
            $query->where('notes', 'like', '%'.$this->request->notes.'%');
        }
    }
}
