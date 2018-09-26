@extends('layouts.app')
@section('content')


    <br>
    <div class="container box ">
    <h3 align="center">Live Search</h3><br/>
    <div class="panel panel-default">
<div class="panel-heading">
Search Customer data
</div>
<div class="panel-body">

<div class="table-responsive">
    <h3 align="center">Total Data: <span id="total-records"></span></h3>
<table class="table table-stripped table-bordered" id="student-table">
<thead>
    <tr>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
    </tr>
</thead>
<tbody>
 @foreach($students as $student)
        <tr>
            <td>{{$student->firstname}}</td>
            <td>{{$student->middlename}}</td>
            <td>{{$student->lastname}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->stdaddress}}</td>
            
        </tr>
 @endforeach
</tbody>
</table>
</div>
</div>
    </div>
</div>


    

@endsection