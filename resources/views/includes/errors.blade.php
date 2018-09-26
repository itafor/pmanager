@if(session()->has('errors') )
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="close"></button>
               <span aria-hidden="true">&times;</span>
            <strong>
        {!!session()->get('errors')!!}
    </strong>
</div>
@endif