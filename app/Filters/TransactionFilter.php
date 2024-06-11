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
        $this->applyStatusFilter($query);
        $this->applyAmountFilter($query);
        $this->applyTitleFilter($query);
        $this->applyDetailsFilter($query);

        return $query;
    }

    protected function applyTypeFilter(Builder $query): void
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

    protected function applyCategoryFilter(Builder $query): void
    {
        if ($this->request->has('category')) {
            $query->where('category_id', $this->request->category);
        }
    }

    protected function applyStatusFilter(Builder $query): void
    {
        if ($this->request->has('status')) {
            $query->where('status', $this->request->status);
        }
    }

    protected function applyTitleFilter(Builder $query): void
    {
        if ($this->request->has('title')) {
            $query->where('title', 'like', '%'.$this->request->title.'%');
        }
    }

    protected function applyAmountFilter(Builder $query): void
    {
        if ($this->request->has('min_amount') && $this->request->has('max_amount')) {
            $query->whereBetween('amount', [$this->request->min_amount, $this->request->max_amount]);
        } elseif ($this->request->has('min_amount')) {
            $query->where('amount', '>=', $this->request->min_amount);
        } elseif ($this->request->has('max_amount')) {
            $query->where('amount', '<=', $this->request->max_amount);
        }
    }

    protected function applyDetailsFilter(Builder $query): void
    {
        if ($this->request->has('details')) {
            $query->where('details', 'like', '%'.$this->request->notes.'%');
        }
    }
}
