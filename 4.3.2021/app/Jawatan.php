<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jawatan extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'jawatan';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->hasMany('App\User', 'jawatan_id', 'id');
    }

}
