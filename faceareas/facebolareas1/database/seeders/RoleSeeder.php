<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Gerente']);
        $role3 = Role::create(['name' => 'Jefe de Area - Comercial']);
        $role4 = Role::create(['name' => 'Jefe de Area - Sistema']);
        $role5 = Role::create(['name' => 'Jefe de Area - Marketing']);
        $role6 = Role::create(['name' => 'Jefe de Area - Administracion']);
        $role7 = Role::create(['name' => 'Jefe de Area - Contabilidad']);
        $role8 = Role::create(['name' => 'Jefe de Area - Emprendimiento']);
        $role9 = Role::create(['name' => 'Auxiliar - Comercial']);
        $role10 = Role::create(['name' => 'Auxiliar - Sistema']);
        $role11 = Role::create(['name' => 'Auxiliar - Marketing']);
        $role12 = Role::create(['name' => 'Auxiliar - Administracion']);
        $role13 = Role::create(['name' => 'Auxiliar - Contabilidad']);
        $role14 = Role::create(['name' => 'Auxiliar - Emprendimiento']);

        Permission::create(['name' => 'Administrador'])->syncRoles([$role1]);
        Permission::create(['name' => 'Gerente'])->syncRoles([$role2]);
        Permission::create(['name' => 'Jefe de Area - Comercial'])->syncRoles([$role3]);
        Permission::create(['name' => 'Jefe de Area - Sistemas'])->syncRoles([$role4]);
        Permission::create(['name' => 'Jefe de Area - Marketing'])->syncRoles([$role5]);
        Permission::create(['name' => 'Jefe de Area - Administracion'])->syncRoles([$role6]);
        Permission::create(['name' => 'Jefe de Area - Contabilidad'])->syncRoles([$role7]);
        Permission::create(['name' => 'Jefe de Area - Emprendimiento'])->syncRoles([$role8]);

        Permission::create(['name' => 'user.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'rol.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'permiso.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'empresa.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'tarjeta.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'cliente.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'convenio.index'])->syncRoles([$role1]);

    }
}