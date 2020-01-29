<!DOCTYPE html>
<html>
<head>
        <title>Cetak Laporan Id Pasien</title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
   <div class="container">
        <div class="jumbotron">
            Cetak Kartu Pasien dengan Nomor ID Pasien 
           <b> {{$Pasien->genid_pasien}} </b>
            <hr>
            
                    Nama Pasien : <b> {{$Pasien->nama_pasien}} </b>
           <br />
                   Alamat Pasien : <b>{{$Pasien->alamat_pasien}} RT/RW {{$Pasien->rtrw}} </b>
            <br />
                   Jenis Kelamin Pasien : <b> {{$Pasien->jeniskelamin_pasien}} </b>    
            <br />
                    Telepon Pasien : <b>{{$Pasien->telp_pasien}}</b>
            <br />
                    Tanggal Lahir Pasien :<b> {{$Pasien->tanggallahir_pasien}} </b>
            


        </div>
   </div>

</body>
</html>