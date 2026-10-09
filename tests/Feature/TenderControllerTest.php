<?php

use App\Models\Tender;
use App\Models\User;

test('lists tenders on the index page, showing a fallback when creator is unknown', function () {
    // Arrange
    Tender::factory()->create([
        'title' => 'Hello Tender',
        'user_id' => null,
    ]);

    // Act
    $response = $this->get('/tenders');

    // Assert
    $response->assertStatus(200);
    $response->assertSee('Hello Tender');
    $response->assertSee('entered by —');
});

test('lists tenders on the index page with their creator name', function () {
    // Arrange
    $user = User::factory()->create([
        'name' => 'John Doe',
    ]);

    Tender::factory()->create([
        'title' => 'Hello Tender',
        'user_id' => $user->id,
    ]);

    // Act
    $response = $this->get('/tenders');

    // Assert
    $response->assertStatus(200);
    $response->assertSee('Hello Tender');
    $response->assertDontSee('entered by —');
    $response->assertSee('John Doe');
});
