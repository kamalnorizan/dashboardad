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

    public function users()
    {
        return $this->hasMany('App\User', 'jawatan_id', 'id');
    }

}
