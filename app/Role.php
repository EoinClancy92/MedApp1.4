<?php
# @Date:   2019-10-29T13:20:03+00:00
# @Last modified time: 2019-10-29T14:50:04+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function users()
    {
      return $this->belongsToMany('App\User', 'user_role');
    }
}
