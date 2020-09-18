<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    public $timestamps = true;

    protected $table = 'laporan';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function attachment()
    {
        return $this->morphOne('App\Attachment', 'attachable');
    }

    public function kategoriaudit()
    {
        return $this->belongsTo('App\Kategoriaudit', 'kategori_id', 'id');
    }

    public function findings()
    {
        return $this->hasMany('App\Penemuan', 'laporan_id', 'id');
    }

}
