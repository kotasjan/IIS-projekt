<?php

namespace App\Policies;

use App\User;
use App\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the employee.
     *
     * @param  \App\User  $user
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function view(User $user, Employee $employee)
    {
        return $user->id == $employee->id;
    }

    /**
     * Determine whether the user can create employees.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can update the employee.
     *
     * @param  \App\User  $user
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function update(User $user, Employee $employee)
    {
        return $user->id == $employee->id;
    }

    /**
     * Determine whether the user can delete the employee.
     *
     * @param  \App\User  $user
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function delete(User $user, Employee $employee)
    {
        return $user->isAdmin;
    }

}
