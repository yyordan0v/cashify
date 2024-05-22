<?php

use App\Models\Account;
use App\Models\User;

it('belongs to a user', function () {
    $user = User::factory()->create();
    $account = Account::factory()->create([
        'user_id' => $user->id,
    ]);

    expect($account->user)->toBeInstanceOf(User::class)->and($account->user->id)->toBe($user->id);
});

it('requires a user id', function () {
    $response = $this->post('/accounts', [
        'name' => 'Savings Account',
        'ballance' => 1000.00
    ]);

    $response->assertSessionHasErrors('user_id');
});

