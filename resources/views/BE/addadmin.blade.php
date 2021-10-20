@extends('layout.main')




<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
 <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>ADD DATA ADMIN</strong> </div>
                <div class="card-body">
                    
                    
                    <form method="post" action="{{url('/admin/dadmin/kraddadmin')}}" >

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama Admin</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Admin..." required="">
                        </div>
                         <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email@example.co.id" required="">
                        </div>
                        <hr/>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <div class="form-group">
                            <label>Verify Password</label>
                            <input type="password" name="vpassword" class="form-control" placeholder="Password" required="">
                        </div>
                        <div class="form-group">
                           
                    <a href="{{url('/admin/duser')}}" class="btn btn-primary">Kembali</a> 
                    <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>

<script type="text/javascript">
    function validasi() {
        var password = document.getElementByName("password").value;       
        var vpassword = document.getElementByName("vpassword").value;       
        if (password == vpassword) {
            return true;
        }else{
            alert('Password Berbeda');
            return false;
        }
    }
 
</script>
@endsection