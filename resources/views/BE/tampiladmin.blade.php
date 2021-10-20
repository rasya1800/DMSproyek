    @extends('layout.main')




<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
         <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
    </div>


<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<a href="/admin/dadmin/addadmin" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<i class="fas fa-download fa-sm text-white-50"></i> Add Admin</a>
<br/>
<br/>
<form action="/blog/cari" method="GET">
    <input type="text" name="cari" placeholder="Cari User..." value="{{ old('cari') }}">
 <a class="btn btn-warning btn-sm" href="#">Cari</a>
</form>

    <br/>
 
    <table class="table table-bordered" border="1">
        <tr>
            <th>Nama Admin</th>
            <th>Email Admin</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
        @foreach($users as $p)
        <tr>
            
           <td> {{$p->name}} </td>
            <td> {{$p->email}} </td>
<?php $prt =  $p->priority;?>
            <td><?php
            if ($prt=1){echo "Admin";}?></td> 
            <td>
                <a class="btn btn-warning btn-sm" href="/edit/{{$p->id}}">Edit</a>
                |
                <a class="btn btn-warning btn-sm" href="/admin/dadmin/{{$p->email}}">Hapus</a>
            </td>
        </tr> 


        @endforeach

    </table>

<!-- Page -->      
@endsection