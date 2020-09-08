<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriaudit extends Model
{
    public $timestamps = true;

    protected $table = 'kategoriaudit';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    
}