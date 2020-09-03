<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    public $timestamps = true;

    protected $table = 'organisasi';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

}
