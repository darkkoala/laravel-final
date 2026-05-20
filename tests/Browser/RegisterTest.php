<?php

test('it registers a new user', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john@example.com')
        ->fill('password', 'password')
        ->click('@register-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    $this->assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);

    expect(Auth::user()->name)->toBe('John Doe');
});
