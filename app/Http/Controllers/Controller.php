<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\User;
 
use App\Mail\Tes;
use Illuminate\Support\Facades\Mail;
use App\Models\plant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
/*   public function main(){

    // mengambil data dari table user
     //   $dbuser = DB::table('t_user')->paginate(5);,['t_user' => $dbuser]
        return view('tampildb');
    }*/
    
    //Function Dashboard ADMIN
    public function dashboardAdm(){
         return view('be.dashboardAdm');
    }



    //Fucntion Panggil Data Admin
    public function tampiladmin(){
    // mengambil data dari table user
         $dbuser =  Users::all()
        ->where('priority','=',1);
        /*
        ->simplePaginate(5);*/
        return view('be.tampiladmin',['users' => $dbuser]);
    }


    public function addadmin(){
     //Form Tambah Admin
        return view('be.addadmin');
    }
    
    public function kraddadmin(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'vpassword' => 'required'
        ]);
        
         $password = $request->password;
         $vpassword = $request->vpassword;
         if ($password == $vpassword){
        User::create([
            'name' => $request->nama,
            'email'=> $request->email,
            'password' => bcrypt($request->password), // password
            'authority' => 0,
            'priority' => 1
        ]);
        return redirect('/admin/dadmin');
    }
        else {
            return redirect('/admin/dadmin/addadmin');
        }
    }

public function hapusadmin($email)
{
    // menghapus data pegawai berdasarkan id yang dipilih
    DB::table('users')->where('email',$email)->delete();
        
    // alihkan halaman ke halaman pegawai
    return redirect('/admin/dadmin');
}



public function edit($id)
{
    $users = DB::table('users')->where('id',$id)->get();
        $categories = DB::table('code_window')->where('plant_id','<>','')->get();
        $subfol = plant::where('dept_id', '<>', '')->get();
   return view('be.edit', ['users' => $users],compact('id','categories','subfol'));
}

public function update($id, Request $request)
{
    DB::table('users')->where('id',$id)->update([
        'name' => $request->nama,
        'password' => bcrypt($request->password),
        'email' => $request->email,
        'authority' => strval($request->item_id).($request->item_cf)
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/admin');
}



    //Fucntion Panggil Data User
    public function tampiluser(){

    // mengambil data dari table user
      $dbuser = DB::table('users')
        ->simplePaginate(5);
        return view('be.tampiluser',['users' => $dbuser]);
    }

    public function adduser(){
     //Form Tambah Admin
        return view('be.adduser');
    }
    
    public function kradduser(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'vpassword' => 'required'
        ]);
        
         $password = $request->password;
         $vpassword = $request->vpassword;
         if ($password == $vpassword){
        User::create([
            'name' => $request->nama,
            'email'=> $request->email,
            'password' => bcrypt($request->password), // password
            'authority' => 0,
            'priority' => 2
        ]);
        return redirect('/admin/duser');
    }
        else {
            return redirect('/admin/duser/adduser');
        }
    }

public function hapususer($email)
{
  
    // mengambil data dari table user
    
    // menghapus data pegawai berdasarkan id yang dipilih
    DB::table('users')->where('email',$email)->delete();
        
    // alihkan halaman ke halaman pegawai
    return redirect('/admin');
}




//umain layout    
       public function dashboardUsr($email){
$dbuser = DB::table('users')->where('email',$email)->get();
        
    // mengambil data dari table user
         return view('be.dashboardUsr',['users' => $dbuser]);
    }

  public function repository($email,$pid){
        $authority = substr($pid,0,2);
        $authority2 = substr($pid,2,2);
        if ($authority2 == '00')
        {$categories2 = plant::where('parent_id', '=',1)->get();}
        else 
        {$categories2 = plant::where('dept_id', '=', $authority2)->get();}
       
        if ($authority == '00')
        {$categories = plant::where('parent_id', '=',0)->get();}
        else 
        {$categories = plant::where('plant_id', '=', $authority)->get();}
       
        $dbuser = DB::table('users')->where('email',$email)->get();
        $allCategories = plant::pluck('name','id')->all();
        return view('be.repository',['users' => $dbuser],compact('categories','allCategories','categories2'));

    }




//lOGIN LAYOUT
       public function login(){

    // mengambil data dari table user
         return view('FE.login');
    }

    public function dlogin(Request $request)
    {
    $email = $request->email;
    
    $password = $request->password;
    $priority1 = 1;
    $priority2 = 2; 
    $dbuser = DB::table('users')->where('email',$email)->get();
    $attempt = Auth::attempt(['email' => $email, 'password' => $password, 'priority'=> 1]);
    if($attempt)
    {
        $employee = 'employee';
        $request->session()->put('employee', $employee);
        return redirect('admin')->with(['alert'=>'Sukses!']);
    }
    elseif(Auth::attempt(['email' => $email, 'password' => $password, 'priority'=> 2]))
        {    // Why did $attempt fail? Email or password?
      $employee = 'employee';
        $request->session()->put('employee', $employee);
        return redirect('user/'.$email)->with(['alert'=>'Sukses!']);
    }
    else
    return redirect('login')->with(['alert'=>'Sukses!']);

    }

 public function logout(Request $request){
  $request->session()->forget('employee');
  $request->session()->flush();
  $request->session()->forget('user');
  $request->session()->flush();
        return redirect('login')->with('success', 'Anda berhasil keluar!');
    }

       public function kiremail(){

    // mengambil data dari table user
  
        Mail::to("dicky.afriansyah98@gmail.com")->send(new Tes());
 
        return "Email telah dikirim";
    }


}
