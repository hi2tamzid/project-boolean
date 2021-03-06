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
      @php

      $project__supervisors = DB::table('project__supervisors')->where('id', '=', $p->id)->first();
      $supervisor = DB::table('supervisors')->where('id', '=', $project__supervisors->supervisor_id)->first();

      $team__projects = DB::table('team__projects')->where('id', '=', $p->id)->first();
      $team = DB::table('teams')->where('id', '=', $team__projects->team_id)->first();
      $team__members = DB::table('team__members')->where('team_id', '=', $team->id)->get();

      $project__sessions = DB::table('project__sessions')->where('id', '=', $p->id)->first();
      $sessions = DB::table('sessions')->where('id', '=', $project__sessions->session_id)->first();
      @endphp
      <div class="comment_item">
        <div class="comment_operation">
        <p><a href="{{ URL::to('/admin-project-edit/'.$p->id) }}" class="input_button comment_operation_edit" ><i class="fas fa-edit"></i> Edit</a></p>
          <p><a href="" class="input_button comment_operation_delete" data-bs-toggle="modal" data-bs-target="#adminProjectDeleteModal{{ $p->id }}"><i class="far fa-trash-alt"></i> Delete</a></p>
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
          <h2>Project Name: {{$p->name}}</h2>
        </div>
        <div class="comment_golf_course admin_user_top">
          <p class="display-3">Type: {{$p->type}}</p>
        </div>
        <div class="comment_body">
          <div class="container">
            <div class="row mb-4">
              <div class="col-12">
                <div class="card">
                  <h5 class="card-header">Description</h5>
                  <div class="card-body">
                    <p class="card-text">{{$p->description}}</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Supervisor</th>
                      <th scope="col">Session</th>
                      <th scope="col">Starting time</th>
                      <th scope="col">Deadline</th>
                      <th scope="col">Remark</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{$supervisor->name}}</th>
                      <td>{{$sessions->name}}</td>
                      <td>{{$p->start_time}}</td>
                      <td>{{$p->end_time}}</td>
                      <td>{{$s->remark ?? '0'}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>

          </div>

        </div>

        <p><a href="{{ URL::to('/admin-project-details/'.$p->id) }}" class="input_button button_link user_search_button"><i class="fas fa-info-circle"></i> More details</a></p>
        @php
        $is_project_graded = DB::table('student__marks')->where('project_id', '=',$p->id)->count();
        @endphp
        @if($is_project_graded)
        <p><a href="{{ URL::to('/admin-project-mark-update/'.$p->id) }}" class="btn btn-success"><i class="fas fa-poll-h"></i>  Edit marks</a></p>
        @else
        <p><a href="{{ URL::to('/admin-project-mark/'.$p->id) }}" class="btn btn-success"><i class="fas fa-poll-h"></i>  Provide marks</a></p>
        @endif
        

      </div>
      @endforeach
      @else
      <p>No data found</p>
      @endif
    </div>
</section>