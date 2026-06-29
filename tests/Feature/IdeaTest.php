<?php

use App\Models\Idea;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

test('it belongs to a user', function () {
    $idea = Idea::factory()->create();
    $this->assertInstanceOf(User::class, $idea->user);
});

test('It can have steps', function () {
    $idea = Idea::factory()->create();
    expect($idea->steps)->toBeInstanceOf(Collection::class);

    $idea->steps()->create([
        'description' => 'Step 1',
    ]);

    expect($idea->fresh()->steps)->toHaveCount(1);
});
