@foreach($students as $value)
<tr id="{{$value->id}}">
<td>{{$value->id}}</td>

<td>{{$value->firstname}}</td>
<td>{{$value->middlename}}</td>
<td>{{$value->lastname}}</td>
<td>{{$value->email}}</td>
<td>{{$value->phone}}</td>
<td>{{$value->stdaddress}}</td>
<td>{{$value->maritalstatus}}</td>
<td>{{$value->name}}</td>
<td>
<a href='#' class="btn btn-info btn-xs" id="view" data-id="{{$value->id}}">View</a> 
<a href='#' class="btn btn-primary btn-xs" id="edit" data-id="{{$value->id}}">Edit</a> 
<a href='#' class="btn btn-danger btn-xs" id="delete" data-id="{{$value->id}}">Del</a>
</td>
</tr>
@endforeach