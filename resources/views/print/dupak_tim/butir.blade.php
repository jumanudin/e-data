<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DAFTAR USULAN KEGIATAN PENYULUH AGAMA ISLAM {{ $data->nama}}</title>
   
</head>
<style>
    .bodypage {
        background: rgb(204,204,204); 
    }
    page {
        background: white;
        display: block;
        margin: auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }

    page[size="A4"] {  
        width: 29.7cm;
    }

    .marginpage{
        padding: 1cm 2cm;
    }

    @media print {
        body, page {
            margin: 0;
            box-shadow: none;
        }
        .bodypage {
            margin: 0;
            box-shadow: none;
        }
    }


    p {
        margin:0px;
    }
    .arial-10{font-size: 10pt; color: #000000; font-family: Arial}
    .garis {border: 1px solid black;}
    .garis-pinggir {border-width: 1px 1px 0px 1px; border-style: solid; border-color: black;}
    .garis-pinggir2 {border-width: 0px 1px 0px 1px; border-style: solid; border-color: black;}
    .judul-16{font-weight: bold; font-size: 16pt; color: #000000; text-align : center; font-family: Arial}
</style>
<body class="bodypage">
    <page size ="A4">
        <div class="marginpage" align="center">
            <div align="center">
            <table style="width: 100%;">
            <tr>
                <td>
                    <!-- <img src="" style="width: 100%; height: auto"/>  -->
                </td>
            </tr>
            </table>
                <!-- --header-- -->
                <div class="text-center">
                    <h1>DAFTAR USULAN KEGIATAN PENYULUH AGAMA ISLAM</h1>                   
                    <table class="table text-left" style=" border-collapse: collapse;width:100%;">
                    <tr>
                        <td>Nama</td>
                        <td>: {{ $data->nama}}</td>
                    </tr>
                    <tr>
                        <td>Pangkat / Golongan </td>
                        <td>: {{ $pangkat->pangkat.'/'.$pangkat->gol }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>: Penyuluh Agama Islam &nbsp{{ $jabatan->nama_jabatan}}</td>
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        <td>:  {{ $unit->nama}}</td>
                    </tr>

                    <tr>
                        <td>Masa Penilaian</td>
                        <td>: {{ date('d-m-Y',strtotime($data->mp_awal)) }} s/d {{ date('d-m-Y',strtotime($data->mp_akhir))}}</td>
                    </tr>

					</table>
                    <table style="border: 1px solid black;border-collapse: collapse;width:100%;">
                        <thead>
                            <tr>
                                <th class="garis" style="text-align: center; vertical-align: middle; width: 5%"><b>NO</b></th>
                                <th class="garis" style="text-align: center; vertical-align: middle; width: 15%">TGL KEGIATAN</th>
                                <th class="garis" style="text-align: center; vertical-align: middle; width: 65%">NAMA KEGIATAN</th>
                                <th class="garis" style="text-align: center; vertical-align: middle; width: 10">TOTAL AK USUL</th>
                                <th class="garis" style="text-align: center; vertical-align: middle; width: 10">TOTAL AK TIM</th>
                            </tr>
                            <tr>
                                <th class="garis"  style="text-align: center; vertical-align: middle; "><b>1</b></th>
                                <th class="garis"  style="text-align: center; vertical-align: middle; "><b>2</b></th>
                                <th class="garis"  style="text-align: center; vertical-align: middle; "><b>3</b></th>
                                <th class="garis"  style="text-align: center; vertical-align: middle; "><b>4</b></th>
                                <th class="garis"  style="text-align: center; vertical-align: middle; "><b>5</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $tpaif=0;$ttim=0;
                            @endphp
                            @foreach ( $datatim as $temp )
                            @php
                              $tpaif = $tpaif + $temp->ak_paif;
                              $ttim = $ttim + $temp->ak_tim;
                            @endphp 
                            <tr>
                                <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">{{ ++$i }}</td>
                                <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">{{ date('d-m-Y',strtotime($temp->tgl_kegiatan))}}</td>
                                <td class="garis-pinggir"  style="text-align: left; vertical-align: middle;">&nbsp{{ $temp->uraian }}</td>
                                <td class="garis"  style="text-align: center; vertical-align: middle;">{{ $temp->ak_paif }}</td>
                                <td class="garis"  style="text-align: center; vertical-align: middle;">{{ $temp->ak_tim }}</td>
                            </tr>
                            @endforeach
                            <tr>
                            <td colspan="3" class="garis"  style="text-align: center; vertical-align: middle;">TOTAL AK</td>
                            <td class="garis"  style="text-align: center; vertical-align: middle;">{{ $tpaif }}</td>
                            <td class="garis"  style="text-align: center; vertical-align: middle;">{{ $ttim }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <table style="width:100%;">
                    <tr>
                        <td style="width: 30%;">Mengetahui, 
                            <br/>{{ $data->nama_jabatan}}<br/>
                            <br/>
                            <br/>
                            <br/>
                        </td>
                        <td style="width: 40%;"></td>
                        <td style="width: 30%;">{{$data->ttd_pejabat}},     {{ Helper::tgl_indo($data->tgl_ttdpejabat)}}<br/>Pegawai yang melaksanakan
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br/><b>{{ $data->nama_pejabat}}</b>
                            <br/>NIP: {{ $data->nip_pejabat}}	
                        </td>
                        <td></td>
                        <td>
                            <br/><b>{{ $data->nama}}</b>
                            <br/>NIP: {{ $data->nip}}		
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </page>

</body>
</html>