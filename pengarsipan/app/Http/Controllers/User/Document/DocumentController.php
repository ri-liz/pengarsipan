<?php

namespace App\Http\Controllers\User\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Document\DocumentModel;

class DocumentController extends Controller
{
    public function index($id)
    {
        $dataBerkas['berkas']=DocumentModel::where("tahun",$id)->get()->toArray();
        $dataBerkas["th"]=$id;
        return view("user/document/index",compact("dataBerkas"));
    }   
}
