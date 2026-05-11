<?php

use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

test('it belongs to a user', function () {
    $idea = Idea::factory()->create();
    expect($idea->user)->toBeInstanceOf(User::class);
});

test('it can have steps', function () {
    $idea = Idea::factory()->create();

    expect($idea->steps)->toBeInstanceOf(Collection::class);
    expect($idea->steps)->toBeEmpty();
});

test('it has many steps', function () {
    $idea = Idea::factory()->create();
    $idea->steps()->createMany([
        ['description' => 'Step 1', 'completed' => false],
        ['description' => 'Step 2', 'completed' => false],
    ]);

    expect($idea->steps)->toBeInstanceOf(Collection::class);
    expect($idea->steps)->toHaveCount(2);
    expect($idea->steps->first())->toBeInstanceOf(App\Models\Step::class);
});
