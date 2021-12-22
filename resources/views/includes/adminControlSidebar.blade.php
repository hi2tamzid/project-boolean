<div class="user_features_comment_left">
  <p class="user_features_nav mb0"><a class="text-decoration-none" href="{{ URL::to('/control-panel') }}">Control Panel</a> > {{ $adminControlSectionName }}</p>
  <ul class="user_features_menu">
  @if(Session::has('admin_login_id'))
      <a class="text-decoration-none text-dark" href="{{ URL::to('/admin-supervisor') }}">Supervisors</a>
      @endif
    <a class="text-decoration-none text-dark" href="{{ URL::to('/admin-student') }}">Student</a>
    <a class="text-decoration-none text-dark" href="{{ URL::to('/admin-project') }}">Project</a>
    <a class="text-decoration-none text-dark" href="{{ URL::to('/admin-session') }}">Session</a>
    <a class="text-decoration-none text-dark" href="{{ URL::to('/admin-team') }}">Team</a>
  </ul>
</div>