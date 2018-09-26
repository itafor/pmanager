<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact us</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="exponential.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <style>
 .invalid-feedback{
     color: brown;
 }
 </style>   
</head>
<body>
    <div class="container">
    <div class="panel panel-info col-lg-8 col-md-8 col-sm-8">
        <div class="panel-heading ">
            Contact Form
        </div>
    <div class="panel-body" >
        @if(Session::has('flash_message'))
            <div class="alert alert-success">{{Session::get('flash_message')}}</div>
        @endif
            <div class="row">
            <form action="{{route('contact.store')}}" method="POST" >
                {{csrf_field()}}
          
        <div class="form-group ">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" class="form-control is-invalid"  placeholder="enter full name">
        @if($errors->has('fullname'))
        <small class="form-text invalid-feedback">{{$errors->first('fullname')}}</small>
        @endif
        </div>

            <div class="form-group ">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" class="form-control is-invalid"  placeholder="enter full name">
                @if($errors->has('email'))
                <small class="form-text invalid-feedback">{{$errors->first('email')}}</small>
                @endif
            </div>
            
            <div class="form-group ">
                    <label for="email">Message</label>
                   <textarea type="text" name="message" id="message" class="form-control is-invalid"  placeholder="enter full name" cols="30" rows="10"></textarea>
                   @if($errors->has('message'))
                   <small class="form-text invalid-feedback">{{$errors->first('message')}}</small>
                   @endif
            </div>
            <div class="form-group ">
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
       
    </form>
        </div>
       </div>
    </div>
</div>
</body>
</html>