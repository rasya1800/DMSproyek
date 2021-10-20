<html>
<head>
	<title>Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
</head>
<body>
	<div class="row">
		<div class="container">
			<h2 class="text-center my-5">Membuat Upload File Dengan Laravel</h2>
			
			<div class="col-lg-8 mx-auto my-5">	
 
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
 
				<form action="{{url('/upload/proses')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
 
					<div class="form-group">
						<b>File : </b><br/>
						<input type="file" name="file">
					</div>
 
					<div class="form-group">
						<b>Keterangan</b>
						<textarea class="form-control" name="keterangan"></textarea>
					</div>
 
					<input type="submit" value="Upload" class="btn btn-primary">
				</form>

				<!-- Tampilkan Data Upload -->
				<h4 class="my-5">Data</h4>
 
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="text-align: center; vertical-align: middle;" width="1%">File</th>
							<th>Keterangan</th>
							<th width="1%">OPSI</th>
						</tr>
					</thead>
					<tbody>
						@foreach($file as $g)
						<tr>
						<td><img width="50px" src="{{url('public/data_file/.{ $g->ekstensi }.png')}}"></td>
							<td><span class="text-sm">{{$g->file}}</span></td>
							<td><a class="btn btn-danger" href="{{url('/upload/download/'.$g->id.'/'.$g->file)}}">Download</a></td>
							<td><a class="btn btn-danger" href="{{url('/upload/hapus/'.$g->id)}}">HAPUS</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</body>
</html>