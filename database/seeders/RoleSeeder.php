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
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Blogger']);
        $role3 = Role::create(['name'=>'Tienda']);

        Permission::create(['name'=>'admin.home', 'description'=>'Ver el Dasboard'])->SyncRoles([$role1, $role2,$role3]);

        Permission::create(['name'=>'admin.users.index', 'description'=>'Ver Listado de usuarios'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit', 'description'=>'Editar usuario'])->SyncRoles([$role1]);
      //  Permission::create(['name'=>'admin.users.update', 'description'=>'Actualizar usuario'])->SyncRoles([$role1]);

        Permission::create(['name'=>'admin.categories.index', 'description'=>'Ver listado de usuarios'])->SyncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.categories.create', 'description'=>'crear categorias'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.edit', 'description'=>'Editar categorias'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.destroy', 'description'=>'Eliminar categorias'])->SyncRoles([$role1]);

        Permission::create(['name'=>'admin.tags.index', 'description'=>'Listar tags'])->SyncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.tags.create', 'description'=>'crear tags'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.edit', 'description'=>'editar tags'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.destroy', 'description'=>'eliminat tags'])->SyncRoles([$role1]);

        Permission::create(['name'=>'admin.posts.index', 'description'=>'listar posts'])->SyncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.create', 'description'=>'crear posts'])->SyncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.edit', 'description'=>'editar posts'])->SyncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.destroy', 'description'=>'eliminar posts'])->SyncRoles([$role1, $role2]);

        Permission::create(['name'=>'admin.clientes.index', 'description'=>'listar clientes'])->SyncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'admin.clientes.create', 'description'=>'crear clientes'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.clientes.edit', 'description'=>'editar clientes'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.clientes.show', 'description'=>'Ver Clientes'])->SyncRoles([$role1,$role2, $role3]);
        Permission::create(['name'=>'admin.clientes.destroy', 'description'=>'eliminar clientes'])->SyncRoles([$role1]);



        Permission::create(['name'=>'admin.roles.index', 'description'=>'listar roles'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.create', 'description'=>'crear roles'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.edit', 'description'=>'editar roles'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.destroy', 'description'=>'eliminar roles'])->SyncRoles([$role1]);


    }
}
