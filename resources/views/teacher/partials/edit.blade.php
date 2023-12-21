 <!-- Modal -->
 <div class="modal fade" id="teacherEdit" tabindex="-1" aria-labelledby="teacherEditLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="teacherEditLabel">Permission Edit</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form method="post" id="form_teacher_edit">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="user_name" id="user_name"
                            name="user_name">
                        @error('user_name')
                            <div class="alert alert-danger mt-1"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter first_name" id="first_name"
                            name="first_name">
                        @error('first_name')
                            <div class="alert alert-danger mt-1"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter last_name" id="last_name"
                            name="last_name">
                        @error('last_name')
                            <div class="alert alert-danger mt-1"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter email" id="email"
                            name="email">
                        @error('email')
                            <div class="alert alert-danger mt-1"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter password" id="password"
                            name="password">
                        @error('password')
                            <div class="alert alert-danger mt-1"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
