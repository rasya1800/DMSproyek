<?php
namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\User;
use Storage;
use App\Mail\Tes;
use Illuminate\Support\Facades\Mail;
use App\Models\plant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Filedata;
use Illuminate\Http\Request;
class UploadController extends Controller
{
   public function upload(){
        $file = Filedata::get();
        return view('upload',['file' => $file]);
    }
 
    public function proses_upload(Request $request){
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);
 
       /* // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
 
                // nama file
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
 
                // ekstensi file
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
 
                // real path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
 
                // ukuran file
        echo 'File Size: '.$file->getSize();
        echo '<br>';
 
                // tipe mime
        echo 'File Mime Type: '.$file->getMimeType();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
 
                // upload file
        $file->move($tujuan_upload,$file->getClientOriginalName());*/
    
    // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
      q
        $nama_file = $dt."_".$file->getClientOriginalName();
        $ekstensi_file = $file->getClientOriginalExtension();
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
 
        Filedata::create([
            'file' => $nama_file,
            'ekstensi' => $ekstensi_file,
            'keterangan' => $request->keterangan,
        ]);
 
        return redirect()->back();
    }

    public function hapus($id){
    // hapus file
    $gambar = Filedata::where('id',$id)->first();
    File::delete('data_file/'.$gambar->file);
 
    // hapus data
    Filedata::where('id',$id)->delete();
 
    return redirect()->back();
}

    public function download($id,$file){


$dbuser = DB::table('files')->where('id',$id)->get();
    $test = $file;
     $myFile = public_path('/data_file/'.$file);
        $headers = ['Content-Type: application/xlsx'];
        $newName = time().'.xlsx';
        return response()->download($myFile, $newName, $headers);
}
}