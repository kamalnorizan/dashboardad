<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Laporan extends Model  implements Auditable
{
    use \OwenIt\Auditing\Auditable;
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

    public function auditipenemuan()
    {
        return $this->hasMany('App\Auditipenemuan', 'laporan_id', 'id');
    }

    public function jawatankuasa()
    {
        return $this->hasMany('App\Jawatankuasa', 'laporan_id', 'id');
    }

}
