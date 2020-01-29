<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use App\Pasien;
use Illuminate\Support\Facades\Auth;
use PDF;

class PasienKelurahanController extends Controller
{
  // private $kelurahan;
   //public function  __construct( Kelurahan $kelurahan )
   //{
     //  $this->kelurahan = $kelurahan;
   //}

   function index(Request $request){
     
   // hak akses dan otoritas
      if(Auth::user() && Auth::user()->jabatan == "admin"){
             if(isset($_GET['cari_kelurahan'])){
                  $Kelurahan = Kelurahan::where('nama_kelurahan', 'LIKE', '%' 
                                    .$_GET['cari_kelurahan']. '%')->paginate(10);
             }else{
                  $Kelurahan = Kelurahan::paginate(10);
            }
               return view('pasienkelurahan',['Kelurahan'=>$Kelurahan]);
   }else{
      return redirect('login'); 
   }
 }

 public function simpankelurahan(Request $request){
	 
	 
if(Auth::user() && Auth::user()->jabatan == "admin"){  
    $this->validate($request,[
       'nama_kelurahan' => 'required',
       'nama_kecamatan'=> 'required',
       'nama_kota' => 'required',
   ]);

       Kelurahan::create([
       'nama_kelurahan' => $request->nama_kelurahan,
        'nama_kecamatan' => $request->nama_kecamatan,
        'nama_kota' => $request->nama_kota,
        'user_id' => Auth::user()->id
   ]);

   //$recId = $objPost->id; 
   //echo $recId."dfds";exit();
      
     return redirect('kelurahan')->with('success',' Nama kelurahan  '.
                              $request->nama_kelurahan.' Telah berhasil disimpan.'); 
 }else{
      return redirect('login'); 
  }  
}

public function hapuskelurahan($id){ 
   if(Auth::user() && Auth::user()->jabatan == "admin"){ 
     Kelurahan::where('id',$id)->delete();
   return redirect('kelurahan')->with('success',' Nama kelurahan Telah berhasil hapus.'); 
    }else{
      return redirect('login'); 
    }  

}

public function editkelurahan($id){ 
   if(Auth::user() && Auth::user()->jabatan == "admin"){//echo "hallo";exit();
           $Kelurahan = Kelurahan::where('id',$id)->get();
           
           return view('editkelurahan',['editkelurahan'=> $Kelurahan]);
   }else{
       return redirect('login');
   }
}

public function updatekelurahanpasien(Request $request){ 
   if(Auth::user() && Auth::user()->jabatan == "admin"){//echo "hallo";exit();
   $this->validate($request,[
      'nama_kelurahan' => 'required',
      'nama_kecamatan'=> 'required',
      'nama_kota' => 'required',
  ]);

   $Kelurahan = Kelurahan::find($request->id);
   $Kelurahan->nama_kelurahan = $request->nama_kelurahan;
   $Kelurahan->nama_kecamatan = $request->nama_kecamatan;
   $Kelurahan->nama_kota = $request->nama_kota;
   $Kelurahan->user_id = Auth::user()->id;
   $Kelurahan->save();

   
   return redirect('kelurahan')->with('success','nama kelurahan dengan '.
                       $request->nama_kelurahan.'  telah berhasil di update.');            

   }else{
          return redirect('login');
   }
}

public function registrasipasien(Request $request){
   if(Auth::user()){
       if(isset($_GET['cari_pasien'])){
          $Pasien = Pasien::where('nama_pasien', 'LIKE', '%' 
                           .$_GET['cari_pasien']. '%')->paginate(10);
       }else{
         $Pasien = Pasien::paginate(10);
       }
      return view('registrasipasien',['Pasien'=>$Pasien]);
        // return view('registrasipasien');

   }else{
         return redirect('login');
   }

}

public function tambahpasien(){
   if(Auth::user()){
         $Kelurahan = Kelurahan::all();
         return view('addregistrasipasien',['Kelurahan'=>$Kelurahan]);

   }else{
         return redirect('login');
   }
   

}
public function add_leading_zero($value, $threshold = 2) {
   return sprintf('%0' . $threshold . 's', $value);
}

public function simpanpasien(Request $request){
  
if(Auth::user()){  
 $this->validate($request,[
    'nama_pasien' => 'required',
    'telp_pasien' => 'required',
    'alamat_pasien'=> 'required',
    'rtrw_pasien' => 'required',
    'tgllahir_pasien' => 'required',
    'jeniskelamin_pasien' => 'required',
    'kelurahan_id' => 'required',
]);
    
$objPost = Pasien::create([
     'nama_pasien' => $request->nama_pasien,
     'alamat_pasien' => $request->alamat_pasien,
     'telp_pasien' => $request->telp_pasien,
     'rtrw' => $request->rtrw_pasien,
     'jeniskelamin_pasien' => $request->jeniskelamin_pasien,
     'cetak_kartu' => "1",
     'tanggallahir_pasien' => $request->tgllahir_pasien,
     'kelurahan_id' => $request->kelurahan_id,
     'user_id' => Auth::user()->id
]);

$recId = $objPost->id; 
$get_genid = date("ym")."".$this->add_leading_zero($recId, 6);
$Kelurahan = Pasien::find($recId);
$Kelurahan->genid_pasien = $get_genid;
$Kelurahan->save();
   
  return redirect('registrasipasien')->with('success',' Nama pasien  '.
                     $request->nama_pasien.' dengan Id Pasien :'.$get_genid.'telah berhasil disimpan.' ); 
}else{
   return redirect('login'); 
}  
}

public function hapuspasien($id){
   if(Auth::user()){
      Pasien::where('id',$id)->delete();
      return redirect('registrasipasien')->with('success',' Nama Pasien Telah berhasil hapus.'); 
}else{
      return redirect('login');
}

}
public function editpasien($id){
   if(Auth::user()){
         $Kelurahan = Kelurahan::all();
         $Pasien = Pasien::find($id);
         return view('editregistrasipasien',['Pasien'=>$Pasien,'Kelurahan'=>$Kelurahan]);

   }else{
         return redirect('login');
   }
}

public function updatepasien(Request $request){
   if(Auth::user()){
      //var $genid_pasien;
       $this->validate($request,[
                        'nama_pasien' => 'required',
                        'telp_pasien' => 'required',
                        'alamat_pasien'=> 'required',
                        'rtrw_pasien' => 'required',
                        'tgllahir_pasien' => 'required',
                        'jeniskelamin_pasien' => 'required',
                        'kelurahan_id' => 'required',
      ]);

               $Pasien = Pasien::find($request->id);
               $Pasien->nama_pasien = $request->nama_pasien;
               $Pasien->telp_pasien = $request->telp_pasien;
               $Pasien->alamat_pasien = $request->alamat_pasien;
               $Pasien->user_id = Auth::user()->id;
               $Pasien->rtrw = $request->rtrw_pasien;
               $Pasien->jeniskelamin_pasien = $request->jeniskelamin_pasien;
               $Pasien->kelurahan_id = $request->kelurahan_id;
               $Pasien->tanggallahir_pasien = $request->tgllahir_pasien;
               //$genid_pasien = $Pasien->alamat_pasien
               $Pasien->save();
               return redirect('registrasipasien')->with('success',' Nama pasien  '.
                     $request->nama_pasien.' dengan Id Pasien :'.$Pasien->genid_pasien.'telah berhasil diubah.' ); 
   }else{
         return redirect('login');
   }

}

public function cetakpasien($id){
   if(Auth::user()){
      $Pasien = Pasien::find($id);
      // export to pdf
      $pdf = PDF::loadview('pasien_pdf',['Pasien'=>$Pasien]);
      return $pdf->download('laporan-pasien-pdf');
            
   }else{
      return redirect('login');
   }

}

}