@extends('layouts.app')
@section('content')
    <div class="col-md-8 col-lg-8 col-md-8 pull-left">
        <!-- Jumbotron -->
        <div class="well well-lg">
          <h1>{{$projects->name}}</h1>
        <p class="lead">{{$projects->decription}}</p>
        <!--  <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
        </div>
        <!-- Example row of columns -->
        <div class="row  container-fluid" style="background-color:white; margin:10px;">
            <!--<a href="/projects/create" class="btn btn-info  pull-right btn-sm">Create Project</a> -->
            <br>
          
            @include('includes.comments')

          </div>
        </div>
        </div>

            <form method="POST" action="{{route('comments.store')}}">
                {{csrf_field()}}
            <input type="hidden" name="commentable_type" value="App\Project">
            <input type="hidden" name="commentable_id" value="{{$projects->id}}">          
                <div class="form-group">
                    <label for="project-name">Comment <span class="required">*</span></label>
                           <textarea
                           required 
                           placeholder="Enter Comment" 
                           id="comment-comment"
                           name="body"
                           role="3"
                           spellcheck="false"
                           class="form-control autosize-target text-left"
                         />
                        </textarea>
                    </div>
                    <div class="form-group">
                            <label for="project-desc" >Proof of Work done(url/photos) <span class="required">*</span></label>
                                   <textarea  
                                   placeholder="Enter your url/screenshot" 
                                   style="resize:vertical;"
                                   id="url-content"
                                   name="url"
                                   rows="1"
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
    



    <div class="col-sm-3 col-md-3 col-lg-3 pull-right" style="float:right">
            <div class="sidebar-module">
                    <h4>Actions</h4>
                    <ol class="list-unstyled">
                    <li><a href="/projects/{{$projects->id}}/edit">Edit</a></li>
                    <li><a href="/projects/create">Create New Project</a></li>
                    <li><a href="/projects">My Projects</a></li>
                    <br>
                    @if($projects->user_id == auth::user()->id)
                    <li>
                        <a 
                        href="#"
                        onclick="
                        var result=confirm('Are you sure you want to delete this project?');
                        if(result){
                          event.preventDefault();
                          document.getElementById('delet-form').submit();
                        }">
                       Delete project
                      </a>
                    <form id="delet-form" action="{{route('projects.destroy',[$projects->id])}}"
                       method="POST" style="display:none">
                    <input type="hidden" name="_method" value="delete">
                    {{csrf_field()}}
                  </form>
                      </li>
                      @endif
                    </ol>

                  <hr>  
                      <div class="row">
                          <h4>Add Members</h4>
                      <div class=" col-md-8 col-lg-8 col-sm-8 col-xs-8">
                          <div class="input-group">
                            <span class="input-group-btn" >
                            <form id="add-user" action="{{route('projects.adduser')}}"
                                method="POST">
                            <input type="hidden" name="project_id" value="{{$projects->id}}">
                        <input type="text" class="form-control" name="email" placeholder="email">
                          <button class="btn btn-primary" type="submit">Add!</button>
                            </form>
                        </span>
                        </div>
                      </div>
                      </div>
                <hr>
                  <h4>Team Members</h4>
                    <ol class="list-unstyled">
                    <li><a href="#">Willians Matta</a></li>
                    <li><a href="#">Paul Smith</a></li>
                    <li><a href="#">Alexender Bill</a></li>
                    <li><a href="#">Bill Gate</a></li>
                    </ol>
                  </div>
          </div>    

@endsection   