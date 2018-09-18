<?php

namespace App\Policies;

use App\Model\Admin\Admin;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUsersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function view(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        //
        return $this->getPermission($user, 7);

    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function update( Admin $user)
    {
        //
        return $this->getPermission($user, 8);

    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function delete( Admin $user)
    {
        //
        return $this->getPermission($user, 9);

    }


    public function role(Admin $admin){

        return $this->getPermission($admin, 4);

    }
    public function permission(Admin $admin){

        return $this->getPermission($admin, 5);

    }

    public function productCreate(Admin $admin){

        return $this->getPermission($admin, 10);

    }

    public function getPermission($user, $permission_id){

        foreach($user->roles as $role){

            foreach ($role->permissions as $permission){

                if ($permission->id == $permission_id){

                    return true;
                }

            }

        }

        return false;

    }
}
