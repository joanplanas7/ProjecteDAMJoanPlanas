<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin = Role::create(['name' => 'Admin']);
        $rolPremium = Role::create(['name' => 'Prèmium']);
        $rolUsuari = Role::create(['name' => 'Usuari']);

        Permission::create(['name' => 'usuaris'])->syncRoles([$rolAdmin]);
        Permission::create(['name' => 'penjarApps'])->syncRoles([$rolAdmin]);
        Permission::create(['name' => 'administrarApps'])->syncRoles([$rolAdmin]);

        Permission::create(['name' => 'appsExclusives'])->syncRoles([$rolAdmin, $rolPremium]);
    }
}
