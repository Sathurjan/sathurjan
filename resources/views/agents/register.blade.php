<!DOCTYPE html>
<html>
<head>
  <title> Agent Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
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
    input[type=text],[type=password],[type=email] {
        background: transparent;
        border: none;
        border-bottom: 2px solid #00cc00;
        color:white;
    }
    label{
        font-size:20px;
    }
    #addagents{
        margin-top:30px;
    }
    .alert{
        font-size:20px;
    }
    
  </style>
</head>
<body>
<div class='view_parent_image1'>
    <h1 style ="text-align:center; color:#00cc00; margin-top: 48px;">Agent Register Form<h1>
    <div class="container p-3 my-3" style="border: 2px solid #00cc00">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{Session::get('success')}}
                </div>
            @endif 
    </div>                
    <form method="post" action="{{url('/agents/register')}}" enctype="multipart/form-data" id='addagents' autocomplete="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label  class="text-info">Name</label>
                        <input type="text" name="name" class="form-control">
                        @if($errors->first('name'))
                            <span class="error">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label  class="text-info">Email</label><span class="strict">
                        <input type="email" name="email" class="form-control" >
                        @if($errors->first('email'))
                            <span class="error">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-lg-2"></div>
            
                <div class="col-lg-4">
                    <div class="form-group">
                        <label  class="text-info">Password</label>
                        <input type="password" name="password" class="form-control" >
                        @if($errors->first('password'))
                            <span class="error">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label  class="text-info">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control">
                        @if($errors->first('confirm_password'))
                            <span class="error">{{$errors->first('confirm_password')}}</span>
                        @endif
                    </div>
                </div>

            </div>

            <div class="row" style="margin-top: 15px;">
                <div class="col-lg-5"></div>
                <button type="submit"  class="btn" style="margin: 5px; background:#00cc00; color: white;">Submit</button>
                <a href="{{url('/')}}" class="btn" style="background: #9c9797; color: white; margin: 5px">Back to Home</a>
            </div>
        </form>    
    </div>
    
</div>
</body>
</html>