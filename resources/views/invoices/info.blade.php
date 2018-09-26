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
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
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
    <section class="panel">
        <div class="panel panel-footer">
            <header class="panel panel-default">
                <h3>SALE TO----</h3>
            </header>
        </div>

        <div class="panel panel-footer">
            {!!Form::open(array('route'=>'insert','id'=>'frmsave','method'=>'post' )) !!}
           
            <div class="row">
                <div class="col-lg-6 col-sm-6 ">
                    <div class="form-group">
                        <input type="text" name="fn" class="form-control" placeholder="first name">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 ">
                        <div class="form-group">
                            <input type="text" name="ln" class="form-control" placeholder="last name">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 ">
                            <div class="form-group">
                                <select name="sex" id="sex" class="form-control">
                                    <option value="0" selected="selected" disabled="disabled">Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 ">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="email">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-3 ">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="phone">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-3 ">
                                    <div class="form-group">
                                        <input type="text" name="location" class="form-control" placeholder="location">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-3 ">
                                    <div class="form-group">
                                            {!!Form::submit('save',array('class'=>'btn btn-primary')) !!}
                                            
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 ">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Product Name</th>
                                            <th>QTY</th>
                                            <th>PRICE</th>
                                            <th>DISC</th>
                                            <th>AMOUNT</th>
                                            <th style="text-align:center;"><a href="#" class="btn btn-default addRow"><i class="fa fa-plus"></i></a></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="productname[]"  class="form-control productname">
                                                            <option value="0" selected="true" disabled="disabled">Select product</option>
                                                            @foreach($product_lists as $key=>$p)
                                                    <option value="{{ $key}}">{{$p}}</option>
                                                            @endforeach
                                                        </select>
                                                </td>
                                                <td><input type="text" name="qty[]" id="qty" class="form-control qty"></td>
                                                <td><input type="text" name="price[]" id="qty" class="form-control price"></td>
                                                <td><input type="text" name="dis[]" id="qty" class="form-control dis"></td>
                                                <td><input type="text" name="amount[]" id="qty" class="form-control amount"></td>
                                                <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <td style="border:none"></td>
                                            <td style="border:none"></td>
                                            <td style="border:none"></td>
                                            <td ><b>Total</b></td>
                                            <td ><b class="total"></b></td>
                                            <td ></td>
                                        </tfoot>
                                    </table>
                                </div>
            </div>
            {!!Form::hidden('_token',csrf_token()) !!}
            {!!Form::close() !!}
        
        </div>
    </section>
    </div>
</body>
</html>


    <script type="text/javascript">

    $('tbody').delegate('.qty,.price,.dis','keyup',function(){
        var tr=$(this).parent().parent();
        var qty =tr.find('.qty').val();
        var price=tr.find('.price').val();
        var dis =tr.find('.dis').val();
        var amount =(qty*price)-(qty * price * dis)/100;
        tr.find('.amount').val(amount);

        total();
});
    $('.addRow').on('click',function(){
        addRow();
    });

    function total(){
        var total=0;
        $('.amount').each(function(i,e){
            var amount = $(this).val()-0;
            total +=amount;
        })
        $('.total').html(total);
    }
    //-----format number-------
    // Number.prototype.formatMoney = function(decPlaces,thouSeparator,decSeparator){
    //     var n=this,
    //     decPlaces = isNaN(decPlaces=Math.abs(decPlaces)) ? 2:decPlaces,
    //     decSeparator = decSeparator == undefined ? "." :decSeparator,
    //     thouSeparator = thouSeparator == undefined ? ",":thouSeparator,
    //     sign = n < 0 ? "-" : "",
    //     i=parseInt(n=Math.abs(+n || 0).toFixed(decPlaces))+"",
    //     j = 

    // };
    function addRow(){
        var tr= '<tr>'+
            '<td>'+
            '<select name="productname[]"  class="form-control productname">'+
            '<option value="0" selected="true" disabled="disabled">Select product</option>'+
            ' @foreach($product_lists as $key=>$p)'+
            '<option value="{{ $key}}">{{$p}}</option>'+
             '@endforeach'+
            '</select>'+
            '</td>'+
            '<td><input type="text" name="qty[]" id="qty" class="form-control qty"></td>'+
            '<td><input type="text" name="price[]" id="qty" class="form-control price"></td>'+
            '<td><input type="text" name="dis[]" id="qty" class="form-control dis"></td>'+
            '<td><input type="text" name="amount[]" id="qty" class="form-control amount"></td>'+
            '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
        '</tr>';
        $('tbody').append(tr);
    }
    $('body').delegate('.remove','click',function(){
        var l=$('tbody tr').length;
        if(l==1){
alert('You can not remove last row');
        }else{
        $(this).parent().parent().remove();
        }
    });
    $('tbody').delegate('.productname','change',function(){

    var tr = $(this).parent().parent();
    var id =tr.find('.productname').val();
    var dataId ={'id':id};

    $.ajax({
    type: 'GET',
    url: '{!! URL::route('findPrice') !!}',
    method: 'POST',
    dataType: 'Json',
    data: dataId,
    success: function(data){
        tr.find('.price').val(data.price);
    }
    });
  });

  
    </script>
