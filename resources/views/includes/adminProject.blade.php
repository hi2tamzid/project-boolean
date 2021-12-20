<section class="user_features_comment">
  @include('includes.adminControlSidebar', ['adminControlSectionName' => 'Project'])

  <div class="user_features_comment_right">
    <p><a href="{{ URL::to('/admin-project-register') }}" class="input_button button_link admin_course_add_button"><i class="fas fa-plus"></i> Add new project</a></p>
    <div class="admin_profile_forms">
      <form action="#">
        <div>
          <label for="user_name_select">Select student:</label>
          <select class="golf_course_name" name="user_name" id="user_name_select">
            <option value="user-1">Matthias</option>
            <option value="user-2">Tamzid</option>
          </select>
        </div>
      </form>
      <form action="#">
        <div>
          <label for="user_name_text">Enter students's name:</label>
          <input type="text" class="golf_course_name" name="user_name" id="user_name_text" required>
          <input type="submit" value="Find" class="input_button user_search_button">
        </div>
      </form>
    </div>
    @if(Session::has('msg'))
    <div class="alert alert-success mt-" role="alert">
      <strong>{{Session::get('msg') }}</strong>
    </div>
    @endif
    <div class="comment_main_section">
      @if(!$project->isEmpty())
      @foreach($project as $p)
      <div class="comment_item">
        <div class="comment_operation">
          <p><a href="" class="input_button comment_operation_delete" data-bs-toggle="modal" data-bs-target="#adminProjectDeleteModal{{ $t->id }}"><i class="far fa-trash-alt"></i> Delete Project</a></p>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="adminProjectDeleteModal{{ $p->id }}" tabindex="-1" aria-labelledby="adminProjectDeleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="adminProjectDeleteModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete <b>{{ $p->name }}</b> ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ URL::to('/admin-project-delete/'.$p->id) }}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#adminProjectDeleteModal">Delete</a>
              </div>
            </div>
          </div>
        </div>
        <div class="comment_golf_course admin_user_top">
          <p class="mb0">Team Name: {{$t->name}}</p>
        </div>
        @php
        $team_member = DB::table('team__members')->where('team_id', '=', $t->id)->get();
        $i = 0;
        @endphp
        @foreach($team_member as $tm)
        @php
        $s = DB::table('students')->where('id', '=', $tm->student_id)->first();
        $i++;
        @endphp
        <div class="comment_body admin_user_body">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Team Member {{$i}}</h5>
              <h6 class="card-subtitle mb-2">{{$s->name}}</h6>
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <p>ID: {{$s->student_id}}</p>
                  </div>
                  <div class="col-md-6">
                    <p>Email: {{$s->email}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <p>Batch: {{$s->batch}}</p>
                  </div>
                  <div class="col-md-6">
                    <p>Current Semester: {{$s->current_semester}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach


      </div>
      @endforeach
      @else
      <p>No data found</p>
      @endif
    </div>
</section>