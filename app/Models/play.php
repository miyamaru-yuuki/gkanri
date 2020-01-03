<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    protected $table = 'play';
    protected $guarded = array('pid');
    protected $primaryKey = 'pid';
    public $timestamps = false;
}