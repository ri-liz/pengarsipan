<?php

namespace App\Http\Controllers\User\Berkas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Berkas\BerkasModel;

class BerkasController extends Controller
{
    public function index()
    {
        $dataBerkas=BerkasModel::select("tahun")
        ->distinct()
        ->get()->toArray();
        return view("user/berkas/index", compact("dataBerkas"));
    }   
    public function dataBerkas($id)
    {
        $dataBerkas['berkas']=BerkasModel::where("tahun",$id)->get()->toArray();
        $dataBerkas["th"]=$id;
        return view("user/berkas/dataBerkas",compact("dataBerkas"));
    }
}
