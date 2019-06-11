<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'plan_name', 'plan_description', 'plan_price', 'plan_type', 'description', 'btn_label', 'amount',
    ];
}
