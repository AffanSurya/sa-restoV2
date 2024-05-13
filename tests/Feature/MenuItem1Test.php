<?php

use App\Models\MenuItem1;
use App\Models\User;

beforeEach(function () {
    $this->user = User::findOrFail(1);
});

test('example', function () {
    $response = $this->actingAs($this->user)->get('/');

    $response->assertStatus(200);
});

it('menampilkan data', function () {
    $response = $this->actingAs($this->user)->get('/menuItem1');

    $response->assertStatus(200);
});

it('menambahkan data', function () {
    $menuItem1 = MenuItem1::factory()->create();

    $response = $this->actingAs($this->user)->post('/menuItem1/store', $menuItem1->toArray());
    $response->assertStatus(302);

    $this->assertDatabaseHas('menu_items_1', $menuItem1->toArray());

    $menuItem1->delete();
});

it('menampilkan 1 data untuk di edit', function () {
    $menuItem1 = MenuItem1::factory()->create();

    $response = $this->actingAs($this->user)->get("/menuItem1/edit/{$menuItem1->id}");
    $response->assertStatus(200);

    $menuItem1->delete();
});

it('mengubah data', function () {
    $menuItem1 = MenuItem1::factory()->create();

    $updateMenuItem1 = [
        'name' => 'Nama Makanan Update',
        'description' => 'Deskripsi Makanan Update',
        'price' => 100,
        'category' => 'Kategori Update',
        'image' => 'https://example.com/image-update.jpg',
    ];

    $response = $this->actingAs($this->user)->put("/menuItem1/update/{$menuItem1->id}", $updateMenuItem1);
    $response->assertStatus(302);

    $this->assertDatabaseHas('menu_items_1', $updateMenuItem1);

    $menuItem1->delete();
});

it('menghapus data', function () {
    $menuItem1 = MenuItem1::factory()->create();

    $response = $this->actingAs($this->user)->delete("/menuItem1/delete/{$menuItem1->id}");
    $response->assertStatus(302);

    $this->assertDatabaseMissing('menu_items_1', $menuItem1->toArray());

    $menuItem1->delete();
});
