@extends('layout.main')




<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
 <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>EDIT DATA</strong> </div>
                <div class="card-body">
                    @foreach($users as $p)
                    
                    <form method="post" action="{{url('/update/'.$p->id)}}" >

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $p->name }}" required="">
                        </div>
                         <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $p->email }}" required="">
                        </div>
                        <hr/>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan Password" required="">
                        </div>

<div class="form-group">
  {!! Form::label('Cetegory Folder ') !!}
  <br>
  <div class="btn-group">

  <select class="form-control folderr" id="m_folder" data-dependent="mf" name="item_id" type="text">
      <option disabled selected>Select Main Folder</option>  
    @foreach($categories as $item)
      <option name="pid" value="{{$item->plant_id}}" >{{$item->name}}</option>
          @endforeach
  </select>
</div>
 <div class="btn-group">
  <select class="form-control folderr" id="c_folder" data-dependent="cf" name="item_cf" type="text">
        <option disabled selected>Select Child Folder</option>  
    @foreach($subfol as $item2)
      <option name="did" value="{{$item2->dept_id}}">{{$item2->name}}</option>
    @endforeach
  </select>
</div>
</div> 
<br>

                  <!--       <div class="form-group">
                            <label>Verify Password</label>
                            <input type="password" name="vpassword" class="form-control" placeholder="Input Password Again" required="">
                        </div> -->
    <div class="form-group">  
        <a href="{{url('/admin')}}" class="btn btn-primary">Kembali</a> 
        <input type="submit" class="btn btn-success" value="Simpan">
    </div>
</form>

    @endforeach
                </div>
            </div>
        </div>
        {{csrf_field()}}

<script>
 
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