<section class="user_features_comment">
  @include('includes.adminControlSidebar', ['adminControlSectionName' => 'Session'])

  <div class="user_features_comment_right">
    <p><a href="{{ URL::to('/admin-session-register') }}" class="input_button button_link admin_course_add_button"><i class="fas fa-plus"></i> Add new session</a></p>
    <div class="admin_profile_forms">
      <form action="#">
        <div>
          <label for="user_name_select">Select session:</label>
          <select class="golf_course_name" name="user_name" id="user_name_select">
            <option value="user-1">Matthias</option>
            <option value="user-2">Tamzid</option>
          </select>
        </div>
      </form>

    </div>
    @if(Session::has('msg'))
    <div class="alert alert-success mt-" role="alert">
      <strong>{{Session::get('msg')}}</strong>
    </div>
    @endif
    <div class="comment_main_section">
      @if(!$session->isEmpty())
      @foreach($session as $s)
      <div class="comment_item">
        <div class="comment_operation">
          <p><a href="" class="input_button comment_operation_delete" data-bs-toggle="modal" data-bs-target="#adminSessionDeleteModal{{ $s->id }}"><i class="far fa-trash-alt"></i> Delete Session</a></p>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="adminSessionDeleteModal{{ $s->id }}" tabindex="-1" aria-labelledby="adminSessionDeleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="adminSessionDeleteModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete <b>{{ $s->name }}</b> ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ URL::to('/admin-session-delete/'.$s->id) }}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#adminSessionDeleteModal">Delete</a>
              </div>
            </div>
          </div>
        </div>
        <div class="comment_golf_course admin_user_top">
          <p class="mb0">Name: {{$s->name}}</p>
        </div>
        <div class="comment_body admin_user_body">
          <div>
            <p>Project: 3</p>
            <p>Students: 3</p>
            <p>Team assigned: 5</p>
          </div>

        </div>
      </div>
      @endforeach
      @else
      <p>No data found</p>
      @endif
    </div>
  </div>
</section>