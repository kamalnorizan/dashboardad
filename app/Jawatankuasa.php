<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawatankuasa extends Model
{
    public $timestamps = true;

    protected $table = 'jawatankuasa';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function laporan()
    {
        return $this->belongsTo('App\Laporan', 'laporan_id', 'id');
    }

}
