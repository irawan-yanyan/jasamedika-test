@extends('layouts.app')

  @section('content')

  <div class="container">
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

    <h2>List Kelurahan</h2>
      <div class="row">  
        <div class="col-md-10">
        <form action="{{url('kelurahan')}}" method="get">
          <button type="submit" class="btn btn-success">Cari Kelurahan</button>
          <input type="text" name="cari_kelurahan"  placeholder="Cari Kelurahan">
        </form>
        </div>
        <div class="col-md-2">
          <button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Tambah data kelurahan</button>
        </div>
      </div>
    
    <table class="table table-striped" id="mytable">
      <thead>
        <tr>
          <th>No</th>
          <th>Kelurahan</th>
          <th>Kecamatan</th>
          <th>Kota</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($Kelurahan as $no => $cp) 
        <tr>
          <td>
          {{++$no + ($Kelurahan->currentPage()-1) * $Kelurahan->perPage()}}
          </td>
          <td>{{$cp->nama_kelurahan}}</td>
          <td>{{$cp->nama_kecamatan}}</td>
          <td>{{$cp->nama_kota}}</td>
          <td>
          <a href="{{url('editkelurahanpasien/'.$cp->id.'')}}" class="btn btn-success">Edit</a>
        <!--
            <a href="javascript:void(0);" class="btn btn-sm btn-danger delete" 
                   data-id="{{$cp->id}}">Delete</a>

        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$cp->id}})" 
                data-target="#DeleteModal" class="btn btn-xs btn-danger"> Delete</a>
-->
<a href="{{url('hapuskelurahanpasien/'.$cp->id.'')}}" class="btn btn-danger"
        onclick="javascript:return confirm('Anda yakin akan menghapus data kelurahan')">Delete</a>
                                   
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
        Page:{{$Kelurahan->currentPage()}}<br>
        Data Amount:{{$Kelurahan->total()}}<br>
        Data per Page:{{$Kelurahan->perPage()}}<br>
        {{$Kelurahan->links()}}
  </div>
 
    <!-- Modal Add Kelurahan-->
      <form action="{{url('simpankelurahanpasien')}}" method="post">
      @csrf
        <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelurahan</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
               <div class="form-group">
                   <input type="text" name="nama_kelurahan" class="form-control" 
                        placeholder="Nama Kelurahan" required>
               </div>
               <div class="form-group">
                   <input type="text" name="nama_kecamatan" class="form-control" 
                         placeholder="Nama Kecamatan" required>
               </div>
               <div class="form-group">
                   <input type="text" name="nama_kota" class="form-control" 
                         placeholder="Nama Kota" required>
               </div>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save</button>
             </div>
           </div>
         </div>
        </div>
     </form>
 
     <!-- Modal Update Kelurahan-->
   <form action="/update" method="post">
       <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Kelurahan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <input type="text" name="nama_kelurahan" class="form-control nama_kelurahan" 
                     placeholder="Nama Kelurahan" required>
              </div>
              <div class="form-group">
                  <input type="text" name="nama_kecamatan" class="form-control nama_kecamatan" 
                     placeholder="Nama kecamatan" required>
              </div>
              <div class="form-group">
                  <input type="text" name="nama_kota" class="form-control nama_kota" 
                     placeholder="Nama Kota" required>
              </div>
             
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id" class="id">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
       </div>
  </form>
 
     <!-- Modal Delete Kelurahan-->
      <form id="add-row-form" action="{{url('hapuskelurahanpasien')}}" method="post">
      @csrf
         <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Delete Kelurahan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   </div>
                   <div class="modal-body">
                                                 <strong>Anda yakin mau menghapus data ini?</strong>
                   </div>
                   <div class="modal-footer">
                             <input type="hidden" name="id" class="form-control id2" required>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Delete</button>
                   </div>
                    </div>
            </div>
         </div>
     </form>
<!--
<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>-->
<script>
    $(document).ready(function(){
            //tampilkan data ke modal untuk edit
  /*
      $('#mytable').on('click','.edit',function(){
        var id= $(this).data('id');
        var nama_kelurahan = $(this).data('nama_kelurahan');
        var nama_kecamatan = $(this).data('nama_kecamatan');
        var nama_kota = $(this).data('nama_kota');
        $('#EditModal').modal('show');
        $('.nama_kelurahan').val(nama_kelurahan);
        $('.nama_kecamatan').val(nama_kecamatan);
        $('.nama_kota').val(nama_kota);
      });
      */
            //tampilkan modal hapus record
    /*
            $('#mytable').on('click','.delete',function(){
              var id = $(this).data('id');
               $('#DeleteModal').modal('show');
             $('.id2').val(id);
           });
    */

   
    });
</script>





@endsection

