<!DOCTYPE html>
<html>
<head>
  <title> Ticket Status</title>
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
        font-size:25px;
        color:white;
        text-align:center;
    }
    
  </style>
</head>
<body>
<div class='view_parent_image1'>
    <h1 style ="text-align:center; color:#00cc00; margin-top: 48px;">View Ticket Status<h1>
    <div class="container p-3 my-3" style="border: 2px solid #00cc00">
       
          <p>Customer Name - {{$data['name']}}</p> 
          <p>Email - {{$data['email']}}</p>  
          <p>Phone No - {{$data['phone_no']}}</p>  
          <p>Problem - {{$data['problem']}}</p>  
          <p>Ref No - {{$data['reference_no']}}</p> 
          <p> Status - {{ $data['status'] == 0 ? 'Still working with your problem':'Successfully Fixed your problem'}} </p> <br>
          <div class="row">
            <div class="col-lg-5"></div>
            <a href="{{url('/')}}" class="btn" style="background: #9c9797; color: white; margin: 5px;">Back to Home</a> 
          </div>
            
    </div>
    
</div>
</body>
</html>