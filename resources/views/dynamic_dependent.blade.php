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
<script src="exponential.js"></script>
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
    <div class="box container">
    <h3 align="center">Ajax Dynamic dropdownlist</h3><br/>

<div class="form-group">
<select name="country" id="country" class="form-control input-lg dynamic"
data-dependent="state">
@foreach($country_lists as $country)
<option value="{{$country->country}}">{{$country->country}}</option>
@endforeach
</select>
</div>
<br />

<div class="form-group">
<select name="state" id="state" class="form-control input-lg dynamic"
data-dependent="city">

<option value=""></option>

</select>
</div>
<br />
<br />

<div class="form-group">
<select name="city" id="city" class="form-control input-lg dynamic">
<option value="">Select city</option>
</select>
</div>
<br />
{{csrf_field()}}
    </div>
    <script>
    $(document).ready(function(){
$('.dynamic').change(function() {
if($(this).val() !=''){
    var select = $(this).attr('id');
    var value = $(this).val();
    var dependent =$(this).data('dependent');
    var _token = $('input[name="_token"]').val();

    $.ajax({
    url: "{{route('dynamicdependent.fetch')}}",
    method: 'POST',
    data: {select:select, value:value, dependent:dependent, _token:_token},
    success: function(result){
        $('#'+dependent).html(result);
    }
    });
}
});
    });
    </script>
</body>
</html>