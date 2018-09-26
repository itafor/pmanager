<!-- Modal -->
<div class="modal fade" id="student-update" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Student Info</h4>
          <h4 id="msg">Data updated successfully</h4>
        </div>
       
    <form action="{{URL::to('student/update')}}" method="POST" id="update-student-frm">
        <div class="modal-body">
                            
                        <input type="hidden" name="id"  id="id" >
                        
          <div class="col-md-4">
            <div class="form-group">
                <label for="firstname">First Name</label>
            <input type="text" name="firstname"  id="firstname" >
            </div>
          </div>

          <div class="col-md-4">
                <div class="form-group">
                    <label for="middlename">Middle Name</label>
                    <input type="text" name="middlename" id="middlename" >
                </div>
          </div>

          <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">last name</label>
                    <input type="text" name="lastname" id="lastname">
                </div>
          </div>

          <div class="col-md-4">
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email">
                </div>
          </div>

          <div class="col-md-4">
                <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text" name="phone" id="phone">
                </div>
          </div>
          
          <div class="col-md-4">
                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" name="address" id="address" >
                </div>
          </div>

          <div class="col-4-md">
                <div class="form-group">
                    <label for="maritalstatus">maritalstatus</label>
                    <select name="maritalstatus" id="maritalstatus"  class="form-control">
                        <option value=" ">--Select--</option>
                        @foreach($mstatuses as $key =>$status)
                        <option value="{{$status}}">{{$status}}</option>
                        @endforeach
                    </select>
                </div>
          </div>

        </div>
        <div class="modal-footer">
            <input type="submit" name="" class ="btn btn-success pull-left" value="Update">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        {{ csrf_field() }}
    </form>
      </div>
      
    </div>
  </div>
  