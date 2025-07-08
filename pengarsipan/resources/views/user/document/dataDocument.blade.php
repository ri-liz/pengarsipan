@extends('user.dashboard.app')

@section('title',"Document ".$dataDocument["th"])

@push('link')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.tailwindcss.css">
@endpush

@section('breadcurb')
    <a href="{{route('user.page.dashboard')}}" class="p-3 text-white no-underline rounded-lg hover:bg-[#4681ff]">Dashboard <i class="fa fa-dashboard"></i></a> &gt;
    <a href="{{route('user.page.document')}}" class="p-3 text-white no-underline rounded-lg hover:bg-[#4681ff]">Document <i class="fa fa-dashboard"></i></a> &gt;
    <a onclick="dataDokument({{$dataDocument['th']}})" class="p-3 text-white no-underline rounded-lg hover:bg-[#4681ff]" data-bs-toggle="modal" data-bs-target="#menuDocument">
        {{$dataDocument["th"]}}
    </a>
    <div class="modal" id="menuDocument">
        <div class="modal-dialog w-full">
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


{{-- tabel data document --}}
@section('content')
    <div class="my-3">
        <a class="px-3 py-3 rounded-lg text-white bg-[#198754] hover:bg-[#00ec7d] no-underline font-bold cursor-pointer" data-bs-toggle="modal" data-bs-target="#tambahDocument">
            <i class="fa fa-plus fa-lg"></i>
            Tambah Document
        </a>
    </div>
    <div class="mt-5">
        <table id="example" class="table table-hover table-striped min-w-full divide-y text-sm mt-3">
            <thead class="">
                <tr>
                    <th class="w-[100px]">No</th>
                    <th class="w-40">Nomor</th>
                    <th>Tanggal</th>
                    <th class="w-2/3">Nama Document</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100 teble"></tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td data-filter="true"></td>
                    <td data-filter="true"></td>
                    <td data-filter="true"></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
{{-- end tabel data Document --}}

{{-- modal tambah Document --}}
<div class="modal" id="tambahDocument">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Document
                </h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="">Nomor : </label>
                        <input type="year" class="form-control" name="">
                    </div>
                    <div class="mb-2">
                        <label for="">Tahun : </label>
                        <input type="year" class="form-control" name="">
                    </div>
                    <div class="mb-2">
                        <label for="">Tahun : </label>
                        <input type="year" class="form-control" name="tahun">
                    </div>
                    <div class="mb-2">
                        <label for="">File Document (Max 50 MB) : </label>
                        <input type="file" class="form-control" name="file">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end modal tambah Document --}}


{{-- modal detail Document --}}
<div class="modal" id="detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Info Document
                </h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
{{-- end modal detail Document --}}

{{-- modal edit Document --}}
<div class="modal" id="editDocument">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Delete Document
                </h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
{{-- end modal edit Document --}}

@push('script')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.tailwindcss.js"></script>

    {{-- tabel datatable --}}
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                ajax:{
                    url:"{{route('user.page.document.post.document')}}",
                    type:"POST",
                    data:{
                        data:"{{$dataDocument['th']}}",
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
                    { data: 'nama_document', title: 'Nama Document' },
                    { 
                        data: null, 
                        render:function(data, type, row, meta){
                            var data=`
                                <div class='flex'>
                                    <a href="#" class="text-center px-4 text-[blue] no-underline cursor-pointer hover:bg-[#eaea] rounded-lg py-2">
                                        <i class="fa fa-eye fa-lg block"></i>
                                        <b class="block mt-1">Preview</b>
                                    </a>
                                    <a href="#" class="text-center px-4 text-[red] no-underline cursor-pointer hover:bg-[#eaea] rounded-lg py-2" data-bs-toggle="modal" data-bs-target="#editBerkas">
                                        <i class="fa fa-trash fa-lg block"></i>
                                        <b class="block mt-1">Delete</b>
                                    </a>
                                    <a onclick="detailBerkas(${row.id_berkas})" class="text-center px-4 text-[blue] cursor-pointer no-underline hover:bg-[#eaea] rounded-lg py-2" data-bs-toggle="modal" data-bs-target="#detail">
                                        <i class="fa fa-info-circle fa-lg block"></i>
                                        <b class="block mt-1">Info</b>
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
                url:"{{route('user.page.document.post.document')}}",
                type:"POST",
                dataType:"json",
                data:{
                    data:data,
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
