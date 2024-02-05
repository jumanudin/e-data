<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cetak Surat Tugas {{$data->Perihal}}</title>
   
</head>
<style>
    .bodypage {
        background: rgb(204,204,204); 
        font-family : arial;
    }
    page {
        background: white;
        display: block;
        margin: auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    table { page-break-inside:auto }
    /*table tr {border-bottom: 1px solid;border-color: transparent;}*/
    tr    { page-break-inside:avoid; page-break-after:auto ;}
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
    .judul-20{font-weight: bold; font-size: 20pt; color: #000000; text-align : center; font-family: Arial}
    .judul-12{font-weight: normal; font-size: 12pt; color: #000000; text-align : left; font-family: Arial}
    .judul-16{font-weight: normal; font-size: 14pt; color: #000000; text-align : left; font-family: Arial}
    .judul-10{font-weight: normal; font-size: 10pt; color: #000000; text-align : left; font-family: Arial}
    .rata-kiri{text-align:left;}
    .rata-kanan{text-align:right;}
    .full-top{text-align: justify; vertical-align: baseline;}
</style>
<body class="bodypage">
    <page size ="A4">
        <div class="marginpage" align="">
            <div align="">
            <table style="width: 100%;">
            <tr>
                <td>
                    <img src="{{asset('turtle/img/kemenag-logo.png')}}" style="width: 120px; height: auto"/> 
                </td>
                <td style="line-height: 5px;" align="center">
                    <h1 class="judul-20"><B>KANTOR KEMENTERIAN AGAMA REPUBLIK INDONESIA</B></h1>  
                    <h2>KANTOR WILAYAH KEMENTERIAN AGAMA</h2>  
                    <h2>PROVINSI SUMATERA BARAT</h2>  
                    <h4>Jl. Kuini No. 79 B Padang 25114, Telp. (0751) 21686 Fax (0751) 22583</h4>  
                    <h4>Website : http/sumbar.kemenag.go.id, Email : kanwilsumbar@kemenag.go.id</h4>  
                </td>
            </tr>
            <tr>
                <td colspan="2" class="garis"></td>
            </tr>
            </table>
                <!-- --header-- -->
                <div class="text-center judul-16">                    
                <table style="width: 100%; ">
                <td style="line-height: 1px;" align="center">
                    <h3>SURAT TUGAS</h3>   
                    <h4>Nomor : {{$data->nomor_st}}</h4>           
                </td>
                </table>   
                </div>
                {{-- isi data spd --}}
                <table style="border-collapse: collapse; width:100%; line-height:18px" class="judul-12">
                    <tr >
                        <td class="full-top" style="width:15%;">Menimbang</td>
                        <td class="full-top" style="width:5%">: a.</td>
                        <td class="full-top" style="width:80%; padding-left:0px;">{!!$data->timbang_1!!}</td>
                    </tr>
                    @if(!empty($data->timbang_2))
                    <tr >
                        <td class="full-top"></td>
                        <td class="full-top">&nbsp b.</td>
                        <td class="full-top">{!!$data->timbang_2!!}</td>
                    </tr>
                    @endif
                    @if(!empty($data->timbang_3))
                    <tr >
                        <td class="full-top"></td>
                        <td class="full-top">&nbsp c.</td>
                        <td class="full-top">{!!$data->timbang_3!!}</td>
                    </tr>
                    @endif
                    <tr >
                        <td class="full-top" >Dasar</td>
                        <td class="full-top" >: 1.</td>
                        <td class="full-top" >{!!$data->dasar_1!!}</td>
                    </tr>                    
                    @if(!empty($data->dasar_2))
                    <tr >
                        <td class="full-top"></td>
                        <td class="full-top">&nbsp 2.</td>
                        <td class="full-top">{!!$data->dasar_2!!}</td>
                    </tr>
                    @endif
                    @if(!empty($data->dasar_3))
                    <tr >
                        <td class="full-top"></td>
                        <td class="full-top">&nbsp 3.</td>
                        <td class="full-top">{!!$data->dasar_3!!}</td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="3" style="width:100% ;text-align: center; vertical-align: baseline; line-height: 25px;"><B>Memberi Tugas :</B></td>
                    </tr>
                    <tr >
                        <td class="full-top">Kepada</td>
                        <td class="full-top">:</td>
                        <td class="full-top"></td>
                    </tr>            
                    @foreach($temp as $key=>$value)
                    <tr >
                        <td class="full-top"></td>
                        <td class="full-top">{{$key+1}} . </td>
                        <td class="full-top"><b>{{$value->nip}} {{$value->nama}}</b>, Jabatan {{$value->jabatan}} pada {{$value->nama_unit}} Kanwil Kementerian Agama Prov. Sumatera Barat</td>
                    </tr>                          
                    @endforeach
                    <tr >
                        <td style="width:15% text-align: justify; vertical-align: baseline; line-height: 25px;">Untuk</td>
                        <td class="full-top">:</td>
                        <td sclass="full-top">Mengikuti kegiatan : {{$data->maksud_spd}}</td>
                    </tr>                    
                    <tr >
                        <td colspan="2" style="width:15% text-align: justify; vertical-align: baseline; line-height: 25px;"></td>
                        <td class="full-top">Pada Tanggal : {{!empty($data->tgl_pergi) ? $data->tgl_pergi : '' }} s/d {{!empty($data->tgl_pulang) ? $data->tgl_pulang :''}}</td>
                    </tr>                    
                    <tr >
                        <td colspan="2" style="width:15% text-align: justify; vertical-align: baseline; line-height: 25px;"></td>
                        <td class="full-top">Lokasi Kegiatan : {!!$data->lokasi_acara!!}</td>
                    </tr> 
                    <tr >
                        <td colspan="3" style="text-align: justify; vertical-align: baseline; "><br>Dengan Ketentuan sebagai berikut :</td>
                    </tr> 
                    <tr >
                        <td colspan="3" style="padding-left:30px;text-align: justify; vertical-align: baseline; ">1. Agar melaksanakan tugas dengan sebaik-baiknya sesuai jadwal yang ditetapkan</td>
                    </tr> 
                    <tr >
                        <td colspan="3" style="padding-left:30px;text-align: justify; vertical-align: baseline; ">2. Agar menyampaikan laporan perjalanan dinas kepada atasan langsung;</td>
                    </tr> 
                    <tr >
                        <td colspan="3" style="padding-left:30px;text-align: justify; vertical-align: baseline; ">3. Agar membuat laporan tertulis kepada atasan langsung.</td>
                    </tr> 
                    <tr >
                        <td colspan="3" style="padding-left:40px;text-align: justify; vertical-align: baseline; "><br>Demikian Surat Tugas ini dibuat untuk dilaksanakan sebagaimana mestinya.</td>
                    </tr> 
                    
                </table>
                {{-- end isi --}}
                <table style="width: 100%;" class="judul-12">
                    <tr>
                        <td rowspan="5" style="width:70%;text-align: justify; vertical-align: middle;">
                            {!! QrCode::size(100)->backgroundColor(255,255,255)->generate("'{{$data->file_rekom}}'") !!}
                        </td>
                        <td style="width:30%;text-align: justify; vertical-align: top;">
                            {{!empty($pejabat->lokasi_kantor) ? $pejabat->lokasi_kantor :""}}, {{empty((int)($data->tgl_st)) ? '00-00-0000' :  helper::tgl_indo($data->tgl_st )}} 
                        </td>    
                    </tr>
                    <tr>
                        <td rowspan="" style="text-align: justify; vertical-align: top;">Kepala, <br><br><br></td>
                    </tr>
                    <tr>
                        <td rowspan="" style="vertical-align:top">
                            <!--<img src="{{asset('turtle/img/ttd-kanwil-bangka.png')}}" style="width: 200px; height: auto; float:left;"/> -->
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="" style="text-align: justify; vertical-align: top;">{{!empty($pejabat->nama_pimpinan) ? $pejabat->nama_pimpinan :""}}</td>    
                    </tr>
                    <tr>
                        <td rowspan="" style="text-align: justify; vertical-align: top;">
                            
                        </td>
                    </tr>                    
                    <tr>
                        <td colspan="2">
                            <hr>
                            <p class="judul-10">Halaman ini sudah di generate {{$data->file_rekom}}</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>     
    </page>
</body>
</html>