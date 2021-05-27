<!DOCTYPE html>
<html>
<head>
  <title> Ticket Create</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script> 
  <style>
    .view_parent_image1{
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{asset('image/images1.jpg')}}');
        background-size: cover;
    }
    .error{
        color:red;
        font-size:20px;
    }
    .strict{
        color:red;
    }
    input[type=text] {
        background: transparent;
        border: none;
        border-bottom: 2px solid #00cc00;
        color:white;
    }
    input[type=password] {
        background: transparent;
        border: none;
        border-bottom: 2px solid #00cc00;
        color:white;
    }
    label{
        font-size:20px;
    }
    .alert{
        font-size:20px;
    }
    
    
    
  </style>
</head>
<body>
<div class='view_parent_image1'>
    <h1 style ="text-align:center; color:#00cc00; margin-top: 48px;">Agent Login<h1>
    <div class="container p-3 my-3" style="border: 2px solid #00cc00">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{Session::get('success')}}
                </div>
            @endif 
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (Session::has('failed'))
                <div class="alert alert-danger alert-dismissible">
                    {{Session::get('failed')}}
                </div>
            @endif 
        </div> 
                    
        <form id="login-form" class="form" action="{{url('/agents/login')}}" method="post" autocomplete="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-lg-3"></div> 
                    <div class="form-group col-lg-6">
                        <label for="username" class="text-info">Email:</label><br>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3"></div> 
                    <div class="form-group col-lg-6">
                        <label for="password" class="text-info">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-3"></div> 
                    <div class="form-group col-lg-6">
                        <input type="submit" name="submit" class="btn" style="background: #00cc00; color: white;" value="Agent Login">
                        <a href="{{url('agents/registerform')}}" class="btn btn-info btn-md" style="margin-left: 80px;">Agent Register</a>
                        <a href="{{url('/')}}" class="btn" style="background: #9c9797; color: white; margin-left: 67px;">Back to Home</a>
                    </div>
                </div>

                            
        </form>                      
    </div>
    
</div>
</body>
</html>