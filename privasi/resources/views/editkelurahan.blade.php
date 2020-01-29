@extends('layouts.app')

  @section('content')
  <div class="container">
    <h3> Edit Data Kelurahan </h3>
    <hr>
  <form action="{{url('updatepasien')}}" method="post">
      @csrf
    @foreach($editkelurahan as $valuekelurahan)
      <input type="hidden" name="id" class="form-control" value="{{$valuekelurahan->id}}">
        
               <div class="form-group">
                   <input type="text" name="nama_kelurahan" class="form-control"  
                        value="{{$valuekelurahan->nama_kelurahan}}"
                        placeholder="Nama Kelurahan" required>
               </div>

               <div class="form-group">
                   <input type="text" name="nama_kecamatan" class="form-control" 
                   value="{{$valuekelurahan->nama_kecamatan}}"
                         placeholder="Nama Kecamatan" required>
               </div>

               <div class="form-group">
                   <input type="text" name="nama_kota" class="form-control" 
                   value="{{$valuekelurahan->nama_kota}}"
                         placeholder="Nama Kota" required>
               </div>
             
             
      @endforeach   
      <div class="form-group">
               <a href="{{url('kelurahan')}}" class="btn btn-secondary">Close</a>
               <button type="submit" class="btn btn-primary">Save</button>
       </div>  
     </form>
</div>




  @endsection
