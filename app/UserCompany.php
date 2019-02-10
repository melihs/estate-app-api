<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    protected $table = 'user_company';
    protected $fillable = [
        'user_id','company_id'
    ];
}
