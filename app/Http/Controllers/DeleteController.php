<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DeleteController extends Controller
{
    public function deletePhoto(){
        File::delete('uploads/afa');
    }
}
