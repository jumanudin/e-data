@extends('layouts.app')
@push('style')
                    <!-- if(Helper::cek_level_akses('trans_madrasah_bezetting')->l)     -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <style>

</style>    
@endpush
@section('main')
<div class="main-content">
  <section class="section">
      <div class="section-header">
        <h3 >Data Madrasah </h3>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('laymad_ra') }}">Data Madrasah RA</a></div>
            <div class="breadcrumb-item">Detail data RA  </div>
        </div>
      </div>
  </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">List Data RA Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('laymad_ra')->l)     
                    <a class="nav-link " id="jumlah-tab" data-toggle="tab" href="#jumlah" role="tab" aria-controls="" aria-selected="false">Jumlah</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('laymad_akra')->l)   
                    <a class="nav-link akre" id="akreditasi-tab" data-toggle="tab" href="#akreditasi" role="tab" aria-controls="akreditasi" aria-selected="false">Akreditasi</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('laymad_gra')->l)
                    <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Status Guru</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="pendd-tab" data-toggle="tab" href="#pendd" role="tab" aria-controls="pendd" aria-selected="false">Pendd Guru</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="sertifikasi-tab" data-toggle="tab" href="#sertifikasi" role="tab" aria-controls="sertifikasi" aria-selected="false">Sertifikasi Guru</a>
                    </li>
                </ul>    
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="jumlah" role="tabpanel" aria-labelledby="jumlah-tab">
                      
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Jumlah Madrasah Tahun {{ $tempstruk->tahun_periode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="table" class="table style table-striped table-hover data-table" style="width:100%">
                                <thead class="text-white">
                                    <tr>
                                    <th class="text-center">No</th>
                                    <th >Kabupaten / Kota</th>
                                    <th >RA</th>
                                    <th>MIN</th>
                                    <th>MIS</th>
                                    <th >MTsN</th>
                                    <th >MTsS</th>
                                    <th >MAN</th>
                                    <th >MAS</th>
                                    <th ></th>
                                    </tr>
                                </thead>
                                <tbody class="list bg-light">
                                </tbody>
                                </table>
                            </div>                            
                            </div>                                                                
                            </div>
                        </div>    

                    </div>
                    <div class="tab-pane fade" id="akreditasi" role="tabpanel" aria-labelledby="jumlah-tab">
                    <div class="card card-success shadow">
                        <div class="card-header">
                            <div class="col-md-6 text-left mb-0 ">
                                <h4>Akreditasi Madrasah RA Tahun {{ $tempstruk->tahun_periode }}</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="table-akre" class="table style table-striped table-hover" style="width:100%">
                                <thead class="text-white">
                                    <tr>
                                    <th class="text-center">No</th>
                                    <th >Kabupaten / Kota </th>
                                    <th >Akreditasi A</th>
                                    <th>Akreditasi B</th>
                                    <th>Akreditasi C</th>
                                    <th >Belum Akreditasi</th>
                                    <th ></th>
                                    </tr>
                                </thead>
                                <tbody class="list bg-light">
                                </tbody>
                                </table>
                            </div>                            
                            </div>                                                                
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                        <div class="card card-success">
                        <div class="card-header">
                            <div class="col-md-6 text-left mb-0 ">
                                <h4>Status Guru Madrasah RA Tahun {{ $tempstruk->tahun_periode }}</h4>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="table-responsive">       
                                <table id="table-sgra" class="table table-striped table-hover table-bordered" style="width:100%">
                                <thead class="text-white">
                                    <tr class="text-center">
                                        <th >No</th>
                                        <th>Kabupaten / Kota</th>
                                        <th colspan="2" >Jenis Kelamin</th>
                                        <th colspan="2" >Status</th>
                                        <th colspan="4" >Pendidikan</th>
                                        <th >Jumlah</th>
                                        <th ></th>
                                    </tr>
                                    <tr class="text-center">
                                        <th class="text-center"></th>
                                        <th></th>
                                        <th>Laki2</th>
                                        <th>Perempuan</th>
                                        <th>PNS</th>
                                        <th >Non PNS</th>
                                        <th >Belum S1</th>
                                        <th >S1</th>
                                        <th >S2</th>
                                        <th >S3</th>
                                        <th ></th>
                                        <th ></th>
                                    </tr>
                                </thead>
                                <tbody class="list bg-light">
                                </tbody>
                                </table>                                             
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade" id="pendd" role="tabpanel" aria-labelledby="pendd-tab">
               
                        <div class="card card-danger">
                            <div class="card-header">
                             
                            </div>
                    
                            <div class="col-md-12">

                            <div class="table-responsive">
                           </div>                            
                            </div>
                        </div>                    
                </div> 
                    <div class="tab-pane fade" id="sertifikasi" role="tabpanel" aria-labelledby="sertifikasi-tab">
               
                        <div class="card card-info shadow">
                            <div class="card-header">
                                     
                            </div>
                         
                            <div class="col-md-12">

                            <div class="table-responsive">
                               </div>                            
                            </div>
                        </div>                    
                </div> 
            </div>    
        </div>                               
    </div>
   </div>
</div>  
</div>
@endsection    
  @section('modal')
    <div class="modal fade" id="ajaxModel" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white" >
                <h4 class="modal-title" id="modelHeading">Edit Jumlah Data Madrasah</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="AnjabForm" name="AnjabForm" class="form-horizontal">
                   <input type="hidden" name="id_mad" id="id_mad">
                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Nama Wilayah</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama" name="nama" disabled>
                        </div>
                    </div>
                    <div class="row form-group-sm">
                        <div class="col-md-4">    
                            <div class="form-group">
                                <label for="rombel-bezetting" class="col-sm-12 control-label">RA</label>
                                <div class="col-sm-12">
                                    <input type="number" id="ra" name="ra" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label">MIN</label>
                                <div class="col-md-12">
                                    <input type="number" id="min" name="min" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">MIS</label>
                                <div class="col-sm-12">
                                    <input type="number" id="mis" name="mis" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">MTsN</label>
                                <div class="col-sm-12">
                                    <input type="number" id="mtsn" name="mtsn" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">MTsS</label>
                                <div class="col-sm-12">
                                    <input type="number" id="mtss" name="mtss" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">MAN</label>
                                <div class="col-sm-12">
                                    <input type="number" id="man" name="man" required="" placeholder="" class="form-control">
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-12 control-label">MAS</label>
                                    <div class="col-md-12">
                                        <input type="number" id="mas" name="mas" required="" placeholder="" class="form-control">
                                    </div>
                                </div>                  
                            </div>
                        </div>                               
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">simpan perubahan
                                </button>
                        </div>        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  Akreditasi -->    
    <div class="modal fade" id="ModelAkreditasi" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white" >
                <h4 class="modal-title" id="modelHeading">Update Jumlah Akreditasi </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="AnjabForm" name="AnjabForm" class="form-horizontal">
                   <input type="hidden" name="id_akre" id="id_akre">
                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Nama Wilayah</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_akre" name="nama_akre" disabled>
                        </div>
                    </div>
                    <div class="row form-group-sm">
                        <div class="col-md-4">    
                            <div class="form-group">
                                <label for="rombel-bezetting" class="col-sm-12 control-label">Akreditasi A</label>
                                <div class="col-sm-12">
                                    <input type="number" id="a" name="a" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Belum Akreditasi </label>
                                <div class="col-md-12">
                                    <input type="number" id="belum" name="blum" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-12 control-label">Akreditasi B</label>
                                <div class="col-md-12">
                                    <input type="number" id="b" name="b" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>                               
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Akreditasi C</label>
                                <div class="col-sm-12">
                                    <input type="number" id="c" name="c" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">simpan perubahan
                                </button>
                        </div>        
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>    
    <!--  Status -->    
    <div class="modal fade" id="ModelStatus" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white" >
                <h4 class="modal-title" id="modelHeading">Update Data Guru Madrasah RA </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="AnjabForm" name="AnjabForm" class="form-horizontal">
                   <input type="hidden" name="id_gra" id="id_gra">
                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Nama Kabupaten/Kota</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_gra" name="nama_gra" disabled>
                        </div>
                    </div>
                    <div class="row form-group-sm">
                        <div class="col-md-4 border">
                            <p><b> Jenis Kelamin</b></p>
                            <div class="form-group">
                                <label for="rombel-bezetting" class="col-sm-12 control-label">Laki - Laki</label>
                                <div class="col-sm-12">
                                    <input type="number" id="ra_pria" name="ra_pria" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Wanita </label>
                                <div class="col-md-12">
                                    <input type="number" id="ra_wanita" name="ra_wanita" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 border">
                            <p><b> Status Pegawai</b></p>
                            <div class="form-group">
                                <label class="col-md-12 control-label">PNS</label>
                                <div class="col-md-12">
                                    <input type="number" id="ra_pns" name="ra_pns" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">NON PNS</label>
                                <div class="col-sm-12">
                                    <input type="number" id="ra_nonpns" name="ra_nonpns" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>                               
                        <div class="col-md-4 border">
                            <p><b> Pendidikan</b></p>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Belum S1</label>
                                <div class="col-md-12">
                                    <input type="number" id="ra_belums1" name="ra_belums1" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">S1</label>
                                <div class="col-sm-12">
                                    <input type="number" id="ra_s1" name="ra_s1" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">S2</label>
                                <div class="col-sm-12">
                                    <input type="number" id="ra_s2" name="ra_s2" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">S3</label>
                                <div class="col-sm-12">
                                    <input type="number" id="ra_s3" name="ra_s3" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>                               
                        <div class="col-md-4">
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">simpan perubahan
                                </button>
                        </div>        
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>    
    @endsection  
  @push('scripts')
    <script src="{{ asset('library/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>   
    <script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });
        //akreditasi event

        $('#table-akre').DataTable().destroy();
        var table = $('#table-akre').DataTable({
            dom:'Blfrtip',
            buttons: [ 'copy','csv','excel','pdf','print'],
        processing: true,
        serverSide: true,
        searching: false,
        paging :false,
        ajax: "{{route('laymad_akra') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false},
            {data: 'nama', name: 'nama'},
            {data: 'a', name: 'a'},
            {data: 'b', name: 'b'},
            {data: 'c', name: 'c'},
            {data: 'belum', name: 'belum'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        });

        $('#akreditasi').on('click', '.edit', function () {
            var id_mad = $(this).data('id');
            $.ajax({
                type: "POST",
                url :"{{ url('laymad_akra/edit') }}",
                data:{ id:id_mad},
                dataType: "JSON",
                success : function(data) {
                    $('#ModelAkreditasi').modal({backdrop: true, show: true});
                    $('#modelHeading').html("Edit Data Akreditasi Madrasah");
                    $('#id_akre').val(id_mad);
                    $('#nama_akre').val(data.nama);
                    $('#a').val(data.a);
                    $('#b').val(data.b);
                    $('#c').val(data.c);
                    $('#belum').val(data.belum);
                }

            })
            .fail(function(xhr, err) { 
            var responseTitle= $(xhr.responseText).filter('title').get(0);            
            alert($(responseTitle).text() + "\n" + formatErrorMessage(xhr, err) ); 
            })
        });    
        $('#ModelAkreditasi').on('click', '#btn-save', function (event) {
            var id = $("#id_akre").val();
            var a = $("#a").val();
            var b = $("#b").val();
            var c = $("#c").val();
            var belum = $("#belum").val();
            $("#btn-save").html('Tunggu sebentar...');
            $("#btn-save"). attr("disabled", true);
            
            // ajax
            $.ajax({
                type:"POST",
                url: "{{ url('laymad_akra/update') }}",
                data: {
                    id:id,
                    a:a,
                    b:b,
                    c:c,
                    belum:belum,
                },
                dataType: 'json',
                success: function(res){
                // window.location.reload();
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                toast('Data sudah diubah');
                // Swal.fire({title: 'Sukses', Text:'Data berhasil diubah', icon:"success",});       
                $('#ModelAkreditasi').modal('hide'); 
                table.draw(); 
            }
            });       
        });             
        // end akreditasi

        //status guru event
        $('#table-sgra').DataTable().destroy();
            var table = $('#table-sgra').DataTable({
                dom:'Blfrtip',
                buttons: [ 'copy','csv','excel','pdf','print'],
            processing: true,
            serverSide: true,
            searching: false,
            paging :false,
            ajax: "{{route('laymad_gra') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false},
                {data: 'nama',name:'nama'},
                {data: 'ra_pria', name:'ra_pria'},
                {data: 'ra_wanita', name:'ra_wanita'},
                {data: 'ra_pns', name:'ra_pns'},
                {data: 'ra_nonpns',name :'ra_nonpns'},
                {data: 'ra_belums1',name:'ra_belums1'},
                {data: 'ra_s1', name:'ra_s1'},
                {data: 'ra_s2',name:'ra_s2'},
                {data: 'ra_s3',name:'ra_s3'},
                {data: 'ra', name:'ra'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
            });
            $('#status').on('click', '.edit', function () {
                var id_mad = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url :"{{ url('laymad_gra/edit') }}",
                    data:{ id:id_mad},
                    dataType: "JSON",
                    success : function(data) {
                        $('#ModelStatus').modal({backdrop: true, show: true});
                        $('#modelHeading').html("Edit Data Guru Madrasah");
                        $('#id_gra').val(id_mad);
                        $('#nama_gra').val(data.nama);
                        $('#ra_pria').val(data.ra_pria);
                        $('#ra_wanita').val(data.ra_wanita);
                        $('#ra_pns').val(data.ra_pns);
                        $('#ra_nonpns').val(data.ra_nonpns);
                        $('#ra_belums1').val(data.ra_belums1);
                        $('#ra_s1').val(data.ra_s1);
                        $('#ra_s2').val(data.ra_s2);
                        $('#ra_s3').val(data.ra_s3);
                    }

                })
                .fail(function(xhr, err) { 
                var responseTitle= $(xhr.responseText).filter('title').get(0);            
                alert($(responseTitle).text() + "\n" + formatErrorMessage(xhr, err) ); 
                })
            });  
            $('#ModelStatus').on('click', '#btn-save', function (event) {
            var id = $("#id_gra").val();
            var ra_pria = $("#ra_pria").val();
            var ra_wanita = $("#ra_wanita").val();
            var ra_pns = $("#ra_pns").val();
            var ra_nonpns = $("#ra_nonpns").val();
            var ra_belums1 = $("#ra_belums1").val();
            var ra_s1 = $("#ra_s1").val();
            var ra_s2 = $("#ra_s2").val();
            var ra_s3 = $("#ra_s3").val();
            $("#btn-save").html('Tunggu sebentar...');
            $("#btn-save"). attr("disabled", true);
            
            // ajax
            $.ajax({
                type:"POST",
                url: "{{ url('laymad_gra/update') }}",
                data: {
                    id:id,
                    ra_pria:ra_pria,
                    ra_wanita:ra_wanita,
                    ra_pns:ra_pns,
                    ra_nonpns:ra_nonpns,
                    ra_belums1:ra_belums1,
                    ra_s1:ra_s1,
                    ra_s2:ra_s2,
                    ra_s3:ra_s3,
                },
                dataType: 'json',
                success: function(res){
                // window.location.reload();
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                toast('Data sudah diubah');
                // Swal.fire({title: 'Sukses', Text:'Data berhasil diubah', icon:"success",});       
                $('#ModelStatus').modal('hide');     
                table.draw(); 
                }
            });
        });              
        // end status guru

        var table = $('.data-table').DataTable({
            dom:'Blfrtip',
            buttons: [ 'copy','csv','excel','pdf','print'],
        processing: true,
        serverSide: true,
        searching: false,
        paging :false,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false},
            {data: 'nama', name: 'nama'},
            {data: 'ra', name: 'ra'},
            {data: 'min', name: 'min'},
            {data: 'mis', name: 'mis'},
            {data: 'mtsn', name: 'mtsn'},
            {data: 'mtss', name: 'mtss'},
            {data: 'man', name: 'man'},
            {data: 'mas', name: 'mas'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        });

        $('#jumlah').on('click', '.edit', function () {
            var id_mad = $(this).data('id');
            $.ajax({
                type: "POST",
                url :"{{ url('laymad_ra/edit') }}",
                data:{ id:id_mad},
                dataType: "JSON",
                success : function(data) {
                    $('#ajaxModel').modal({backdrop: true, show: true});
                    $('#modelHeading').html("Edit Data Jumlah Madrasah");
                    $('#id_mad').val(id_mad);
                    $('#nama').val(data.nama);
                    $('#ra').val(data.ra);
                    $('#min').val(data.min);
                    $('#mis').val(data.mis);
                    $('#mtsn').val(data.mtsn);
                    $('#mtss').val(data.mtss);
                    $('#man').val(data.man);
                    $('#mas').val(data.mas);
                }

            })
            .fail(function(xhr, err) { 
            var responseTitle= $(xhr.responseText).filter('title').get(0);            
            alert($(responseTitle).text() + "\n" + formatErrorMessage(xhr, err) ); 
            })
        });

        $('#ajaxModel').on('click', '#btn-save', function (event) {
            var id = $("#id_mad").val();
            var ra = $("#ra").val();
            var min = $("#min").val();
            var mis = $("#mis").val();
            var mtsn = $("#mtsn").val();
            var mtss = $("#mtss").val();
            var man = $("#man").val();
            var mas = $("#mas").val();
            $("#btn-save").html('Tunggu sebentar...');
            $("#btn-save"). attr("disabled", true);
            
            // ajax
            $.ajax({
                type:"POST",
                url: "{{ url('laymad_ra/update') }}",
                data: {
                    id:id,
                    ra:ra,
                    min:min,
                    mis:mis,
                    mtsn:mtsn,
                    mtss:mtss,
                    man:man,
                    mas:mas,
                },
                dataType: 'json',
                success: function(res){
                // window.location.reload();
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                toast('Data sudah diubah');
                // Swal.fire({title: 'Sukses', Text:'Data berhasil diubah', icon:"success",});       
                $('#ajaxModel').modal('hide');     
                table.draw(); 
                }
            });
        });        
    });

    function formatErrorMessage(jqXHR, exception) {

        if (jqXHR.status === 0) {
            return ('Not connected.\nPlease verify your network connection.');
        } else if (jqXHR.status == 404) {
            return ('The requested page not found. [404]');
        } else if (jqXHR.status == 500) {
            return ('Internal Server Error [500].');
        } else if (exception === 'parsererror') {
            return ('Requested JSON parse failed or No Access Allowed. Please to Contact Administrator..!');
        } else if (exception === 'timeout') {
            return ('Time out error.');
        } else if (exception === 'abort') {
            return ('Ajax request aborted.');
        } else {
            return ('Uncaught Error.\n' + jqXHR.responseText);
        }
    }    
    </script>
@endpush 

