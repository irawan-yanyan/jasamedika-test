@extends('layouts.app')
  @section('content')
<div class="container">
    <h2>Edit Data Pasien</h2><hr/>
    <form action="{{url('updatepasien')}}" method="post">
      @csrf
      
               <div class="form-group">
               <label for="nama">Nama Pasien</label>
                   <input type="hidden" name="id" value="{{$Pasien->id}}" >
                   <input type="text" name="nama_pasien" class="form-control" 
                         value="{{$Pasien->nama_pasien}}"  required>
               </div>
               <div class="form-group">
               <label for="alamat">Alamat Pasien</label>
                   <textarea name="alamat_pasien" class="form-control" required>
                       {{$Pasien->alamat_pasien}}
                   </textarea>
               </div>
               <div class="form-group">
               <label for="telepon">Telp Pasien</label>
                   <input type="text" name="telp_pasien" class="form-control" 
                        value="{{$Pasien->telp_pasien}}" required>
               </div>
               <div class="form-group">
               <label for="rtrw">RT / RW Pasien</label>
                   <input type="text" name="rtrw_pasien" class="form-control" 
                         value="{{$Pasien->rtrw}}" required>
               </div>
               <div class="form-group">
               <label for="tanggallahir">Tanggal Lahir Pasien</label>
                         <input class="" size="32" type="text" id="tgllahir_pasien"
                             name="tgllahir_pasien" value="{{$Pasien->tanggallahir_pasien}}" required="required">
	       		 <i class="fa fa-calendar" style="font-size:24px"></i>
		</div>
               <div class="form-group">
                         
                        @if($Pasien->jeniskelamin_pasien=="Pria")
                            <label for="Pria">Pria</label>
                            <input type="radio" name="jeniskelamin_pasien" value="Pria" checked>
                            <label for="Wanita">Wanita</label>
                            <input type="radio" name="jeniskelamin_pasien" value="Wanita" >  
                        @elseif($Pasien->jeniskelamin_pasien=="Wanita")
                            <label for="Pria">Pria</label>
                            <input type="radio" name="jeniskelamin_pasien" value="Pria" >
                            <label for="Wanita">Wanita</label>
                            <input type="radio" name="jeniskelamin_pasien" value="Wanita" checked> 
                        @endif
               </div>
               <div class="form-group">
               <label for="kelurahan">Kelurahan Pasien</label>
                  <select name="kelurahan_id" class="form-control" required>
                     @foreach($Kelurahan as $vk)   
                        @if($Pasien->kelurahan_id==$vk->id)
                        <option value="{{$vk->id}}" selected>
                                  {{$vk->nama_kelurahan}}
                                     - kec : {{$vk->nama_kecamatan}} - kota : {{$vk->nama_kota}}
                           </option>
                        @endif
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
