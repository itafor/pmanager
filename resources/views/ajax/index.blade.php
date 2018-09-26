@extends('layouts.app')

@section('content')
@include('ajax.addstudents')
@include('ajax.updateStudents')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                 
                 <button data-toggle="modal" id="addStudent"  class="btn btn-primary  btn-xs"  >Add Student</button>
                 <button  data-toggle="modal" data-target="#myModal"  class="btn btn-primary  btn-xs"  >+ Student</button>
                 <button class="btn btn-info pull-right btn-xs" id="read-data">Load data by Ajax</button>
                
            </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-condensed" style="width:200%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>firstname</th>
                                <th>middlename</th>
                                <th>lastname</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>stdaddress</th>
                                <th>maritalstatus</th>
                                <th>subject</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="student-info">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//=======================================
$('#msg').hide();
$('#read-data').on('click',function(data) {
  $.get("{{URL::to('students/read-data')}}",function(data){
    $('#student-info').empty().html(data);
  })
});

//====Add student====
$('#insert-student-frm').on('submit',function(e){
e.preventDefault();
var data = $(this).serialize();
var url = $(this).attr('action');
var post = $(this).attr('method');
$.ajax({
    type: post,
    url: url,
    data: data,
    dataType: 'json',
    success: function(data){
        var tr =$("<tr/>",{
            id:data.id
        });
         tr.append($("<td/>",{
             text: data.firstname
         })).append($("<td/>",{
             text: data.middlename
         })).append($("<td/>",{
             text: data.lastname
         })).append($("<td/>",{
             text: data.email
         })).append($("<td/>",{
             text: data.phone
         })).append($("<td/>",{
             text: data.stdaddress
         })).append($("<td/>",{
             text: data.maritalstatus
         })).append($("<td/>",{
             text: data.name
         })).append($("<td/>",{
             html:  '<a href="#" class="btn btn-info btn-xs" id="view" data-id="'+ data.id +'">View</a>'+ 
                    '<a href="#" class="btn btn-primary btn-xs" id="edit" data-id="' + data.id +'">Edit</a>'+
                    '<a href="#" class="btn btn-danger btn-xs" id="delete" data-id="'+ data.id +'">Del</a>'
        }))

         $('#student-info').append(tr);
    }
})
});
//==delete ====
$('body').delegate('#student-info #delete','click',function(e) {
    var id = $(this).data('id');
$.post('{{URL::to("students/destroy")}}',{id:id},function(data){
    $('tr#'+id).remove();
    });
});
//===fetch student to Update or edit=====
$('body').delegate('#student-info #edit','click',function(e){
    
    var id = $(this).data('id');
    $.get('{{ URL::to("student/edit")}}',{id:id},function(data){
        $('#update-student-frm').find('#id').val(data.id);
    
      $('#update-student-frm').find('#firstname').val(data.firstname);
      $('#update-student-frm').find('#middlename').val(data.middlename);
      $('#update-student-frm').find('#lastname').val(data.lastname);
      $('#update-student-frm').find('#email').val(data.email);
      $('#update-student-frm').find('#phone').val(data.phone);
      $('#update-student-frm').find('#address').val(data.stdaddress);
      $('#update-student-frm').find('#maritalstatus').val(data.maritalstatus);
      $('#student-update').modal('show');
    });
});

//=== Update student===
$('#update-student-frm').on('submit',function(e){
e.preventDefault();

var data =$(this).serialize();
var url = $(this).attr('action');
var post = $(this).attr('method');
$.ajax({
    type: post,
    url: url,
    data: data,
    dataType: 'json',
    success: function(data){
//$.post(url,data, function(data){}

console.log('data');
$('#msg').show();
location.reload();
}
});
});

$(document).on('click','#addStudent', function(e){
$('#myModal').modal('show');
});

//==preserved delete ====
// $(document).on('click','#delete',function(e) {
//     var id = $(this).data('id');
// $.post('{{URL::to("students/destroy")}}',{id:id},function(data){
//     $('#student-info #'+id).remove();
//     });
// });
//====array in jquery
// $.each(data,function(i,value){
//      alert(value.firstname);
//  });
</script>
@endsection
