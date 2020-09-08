<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditipenemuan extends Model
{
    public $timestamps = true;

    protected $table = 'auditipenemuan';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    
}
