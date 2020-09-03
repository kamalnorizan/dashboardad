<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawatan extends Model
{
    public $timestamps = true;

    protected $table = 'jawatan';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

}
