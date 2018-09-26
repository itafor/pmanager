@extends('layouts.app')
@section('content')

    <div class="col-md-9 col-lg-9 col-md-3 pull-left">
        <!-- Jumbotron -->
        <div class="jumbotron">
          <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->decription}}</p>
        <!--  <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
        </div>
  
        <!-- Example row of columns -->
        <div class="row" style="background-color:white; margin:10px;">
            <a href="/projects/create/{{$company->id}}" class="btn btn-info  pull-right btn-sm">Create Project</a>
          @if(count($projects) > 0)
         @foreach($projects as $project)
             <div class="col-lg-4">
             <h2>{{$project->name}}</h2>
            <p class="text-danger">{{$project->decription}} </p>
             <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button" >View Project</a></p>
             </div>
             @endforeach
    @else
          <h1>NO PROJECTS FOUND IN THIS COMPANY</h1>
          @endif
        </div>
  </div>
        
    <div class="col-sm-2 col-md-2 col-lg-2  pull-right" style="float:right">
            <div class="sidebar-module">
                    <h4>Actions</h4>
                    <ol class="list-unstyled">
                        <li><a href="/companies">List of Companies</a></li>
                    <li><a href="/companies/create">Create Company</a></li>
                    <li><a href="/companies/{{$company->id}}/edit">Edit Company</a></li>
                    <li><a href="/projects/create/{{$company->id}}">Create Project</a></li>
                                         
                    <br>
                    <li>
                        <a 
                        href="#"
                        onclick="
                        var result=confirm('Are you sure you want to delete this project?');
                        if(result){
                          event.preventDefault();
                          document.getElementById('delet-form').submit();
                        }">
                       Delete Company
                      </a>
                    <form id="delet-form" action="{{route('companies.destroy',[$company->id])}}"
                       method="POST" style="display:none">
                    <input type="hidden" name="_method" value="delete">
                    {{csrf_field()}}
                  </form>
                      </li>
                      <!--<li><a href="#">Add New Member</a></li>-->
                    </ol>
                  </div>

            <!--<div class="sidebar-module">
              <h4>Members</h4>
              <ol class="list-unstyled">
                <li><a href="#">March 2014</a></li>
                <li><a href="#">February 2014</a></li>
                <li><a href="#">January 2014</a></li>
                <li><a href="#">December 2013</a></li>
                <li><a href="#">November 2013</a></li>
                <li><a href="#">October 2013</a></li>
                <li><a href="#">September 2013</a></li>
                <li><a href="#">August 2013</a></li>
                <li><a href="#">July 2013</a></li>
                <li><a href="#">June 2013</a></li>
                <li><a href="#">May 2013</a></li>
                <li><a href="#">April 2013</a></li>
              </ol>
            </div> -->

          
</div>    

@endsection   