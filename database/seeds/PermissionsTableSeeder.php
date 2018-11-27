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
            'slug'         => 'users_create',
            'description'  => 'Crea un nuevo usuario',
        ]);

        Permission::create([
            'name'         => 'Ver usuarios',
            'slug'         => 'users_index',
            'description'  => 'Muestra una lista de los usuarios',
        ]);

        Permission::create([
            'name'         => 'Ver perfil de usuario',
            'slug'         => 'users_show',
            'description'  => 'Permite ver la información de un usuario',
        ]);

        Permission::create([
            'name'         => 'Editar perfil de usuario',
            'slug'         => 'users_edit',
            'description'  => 'Permite editar la información de un usuario',
        ]);

        Permission::create([
            'name'         => 'Eliminar usuario',
            'slug'         => 'users_destroy',
            'description'  => 'Elimina a un usuario',
        ]);

        Permission::create([
            'name'         => 'Crear empresa',
            'slug'         => 'companies_create',
            'description'  => 'Crea una nueva empresa',
        ]);

        Permission::create([
            'name'         => 'Ver empresas',
            'slug'         => 'companies_index',
            'description'  => 'Muestra una lista de las empresas',
        ]);

        Permission::create([
            'name'         => 'Ver información de la empresa',
            'slug'         => 'companies_show',
            'description'  => 'Permite ver la información de una empresa',
        ]);

        Permission::create([
            'name'         => 'Editar empresa',
            'slug'         => 'companies_edit',
            'description'  => 'Permite editar la información de una empresa',
        ]);

        Permission::create([
            'name'         => 'Eliminar empresa',
            'slug'         => 'companies_destroy',
            'description'  => 'Elimina una empresa',
        ]);

        Permission::create([
            'name'         => 'Crear departamento',
            'slug'         => 'departments_create',
            'description'  => 'Crea un nuevo departamento',
        ]);

        Permission::create([
            'name'         => 'Ver departamentos',
            'slug'         => 'departments_index',
            'description'  => 'Muestra una lista de los departamentos',
        ]);

        Permission::create([
            'name'         => 'Ver información del departamento',
            'slug'         => 'departments_show',
            'description'  => 'Permite ver la información de un departamento',
        ]);

        Permission::create([
            'name'         => 'Editar departamento',
            'slug'         => 'departments_edit',
            'description'  => 'Permite editar la información de un departamento',
        ]);

        Permission::create([
            'name'         => 'Eliminar departamento',
            'slug'         => 'departments_destroy',
            'description'  => 'Elimina un departamento',
        ]);

        Permission::create([
            'name'         => 'Crear rol',
            'slug'         => 'roles_create',
            'description'  => 'Crea un nuevo rol',
        ]);

        Permission::create([
            'name'         => 'Ver roles',
            'slug'         => 'roles_index',
            'description'  => 'Muestra una lista de los roles',
        ]);

        Permission::create([
            'name'         => 'Editar rol',
            'slug'         => 'roles_edit',
            'description'  => 'Permite editar la información de un rol',
        ]);

        Permission::create([
            'name'         => 'Eliminar rol',
            'slug'         => 'roles_destroy',
            'description'  => 'Elimina un rol',
        ]);
    }
}
