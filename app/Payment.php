<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['user_id','loan_id','amount', 'account_number', 'bank', 'month', 'year', 'created_at','updated_at'];


    public function loan(){
        return $this->belongsTo('App\Loan');
    }
}
