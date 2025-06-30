@extends('user.dashboard.app')

@section('title',"Document ".$dataBerkas["th"])
@push('link')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.tailwindcss.css">
@endpush
@section('breadcurb')
    <a href="#" class="p-3 rounded-lg hover:bg-[#4681ff]">Dashboard <i class="fa fa-dashboard"></i></a> &gt;
    <a href="#" class="p-3 rounded-lg hover:bg-[#4681ff]" data-bs-toggle="modal" data-bs-target="#menuDocument">
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
@php
    var_dump($dataBerkas["th"]);
@endphp
@section('content')
        <table id="example" class="min-w-full divide-y text-sm">
            <thead class="">
                <tr>
                    <th class="px-4 w-[50px] py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nomor</th>
                    <th class="px-4 w-[250px] py-2 text-left">Jenis Berkas</th>
                    <th class="px-4 w-[250px] py-2 text-left">Nama File</th>
                    <th class="px-4 w-[250px] py-2 text-left">Option</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100 teble">
                <tr class="hover:bg-[#eaeaee]">
                    <td class="px-4 py-2"></td>
                    <td class="px-4 py-2"></td>
                    <td class="px-4 py-2"></td>
                    <td class="px-4 py-2"></td>
                    <td class="px-4 py-2 flex"></td>
                </tr>
            </tbody>
        </table>
@endsection
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
@push('script')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.tailwindcss.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable(
                {
                    processing:true,
                    serverside:false,
                    ajax:{
                        url:"{{url('/User/Document/DetailDocument')}}",
                        type:"POST",
                        data:{
                            tahun:2025,
                            _token:'{{csrf_token()}}'
                        },
                        dataType:"json"
                    },
                    columns:[
                        {
                            data:null,
                            render: function(data, type, row, meta){
                                return meta.row+1;
                            }
                        },
                        {data:"nomor"},
                        {data:"jenis_berkas"},
                        {data:"nama_berkas"},
                        {
                            data:null,
                            render:function(data, type, row, meta){
                                var data=`
                                    <a href="" class="text-center px-2 text-[blue]">
                                        <i class="fa fa-eye fa-lg block"></i>
                                        <b class="block mt-1">Preview</b>
                                    </a>
                                    <a href="" class="text-center px-2 text-[blue]">
                                        <i class="fa fa-edit fa-lg block"></i>
                                        <b class="block mt-1">Edit</b>
                                    </a>
                                    <a onclick="detailBerkas(${row.id})" class="text-center px-2 text-[blue]" data-bs-toggle="modal" data-bs-target="#detail">
                                        <i class="fa fa-file-alt fa-lg block"></i>
                                        <b class="block mt-1">Detail</b>
                                    </a>
                                `;
                                return data;
                            }
                        },
                    ]
                }
            );


            $('#dt-length-0').addClass('bg-white mr-4');
            $('#dt-search-0').addClass('bg-white text-gray-800 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-300');
        });
    </script>
    <script>
        function detailBerkas(data){
            $.ajax({
                url:"{{url('/User/Document/DetailDocument')}}",
                type:"POST",
                dataType:"json",
                data:{
                    data:data,
                    _token:"{{csrf_token()}}"
                },
                success:function(res){
                    console.log(res);
                }
            })
        }
    </script>
@endpush
