 <!-- Modal -->
 <div class="modal fade" id="bookEdit" tabindex="-1" aria-labelledby="bookEditLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="bookEditLabel">Book Edit</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form method="post" id="form_book_edit">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="author_id" id="author_id"
                            name="author_id">
                        @error('author_id')
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
