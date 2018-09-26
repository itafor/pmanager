@if(session()->has('success') )
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="close"></button>
               <span aria-hidden="true">&times;</span>
            <strong>
        {!!session()->get('success')!!}
    </strong>
</div>
@endif