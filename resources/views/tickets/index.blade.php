<!DOCTYPE html>
<html>
<head>
  <title> Ticket List</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    label{
        font-size:20px;
    }
    .searchform{
        margin-top:30px;
    }
    .alert{
        font-size:20px;
    }
	a{
        text-decoration: none;
        color:white;
    }
    
    .searchform{
    	margin-left: 20px;
    }
    .Open{
    	background-color: green;
    }
	th{
        font-size:20px;
		color:#00cc00;
    }
	td{
        font-size:20px;
		color:white;
    }
	.pagination {
		display: flex;
		padding-left: 0;
		list-style: none;
		border-radius: .25rem;
		border-color: #00cc00;
		font-size: 15;
	}
	.page-item.active .page-link {
		z-index: 3;
		color: #fff;
		background-color: #00cc00;
		border-color: #00cc00;
}
    
  </style>
</head>
<body>
<div class='view_parent_image1'>
    <h1 style ="text-align:center; color:#00cc00; margin-top: 48px;">Pending Ticket Listing Table<h1>
    <div class="container p-3 my-3" style="border: 2px solid #00cc00">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@if (Session::has('success'))
					<div class="alert alert-success alert-dismissible">
						{{Session::get('success')}}
					</div>
				@endif 
		</div>   
		<form name="searchform" method="get" action="{{url('tickets/index')}}" class="searchform" autocomplete="off">
			<div class="row">
					<div class="col-lg-2"> 
						<input type="text" name="search" id="search" class="form-control" placeholder="Search By Name">
				</div>
				<div class="col-lg-3">
					<input type="submit" name="" class="btn" style="background:#00cc00; color: white;" value="Search">
					<div class="btn" style="background:#00cc00; color: white;" id='refresh'><a style="background:#00cc00; color: white;" href="{{url('tickets/index')}}">Refresh</a></div>
				</div>
			</div>
        </form>   <br>

		<table class="table">
    		<thead>
      			<tr>
        			<th >Customer Name</th>
					<th >Ref No</th>
        			<th >Problem</th>
        			<th >Status</th>
        			<th >Action</th>
      			</tr>
    		</thead>
    		<tbody>
		      @foreach($customers as $user)
		      <tr>
		      	<td >{{$user['name']}}</td>
				<td >{{$user['reference_no']}}</td>
		      	<td>{{$user['problem']}}</td>
		      	<td ><?php echo($user['status']==0) ? "Open":"Close" ?></td>
		      	<td><a href="{{url('/tickets/reply/'.$user['id'])}}" class="btn btn-sm" style="background:#00cc00; color: white;">View Ticket</a></td>  
		      </tr>
		      

		      @endforeach
    		</tbody>
  		</table>	
		  {{$customers->appends(request()->except('page'))->links()}}	
		  	<div class="col-lg-3">
                <div class="btn btn-danger" id='refresh'><a  href="{{url('agents/logout')}}">Logout</a></div>
        	</div>			          
        
    </div>
    
</div>
</body>
</html>