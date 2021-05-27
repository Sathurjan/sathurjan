<html>
<head>
  <title> Ticket Add</title>
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
    input[type=text],[type=email] {
        background: transparent;
        border: none;
        border-bottom: 2px solid #00cc00;
        color:white;
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
    
  </style>
</head>
<body>
<div class='view_parent_image1'>
    <h1 style ="text-align:center; color:#00cc00; margin-top: 48px;">Ticket Create Form<h1>
    <div class="container p-3 my-3" style="border: 2px solid #00cc00">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{Session::get('success')}}
                </div>
            @endif 
    </div>                
        <form method="post" action="{{url('/tickets/save')}}" enctype="multipart/form-data" id='addcustomers' autocomplete="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="text-info">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                        @if($errors->first('name'))
                            <span class="error">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="text-info">Problem</label>
                        <textarea class="form-control textarea"  name="problem" id="problem"></textarea>
                        @if($errors->first('problem'))
                            <span class="error">{{$errors->first('problem')}}</span>
                        @endif
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-lg-2"></div>
            
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="text-info">Email</label>
                        <input type="email" name="email" class="form-control" id="email" >
                        @if($errors->first('email'))
                            <span class="error">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="text-info">Mobile No</label>
                        <input type="text" name="phone_no" class="form-control" id="phone_no">
                        @if($errors->first('phone_no'))
                            <span class="error">{{$errors->first('phone_no')}}</span>
                        @endif
                    </div>
                </div>
    
            </div>

            <div class="row" style="margin-top: 15px;">
                <div class="col-lg-5"></div>
                <button type="submit"  class="btn" id="taskcreate" style="margin: 5px; background:#00cc00; color: white;">Subbmit Ticket</button>
                <a href="{{url('/')}}" class="btn" style="background: #9c9797; color: white; margin: 5px">Back to Home</a>
            </div>
        </form>    
    </div>
    
</div>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#taskcreate").click(function(){
        alert("hiii");
			var name     =$("#name").val();
			var problem  =$("#problem").val();
			var email    =$("#email").val();
            var phone_no =$("#phone_no").val();
            console.log(name);
			$.ajax({

				url:"{{url('/tickets/save')}}", 
				type:"post",
				dataType:"json",
				cache:false,
				data:{name:name, problem:problem, email:email,phone_no:phone_no},
                                
                    success:function(data){
                    $("#name").val("");
                    $("#problem").val("");
                    $("#email").val("");
                    $("#phone_no").val("");
                    console.log(data);
				}
                                    
            });                         
    });
});
</script> -->

</body>
</html>
