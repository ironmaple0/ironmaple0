<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{

    protected $fillable = ['amount', 'date', 'type_id', 'comment'];

    
    public function type() {
        return $this->belongsTo('App\Type', 'type_id', 'id');
    }
}
