<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dynamic dropdownlist with ajax</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
<style type="text/css">
.box{
    width: 600px;
    margin: 0 auto;
    border:1px solid #cc;
}
</style>
</head>
<body>
    <br>
    <div class="container box ">
    <h3 align="center">Live Search</h3><br/>
    <div class="panel panel-default">
<div class="panel-heading">
 Customer data
</div>
<div class="panel-body">
            <div class="col-md-7 pull-right">
                   <a href="dynamic_pdf/pdf" class="btn btn-danger">Convert into PDF</a>
            </div>
    <input type="text" name="search" id="search" class="form-control" placeholder="search">

<div class="table-responsive">
    <h3 align="center">Total Data: {{count($customer_data)}} <span id="total-records"></span></h3>
<table class="table table-stripped table-bordered">
<thead>
    <tr>
        <th>Customer Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Postal Code</th>
        <th>Country</th>
    </tr>
</thead>
<tbody>
@foreach($customer_data as $customer )
<tr>
<td>{{$customer->name}}</td>
<td>{{$customer->address}}</td>
<td>{{$customer->city}}</td>
<td>{{$customer->postalCode}}</td>
<td>{{$customer->country}}</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
    </div>
</div>
</body>
</html>
    