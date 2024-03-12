<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat peran
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'editor']);
        Role::create(['name' => 'penulis']);

        // Membuat izin
        Permission::create(['name' => 'membuat']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'hapus']);
        Permission::create(['name' => 'permanen']);
        Permission::create(['name' => 'pulihkan']);

        $roleAdmin = Role::findByName('admin');
        $roleEditor = Role::findByName('editor');
        $rolePenulis = Role::findByName('penulis');

        $roleAdmin->givePermissionTo(['membuat', 'edit', 'hapus', 'permanen', 'pulihkan']);
        $roleEditor->givePermissionTo(['membuat', 'edit', 'hapus']);
        $rolePenulis->givePermissionTo(['membuat']);

        // Memberikan peran kepada pengguna yang telah ada
        $userAdmin = User::where('email', 'mugianto1nd@gmail.com')->first();
        $userAdmin->assignRole($roleAdmin);
        
        $userEditor = User::where('email', 'editor@example.com')->first();
        $userEditor->assignRole($roleEditor);
        
        $userPenulis = User::where('email', 'penulis@example.com')->first();
        $userPenulis->assignRole($rolePenulis);
    }
}
