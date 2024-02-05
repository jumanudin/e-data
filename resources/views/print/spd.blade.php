<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cetak Surat Perjalanan Dinas {{$data->Perihal}}</title>
   
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
                <td align="right" style="width:55%;">
                    <img src="{{asset('turtle/img/kemenag-logo.png')}}" style="width: 120px; height: auto"/> 
                </td>
                <td style="line-height: 5px; margin-left:5px;" >
                    <h1 class="judul-10">LAMPIRAN I :  </h1>  
                    <h2 class="judul-10">PMK NOMOR 113/PMK.05/2012</h2>  
                    <h2 class="judul-10">TENTANG</h2>  
                    <h2 class="judul-10">PERJALANAN DINAS JABATAN DALAM NEGERI BAGI PEJABAT </h2>  
                    <h2 class="judul-10">NEGARA, PEGAWAI NEGERI DAN PEGAWAI TIDAK TETAP</h2>  
                </td>
            </tr>
            <tr>
                <td colspan="2" style="line-height: 2px;" align="center">
                    <h2 >MENTERI AGAMA</h2>  
                    <h2>REPUBLIK INDONESIA</h2>  
                </td>                
            </tr>
            <tr>
                <td colspan="2" class="garis"></td>
            </tr>
            </table>
                <!-- --header-- -->
                <div class="text-center judul-16">                    
                    <table class="table text-left" style="width:100%;">
                    <tr>
                        <td style="width:50%">
                            Kementerian Negara /Lembaga : Agama
                        </td>
                        <td style="width:50%">
                            Lembar Ke : 
                        </td>
                    </tr>    
                    <tr>
                        <td style="width:50%"></td>
                        <td>Kode No :</td>
                    </tr>
                    <tr>
                        <td style="width:50%"></td>
                        <td>Nomor :  {{$data->nomor_spd}}<br/></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2" style="font-size:16pt;"><b>SURAT PERJALANAN DINAS [SPD]</b></td>
                    </tr>        
					</table>
                </div>
                {{-- isi data spd --}}
                <table style="border: 1px solid black;border-collapse: collapse;width:100%; line-height:35px;" class="judul-16">
                    <tr>
                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">1</td>
                        <td class="garis-pinggir"  style="width:45%; padding-left:10px; text-align: left; vertical-align: middle;">Pejabat Pembuat Komitmen</td>
                        <td colspan="2" class="garis-pinggir"  style="width:50%; padding-left:10px; text-align: left; vertical-align: middle;">{{!empty($ppk->nama) ? $ppk->nama :''}}</td>
                    </tr>
                    <tr>
                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">2</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">Nama / NIP Pegawai yang melaksanakan perjalanan dinas</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">{{!empty($temp->nama) ? $temp->nama :""}} - {{!empty($temp->nip) ? $temp->nip :""}}</td>
                    </tr>
                    <tr>
                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">3</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">a. Pangkat dan Golongan</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">a. {{!empty($gol->pangkat) ? $gol->pangkat :""}} - {{!empty($gol->gol) ? $gol->gol :""}}</td>
                    </tr>
                    <tr>
                        <td class=""  style="text-align: center; vertical-align: middle;"></td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">b. Jabatan / Instansi</td>
                        <td colspan="2" class="garis-pinggir"  style="line-height:1.5;padding-left:10px; text-align: left; vertical-align: middle;">b. {{!empty($temp->jabatan) ? $temp->jabatan :""}} pada {{!empty($temp->nama_unit) ? $temp->nama_unit :""}}</td>
                    </tr>
                    <tr>
                        <td class=""  style="text-align: center; vertical-align: middle;"></td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">c. Tingkat Biaya Perjalanan Dinas</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">c. </td>
                    </tr>
                    <tr>
                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">4</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">Maksud Perjalanan Dinas</td>
                        <td colspan="2" class="garis-pinggir"  style="line-height:1.5;padding-left:10px; text-align: left; vertical-align: middle;">{{!empty($data->maksud_spd) ? $data->maksud_spd:"" }}</td>
                    </tr>
                    <tr>
                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">5</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">Alat Angkutan Yang Dipergunakan</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">{{!empty($kendaraan->nama) ? $kendaraan->nama :""}}</td>
                    </tr>
                    <tr>
                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">6</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">a. Tempat Berangkat</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">a. {{!empty($data->tempat_berangkat) ? $data->tempat_berangkat :""}}</td>
                    </tr>
                    <tr>
                        <td class=""  style="text-align: center; vertical-align: middle;"></td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">b. Tempat Tujuan</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">b. {{!empty($data->tempat_tujuan) ? $data->tempat_tujuan :""}}</td>
                    </tr>
                    <tr>
                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">7</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">a. Lamanya Perjalan Dinas</td>
                        @php             
                            $tgl2 = New DateTime($data->tgl_pulang);
                            $tgl1 = New DateTime($data->tgl_pergi);
                            $hari = $tgl2->diff($tgl1); 
                            @endphp    
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">a. {{$hari->d + 1}} hari</td>
                    </tr>
                    <tr>
                        <td class=""  style="text-align: center; vertical-align: middle;"></td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">b. Tanggal Berangkat</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">b. {{ Helper::tgl_indo($data->tgl_pergi) }}</td>
                    </tr>
                    <tr>
                        <td class=""  style="text-align: center; vertical-align: middle;"></td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">c. Tanggal Harus Kembali / Tiba di Tempat Baru</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">c. {{ Helper::tgl_indo($data->tgl_pulang) }}</td>
                    </tr>
                    <tr>
                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">8</td>
                        <td class="garis"  style="padding-left:10px; text-align: left; vertical-align: middle;">Pengikut /  Nama</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">Tanggal Lahir</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">Keterangan</td>
                    </tr>
                    <tr>
                        <td class=""  style="text-align: center; vertical-align: middle;"></td>
                        <td class="garis-pinggir2"  style="padding-left:10px; text-align: left; vertical-align: middle;">{{!empty($data->pengikut1) ? $data->pengikut1 :""}} - {{!empty($data->pengikut2) ? $data->pengikut2 : ""}}</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;"></td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;"></td>
                    </tr>
                    <tr>
                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">9</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">Pembebanan Anggaran</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;"></td>
                    </tr>
                    <tr>
                        <td class=""  style="text-align: center; vertical-align: middle;"></td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">a. Instansi</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">a. Kanwil Kementerian Agama Prov. Sumatera Barat</td>
                    </tr>
                    <tr>
                        <td class=""  style="text-align: center; vertical-align: middle;"></td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">b. Akun</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">b. {{ $data->akun }}</td>
                    </tr>
                    <tr>
                        <td class="garis-pinggir"  style="text-align: center; vertical-align: middle;">10</td>
                        <td class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;">Keterangan Lain - lain</td>
                        <td colspan="2" class="garis-pinggir"  style="padding-left:10px; text-align: left; vertical-align: middle;"></td>
                    </tr>
                </table>
                {{-- end isi --}}
                <table style="width: 100%;" class="judul-16">
                    <tr>
                        <td style="widht:50%;">
                        </td>
                        <td>
                            Dikeluarkan di : Padang, 
                        </td>    
                    </tr>
                    <tr>
                        <td style="widht:50%;"></td>
                        <td>Tanggal : {{ helper::tgl_indo(is_null($data->tgl_spd) ? date('Y-m-d') : $data->tgl_spd )}}                          
                        </td>
                    </tr>
                    <tr><td style="width:70%;"></td>
                        <td style="width:30%;">PEJABAT PEMBUAT KOMITMEN <br/><br/><br/><br/>                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width:70%;"></td>
                        <td style="width:30%;">{{!empty($ppk->nama) ? $ppk->nama :""}}</td>    
                    </tr>
                    <tr>
                        <td style="width:70%;"></td>
                        <td style="width:30%;">NIP. {{!empty($data->ppk) ? $data->ppk :""}}</td>    
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                            <p class="judul-10">Halaman ini sudah di generate dengan token {{$data->file_rekom}}</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>     
    </page>
</body>
</html>