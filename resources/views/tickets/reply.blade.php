<!DOCTYPE html>
<html>
<head>
  <title> Reply Message</title>
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
    input[type=email] {
        background: transparent;
        border: none;
        border-bottom: 2px solid #00cc00;
    }
    .textarea{
        background: transparent;
        border: none;
        border-bottom: 2px solid #00cc00;
        color:white;
    }
    label{
        font-size:20px;
    }
    #addcustomers{
        margin-top:30px;
    }
    .alert{
        font-size:20px;
    }
    p{
        font-size:20px;
        color:white;
        text-align:center;
    }
    
  </style>
</head>
<body>
<div class='view_parent_image1'>
    <h1 style ="text-align:center; color:#00cc00; margin-top: 48px;">View Ticket Details<h1>
    <div class="container p-3 my-3" style="border: 2px solid #00cc00">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{Session::get('success')}}
                </div>
            @endif 
    </div>     
    <p>Customer Name - {{$result['name']}}</p> 
    <p>Email - {{$result['email']}}</p>  
    <p>Phone No - {{$result['phone_no']}}</p>  
    <p>Problem - {{$result['problem']}}</p>  
    <p>Ref No - {{$result['reference_no']}}</p>            
    <form method="post" action="{{url('/tickets/saveReply/'.$result['id'])}}" enctype="multipart/form-data" id='addcustomers' autocomplete="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="text-info">Solution</label>
                        <textarea class="form-control textarea"  name="reply"></textarea>
                        @if($errors->first('reply'))
                            <span class="error">{{$errors->first('reply')}}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">
                <div class="col-lg-5"></div>
                <button type="submit"  class="btn" style="margin: 5px; background:#00cc00; color: white;">Send Mail</button>
                <a href="{{url('/tickets/index')}}" class="btn" style="background: #9c9797; color: white; margin: 5px">Back to Ticket List</a>
            </div>
    </form>    
    </div>
    
</div>
</body>
</html>