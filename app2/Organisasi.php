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

    public function negeri()
    {
        return $this->belongsTo('App\Negeri', 'negeri_id', 'id');
    }

    public function org_type()
    {
        return $this->belongsTo('App\Org_type', 'org_type_id', 'id');
    }

    public function users()
    {
        return $this->hasMany('App\User', 'organisasi_id', 'id');
    }

}
