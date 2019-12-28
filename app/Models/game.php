<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'game';
    protected $guarded = array('gid');
    protected $primaryKey = 'gid';
    public $timestamps = false;
}