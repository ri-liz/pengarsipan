<?php

namespace App\Http\Controllers\User\Berkas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Berkas\BerkasModel;

class SyBerkasController extends Controller
{
    public function Berkas(Request $request)
    {
        $id=$request->data;
        $dataDetail["data"]=BerkasModel::where("tahun",$id)->get();
        return response()->json($dataDetail);
    }
    public function detail(Request $request)
    {
        $id=$request->data;
        $dataDetail=BerkasModel::where("id_berkas",$id)->get();
        return response()->json($dataDetail);
    }
}
