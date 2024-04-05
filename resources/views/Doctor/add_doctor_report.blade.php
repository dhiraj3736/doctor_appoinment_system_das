@foreach($select_item as $row)

<div class="modal fade" id="add_report{{$row->b_id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel{{$row->b_id}}">Add Report</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/send_report" enctype="multipart/form-data" method="post">
        @csrf
        <!-- Hidden input field to store the ID -->
        <!-- Input field to store the appointment ID -->
        <input type="hidden" name="b_id" id="b_id" value="{{$row->b_id}}">
        <input type="hidden" name="u_id" id="u_id" value="{{$row->u_id}}">

        <div class="form-outline mb-2">
          <textarea id="report" name="report" rows="20" cols="55" class="form-control"></textarea>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endforeach


@foreach($select_item as $row)

<div class="modal fade" id="view_report{{$row->b_id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel{{$row->b_id}}">Add Report</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <table>
        <tr>
        <th>date</th>
        <th>report</th>
        </tr>
        
        <tr></tr>
        @foreach($report as $bow)
        @if($row->u_id==$bow->u_id)
        <tr>
         
          <td>{{$bow->created_at}}</td>
          <td>{{$bow->report}}</td>
        </tr>
        @endif
        @endforeach
      </table>
    </div>
  </div>
</div>

@endforeach
