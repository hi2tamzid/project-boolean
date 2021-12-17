<section class="user_features_comment">
  @include('includes.adminControlSidebar')

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
    <div class="comment_main_section">
      @if($supervisors)
      @foreach($supervisors as $s)
      <div class="comment_item">
        <div class="comment_operation">
          <p><a class="input_button comment_operation_delete" href="javascript:void(0);" onclick="confirm('Warning: Are you sure you want to delete the account:');"><i class="far fa-trash-alt"></i> Delete Account</a></p>
        </div>
        <div class="comment_golf_course admin_user_top">
          <img src="~/pic/rep.jpg" alt="Profile Picture">
          <p class="mb0">{{$s->name}}</p>
        </div>
        <div class="comment_body admin_user_body">
          <div>
            <p>Username: hi2tamzid</p>
            <p>Country: Bangladesh</p>
          </div>
          <div>
            <p>Email: tamzidmahmud2@gmail.com</p>
            <p>Contact No: 01864988944</p>
          </div>
          <div>
            <p>Photos Uploaded: 3</p>
            <p>Details Provided: 5</p>
          </div>
          <p><a class="input_button user_search_button" asp-page="AdminUserDetails"><i class="far fa-trash-alt"></i>
              More details</a></p>
        </div>
      </div>
      @endforeach
        @else
        <p>No data found</p>
        @endif

      <div class="comment_item">
        <div class="comment_operation">
          <p><a class="input_button comment_operation_delete" href="javascript:void(0);" onclick="confirm('Warning: Are you sure you want to delete the account:');"><i class="far fa-trash-alt"></i> Delete Account</a></p>
        </div>
        <div class="comment_golf_course admin_user_top">
          <img src="~/pic/rep.jpg" alt="Profile Picture">
          <p class="mb0">Tamzid Mahmud</p>
        </div>
        <div class="comment_body admin_user_body">
          <div>
            <p>Username: hi2tamzid</p>
            <p>Country: Bangladesh</p>
          </div>
          <div>
            <p>Email: tamzidmahmud2@gmail.com</p>
            <p>Contact No: 01864988944</p>
          </div>
          <div>
            <p>Photos Uploaded: 3</p>
            <p>Details Provided: 5</p>
          </div>
          <p><a class="input_button user_search_button" asp-page="AdminUserDetails"><i class="far fa-trash-alt"></i>
              More details</a></p>
        </div>
      </div>

    </div>
  </div>
</section>