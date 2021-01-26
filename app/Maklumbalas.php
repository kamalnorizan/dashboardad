<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maklumbalas extends Model
{
    public $timestamps = true;

    protected $table = 'maklumbalas';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function attachments()
    {
        return $this->morphMany('App\Attachment', 'attachable');
    }

    public function progres()
    {
        return $this->belongsTo('App\Progress', 'progress_id', 'id');
    }

    public function auditipenemuan()
    {
        return $this->belongsTo('App\Auditipenemuan', 'auditipenemuan_id', 'id');
    }
}
