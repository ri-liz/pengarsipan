<?php

namespace App\Models\User\Document;

use Illuminate\Database\Eloquent\Model;

class DocumentModel extends Model
{
    protected $table="document";
    protected $primaryKey="id_document";
    public $timestamps=false;
    protected $fillable=[
        'nomor',
        'jenis_document',
        'tanggal',
        'tahun',
        'nama_document',
        'direktory_document',
        'create_at',
        'update_at',
        'npp'
    ];
}
