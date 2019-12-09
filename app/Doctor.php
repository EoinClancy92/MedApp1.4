<?php
# @Date:   2019-12-04T14:05:08+00:00
# @Last modified time: 2019-12-05T20:37:26+00:00



namespace App;
use Illuminate\Database\Eloquent\Model;
class Doctor extends Model
{

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function visit() {
        return $this->hasMany('App\Appointment');
    }
}
