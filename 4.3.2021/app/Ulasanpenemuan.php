<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ulasanpenemuan extends Model
{
    public $timestamps = true;

    protected $table = 'ulasanpenemuan';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

}
