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

    public function penemuan()
    {
        return $this->belongsTo('App\Penemuan', 'penemuan_id', 'id');
    }

    public function auditiuser()
    {
        return $this->belongsTo('App\User', 'auditi', 'id');
    }

    public function organisasi()
    {
        return $this->belongsTo('App\Organisasi', 'organisasi_id', 'id');
    }

    public function progress()
    {
        return $this->belongsTo('App\Progress', 'progress_id', 'id');
    }

    public function maklumbalas()
    {
        return $this->hasMany('App\Maklumbalas', 'auditipenemuan_id', 'id');
    }
}
