<?php

use App\Models\Idea;
use App\Models\User;

function authenticatedUser(): User
{
    return User::factory()->create();
}

it('shows all ideas', function () {
    $user = authenticatedUser();

    $this->actingAs($user)
        ->get('/ideas')
        ->assertSuccessful();
});

it('shows a single idea', function () {
    $user = authenticatedUser();
    $idea = Idea::factory()->for($user)->create();

    $this->actingAs($user)
        ->get('/ideas/' . $idea->id)
        ->assertSuccessful();
});

it('shows the create idea form', function () {
    $user = authenticatedUser();

    $this->actingAs($user)
        ->get('/ideas/create')
        ->assertSuccessful();
});

it('shows the edit idea form', function () {
    $user = authenticatedUser();
    $idea = Idea::factory()->for($user)->create();

    $this->actingAs($user)
        ->get('/ideas/' . $idea->id . '/edit')
        ->assertSuccessful();
});

it('deletes an idea', function () {
    $user = authenticatedUser();
    $idea = Idea::factory()->for($user)->create();

    $this->actingAs($user)
        ->delete('/ideas/' . $idea->id)
        ->assertRedirect('/ideas');

    $this->assertDatabaseMissing('ideas', [
        'id' => $idea->id,
    ]);
});
