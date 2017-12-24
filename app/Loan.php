<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Loan extends Model
{
    public function repayment_schedule() {
    	return $this->hasMany('App\RepaymentSchedule');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function payment(){
        return $this->hasMany('App\Payment');
    }
    public function monitor(){
        return $this->hasOne('App\Monitor');
    }
}
