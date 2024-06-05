<?php

namespace App\Policies;

use App\Models\Transaction;
use App\Models\User;

class TransactionPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Transaction $transaction): bool
    {
        return $transaction->user && $transaction->user->is($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Transaction $transaction): bool
    {
        return $transaction->user && $transaction->user->is($user) && in_array($transaction->category->type,
                ['expense', 'income']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Transaction $transaction): bool
    {
        return $transaction->user && $transaction->user->is($user) && in_array($transaction->category->type,
                ['expense', 'income']);
    }
}
