<section class="user_features_comment">
  @include('includes.adminControlSidebar', ['adminControlSectionName' => 'Supervisor'])

  <div class="user_features_comment_right">
    <p><a href="{{ URL::to('/admin-supervisor-register') }}" class="input_button button_link admin_course_add_button"><i class="fas fa-plus"></i> Add new supervisor</a></p>
    <div class="admin_profile_forms">
      <form action="#">
        <div>
          <label for="user_name_select">Select User:</label>
          <select class="golf_course_name" name="user_name" id="user_name_select">
            <option value="user-1">Matthias</option>
            <option value="user-2">Tamzid</option>
          </select>
        </div>
      </form>
      <form action="#">
        <div>
          <label for="user_name_text">Enter User's name:</label>
          <input type="text" class="golf_course_name" name="user_name" id="user_name_text" required>
          <input type="submit" value="Find" class="input_button user_search_button">
        </div>
      </form>
    </div>
    @if(Session::has('msg'))
    <div class="alert alert-success mt-" role="alert">
      <strong>{{Session::get('msg')}}</strong>
    </div>
    @endif
    <div class="comment_main_section">
      @if(!$supervisors->isEmpty())
      @foreach($supervisors as $s)
      <div class="comment_item">
      <span class="badge {{ $s->is_acc_open ? 'bg-primary': 'bg-danger'}}">{{ $s->is_acc_open ? 'Open': 'Closed'}}</span>
        <div class="comment_operation">
          <p><a href="" class="input_button comment_operation_delete" data-bs-toggle="modal" data-bs-target="#adminSupervisorDeleteModal{{ $s->id }}"><i class="far fa-trash-alt"></i> Delete Account</a></p>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="adminSupervisorDeleteModal{{ $s->id }}" tabindex="-1" aria-labelledby="adminSupervisorDeleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="adminSupervisorDeleteModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete <b>{{ $s->name }}</b> ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ URL::to('/admin-supervisor-delete/'.$s->id) }}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#adminSupervisorDeleteModal">Delete</a>
              </div>
            </div>
          </div>
        </div>
        <div class="comment_golf_course admin_user_top">
          <img src="{{ asset('image/'.$s->image) }}" alt="{{$s->name}}">
          <p class="mb0">Name: {{$s->name}}</p>
        </div>
        <div class="comment_body admin_user_body">
          <div>
            <p>Login ID: {{$s->login_id}}</p>
            <p>Email: {{$s->email}}</p>
          </div>
          <div>
            <p>Gender: {{$s->gender}}</p>
            <p>Contact No: {{$s->mobile}}</p>
          </div>
          <div>
            @php
            $project_supervised = DB::table('project__supervisors')->where('supervisor_id', '=', $s->id)->count();

            @endphp
            <p>Project Supervised: {{$project_supervised}}</p>
          </div>
          <p><a href="{{ URL::to('/admin-supervisor-details/'.$s->id) }}" class="input_button button_link user_search_button"><i class="fas fa-info-circle"></i> More details</a></p>
        </div>
      </div>
      @endforeach
      @else
      <p>No data found</p>
      @endif
    </div>
  </div>
</section>