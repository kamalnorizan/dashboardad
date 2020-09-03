<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org_type extends Model
{
    public $timestamps = true;

    protected $table = 'org_types';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];


}
