<?php

namespace App\Http\Controllers\User\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Document\DocumentModel;

class SyDocumentController extends Controller
{
    function detail(Request $request)
    {
        $id=$request->data;
        return response()->json(id);
        // $dataDetail=DocumentModel::where("tahun",$th)->where("")
    }
}
