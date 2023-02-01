<?php


use TomatoPHP\TomatoRoles\Http\Middleware\Can;

Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/users', [\TomatoPHP\TomatoRoles\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('admin/users/api', [\TomatoPHP\TomatoRoles\Http\Controllers\UserController::class, 'api'])->name('users.api');
    Route::get('admin/users/create', [\TomatoPHP\TomatoRoles\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('admin/users', [\TomatoPHP\TomatoRoles\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('admin/users/{model}', [\TomatoPHP\TomatoRoles\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('admin/users/{model}/edit', [\TomatoPHP\TomatoRoles\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::post('admin/users/{model}', [\TomatoPHP\TomatoRoles\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('admin/users/{model}', [\TomatoPHP\TomatoRoles\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/roles', [\TomatoPHP\TomatoRoles\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::get('admin/roles/api', [\TomatoPHP\TomatoRoles\Http\Controllers\RoleController::class, 'api'])->name('roles.api');
    Route::get('admin/roles/create', [\TomatoPHP\TomatoRoles\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
    Route::post('admin/roles', [\TomatoPHP\TomatoRoles\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::get('admin/roles/{model}', [\TomatoPHP\TomatoRoles\Http\Controllers\RoleController::class, 'show'])->name('roles.show');
    Route::get('admin/roles/{model}/edit', [\TomatoPHP\TomatoRoles\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::post('admin/roles/{model}', [\TomatoPHP\TomatoRoles\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::delete('admin/roles/{model}', [\TomatoPHP\TomatoRoles\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
});


Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::post('/admin/developer/password', [\TomatoPHP\TomatoRoles\Http\Controllers\DeveloperController::class, 'check'])->name('developer.check');
    Route::post('/admin/developer/logout', [\TomatoPHP\TomatoRoles\Http\Controllers\DeveloperController::class, 'logout'])->name('developer.logout');
});
