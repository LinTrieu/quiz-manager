<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\UserPermission;


/**
 * Class User
 *
 * @property  int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property UserPermission $permission_level
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'user';

    protected function getUserPermissionLevel(User $user): UserPermission
    {
        return $user->permission_level;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','first_name', 'last_name', 'email', 'permission_level', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
