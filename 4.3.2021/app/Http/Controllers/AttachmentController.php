<?php

namespace App\Http\Controllers;

use App\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;

class AttachmentController extends Controller
{
    public function getFile(Attachment $attachment)
    {
        if(substr($attachment->url,0,8)=='uploads/'){
           $url = $attachment->url;
        }else{
            $url = 'uploads/'.$attachment->url;
        }
        $url;
        return Storage::download('public/'.$url);

        // $file;
    }

}
