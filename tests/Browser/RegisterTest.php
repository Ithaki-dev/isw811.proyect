<?php

use App\Models\User;

it('registers a user', function () {
    $response = $this->post('/register', [
        'name' => 'Pepe Pérez',
        'email' => 'pepe@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertRedirect('/');
    $this->assertDatabaseHas('users', ['email' => 'pepe@example.com']);
});

it('requires all fields', function () {
    $response = $this->post('/register', []);
    $response->assertSessionHasErrors(['name', 'email', 'password']);
});

it('requires unique email', function () {
    User::factory()->create(['email' => 'pepe@example.com']);

    $response = $this->post('/register', [
        'name' => 'Pepe Pérez',
        'email' => 'pepe@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertSessionHasErrors(['email']);
    

});

it('requires password confirmation', function () {
    $response = $this->post('/register', [
        'name' => 'Pepo Jimenez',
        'email' => 'pepo@example.com',
        'password' => 'admin123',
        'password_confirmation' => 'admin333',
    ]);

    $response->assertSessionHasErrors(['password']);
});
