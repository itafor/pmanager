<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">New Student</h4>
            </div>
        <form action="{{URL::to('students/store')}}" method="POST" id="insert-student-frm">
            <div class="modal-body">
              <div class="col-md-4">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                <input type="text" name="firstname" >
                </div>
              </div>

              <div class="col-md-4">
                    <div class="form-group">
                        <label for="middlename">Middle Name</label>
                        <input type="text" name="middlename">
                    </div>
              </div>

              <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastname">last name</label>
                        <input type="text" name="lastname">
                    </div>
              </div>

              <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" name="email">
                    </div>
              </div>

              <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="text" name="phone">
                    </div>
              </div>
              
              <div class="col-md-4">
                    <div class="form-group">
                        <label for="address">address</label>
                        <input type="text" name="address" >
                    </div>
              </div>

              <div class="col-4-md">
                    <div class="form-group">
                        <label for="maritalstatus">maritalstatus</label>
                        <select name="maritalstatus" id=""  class="form-control">
                            <option value=" ">--Select--</option>
                            @foreach($mstatuses as $key =>$status)
                            <option value="{{$status}}">{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
              </div>

            </div>
            <div class="modal-footer">
                <input type="submit" name="" class ="btn btn-success pull-left" value="Save">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
          </div>
          
        </div>
      </div>
      