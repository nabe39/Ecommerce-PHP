<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>OrderPiece</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="profile/style.css">
    <link rel="stylesheet" href="home/css/style.css">
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <?php
    $user = session('user');
    $product =session('product');
    ?>
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

    {{-- profile --}}
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
            <form action="{{route('editProfile',[$user->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <!-- Profile picture image-->
                        @if($user->profile_photo_path == null)
                        <img class="img-account-profile rounded-circle mb-2" src="profilePhoto/avatar-trang-4.jpg"
                            alt="">
                        @else
                        <div class="img-account-profile rounded-circle mb-2">
                            <img class="imageProfile"
                            src="profilePhoto/{{$user->profile_photo_path}}" alt="">
                        </div>
                        
                        @endif
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <input name="image" type="file" class="btn btn-primary"></input>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                       
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                    other users on the site)</label>
                                <input name="name" class="form-control" id="inputUsername" type="text"
                                    placeholder="Enter your username" value="{{$user->name}}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Phone)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone</label>
                                    <input name="phone" class="form-control" id="inputPhone" type="text"
                                        placeholder="Enter your phone" value="{{$user->phone}}">
                                </div>
                                <!-- Form Group (Address)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputAddress">Address</label>
                                    <input name="address" class="form-control" id="inputAddress" type="text"
                                        placeholder="Enter your address" value="{{$user->address}}">
                                </div>
                            </div>
                            <!-- Form Row -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (email)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday (dd/mm/yy)</label>
                                    <input name="birthday" class="form-control" id="inputBirthday" type="date"
                                        name="birthday" placeholder="Enter your birthday" value="{{$user->birthday}}">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputCreate_at">Create At</label>
                                    <?php
                                    $created_at = $user->created_at;
                                    $timestamp = strtotime($created_at);
                                    $formatted_date = date("d/m/Y", $timestamp);
                                    ?>
                                    <input class="form-control" id="inputCreate_at" type="text" disabled
                                        value="{{$formatted_date}}">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input name="email" class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter your email address" value="{{$user->email}}">
                            </div>
                            <!-- Save changes button-->
                            @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                            @endif
                            <button class="btn btn-primary" type="submit">Save changes</button>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->

    <!-- jQery -->


    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>

    <!-- custom js -->
    <script src="home/js/carousel.js"></script>
    <script src="home/js/custom.js"></script>

    <script src="https://kit.fontawesome.com/7ab09b7a32.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</body>

</html>
