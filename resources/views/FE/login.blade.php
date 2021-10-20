<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CJS DMS Login</title>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('style/css/sb-admin-2.css')}}" rel="stylesheet">
    
</head>

<body  style="background-image: url({{url('/bglogin.jpg')}});">>

    <div class="container">
    </br> </br></br> 
    <center>                                
    <div class="col-lg-6" >
<div class="p-2">
                                    <div class="text-center">
                                        <div>
                                    <h1 class="h2 text-gray-900 mb-4"><img src="{{url('/cj.png')}}" width='50' height='50' />CHEILJEDANG<div>
                                        <h1 class="h6 text-gray-900 mb-4">DOCUMENT MANAGEMENT SYSTEM</h1><HR>
                                    </div>
                                    <form class="user" action="{{url('login/dlogin')}}" method="post" onSubmit="return validasi()">
                                            {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="email" class="form-control"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address or Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" 
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                          
                                        </div>
                                        <Button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </Button>
                                       
                                    </form>
                                    <hr>
                                    </div>
                                  <div class="container my-auto">
                    <div class="copyright text-center my-auto" style="font-size: 13px;">
                        <span>Copyright &copy; CJS IT Team <sup>2021</sup></span>
                    </div>
                            
                            </center>
                                        
                                    </div>
                        </div>

    </div>
</body>

<script type="text/javascript">
    function validasi() {
        var username = document.getElementById("exampleInputEmail").value;
        var password = document.getElementById("exampleInputPassword").value;       
        if (username != "" && password!="") {
            return true;
        }else{
            alert('Username dan Password harus di isi!');
            return false;
        }
    }
 
</script>

</html>