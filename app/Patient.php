<?php
# @Date:   2019-12-05T19:04:23+00:00
# @Last modified time: 2019-12-05T19:27:35+00:00



namespace App;
use Illuminate\Database\Eloquent\Model;
class Patient extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Patient Model
    |--------------------------------------------------------------------------
    |
    | This model is responsible for handling the patient model.
    | A patient belongs to a user and has many visits.
    */
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function visit() {
        return $this->hasMany('App\Visit');
    }
}
