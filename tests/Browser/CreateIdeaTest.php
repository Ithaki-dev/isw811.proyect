<?php

use App\Models\User;
use App\Models\Idea;

it('can create an idea', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/ideas', [
        'title' => 'My First Idea',
        'description' => 'This is my first idea description',
    ]);

    $response->assertRedirect('/ideas');
    $this->assertDatabaseHas('ideas', [
        'title' => 'My First Idea',
        'user_id' => $user->id,
    ]);
});

it('requires title and description', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/ideas', []);

    $response->assertSessionHasErrors(['title', 'description']);
});

it('redirects guests to login', function () {
    $response = $this->post('/ideas', [
        'title' => 'My First Idea',
        'description' => 'This is my first idea description',
    ]);

    $response->assertRedirect('/login');
});