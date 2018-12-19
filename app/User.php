<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property boolean $is_admin
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     *
     *
     * @var array
     */
    protected $guarded = [
        'id', 'password', 'remember_token', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * Get all of the messages for the user.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
