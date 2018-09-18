<?php

namespace App\Policies;

use App\Model\Admin\Admin;
use App\Model\Admin\Product;
//use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function view(User $user, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        //
        return $this->getPermission($user, 10);

    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function update(Admin $user)
    {
        //
        return $this->getPermission($user, 11);

    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(Admin $user)
    {
        //
        return $this->getPermission($user, 12);

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
