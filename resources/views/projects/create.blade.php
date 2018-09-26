@extends('layouts.app')
@section('content')

    <div class="col-md-9 col-lg-9 col-md-3 pull-left" style="background-color:white;">
        <h1>Create new Project</h1>
        <div class="row col-md-12 col-lg-12 col-sm-12" >
    <form method="POST" action="{{route('projects.store')}}">
{{csrf_field()}}
            
<div class="form-group">
    <label for="project-name" >Name <span class="required">*</span></label>
           <input 
           required 
           placeholder="Enter name" 
           id="project-name"
           name="name"
           spellcheck="false"
           class="form-control"
         />
    </div>
    @if(!$company_id)
        <div class="form-group">
                <label for="project-desc" >My companies <span class="required">*</span></label>   
        
        <select name="company_id" id="company_id" class="form-control">
                @foreach($companies as $company) 
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
       
            </div>
        @endif
    <div class="form-group">
            <label for="project-desc" >Description <span class="required">*</span></label>
                   <textarea  
                   placeholder="Enter description" 
                   style="resize:vertical;"
                   id="project-content"
                   name="decription"
                   rows="5"
                   spellcheck="false"
                   class="form-control autosize-target text-left">
                   
                </textarea>
            </div>
        @if($companies == null)
    <input type="hidden" name="company_id" value="{{$company_id}}" />
             @endif   
            <div class="form-group">
<input type="submit" class="btn btn-primary" value="Submit">
            </div>
</form>
        
    </div>
</div>
        <div class="col-sm-2 col-md-2 col-lg-2  pull-right" style="float:right">
            <div class="sidebar-module">
                    <h4>Actions</h4>
                    <ol class="list-unstyled">
                    <li><a href="/projects">My projects</a></li>
                    
                    </ol>
                  </div>        
</div>    

@endsection   