@props(['transaction'])

<x-transactions.row
    :href="route('transactions.edit', $transaction->id)"
    :type="$transaction->category->type"
    :title="$transaction->title"
    :date="$transaction->created_at"
    :details="$transaction->details"
    :amount="Number::currency($transaction->amount, in: 'BGN', locale: 'bg')"
    :category-color="$transaction->category->color_class"
    :category-icon="$transaction->category->icon"/>
