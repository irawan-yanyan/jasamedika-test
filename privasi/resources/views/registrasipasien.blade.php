@extends('layouts.app')
  @section('content')
  <!--<div class="container">-->
       @if(count($errors)>0)
             <div class="alert alert-danger">
                <ul>
                     @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                      @endforeach
                </ul>
                </div>
        @endif
        
        @if (\Session::has('success'))<br>
                <div class="alert alert-success">
                   <div class="row">
                     <div class="col-sm">
                       {{ \Session::get('success') }}
                     </div>
                     <div class="col-sm">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     </div>
                  </div>
                </div>
        @endif

    <h2>List Pasien</h2>
      <div class="row">  
        <div class="col-md-10">
        <form action="" method="get">
          <button type="submit" class="btn btn-success">Cari Kelurahan</button>
          <input type="text" name="cari_pasien"  placeholder="Cari Pasien">
          <!--input type="text" name="cari_kelurahan"  placeholder="Cari Kelurahan">-->
        </form>
        </div>
        <div class="col-md-2">
          <a href="{{url('tambahpasien')}}" class="btn btn-success">Tambah Data Pasien</a>
        </div>
      </div>
    
    <table class="table table-striped" id="mytable">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Pasien</th>
          <th>Nama Pasien</th>
          <th>Alamat</th>
          <th>No.Telp</th>
          <th>RT / RW</th>
          <th>Kelurahan</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($Pasien as $no => $cp)
        <tr>
          <td>
          {{++$no + ($Pasien->currentPage()-1) * $Pasien->perPage()}}     
          </td>
          <td><b>{{$cp->genid_pasien}}</b></td>
          <td>{{$cp->nama_pasien}}</td>
          <td>{{$cp->alamat_pasien}}</td>
          <td>{{$cp->telp_pasien}}</td>
          <td>{{$cp->rtrw}}</td>
          <td>{{$cp->kelurahan_id}}</td>
          <td>{{$cp->tanggallahir_pasien}}</td>
          <td>{{$cp->jeniskelamin_pasien}}</td>
          <td>
          <a href="" class="btn btn-success">Edit</a>
           <a href="{{url('hapuspasien/'.$cp->id.'')}}" class="btn btn-danger"
             onclick="javascript:return confirm('Anda yakin akan menghapus data kelurahan')">Delete</a>
           
              <a href="" class="btn btn-warning">Cetak</a> 
                     
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
       
 <!-- </div> -->
 


@endsection

