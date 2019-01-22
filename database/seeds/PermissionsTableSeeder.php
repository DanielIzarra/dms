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
            'name'         => 'Crear usuario empresa',
            'slug'         => 'users_create',
            'description'  => 'Crea un nuevo usuario en la empresa',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Ver usuarios',
            'slug'         => 'users_index',
            'description'  => 'Muestra una lista de todos los usuarios del sistema',
            'isroot'       => '1',
        ]);

        Permission::create([
            'name'         => 'Ver usuarios de la empresa',
            'slug'         => 'users_index_company',
            'description'  => 'Muestra una lista de todos los usuarios de la empresa',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Ver usuarios departamento',
            'slug'         => 'users_index_department',
            'description'  => 'Muestra una lista de todos los usuarios del departamento',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Ver perfil de usuario',
            'slug'         => 'users_show',
            'description'  => 'Permite ver la información de un usuario',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Editar perfil de usuario',
            'slug'         => 'users_edit',
            'description'  => 'Permite editar la información de un usuario',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Eliminar usuario',
            'slug'         => 'users_destroy',
            'description'  => 'Permite eliminar un usuario',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Crear empresa',
            'slug'         => 'companies_create',
            'description'  => 'Crea una nueva empresa',
            'isroot'       => '1',
        ]);

        Permission::create([
            'name'         => 'Ver empresas',
            'slug'         => 'companies_index',
            'description'  => 'Muestra una lista de las empresas',
            'isroot'       => '1',
        ]);

        Permission::create([
            'name'         => 'Administrar empresa',
            'slug'         => 'company_index',
            'description'  => 'Muestra panel de administración de la empresa',
            'isroot'       => '0',
        ]);        

        Permission::create([
            'name'         => 'Ver información de la empresa',
            'slug'         => 'companies_show',
            'description'  => 'Permite ver la información de una empresa',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Editar empresa',
            'slug'         => 'companies_edit',
            'description'  => 'Permite editar la información de una empresa',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Eliminar empresa',
            'slug'         => 'companies_destroy',
            'description'  => 'Permite eliminar una empresa',
            'isroot'       => '1',
        ]);

        Permission::create([
            'name'         => 'Crear departamento',
            'slug'         => 'departments_create',
            'description'  => 'Crea un nuevo departamento',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Ver departamentos',
            'slug'         => 'departments_index',
            'description'  => 'Muestra una lista de los departamentos',
            'isroot'       => '0',
        ]);  

        Permission::create([
            'name'         => 'Ver información del departamento',
            'slug'         => 'departments_show',
            'description'  => 'Permite ver la información de un departamento',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Editar departamento',
            'slug'         => 'departments_edit',
            'description'  => 'Permite editar la información de un departamento',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Eliminar departamento',
            'slug'         => 'departments_destroy',
            'description'  => 'Permite eliminar un departamento',
            'isroot'       => '0',
        ]);

        Permission::create([
            'name'         => 'Crear rol',
            'slug'         => 'roles_create',
            'description'  => 'Crea un nuevo rol',
            'isroot'       => '1',
        ]);

        Permission::create([
            'name'         => 'Ver roles',
            'slug'         => 'roles_index',
            'description'  => 'Muestra una lista de los roles',
            'isroot'       => '1',
        ]);

        Permission::create([
            'name'         => 'Editar rol',
            'slug'         => 'roles_edit',
            'description'  => 'Permite editar la información de un rol',
            'isroot'       => '1',
        ]);

        Permission::create([
            'name'         => 'Eliminar rol',
            'slug'         => 'roles_destroy',
            'description'  => 'Permite eliminar un rol',
            'isroot'       => '1',
        ]);
    }
}
