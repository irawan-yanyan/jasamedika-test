@extends('layouts.app')
  @section('content')
<div class="container">
    <h2>Tambah Data Pasien</h2><hr/>
    <form action="{{url('simpankelurahanpasien')}}" method="post">
      @csrf
        <!-- 
            nama_pasien
            alamat_pasien
            telp_pasien
            rtrw_pasien
            tgllahir_pasien
            jeniskelamin_pasien
         -->
               <div class="form-group">
                   <input type="text" name="nama_pasien" class="form-control" 
                         value=""  required>
               </div>
               <div class="form-group">
                   <input type="text" name="alamat_pasien" class="form-control" 
                   value="" required>
               </div>
               <div class="form-group">
                   <input type="text" name="telp_pasien" class="form-control" 
                        value="" required>
               </div>
               <div class="form-group">
                   <input type="text" name="rtrw_pasien" class="form-control" 
                         value="" required>
               </div>
               <div class="form-group">
                         <input class="form-control" type="text" id="tgllahir_pasien"
                             name="tgllahir_pasien" value="" required="required">
               </div>
               <div class="form-group">
                         <label for="Pria">Pria</label>
                         <input type="radio" name="jeniskelamin_pasien" value="Pria" >
                         <label for="Wanita">Wanita</label>
                         <input type="radio" name="jeniskelamin_pasien" value="Wanita" >  
               </div>
               <div class="form-group">
               
                  <select name="kelurahan_pasien" class="form-control" required>
                        <option value="0" selected>Pilih kelurahan</option>
                        <option value="1" >Ciseureuh</option>
                  </select>   
               </div>
             <!--
<label for="InputAddress">Invite</label>
                <input type="checkbox"  id="invite" name="invite" >
-->
             <div class="form-group">
               <a href="{{url('registrasipasien')}}" class="btn btn-secondary" >Close</a>
               <button type="submit" class="btn btn-primary">Save</button>
             </div>
           
     </form>
</div>



    @endsection