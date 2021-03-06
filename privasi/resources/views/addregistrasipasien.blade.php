@extends('layouts.app')
  @section('content')
<div class="container">
    <h2>Tambah Data Pasien</h2><hr/>
    <form action="{{url('simpanpasien')}}" method="post">
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
                         placeholder="Nama Pasien" required>
               </div>
               <div class="form-group">
                  <textarea name="alamat_pasien" class="form-control" placeholder="Isi Alamat Pasien" required></textarea>
               </div>
               <div class="form-group">
                   <input type="text" name="telp_pasien" class="form-control" 
                         placeholder="Telepon Pasien" required>
               </div>
               <div class="form-group">
                   <input type="text" name="rtrw_pasien" class="form-control" 
                         placeholder="RT / RW Pasien" required>
               </div>
               <div class="form-group">
                   
			 <input class="" type="text" id="tgllahir_pasien" name="tgllahir_pasien" 
                               placeholder="Tanggal Lahir ex. 1979-02-23" size="32" required="required" readonly> 
	                               <i class="fa fa-calendar" style="font-size:24px"></i>
               </div>
               <div class="form-group">
                   <div class="row">
			 
                         <label for="Pria">Pria</label>
                         <input type="radio" class="" name="jeniskelamin_pasien" value="Pria" required>
                         <label for="Wanita">Wanita</label>
                         <input type="radio" class="" name="jeniskelamin_pasien" value="Wanita" required> 
                    </div>
               </div>
               <div class="form-group">
               
                  <select name="kelurahan_id" class="form-control" required>
                    <option value="" selected>Pilih kelurahan</option>
                     @foreach($Kelurahan as $vk)   
                           <option value="{{$vk->id}}" >
                                  {{$vk->nama_kelurahan}}
                                     - kec : {{$vk->nama_kecamatan}} - kota : {{$vk->nama_kota}}
                           </option>
                      @endforeach
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
