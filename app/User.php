<?php
# @Date:   2019-12-04T14:05:08+00:00
# @Last modified time: 2019-12-05T17:40:24+00:00



namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | This model is responsible for handling users on the system.
    | A user has one doctor or visit, and has one role.
    */
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    public function roles() {
        return $this->belongsToMany('App\Role', 'user_role');
    }
    public function doctor() {
        return $this->hasOne('App\Doctor');
    }
    public function patient() {
        return $this->hasOne('App\Patient');
    }
    public function authorizeRoles($roles) {
        if(is_array($roles)) {
            return $this->hasAnyRoles($roles) || abort(401, 'This action is unauthorized');
        }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized');
    }
    public function hasRole($role) {
        return null !== $this->roles()->where('name', $role)->first();
    }
    public function hasAnyRole($roles) {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
}
