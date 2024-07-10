<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);
        $role3 = Role::create(['name' => 'SuperAdmin']);

        // Inicio Permisos para el rol de administrador y súper administrador
            Permission::create(['name' => 'admin.index'])->syncRoles([$role1,$role3]);

            // Usuarios
            Permission::create(['name' => 'superadmin.users.index'])->assignRole($role3);

            //Banners
            Permission::create(['name' => 'admin.banners.index'])->assignRole($role1);
            Permission::create(['name' => 'admin.banner.create'])->assignRole($role1);
            Permission::create(['name' => 'admin.banner.edit'])->assignRole($role1);

            //Módulos
            Permission::create(['name' => 'admin.modules.index'])->assignRole($role1);
            Permission::create(['name' => 'admin.module.edit'])->assignRole($role1);

            // Videos
            Permission::create(['name' => 'admin.videos.index'])->assignRole($role1);
            Permission::create(['name' => 'admin.video.create'])->assignRole($role1);
            Permission::create(['name' => 'admin.video.edit'])->assignRole($role1);

            // Formatos
            Permission::create(['name' => 'admin.formats.index'])->assignRole($role1);
            Permission::create(['name' => 'admin.format.create'])->assignRole($role1);
            Permission::create(['name' => 'admin.format.edit'])->assignRole($role1);

            // Estaciones
            Permission::create(['name' => 'admin.stations.index'])->assignRole($role1);
            Permission::create(['name' => 'admin.station.create'])->assignRole($role1);
            Permission::create(['name' => 'admin.station.edit'])->assignRole($role1);

            // Autores
            Permission::create(['name' => 'admin.authors.index'])->assignRole($role1);
            Permission::create(['name' => 'admin.author.edit'])->assignRole($role1);
            Permission::create(['name' => 'admin.author.create'])->assignRole($role1);

            // Documentos
            Permission::create(['name' => 'admin.documents.index'])->assignRole($role1);
            Permission::create(['name' => 'admin.document.edit'])->assignRole($role1);
            Permission::create(['name' => 'admin.document.create'])->assignRole($role1);
            Permission::create(['name' => 'admin.download'])->assignRole($role1);

            // Playlist
            Permission::create(['name' => 'admin.playlists.index'])->assignRole($role1);
            Permission::create(['name' => 'admin.playlist.create'])->assignRole($role1);
            Permission::create(['name' => 'admin.playlist.edit'])->assignRole($role1);

            // Veredas
            Permission::create(['name' => 'admin.veredas.index'])->assignRole($role1);
            Permission::create(['name' => 'admin.vereda.create'])->assignRole($role1);
            Permission::create(['name' => 'admin.vereda.edit'])->assignRole($role1);

        //Fin permisos para el administrador y súper administrador

        //Permisos para el rol de usuario
            /*Permission::create(['name' => 'user.index'])->assignRole($role2);

            //Calculadora de fertilización
            Permission::create(['name' => 'user.calculator'])->assignRole($role2);
            Permission::create(['name' => 'user.resultsCalculator'])->assignRole($role2);

            //Estaciones meteorológicas
            Permission::create(['name' => 'user.station'])->assignRole($role2);
            Permission::create(['name' => 'user.indicator'])->assignRole($role2);

            //Documentos
            Permission::create(['name' => 'user.document'])->assignRole($role2);*/

        //Fin permisos para el rol de usuario
    }

}
