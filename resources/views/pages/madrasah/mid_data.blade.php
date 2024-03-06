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
            <div class="breadcrumb-item"><a href="{{ route('laymad_ra') }}">Data Madrasah MI</a></div>
            <div class="breadcrumb-item">Detail data MI  </div>
        </div>
      </div>
  </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">List Data MI Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('laymad_akmi')->l)   
                    <a class="nav-link akre" id="akreditasi-tab" data-toggle="tab" href="#akreditasi" role="tab" aria-controls="akreditasi" aria-selected="false">Akreditasi</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('laymad_gmi')->l)
                    <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Status Guru</a>
                    @endif
                    </li>
                </ul>    
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane show active fade" id="akreditasi" role="tabpanel" aria-labelledby="akreditasi-tab">
                    <div class="card card-success shadow">
                        <div class="card-header">
                            <div class="col-md-6 text-left mb-0 ">
                                <h4>Akreditasi Madrasah MI Tahun {{ $tempstruk->tahun_periode }}</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="table" class="table table-bordered table-striped table-hover data-table" style="width:100%">
                                <thead class="text-white">
                                    <tr class="text-center">
                                    <th >No</th>
                                    <th >Kabupaten / Kota </th>
                                    <th colspan="4">Akreditasi MIN</th>
                                    <th colspan="4">Akreditasi MIS</th>
                                    <th ></th>
                                    </tr>
                                    <tr class="text-center">
                                    <th >No</th>
                                    <th ></th>
                                    <th >A</th>
                                    <th >B</th>
                                    <th >C</th>
                                    <th >D</th>
                                    <th >A</th>
                                    <th >B</th>
                                    <th >C</th>
                                    <th >D</th>
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
                                <h4>Status Guru Madrasah MI Tahun {{ $tempstruk->tahun_periode }}</h4>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="table-responsive">       
                                <table id="table-sgmi" class="table table-striped table-hover table-bordered" style="width:100%">
                                <thead class="text-white">
                                    <tr class="text-center">
                                        <th class="align-middle" rowspan="2">No</th>
                                        <th class="align-middle" rowspan="2">Kabupaten / Kota</th>
                                        <th colspan="2" >Jenis Kelamin</th>
                                        <th colspan="2" >Status</th>
                                        <th colspan="4" >Pendidikan</th>
                                        <th class="align-middle" rowspan="2">Jumlah</th>
                                        <th rowspan="2"></th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>Laki2</th>
                                        <th>Perempuan</th>
                                        <th>PNS</th>
                                        <th >Non PNS</th>
                                        <th >Belum S1</th>
                                        <th >S1</th>
                                        <th >S2</th>
                                        <th >S3</th>
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
        </div>                               
    </div>
   </div>
</div>  
</div>
@endsection    
  @section('modal')

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
                        <div class="col-sm-12"><h5>Akreditasi MIN</h5></div>
                        <div class="col-md-3">    
                            <div class="form-group">
                                <label for="rombel-bezetting" class="col-sm-12 control-label">Akreditasi A</label>
                                <div class="col-sm-12">
                                    <input type="number" id="akmin_a" name="akmin_a" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-md-12 control-label">Akreditasi B</label>
                                <div class="col-md-12">
                                    <input type="number" id="akmin_b" name="akmin_b" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>                               
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Akreditasi C</label>
                                <div class="col-sm-12">
                                    <input type="number" id="akmin_c" name="akmin_c" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label"> Belum Akreditasi</label>
                                <div class="col-sm-12">
                                    <input type="number" id="akmin_belum" name="akmin_belum" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group-sm">
                        <div class="col-sm-12"><h5>Akreditasi MIS</h5></div>
                        <div class="col-md-3">    
                            <div class="form-group">
                                <label class="col-md-12 control-label">Akreditasi A</label>
                                <div class="col-md-12">
                                    <input type="number" id="akmis_a" name="akmis_a" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-md-12 control-label">Akreditasi B</label>
                                <div class="col-md-12">
                                    <input type="number" id="akmis_b" name="akmis_b" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>                               
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Akreditasi C</label>
                                <div class="col-sm-12">
                                    <input type="number" id="akmis_c" name="akmis_c" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Belum Akreditasi</label>
                                <div class="col-sm-12">
                                    <input type="number" id="akmis_belum" name="akmis_belum" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="create">simpan perubahan
                            </button>
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
                <h4 class="modal-title" id="modelHeading">Update Data Guru Madrasah MI </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="AnjabForm" name="AnjabForm" class="form-horizontal">
                   <input type="hidden" name="id_gmi" id="id_gmi">
                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Nama Kabupaten/Kota</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_gmi" name="nama_gmi" disabled>
                        </div>
                    </div>
                    <div class="row form-group-sm">
                        <div class="col-md-4 border">
                            <p><b> Jenis Kelamin</b></p>
                            <div class="form-group">
                                <label for="rombel-bezetting" class="col-sm-12 control-label">Laki - Laki</label>
                                <div class="col-sm-12">
                                    <input type="number" id="mi_pria" name="mi_pria" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Wanita </label>
                                <div class="col-md-12">
                                    <input type="number" id="mi_wanita" name="mi_wanita" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 border">
                            <p><b> Status Pegawai</b></p>
                            <div class="form-group">
                                <label class="col-md-12 control-label">PNS</label>
                                <div class="col-md-12">
                                    <input type="number" id="mi_pns" name="mi_pns" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">NON PNS</label>
                                <div class="col-sm-12">
                                    <input type="number" id="mi_nonpns" name="mi_nonpns" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>                               
                        <div class="col-md-4 border">
                            <p><b> Pendidikan</b></p>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Belum S1</label>
                                <div class="col-md-12">
                                    <input type="number" id="mi_belums1" name="mi_belums1" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">S1</label>
                                <div class="col-sm-12">
                                    <input type="number" id="mi_s1" name="mi_s1" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">S2</label>
                                <div class="col-sm-12">
                                    <input type="number" id="mi_s2" name="mi_s2" required="" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">S3</label>
                                <div class="col-sm-12">
                                    <input type="number" id="mi_s3" name="mi_s3" required="" placeholder="" class="form-control">
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

           
        // end akreditasi

        //status guru event
        $('#table-sgmi').DataTable().destroy();
            var table = $('#table-sgmi').DataTable({
                dom:'Blfrtip',
                buttons: [ 'copy','csv','excel','pdf','print'],
            processing: true,
            serverSide: true,
            searching: false,
            paging :false,
            ajax: "{{route('laymad_gmi') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false},
                {data: 'nama',name:'nama'},
                {data: 'mi_pria', name:'mi_pria'},
                {data: 'mi_wanita', name:'mi_wanita'},
                {data: 'mi_pns', name:'mi_pns'},
                {data: 'mi_nonpns',name :'mi_nonpns'},
                {data: 'mi_belums1',name:'mi_belums1'},
                {data: 'mi_s1', name:'mi_s1'},
                {data: 'mi_s2',name:'mi_s2'},
                {data: 'mi_s3',name:'mi_s3'},
                {data: 'min', name:'min'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
            });
            $('#status').on('click', '.edit', function () {
                var id_mad = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url :"{{ url('laymad_gmi/edit') }}",
                    data:{ id:id_mad},
                    dataType: "JSON",
                    success : function(data) {
                        $('#ModelStatus').modal({backdrop: true, show: true});
                        $('#modelHeading').html("Edit Data Guru Madrasah MI");
                        $('#id_gmi').val(id_mad);
                        $('#nama_gmi').val(data.nama);
                        $('#mi_pria').val(data.mi_pria);
                        $('#mi_wanita').val(data.mi_wanita);
                        $('#mi_pns').val(data.mi_pns);
                        $('#mi_nonpns').val(data.mi_nonpns);
                        $('#mi_belums1').val(data.mi_belums1);
                        $('#mi_s1').val(data.mi_s1);
                        $('#mi_s2').val(data.mi_s2);
                        $('#mi_s3').val(data.mi_s3);
                    }

                })
                .fail(function(xhr, err) { 
                var responseTitle= $(xhr.responseText).filter('title').get(0);            
                alert($(responseTitle).text() + "\n" + formatErrorMessage(xhr, err) ); 
                })
            });  
            $('#ModelStatus').on('click', '#btn-save', function (event) {
            var id = $("#id_gmi").val();
            var mi_pria = $("#mi_pria").val();
            var mi_wanita = $("#mi_wanita").val();
            var mi_pns = $("#mi_pns").val();
            var mi_nonpns = $("#mi_nonpns").val();
            var mi_belums1 = $("#mi_belums1").val();
            var mi_s1 = $("#mi_s1").val();
            var mi_s2 = $("#mi_s2").val();
            var mi_s3 = $("#mi_s3").val();
            $("#btn-save").html('Tunggu sebentar...');
            $("#btn-save"). attr("disabled", true);
            
            // ajax
            $.ajax({
                type:"POST",
                url: "{{ url('laymad_gmi/update') }}",
                data: {
                    id:id,
                    mi_pria:mi_pria,
                    mi_wanita:mi_wanita,
                    mi_pns:mi_pns,
                    mi_nonpns:mi_nonpns,
                    mi_belums1:mi_belums1,
                    mi_s1:mi_s1,
                    mi_s2:mi_s2,
                    mi_s3:mi_s3,
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
            {data: 'akmin_a', name: 'akmin_a'},
            {data: 'akmin_b', name: 'akmin_b'},
            {data: 'akmin_c', name: 'akmin_c'},
            {data: 'akmin_belum', name: 'akmin_belum'},
            {data: 'akmis_a', name: 'akmis_a'},
            {data: 'akmis_b', name: 'akmis_b'},
            {data: 'akmis_c', name: 'akmis_c'},
            {data: 'akmis_belum', name: 'akmis_belum'},
             {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        });

        $('#akreditasi').on('click', '.edit', function () {
            var id_mad = $(this).data('id');
            $.ajax({
                type: "POST",
                url :"{{ url('laymad_akmi/edit') }}",
                data:{ id:id_mad},
                dataType: "JSON",
                success : function(data) {
                    $('#ModelAkreditasi').modal({backdrop: true, show: true});
                    $('#modelHeading').html("Edit Data Akreditasi Madrasah MI");
                    $('#id_akre').val(id_mad);
                    $('#nama_akre').val(data.nama);
                    $('#akmin_a').val(data.akmin_a);
                    $('#akmin_b').val(data.akmin_b);
                    $('#akmin_c').val(data.akmin_c);
                    $('#akmin_belum').val(data.akmin_belum);
                    $('#akmis_a').val(data.akmis_a);
                    $('#akmis_b').val(data.akmis_b);
                    $('#akmis_c').val(data.akmis_c);
                    $('#akmis_belum').val(data.akmis_belum);
                }

            })
            .fail(function(xhr, err) { 
            var responseTitle= $(xhr.responseText).filter('title').get(0);            
            alert($(responseTitle).text() + "\n" + formatErrorMessage(xhr, err) ); 
            })
        });    
        $('#ModelAkreditasi').on('click', '#btn-save', function (event) {
            var id = $("#id_akre").val();
            var akmin_a = $("#akmin_a").val();
            var akmin_b = $("#akmin_b").val();
            var akmin_c = $("#akmin_c").val();
            var akmin_belum = $("#akmin_belum").val();
            var akmis_a = $("#akmis_a").val();
            var akmis_b = $("#akmis_b").val();
            var akmis_c = $("#akmis_c").val();
            var akmis_belum = $("#akmis_belum").val();
            $("#btn-save").html('Tunggu sebentar...');
            $("#btn-save"). attr("disabled", true);
            
            // ajax
            $.ajax({
                type:"POST",
                url: "{{ url('laymad_akmi/update') }}",
                data: {
                    id:id,
                    akmin_a:akmin_a,
                    akmin_b:akmin_b,
                    akmin_c:akmin_c,
                    akmin_belum:akmin_belum,
                    akmis_a:akmis_a,
                    akmis_b:akmis_b,
                    akmis_c:akmis_c,
                    akmis_belum:akmis_belum,
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

