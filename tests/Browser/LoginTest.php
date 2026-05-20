<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;    

test('it logs in a user', function () {

    User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
    ]);

    visit('/login')
        ->fill('email', 'john@example.com')
        ->fill('password', 'password')
        ->click('@login-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    $this->assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);

    expect(Auth::user()->name)->toBe('John Doe');
});

test('it logs a user out', function () {

    $user = User::factory()->create();

    $this->actingAs($user);

    visit('/')
        ->click('@logout-button')
        ->assertPathIs('/');

    $this->assertGuest();

});
