<section class="user_features_comment">
  @include('includes.adminControlSidebar', ['adminControlSectionName' => 'Student'])

  <div class="user_features_comment_right">
    <p><a href="{{ URL::to('/admin-student-register') }}" class="input_button button_link admin_course_add_button"><i class="fas fa-plus"></i> Add new student</a></p>
    <div class="admin_profile_forms">
    </div>
    @if(Session::has('msg'))
    <div class="alert alert-success mt-" role="alert">
      <strong>{{Session::get('msg')}}</strong>
    </div>
    @endif
    <div class="comment_main_section">
      @if(!$student->isEmpty())
      @foreach($student as $s)
      <div class="comment_item">
        <div class="comment_operation">
          <p><a href="{{ URL::to('/admin-student-edit/'.$s->id) }}" class="input_button comment_operation_edit" ><i class="fas fa-edit"></i> Edit</a></p>
          <p><a href="" class="input_button comment_operation_delete" data-bs-toggle="modal" data-bs-target="#adminStudentDeleteModal{{ $s->id }}"><i class="far fa-trash-alt"></i> Delete</a></p>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="adminStudentDeleteModal{{ $s->id }}" tabindex="-1" aria-labelledby="adminStudentDeleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="adminStudentDeleteModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete <b>{{ $s->name }}</b> ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ URL::to('/admin-student-delete/'.$s->id) }}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#adminStudentDeleteModal">Delete</a>
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
            <p>Student ID: {{$s->student_id}}</p>
            <p>Email: {{$s->email}}</p>
          </div>
          <div>
            <p>Admission date: {{$s->year_of_admission}}</p>
            <p>Batch: {{$s->batch}}</p>
          </div>
          <div>
            <p>Gender: {{$s->gender}}</p>
            <p>Contact No: {{$s->mobile}}</p>
          </div>

          <p><a href="{{ URL::to('/admin-student-details/'.$s->id) }}" class="input_button button_link user_search_button"><i class="fas fa-info-circle"></i> More details</a></p>
        </div>
      </div>
      @endforeach
      @else
      <p>No data found</p>
      @endif
    </div>
  </div>
</section>