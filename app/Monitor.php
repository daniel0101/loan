<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $table = 'monitoring';
    protected $fillable = ['user_id','loan_id','amount_paid','unpaid_balance','date_paid'];

    public function loan(){
        return $this->belongsTo(Loan::class);
    }
}
