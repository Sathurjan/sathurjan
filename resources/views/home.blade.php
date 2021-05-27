<!DOCTYPE html>
<html>
<head>
  <title> Online Support System</title>
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
    input[type=text]{
        background: transparent;
        border: none;
        border-bottom: 2px solid #00cc00;
        color:white;
    }
    label{
        font-size:25px;
    }
    .error{
        color:red;
        font-size:20px;
    }
    
  </style>
</head>
<body>
<div class='view_parent_image1'>
    <h1 style ="text-align:center; color:#00cc00; margin-top: 48px;">Online Support System<h1>
    <div class="container p-3 my-3" style="border: 2px solid #00cc00">
        <div class="row" style ="text-align:center;">
            <div class="col-lg-4"><a href="{{url('tickets/form')}}" class="btn btn-lg" style="background: #FF1493; color: white;">Create Ticket</a></div>
            <div class="col-lg-4">
                <form method="post" action="{{url('/tickets/status')}}" autocomplete="off" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="text-white">Ticket Reference No:</label>
                        <input type="text" name="ref_no" class="form-control" id="ref_no">
                            @if($errors->first('ref_no'))
                                <span class="error">{{$errors->first('ref_no')}}</span>
                            @endif
                    </div><br>
                    <button type="submit"  class="btn btn-lg" style="background: #990033; color: white;">Search Status</button>                            
                </form>
           
            </div>
            <div class="col-lg-4"><a href="{{url('/agents/loginform')}}" class="btn btn-lg" style="background: #ff33cc; color: white;">Agent Login</a></div>
        </div>
    </div>
    
</div>
</body>
</html>

