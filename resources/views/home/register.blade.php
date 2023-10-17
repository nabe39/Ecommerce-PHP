<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="loginfolder/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="loginfolder/assets/css/style.css">
</head>
<body>
    <div class="container-fluid bg-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 login-card">
                    <div class="row">
                        <div class="col-md-5 detail-part">
                            <h1>OrderPiece</h1>
                        </div>
                            <div class="col-md-7 logn-part">
                                <div class="row">
                                    <div class="col-lg-10 col-md-12 mx-auto">
                                        <div class="logo-cover">
                                            <img src="login/assets/images/logo.png" alt="">
                                        </div>
                                        <form class="form-cover" method="POST" action="{{route('register')}}">
                                            @csrf
                                            <h6>Register</h6>
                                            <input placeholder="Enter Name" id="name" type="text" class="form-control" name="name" required>
                                            <input placeholder="Enter Email" id="email" type="eamil" class="form-control" name="email" required>
                                            <input placeholder="Enter phone" id="phone" type="number" class="form-control" name="phone" required>
                                            <input placeholder="Enter address" id="address" type="text" class="form-control" name="address" required>
                                            <input Placeholder="Enter Password" id="password" type="password" class="form-control" name="password" required>
                                            <input Placeholder="Enter Comfirm Password" type="password" class="form-control" name="password_confirmation" required>
                                            @if (session()->has('message'))
                                                <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                {{$messages}}
                                                </div>
                                            @endif
                                         <div class="row form-footer">
                                             <div class="col-md-6 forget-paswd">
                                                 <a href="">Already have account ?</a>    
                                             </div>
                                             <div class="col-md-6 button-div">
                                                 <button class="btn btn-primary">Register</button>
                                             </div>
                                         </div>
                                    </form>

                              </div>
                          </div>
                           
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
    <script src="login/assets/js/jquery-3.2.1.min.js"></script>
    <script src="login/assets/js/popper.min.js"></script>
    <script src="login/assets/js/bootstrap.min.js"></script>
</html>