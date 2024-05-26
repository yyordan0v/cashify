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

it('creates an account when user is authenticated', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/accounts', [
        'name' => 'Savings Account',
        'balance' => 1000.00,
        'color' => 'gray'
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('accounts', [
        'user_id' => $user->id,
        'name' => 'Savings Account',
        'balance' => 1000.00,
        'color' => 'gray',
    ]);
});

it('fails to create an account when user is not authenticated', function () {
    $response = $this->post('/accounts', [
        'name' => 'Savings Account',
        'balance' => 1000.00,
        'color' => 'gray'
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

it('requires a name', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/accounts', [
        'balance' => 1000.00,
        'color' => 'gray'
    ]);

    $response->assertSessionHasErrors('name');
});

it('requires a balance', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/accounts', [
        'name' => 'Savings Account',
        'color' => 'gray'
    ]);

    $response->assertSessionHasErrors('balance');
});

it('requires a color', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/accounts', [
        'name' => 'Savings Account',
        'balance' => 1000.00
    ]);

    $response->assertSessionHasErrors('color');
});

it('can create an account', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/accounts', [
        'user_id' => $user->id,
        'name' => 'Savings Account',
        'balance' => 1000.00,
        'color' => 'gray'
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('accounts', [
        'user_id' => $user->id,
        'name' => 'Savings Account',
        'balance' => 1000.00,
        'color' => 'gray'
    ]);
});

it('accounts page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/accounts');

    $response->assertOk();
});
