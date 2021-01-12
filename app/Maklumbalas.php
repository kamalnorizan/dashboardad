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
}
