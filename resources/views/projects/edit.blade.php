@extends('layouts.app')
@section('content')

    <div class="col-md-9 col-lg-9 col-md-3 pull-left">
        <div class="row" style="background-color:white; margin:10px;">
    <form method="POST" action="{{route('companies.update',[$company->id])}}">
{{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
    <label for="company-name" >Name <span class="required">*</span></label>
           <input 
           required 
           placeholder="Enter name" 
           id="company-name"
           name="name"
           spellcheck="false"
           class="form-control"
            value="{{$company->name}}" />
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
                   {{$company->decription}}
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
                    <li><a href="/companies/{{$company->id}}">View Companies</a></li>
                    <li><a href="/companies/{{$company->id}}">All Companies</a></li>
                  
                    </ol>
                  </div>        
</div>    

@endsection   