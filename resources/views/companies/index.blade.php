@extends('layouts.app')
@section('content')
 @if(count($companies) > 0)
<div class="col-md-6 col-lg-6  col-md-offset-3 col-lg-offset-3">  
<div class="panel panel-primary">
        <div class="panel-heading">COMPANIES 
          <a class="pull-right btn btn-primary btn-sm" href="/companies/create">Create New</a> </div>
        <div class="panel-body">
          <ul class="list-group">
        @foreach($companies as $company)
          <li class="list-group-item"> <a href="/companies/{{$company->id}}">{{$company->name}}</a></li>
        @endforeach
        </ul>
        </div>
      </div>
     </div>   
      @else
      <h1>Company not found</h1>
      @endif
    @endsection
      