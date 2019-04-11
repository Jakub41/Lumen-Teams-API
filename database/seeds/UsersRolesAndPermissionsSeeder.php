<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Prophecy\Doubler\Doubler;

class UsersRolesAndPermissions extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
      //Member Role
      $memberRole = Role::create(['name' => 'member']);
      $memberPermission = Permission::create(['name' => 'View team members']);

      $memberRole->givePermissionTo($memberPermission);

      // Owner Role
      $ownerRole = Role::create(['name' => 'owner']);
      $ownerPermissions[] = Permission::create(['name' => 'create team']);
      $memberPermission[] = Permission::create(['name' => 'edit team title']);
	    $ownerPermissions[] = Permission::create(['name' => 'delete team']);
	    $ownerPermissions[] = Permission::create(['name' => 'assign member to team']);
	    $ownerPermissions[] = $memberPermission;

      $ownerRole->syncPermission($ownerPermissions);

  }
}
