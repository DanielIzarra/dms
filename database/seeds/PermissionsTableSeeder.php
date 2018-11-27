<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'         => 'Crear usuario',
            'slug'         => 'users.create',
            'description'  => 'Crea un nuevo usuario',
        ]);

        Permission::create([
            'name'         => 'Ver usuarios',
            'slug'         => 'users.index',
            'description'  => 'Muestra una lista de los usuarios',
        ]);

        Permission::create([
            'name'         => 'Ver perfil de usuario',
            'slug'         => 'users.show',
            'description'  => 'Permite ver la información de un usuario',
        ]);

        Permission::create([
            'name'         => 'Editar perfil de usuario',
            'slug'         => 'users.edit',
            'description'  => 'Permite editar la información de un usuario',
        ]);

        Permission::create([
            'name'         => 'Eliminar usuario',
            'slug'         => 'users.destroy',
            'description'  => 'Elimina a un usuario',
        ]);

        Permission::create([
            'name'         => 'Crear empresa',
            'slug'         => 'companies.create',
            'description'  => 'Crea una nueva empresa',
        ]);

        Permission::create([
            'name'         => 'Ver empresas',
            'slug'         => 'companies.index',
            'description'  => 'Muestra una lista de las empresas',
        ]);

        Permission::create([
            'name'         => 'Ver información de la empresa',
            'slug'         => 'companies.show',
            'description'  => 'Permite ver la información de una empresa',
        ]);

        Permission::create([
            'name'         => 'Editar empresa',
            'slug'         => 'companies.edit',
            'description'  => 'Permite editar la información de una empresa',
        ]);

        Permission::create([
            'name'         => 'Eliminar empresa',
            'slug'         => 'companies.destroy',
            'description'  => 'Elimina una empresa',
        ]);

        Permission::create([
            'name'         => 'Crear departamento',
            'slug'         => 'departments.create',
            'description'  => 'Crea un nuevo departamento',
        ]);

        Permission::create([
            'name'         => 'Ver departamentos',
            'slug'         => 'departments.index',
            'description'  => 'Muestra una lista de los departamentos',
        ]);

        Permission::create([
            'name'         => 'Ver información del departamento',
            'slug'         => 'departments.show',
            'description'  => 'Permite ver la información de un departamento',
        ]);

        Permission::create([
            'name'         => 'Editar departamento',
            'slug'         => 'departments.edit',
            'description'  => 'Permite editar la información de un departamento',
        ]);

        Permission::create([
            'name'         => 'Eliminar departamento',
            'slug'         => 'departments.destroy',
            'description'  => 'Elimina un departamento',
        ]);

        Permission::create([
            'name'         => 'Crear rol',
            'slug'         => 'roles.create',
            'description'  => 'Crea un nuevo rol',
        ]);

        Permission::create([
            'name'         => 'Ver roles',
            'slug'         => 'roles.index',
            'description'  => 'Muestra una lista de los roles',
        ]);

        Permission::create([
            'name'         => 'Editar rol',
            'slug'         => 'roles.edit',
            'description'  => 'Permite editar la información de un rol',
        ]);

        Permission::create([
            'name'         => 'Eliminar rol',
            'slug'         => 'roles.destroy',
            'description'  => 'Elimina un rol',
        ]);
    }
}
