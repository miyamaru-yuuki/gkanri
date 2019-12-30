<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    protected $table = 'maker';
    protected $guarded = array('mid');
    protected $primaryKey = 'mid';
    public $timestamps = false;
}