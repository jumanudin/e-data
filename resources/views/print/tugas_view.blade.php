<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Surat Tugas Perjalan Dinas {{$data->perihal}}</title>
   
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
    .judul-20{font-weight: bold; font-size: 20pt; color: #000000; text-align : center; font-family: Arial}
    .judul-12{font-weight: normal; font-size: 12pt; color: #000000; text-align : left; font-family: Arial}
    .judul-16{font-weight: normal; font-size: 14pt; color: #000000; text-align : left; font-family: Arial}
    .judul-10{font-weight: normal; font-size: 10pt; color: #000000; text-align : left; font-family: Arial}
    .rata-kiri{text-align:left;}
    .rata-kanan{text-align:right;}
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
            <tr>
                <table style="width: 100%;">
                <td style="line-height: 5px;" align="center">
                    <h1>SURAT REKOMENDASI PERJALANAN DINAS</h1>   
                    <h3>Perihal : {{$data->perihal}}</h3>           
                </td>
                </table>    
            </tr>
                <!-- --header-- -->
                <div class="text-center judul-16">                    
                    <table class="table text-left" style="width:100%;">
                    <tr>
                        <td colspan="2">
                            Saya yang bertanda tangan di bawah ini : <br/><br/>
                        </td>
                    </tr>    
                    <tr>
                        <td>Nama</td>
                        <td>: Dr. H. Helmi, M.Ag</td>
                    </tr>
                    <tr>
                        <td>NIP </td>
                        <td>: 197003011995031001</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>: Kepala Kantor Wilayah Kementerian Agama Prov. Sumatera Barat</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: Jln. Kuini No. 79b Padang  - Sumatera Barat</td>
                    </tr>
                    <tr>
                        <td><br/></td>
                    </tr>    
                    <tr>
                        <td colspan="2">Dengan ini memberi rekomendasi kepada : <br/><br/></td>
                    </tr>  
                    @php
                    $golongan="";
                    @endphp
                    @foreach($rinci as $temp)
                    @foreach($gol as $item)
                    @if($temp->kode_golongan == $item->gol)
                    @php
                        $golongan = $item->pangkat.' '.$item->gol;
                    @endphp
                    @endif
                    @endforeach    
                    <tr>
                        <td>Nama</td>
                        <td>: <b>{{$temp->nama}}</b></td>
                    </tr>
                    <tr>
                        <td>NIP </td>
                        <td>: {{$temp->nip}}</td>
                    </tr>
                    <tr>
                        <td>Pangkat/Gol </td>
                        <td>: {{$golongan}}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>: {{$temp->jabatan}}</td>
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        <td>: {{$temp->nama_unit}}</td>
                    </tr>
                    <tr>
                        <td><br/></td>
                    </tr>                   
                    @endforeach 
					</table>
                </div>
                <table style="width: 100%;" class="judul-16">
                    <tr>

                    </tr>
                    <tr>
                        <td style="widht:70%;">
                        </td>
                        <td colspan="2" style="width:30%;">
                            Padang, {{ Helper::tgl_indo(date('Y-m-d'))}}
                        </td>    
                    </tr>
                    <tr>
                        <td style="widht:70%;"></td>
                        <td style="width:30%;">
                            Kepala
                        </td>
                    </tr>
                    <tr><td style="width:70%;"></td>
                        <td style="width:30%;">
                            {!! QrCode::size(120)->backgroundColor(255,255,255)->generate("'{{$data->file_rekom}}'") !!}
                        </td>
                    </tr>
                    <tr>
                        <td style="width:70%;"></td>
                        <td style="width:30%;">Helmi</td>    
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                            <p class="judul-10">Halaman ini sudah di generate dengan token unik</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>     
    </page>
</body>
</html>