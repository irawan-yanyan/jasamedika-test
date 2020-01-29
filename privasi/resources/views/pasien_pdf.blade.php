<!DOCTYPE html>
<html>
<head>
        <title>Cetak Laporan Id Pasien</title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
   <div class="container">
        <div class="jumbotron">
            <h3>Cetak Kartu Pasien dengan Nomor ID Pasien </h3>
            <h2>{{$Pasien->genid_pasien}}</h3>
            <hr>
            <div class="row">
                 <div class="col-md-4">
                    <label for="nama">Nama Pasien </label>
                 </div>
                 <div class="col-md-4">
                   : {{$Pasien->nama_pasien}}
                 </div>
            </div>

            <div class="row">
                 <div class="col-md-4">
                    <label for="alamat">Alamat Pasien </label>
                 </div>
                 <div class="col-md-4">
                    :  {{$Pasien->alamat_pasien}} &nbsp; &nbsp; {{{{$Pasien->rtrw_pasien}}}}
                 </div>
            </div>

            <div class="row">
                 <div class="col-md-4">
                    <label for="gender">Jenis Kelamin Pasien </label>
                 </div>
                 <div class="col-md-4">
                    :  {{$Pasien->jeniskelamin_pasien}}
                 </div>
            </div>


            <div class="row">
                 <div class="col-md-4">
                    <label for="telepon">Telepon Pasien </label>
                 </div>
                 <div class="col-md-4">
                    : {{$Pasien->telp_pasien}}
                 </div>
            </div>

            <div class="row">
                 <div class="col-md-4">
                    <label for="telepon">Tanggal Lahir Pasien </label>
                 </div>
                 <div class="col-md-4">
                    : {{$Pasien->tanggallahir_pasien}}
                 </div>
            </div>


        </div>
   </div>

</body>
</html>