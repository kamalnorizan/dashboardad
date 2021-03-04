<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negeri extends Model
{
    public $timestamps = true;

    protected $table = 'negeri';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function organizations()
    {
        return $this->hasMany('App\Organisasi', 'negeri_id', 'id');
    }

}
