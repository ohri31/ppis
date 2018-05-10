<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use DB;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
  
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'company_name', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fetchRolesAsArray() {
        return DB::table('roles')
                    ->select('roles.id')
                    ->leftJoin('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->where('model_has_roles.model_id', $this->id)
                    ->where('model_type', 'App\User')
                    ->pluck('roles.id')
                    ->toArray();
    }
}
