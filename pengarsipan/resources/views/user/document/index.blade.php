@extends('user.dashboard.app')

@section('title',"Dokumen")

@section('breadcurb')
    <a href="{{route('user.page.dashboard')}}" class="p-3 text-blue-600 hover:underline text-white">Dashboard <i class="fa fa-dashboard"></i></a> &gt;
    <a href="{{route('user.page.document')}}" class="p-3 text-blue-600 hover:underline text-white">Document <i class="fa fa-dashboard"></i></a> &gt;
@endsection

@section('content')
    
    {{-- tambah Document --}}
    <div class="pb-4 flex flex-row items-center">
        <a href="" data-bs-toggle="modal" data-bs-target="#tambahDocument" class="btn btn-success"><i class="fas fa-plus"></i>Tambah Document</a>
        <div class="modal" id="tambahDocument">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title font-bold">
                            Tambah Document
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.page.document.tambah')}}" method="POST" enctype="multipart/form-data">
                            
                            @csrf

                            <div class="mb-3">
                                <label for="">NPP</label>
                                <input type="text" class="form-control" name="npp" value="{{session("npp")}}" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Nomor</label>
                                <input type="text" class="form-control" name="nomor">
                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Document</label>
                                <input type="text" class="form-control" name="jns_document">
                            </div>
                            <div class="mb-3">
                                <label for="">Tanggal</label>
                                <input type="text" class="form-control" name="tanggal">
                            </div>
                            <div class="mb-3">
                                <label for="">Tahun</label>
                                <input type="text" class="form-control" name="tahun">
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Document</label>
                                <input type="text" class="form-control" name="nama_document">
                            </div>
                            <div class="mb-3">
                                <label for="">Document</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    simpan
                                    <i class="fas fa-save fa-lg"></i>
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-3">
        @for ($i = 0; $i < count($dataDocument); $i++)
            <a href="{{url('/User/Document/'.$dataDocument[$i]['tahun'])}}" class="rounded-lg">
                <div class="bg-[#0012cf] rounded-lg p-4 hover:bg-blue-500">
                    <div class="flex flex-column items-center">
                        <i class="fa fa-book fa-2x text-[white]"></i>
                        <b class="text-white font-bold">{{$dataDocument[$i]['tahun']}}</b>
                    </div>
                </div>
            </a>
        @endfor
    </div>
    
@endsection

@push('script')

    <script>
        $(document).ready(function () {
            $('input[type="text"]').on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $(".grid a").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    
@endpush
