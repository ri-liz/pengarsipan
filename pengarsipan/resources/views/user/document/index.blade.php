@extends('user.dashboard.app')

@section('title',"Document ".$dataBerkas["th"])
@push('link')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.tailwindcss.css">
@endpush
@section('breadcurb')
    <a href="#" class="p-3 text-white no-underline rounded-lg hover:bg-[#4681ff]">Dashboard <i class="fa fa-dashboard"></i></a> &gt;
    <a onclick="dataDokument({{$dataBerkas['th']}})" class="p-3 text-white no-underline rounded-lg hover:bg-[#4681ff]" data-bs-toggle="modal" data-bs-target="#menuDocument">
        Document {{$dataBerkas["th"]}}
    </a>
    <div class="modal" id="menuDocument">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <b class="modal-title">
                        Document
                    </b>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- tabel data Berkas --}}
@section('content')
    <div class="my-3">
        <a class="px-3 py-3 rounded-lg text-white bg-[#198754] hover:bg-[#00ec7d] no-underline font-bold cursor-pointer" data-bs-toggle="modal" data-bs-target="#tambahBerkas">
            <i class="fa fa-plus fa-lg"></i>
            Tambah Berkas
        </a>
    </div>
    <div class="mt-5">
        <table id="example" class="table table-hover min-w-full divide-y text-sm mt-3">
            <thead class="">
                <tr>
                    <th class="w-[100px]">No</th>
                    <th class="w-40">Nomor</th>
                    <th>Tanggal</th>
                    <th class="w-2/3">Nama Berkas</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100 teble"></tbody>
        </table>
    </div>
@endsection
{{-- end tabel data Berkas --}}

{{-- modal tambah berkas --}}
<div class="modal" id="tambahBerkas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Berkas
                </h4>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>
{{-- end modal tambah berkas --}}


{{-- modal detail berkas --}}
<div class="modal" id="detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Detail Berkas
                </h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
{{-- end modal detail berkas --}}

{{-- modal edit berkas --}}
<div class="modal" id="editBerkas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Edit Berkas
                </h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
{{-- end modal edit berkas --}}

@push('script')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.tailwindcss.js"></script>

    {{-- tabel datatable --}}
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                ajax:{
                    url:"{{route('user.page.document.post.berkas')}}",
                    type:"POST",
                    data:{
                        data:"{{$dataBerkas['th']}}",
                        _token:"{{csrf_token()}}"
                    }
                },
                columns:[
                    {
                        data: null,
                        render:function(data, type, row, meta){
                            return meta.row+1;
                        },title:"No"
                    },
                    { data: 'nomor', title: 'Nomor' },
                    { data: 'tanggal', title: 'Tanggal' },
                    { data: 'nama_berkas', title: 'Nama Berkas' },
                    { 
                        data: null, 
                        render:function(data, type, row, meta){
                            var data=`
                                <div class='flex'>
                                    <a href="#" class="text-center px-4 text-[blue] no-underline cursor-pointer hover:bg-[#eaea] rounded-lg py-2">
                                        <i class="fa fa-eye fa-lg block"></i>
                                        <b class="block mt-1">Preview</b>
                                    </a>
                                    <a href="#" class="text-center px-4 text-[blue] no-underline cursor-pointer hover:bg-[#eaea] rounded-lg py-2" data-bs-toggle="modal" data-bs-target="#editBerkas">
                                        <i class="fa fa-edit fa-lg block"></i>
                                        <b class="block mt-1">Edit</b>
                                    </a>
                                    <a onclick="detailBerkas(${row.id_berkas})" class="text-center px-4 text-[blue] cursor-pointer no-underline hover:bg-[#eaea] rounded-lg py-2" data-bs-toggle="modal" data-bs-target="#detail">
                                        <i class="fa fa-file-alt fa-lg block"></i>
                                        <b class="block mt-1">Detail</b>
                                    </a>
                                </div>
                            `;
                            return data;
                        },
                        title:"Option"
                    }
                ],
            });

            $('#dt-length-0').addClass('bg-white mr-4');
            $('#dt-search-0').addClass('bg-white text-gray-800 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-300');
            $('#example thead tr').addClass('text-black');
        });
    </script>
    {{-- end tabel datatable --}}

    {{-- detail Berkas --}}
    <script>
        function detailBerkas(data){
            $.ajax({
                url:"{{route('user.page.document.post.berkas')}}",
                type:"POST",
                dataType:"json",
                data:{
                    data:"2025",
                    _token:"{{csrf_token()}}"
                },
                success:function(res){
                    console.log("aaaaaaaaaaaaaaaaaaaaaaaa");
                    console.log(res);
                }
            })
        }
    </script>
    {{-- end detail berkas --}}
    
@endpush
