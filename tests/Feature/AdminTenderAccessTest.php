<?php

use App\Models\Tender;
use App\Models\User;

test('users cannot change tenders owned by someone else', function () {
    // Arrange
    $company = User::factory()->create(['role' => 'company']);
    $tender = Tender::factory()->create();

    // Act + Assert
    $this->actingAs($company)->get(route('admin.tenders.edit', $tender))->assertForbidden();
    $this->actingAs($company)->put(route('admin.tenders.update', $tender))->assertForbidden();
    $this->actingAs($company)->delete(route('admin.tenders.destroy', $tender))->assertForbidden();

    expect(Tender::find($tender->id))->not->toBeNull();
});

test('users can change their own tenders', function () {
    // Arrange
    $company = User::factory()->create(['role' => 'company']);
    $tender = Tender::factory()->create(['user_id' => $company->id]);

    // Act + Assert
    $this->actingAs($company)->get(route('admin.tenders.edit', $tender))->assertOk();
    $this->actingAs($company)->delete(route('admin.tenders.destroy', $tender))->assertRedirect();

    expect(Tender::find($tender->id))->toBeNull();
});

test('admins can change any tender', function () {
    // Arrange
    $admin = User::factory()->create(['role' => 'admin']);
    $tender = Tender::factory()->create();

    // Act + Assert
    $this->actingAs($admin)->get(route('admin.tenders.edit', $tender))->assertOk();
    $this->actingAs($admin)->delete(route('admin.tenders.destroy', $tender))->assertRedirect();

    expect(Tender::find($tender->id))->toBeNull();
});
