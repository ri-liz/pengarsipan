<?php

namespace App\Http\Controllers\User\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function tambahData(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tahun = date("Y");

        $path = "uploads/Document/" . $tahun;

        // Cek & buat folder jika belum ada
        if (!Storage::disk("public")->exists($path)) {
            Storage::disk("public")->makeDirectory($path);
        }

        // Validasi
        $request->validate([
            'file' => "required|file|mimes:pdf|max:51200"
        ]);

        $file = $request->file("file");
        $file_name = date("Y-m-d_H-i-s") . "_" . $file->getClientOriginalName();

        // Simpan file
        $fileRestore = $file->storeAs($path, $file_name, "public");

        if ($fileRestore && Storage::disk("public")->exists($fileRestore)) {
            $dataIn = [
                "nomor" => $request->nomor,
                "jenis_document" => $request->jns_document,
                "tanggal" => $request->tanggal,
                "tahun" => $request->tahun,
                "nama_document" => $request->nama_document,
                "direktory_document" => $path . "/" . $file_name,
                "create_at" => date("Y-m-d H:i:s"),
                "update_at" => date("Y-m-d H:i:s"),
                "npp" => session("npp"),
            ];
            DocumentModel::create($dataIn);
            return redirect()->route("user.page.document")
                            ->with("success", "File berhasil disimpan");
        } else {
            echo session("username");

            // return redirect()->route("user.page.document")
            //                 ->with("error", "Gagal menyimpan file");
        }
    }
}
