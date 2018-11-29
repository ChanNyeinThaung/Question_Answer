

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ url('questions/add/') }}">

			   {{ csrf_field() }}
			 <div class="form-group">
			 	<label>Subject</label>
				<input type="text" name="subject" class="form-control">
			</div>

			<div class="form-group">
                <label>Detail</label>
                <textarea name="detail" class="form-control"></textarea>
      </div>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add New Question</button>
		</form>
      </div>
      
    </div>
  </div>
</div>