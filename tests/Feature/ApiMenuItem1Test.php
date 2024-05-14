<?php

use App\Models\MenuItem1;

test('menampilkan data', function () {
    $response = $this->get('/api/menuItem1');

    $response->assertStatus(200);

    expect($response->getContent())->toBeJson();
});

test('menambahkan data', function () {
    $menuItem1 = MenuItem1::factory()->create();

    $response = $this->post('/api/menuItem1/store', $menuItem1->toArray());
    $response->assertStatus(201);

    $this->assertDatabaseHas('menu_items_1', $menuItem1->toArray());

    expect($response->json())->toHaveKey('message');
    $menuItem1->delete();
});

test('menampilkan 1 data ', function () {
    $menuItem1 = MenuItem1::factory()->create();

    $response = $this->get("/api/menuItem1/show/{$menuItem1->id}");
    $response->assertStatus(200);

    expect($response->getContent())->toBeJson();

    $menuItem1->delete();
});

test('mengubah data', function () {
    $menuItem1 = MenuItem1::factory()->create();

    $updateMenuItem1 = [
        'name' => 'Nama Makanan Update',
        'description' => 'Deskripsi Makanan Update',
        'price' => 100,
        'category' => 'Kategori Update',
        'image' => 'https://www.blibli.com/friends-backend/wp-content/uploads/2022/11/24b5469496e15e10897db2e8778d906e.jpg',
    ];

    $response = $this->put("/api/menuItem1/update/{$menuItem1->id}", $updateMenuItem1);
    $response->assertStatus(200);

    $this->assertDatabaseHas('menu_items_1', $updateMenuItem1);

    expect($response->json())->toHaveKey('message');

    $menuItem1->delete();
});

test('menghapus data', function () {
    $menuItem1 = MenuItem1::factory()->create();

    $response = $this->delete("/api/menuItem1/delete/{$menuItem1->id}");
    $response->assertStatus(200);

    $this->assertDatabaseMissing('menu_items_1', $menuItem1->toArray());

    expect($response->json())->toHaveKey('message');

    $menuItem1->delete();
});
