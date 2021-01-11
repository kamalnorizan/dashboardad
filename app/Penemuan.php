<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penemuan extends Model
{
    public $timestamps = true;

    protected $table = 'penemuan';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function audities()
    {
        return $this->hasMany('App\Auditipenemuan', 'penemuan_id', 'id');
    }

    public function progress()
    {
        return $this->belongsTo('App\Progress', 'progress_id', 'id');
    }

    public function attachments()
    {
        return $this->morphMany('App\Attachment', 'attachable');
    }

    public function laporan()
    {
        return $this->belongsTo('App\Laporan', 'laporan_id', 'id');
    }

    public function ulasanpenemuan()
    {
        return $this->hasMany('App\Ulasanpenemuan', 'penemuan_id', 'id');
    }
}
