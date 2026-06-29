<?php

use App\Models\User;

it('logs in a user', function () {
    $user = User::factory()->create([
        'email' => 'pepe@example.com',
        'password' => 'password123',
    ]);

    $response = $this->post('/login', [
        'email' => 'pepe@example.com',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/');
    $this->assertAuthenticatedAs($user);
});

it('requires all fields', function () {
    $response = $this->post('/login', []);
    $response->assertSessionHasErrors(['email', 'password']);
});

it('requires valid credentials', function () {
    $response = $this->post('/login', [
        'email' => 'pepe@example.com',
        'password' => 'wrongpassword',
    ]);

    $response->assertSessionHasErrors(['email']);
});
