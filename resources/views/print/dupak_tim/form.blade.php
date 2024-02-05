<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DUPAK {{ $data->nama}} {{ date('d-m-Y',strtotime($data->mp_awal)) }} s/d {{ date('d-m-Y',strtotime($data->mp_akhir))}}</title>
    <link href="{{ asset('argon') }}/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        font-family: Open Sans, sans-serif
    }
    .bodypage {
        background: rgb(204,204,204); 
    }
    page {
        background: white;
        display: block;
        margin: auto;
        margin-top: 0.5cm;
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
    .sanserif-10{font-weight: bold; font-size: 12pt; color: #000000; font-family: Open Sans, sans-serif}
    .garis {border: 1px solid black;}
    .garis-pinggir {border-width: 1px 1px 0px 1px; border-style: solid; border-color: black;}
    .garis-pinggir2 {border-width: 0px 1px 0px 1px; border-style: solid; border-color: black;}
    .judul-16{font-weight: bold; font-size: 16pt; color: #000000; text-align : center; font-family: sans-serif}
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
                    <h4 class="mb-1 judul-16">DAFTAR USULAN PENETAPAN ANGKA KREDIT</h4>                   
                    <h4 class="mb-1 judul-16">PENYULUH AGAMA ISLAM &nbsp{{ strtoupper($jabatan->nama_jabatan)}}</h4>                   
                    <h5>NOMOR</h5>     
                    <h5 class="mb-2">MASA PENILAIAN TANGGAL &nbsp{{ date('d-m-Y',strtotime($data->mp_awal)) }} s/d {{ date('d-m-Y',strtotime($data->mp_akhir))}}</h5>                   

                    <table class="text-left" style="black;border-collapse: collapse;width:100%;">
                    <tr>
                        <td class="garis text-center bg-success" colspan="3"><b>DATA PERORANGAN</b></td>
                    </tr>
                    <tr>
                        <td class="garis" colspan="2">NAMA</td>
                        <td class="garis" >&nbsp {{ $data->nama}}</td>
                    </tr>
                    <tr>
                        <td class="garis" colspan="2">NIP</td>
                        <td class="garis" >&nbsp {{ $data->nip}}</td>
                    </tr>
                    <tr>
                        <td class="garis" colspan="2">TEMPAT / TANGGAL LAHIR</td>
                        <td class="garis" >&nbsp {{ $data->tempat_lahir}} / {{ $data->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <td class="garis" colspan="2">JENIS KELAMIN</td>
                        @php
                                $jenis_kel = '';
                               if($data->jenis_kelamin=='L'){
                                  $jenis_kel = 'Laki-Laki';      
                               } else {
                                  $jenis_kel = 'Perempuan'; 
                               }
                        @endphp
                        <td class="garis" colspan="2">&nbsp {{ $jenis_kel}}</td>
                    </tr>
                    <tr>
                        <td class="garis" colspan="2">PENDIDIKAN YG TELAH DIPERHITUNGKAN</td>
                        <td class="garis" >&nbsp {{ $pend->tingkat }} {{$data->nama_pendidikan}}</td>
                    </tr>
                    <tr>
                        <td class="garis" colspan="2">PANGKAT / GOLONGAN /TMT </td>
                        <td class="garis" >&nbsp {{ $pangkat->pangkat.' / '.$pangkat->gol.' / '.date('d-m-Y',strtotime($data->tmt_panggol)) }}</td>
                    </tr>
                    <tr>
                        <td class="garis" colspan="2">JABATAN / TMT</td>
                        <td class="garis">&nbspPenyuluh Agama Islam &nbsp{{ $jabatan->nama_jabatan}}</td>
                    </tr>
                    <tr>
                        <td width="40%" class="garis-pinggir2" >MASA KERJA GOLONGAN </td><td width="10%">LAMA</td>
                        <td class="garis"> &nbsp{{ $data->mktahun_lama}} Tahun {{ $data->mkbulan_lama}} Bulan</td>
                    </tr>
                    <tr>
                        <td width="40%" class="garis-pinggir2" ></td><td width="10%">BARU</td>
                        <td class="garis"> &nbsp{{ $data->mktahun_baru}} Tahun {{ $data->mkbulan_baru}} Bulan</td>
                    </tr>
                    <tr>
                        <td class="garis" colspan="2">Unit Kerja</td>
                        <td class="garis">&nbsp  {{ $unit->nama}}</td>
                    </tr>


					</table>
                    <table style="border: 1px solid black;border-collapse: collapse;width:100%;">
                        <thead>
                            <tr>
                               <th colspan="11" class="garis-pinggir text-center bg-success">UNSUR YANG DINILAI</th> 
                            </tr> 
                            <tr>
                                <th rowspan="3" class="garis" style="text-align: center; vertical-align: middle; "><b>NO</b></th>
                                <th width="45%" rowspan="3" colspan="4" class="garis" style="text-align: center; vertical-align: middle; ">UNSUR DAN SUBUNSUR</th>
                                <th width="50%" class="garis" style="text-align: center; vertical-align: middle;" colspan="7">ANGKA KREDIT MENURUT</th>
                            </tr>
                            <tr>                             
                                <th class="garis" style="text-align: center; vertical-align: middle;" colspan="3">UNIT PENGUSUL</th>
                                <th class="garis" style="text-align: center; vertical-align: middle;" colspan="3">TIM PENILAI</th>
                            </tr>
                            <tr>
                                <th class="garis" style="text-align: center; vertical-align: middle;" >LAMA</th>
                                <th class="garis" style="text-align: center; vertical-align: middle;" >BARU</th>
                                <th class="garis" style="text-align: center; vertical-align: middle;" >JML</th>
                                <th class="garis" style="text-align: center; vertical-align: middle;" >LAMA</th>
                                <th class="garis" style="text-align: center; vertical-align: middle;" >BARU</th>
                                <th class="garis" style="text-align: center; vertical-align: middle;" >JML</th>
                            </tr>
                            <tr>
                                <th class="garis  bg-secondary text-white"  style="text-align: center; vertical-align: middle; "><b>1</b></th>
                                <th colspan="4" class="garis  bg-secondary text-white"  style="text-align: center; vertical-align: middle; "><b>2</b></th>
                                <th class="garis  bg-secondary text-white"  style="text-align: center; vertical-align: middle; "><b>3</b></th>
                                <th class="garis  bg-secondary text-white"  style="text-align: center; vertical-align: middle; "><b>4</b></th>
                                <th class="garis  bg-secondary text-white"  style="text-align: center; vertical-align: middle; "><b>5</b></th>
                                <th class="garis  bg-secondary text-white"  style="text-align: center; vertical-align: middle; "><b>6</b></th>
                                <th class="garis  bg-secondary text-white"  style="text-align: center; vertical-align: middle; "><b>7</b></th>
                                <th class="garis  bg-secondary text-white"  style="text-align: center; vertical-align: middle; "><b>8</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totunsur=0; $totunsurbaru=0; @endphp
                            @foreach ( $pokok as $pokoks)
                               @php
                                  $kode="A";
                               @endphp
                                <tr>
                                    <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">{{ $pokoks->kode=="A"?'I':'II'}}</td>
                                    <td colspan="4" class="garis-pinggir sanserif-10"  style="text-align: left; vertical-align: middle;">{{ strtoupper($pokoks->kegiatan)}}</td>
                                    <td class="garis-pinggir"></td>
                                    <td class="garis-pinggir"></td>
                                    <td class="garis-pinggir"></td>
                                    <td class="garis-pinggir"></td>
                                    <td class="garis-pinggir"></td>
                                    <td class="garis-pinggir"></td>
                                </tr>    
                               @foreach ( $unsur as $unsurs)
                               @php $totakbaru=0;$totsub=0; @endphp
                               @if ($unsurs->kode_induk==$pokoks->kode)

                                    <tr>
                                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;"></td>
                                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">{{$kode++}}.</td>
                                        <td colspan="3" class="garis-pinggir"  style="text-align: left; vertical-align: middle;">{{ $unsurs->kegiatan}}</td>
                                        <td class="garis-pinggir"></td>
                                        <td class="garis-pinggir"></td>
                                        <td class="garis-pinggir"></td>
                                        <td class="garis-pinggir"></td>
                                        <td class="garis-pinggir"></td>
                                        <td class="garis-pinggir"></td>
                                    </tr>
                                    @php $i=1;  @endphp
                                    @foreach ( $subunsur as $subunsurs)
                                    @if ($subunsurs->kode_induk==$unsurs->kode)
                                        
                                    <tr>
                                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;"></td>
                                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;"></td>
                                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">{{$i++}}.</td>
                                        <td colspan="2" class="garis-pinggir "  style="text-align: left; vertical-align: middle;">{{ $subunsurs->kegiatan}}</td>
                                        <td class="garis-pinggir">{{ number_format(isset($subunsurs->ak)?$subunsurs->ak:0,3)}}</td>
                                        <td class="garis-pinggir"></td>
                                        <td class="garis-pinggir">{{ number_format(isset($subunsurs->ak)?$subunsurs->ak:0,3)}}</td>
                                        <td class="garis-pinggir"></td>
                                        <td class="garis-pinggir"></td>
                                        <td class="garis-pinggir"></td>
                                    </tr>
                                        @php 
                                            $y='a'; 
                                            $totsub = $totsub + $subunsurs->ak;  
                                            $totunsur = $totunsur + $subunsurs->ak;                                          
                                        @endphp
                                        @foreach ( $datatim as $items )
                                        @if (SUBSTR($items->kode_kegiatan,0,3) == $pokoks->kode.$unsurs->kode.$subunsurs->kode)
                                        @php  
                                            $totakbaru = $totakbaru + $items->tot_ak;    
                                            $totunsurbaru = $totunsurbaru + $items->tot_ak;                                         
                                        @endphp
                                        <tr>
                                            <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;"></td>
                                            <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;"></td>
                                            <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;"></td>
                                            <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">{{$y++}}.</td>
                                            <td class="garis-pinggir " style="text-align: left; vertical-align: middle;">{{ $items->uraian}}</td>
                                            <td class="garis-pinggir" >{{ number_format($items->ak_lama,3)}}</td>
                                            <td class="garis-pinggir">{{ isset($items->tot_ak)?$items->tot_ak:0}}</td>
                                            <td class="garis-pinggir">{{ number_format($items->tot_ak+$items->ak_lama,3)}}</td>
                                            <td class="garis-pinggir">{{ number_format($items->ak_lama,3)}}</td>
                                            <td class="garis-pinggir"></td>
                                            <td class="garis-pinggir"></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @endif
                                    @endforeach    
                                    <tr>
                                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;"></td>
                                        <td colspan="4" class="garis-pinggir sanserif-10"  style="text-align: left; vertical-align: middle;">&nbspSUB TOTAL</td>
                                        <td class="garis-pinggir  sanserif-10">{{ number_format($totsub,3) }}</td>
                                        <td class="garis-pinggir  sanserif-10">{{ number_format($totakbaru,3) }}</td>
                                        <td class="garis-pinggir sanserif-10">{{ number_format($totsub+$totakbaru,3)}}</td>
                                        <td class="garis-pinggir"></td>
                                        <td class="garis-pinggir"></td>
                                        <td class="garis-pinggir"></td>
                                    </tr>    
                                @endif 

                               @endforeach
                            @endforeach
                            <tr>
                                <td colspan="5" class="garis-pinggir sanserif-10"  style="text-align: left; vertical-align: middle;">&nbsp TOTAL I + II</td>
                                <td class="garis-pinggir  sanserif-10">{{ number_format($totunsur,3) }}</td>
                                <td class="garis-pinggir  sanserif-10">{{ number_format($totunsurbaru,3) }}</td>
                                <td class="garis-pinggir sanserif-10">{{ number_format($totunsur+$totunsurbaru,3)}}</td>
                                <td class="garis-pinggir"></td>
                                <td class="garis-pinggir"></td>
                                <td class="garis-pinggir"></td>
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