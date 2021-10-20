@extends('layout.main')




<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')



  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('style/css/sb-admin-2.css')}}" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="{{asset('style/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<a href="{{url('/admin/dadmin/addadmin')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<i class="fas fa-download fa-sm text-white-50"></i> Add Admin</a>


<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<a href="{{url('/admin/duser/adduser')}}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
<i class="fas fa-download fa-sm text-white-50"></i> Add User</a>
<br/>


    <br/>
       <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="form-group">
                            <label>Nama User</label>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                
<input type='text' id='nama' placeholder='Enter search name'>
                                <table class="table table-bordered" id="dataTable" name="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                    </thead>
                              
                                    <tbody>
                                          @foreach($users as $p)
                                        <tr>
                                            <td> {{$p->name}} </td>
                                            <td> {{$p->email}} </td>
                                            <?php $prt =  $p->priority;?>
                                            <td><?php
                                            if ($prt==1){echo "Admin";}
                                            elseif ($prt==2){echo "User";}?></td> 
                                            <td>
                                                <a class="btn btn-warning btn-sm" href="{{url('/edit/'.$p->id)}}">Edit</a>
                                                |
                                                <a class="btn btn-warning btn-sm" href="{{url('/admin/duser/'.$p->email)}}">Hapus</a>
                                            </td>
                                        </tr>

                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


 <script src="{{asset('style/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('style/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('style/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('style/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('style/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('style/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('style/js/demo/datatables-demo.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


<!-- Page -->         
{{ $users->links() }}


@endsection