<?php

namespace App\Http\Controllers\User\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Document\DocumentModel;

class SyDocumentController extends Controller
{
    public function document(Request $request)
    {
        $id=$request->data;
        $dataDetail["data"]=DocumentModel::where("tahun",$id)->get();
        return response()->json($dataDetail);
    }
    public function detail(Request $request)
    {
        $id=$request->data;
        $dataDetail=DocumentModel::where("id_berkas",$id)->get();
        return response()->json($dataDetail);
    }
}
