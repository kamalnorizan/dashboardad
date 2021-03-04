<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public $timestamps = true;

    protected $table = 'attachments';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function attachable()
    {
        return $this->morphTo();
    }
    
}
