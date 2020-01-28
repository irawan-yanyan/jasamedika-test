<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelanggan;
use Session;
use App\Exports\PelangganExport;
use App\Imports\PelangganImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MainProjectController extends Controller
{
    public function index(){
       // $test =  public_path("assets\file_pelanggan);echo $test;
        $pelanggan = Pelanggan::all();
        return view('pelanggan',['pelanggan'=>$pelanggan]);
    }

     public function export_excel(){
         return Excel::download(new PelangganExport, 'pelanggan.xlsx');
     }

     public function import_excel(Request $request){
        // validasi
        $this->validate($request,
               ['file'=>'required|mimes:csv,xls,xlsx'
            ]);
        //get file
        $file = $request->file('file');
        //make uniq name
        $nama_file = rand().$file->getClientOriginalName();
        //upload to folder file pelanggan
        $file->move('file_pelanggan',$nama_file);
        //import data
     Excel::import(new PelangganImport, public_path('/file_pelanggan/'.$nama_file));
        //notifikasi
        Session::flash('sukses','Data pelanggan Berhasil disimpan.');
        // allihkan halaman kembali
        return redirect('/pelanggan');

     }
}
