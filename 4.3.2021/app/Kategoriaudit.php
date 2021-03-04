<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriaudit extends Model
{
    public $timestamps = true;

    protected $table = 'kategoriaudit';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function subkategoriad()
    {
        return $this->hasMany('App\Kategoriaudit', 'subkategori', 'id');
    }

    public function subcats()
    {
        return $this->hasMany('App\Kategoriaudit', 'subkategori', 'id');
    }

    public function parentkategori()
    {
        return $this->belongsTo('App\Kategoriaudit', 'subkategori', 'id');
    }
}
