<?php

it('register a user', function () {
    $email = 'bob+' . uniqid() . '@example.com';

    $this->get('/register')->assertSuccessful();

    $this->post('/register', [
        'name' => 'Bob Doe',
        'email' => $email,
        'password' => 'password',
        'password_confirmation' => 'password',
    ])->assertRedirect('/ideas');

    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', [
        'email' => $email,
    ]);
});
