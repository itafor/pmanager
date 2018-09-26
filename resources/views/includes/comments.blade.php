<div class="panel panel-primary">
        <div class="panel-heading"><i class="far fa-comments"></i> Lattest Comments
          <a class="pull-right btn btn-primary btn-sm" href="/projects/create">Create New</a> </div>
        <div class="panel-body">
@foreach($comments as $comment)
<div class="col-md-12 col-sm-12 col-lg-12">
    <div class="media g-mb-30 media-comment">
        <img style="width: 40px; height:40px;" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
            <div class="g-mb-15">
            <h5 class="h5 g-color-gray-dark-v1 mb-0"> <small><a href="users/{{$comment->user->id}}">--{{$comment->user->name}} {{$comment->user->email}}-- </a></small></h5>
            <span class="text-danger g-color-gray-dark-v4 g-font-size-8"> <small>Comment created on:{{$comment->created_at}}</small></span>
        </div>
                  
        <p>{{$comment->body}}</p>

        <ul class="list-inline d-sm-flex my-0">
            <li class="list-inline-item g-mr-20">
            <b class="text text-danger">Proof:</b> 
            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="projects/{{$projects->id}}">
                <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                {{$comment->url}}
            </a>
            </li>
        

        </ul>
        </div>
    </div>
    </div>
    @endforeach
   