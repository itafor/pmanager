@extends('layouts.app')
@section('content')

   
<div class="col-md-9 col-lg-9 col-md-3 pull-left" style="background-color:white;">
        <h1>Create new Company</h1>
        <div class="row col-md-12 col-lg-12 col-sm-12" >
    <form method="POST" action="{{route('companies.store')}}">
{{csrf_field()}}
            
            <div class="form-group">
    <label for="company-name" >Name <span class="required">*</span></label>
           <input 
           required 
           placeholder="Enter name" 
           id="company-name"
           name="name"
           spellcheck="false"
           class="form-control"
         />
    </div>
        
    <div class="form-group">
            <label for="company-desc" >Description <span class="required">*</span></label>
                   <textarea  
                   placeholder="Enter description" 
                   style="resize:vertical;"
                   id="company-content"
                   name="decription"
                   rows="5"
                   spellcheck="false"
                   class="form-control autosize-target text-left">
                   
                </textarea>
            </div>

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
                    <li><a href="/companies">My Companies</a></li>
                    
                    </ol>
                  </div>        
</div>    

@endsection   