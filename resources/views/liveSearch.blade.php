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
Search Customer data
</div>
<div class="panel-body">
    <input type="text" name="search" id="search" class="form-control" placeholder="search">

<div class="table-responsive">
    <h3 align="center">Total Data: <span id="total-records"></span></h3>
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

</tbody>
</table>
</div>
</div>
    </div>
</div>
</body>
</html>
    <script>
    $(document).ready(function(){
        fetch_customer_data();
function fetch_customer_data( query ='') 
{
$.ajax({
    url: "{{ route('live_search.action')}}",
    method:'GET',
    data: {query:query},
    dataType: 'json',
    success:function(data){
        $('tbody').html(data.table_data);
        $('#total-records').text(data.total_data);

            }
        })
    }
    $(document).on('keyup','#search',function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
    </script>
