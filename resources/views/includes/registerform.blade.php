<form class="signup_form" method="post" enctype="multipart/form-data">



  <div class="profile_lower mb0">
    <div class="profile_lower_left mb0">
      <div>
        <label for="fullname">Full Name<span class="mandatory_star">*</span> :</label>
        <input oninput="signupEmptyValidation(this);" type="text" id="fullname" name="name" required>
        <p class="input_empty_warning"><i class="fas fa-exclamation-circle"></i> The field is empty</p>
      </div>
    </div>
    <div class="profile_lower_right mb0">
      <div>
        <label for="email">Email<span class="mandatory_star">*</span> :</label>
        <input onchange="signupEmptyValidation(this);" type="email" id="email" name="email" required>
        <p class="input_empty_warning"><i class="fas fa-exclamation-circle"></i> The field is empty</p>
        <p class="input_email_warning"><i class="fas fa-exclamation-circle"></i> Invalid email format</p>
      </div>
    </div>
  </div>
  <div class="profile_lower mb0">
    <div class="profile_lower_left mb0">
      <div>
        <label for="signup_username">Login ID<span class="mandatory_star">*</span> :</label>
        <input oninput="signupEmptyValidation(this);" type="text" id="signup_username" name="signup_username" required>
        <p class="input_empty_warning"><i class="fas fa-exclamation-circle"></i> The field is empty</p>
        <p class="input_username_warning"><i class="fas fa-exclamation-circle"></i> Username can't have special
          characters</p>
      </div>
    </div>

    <div class="profile_lower_right mb0">
      <div>
        <label for="email">Email<span class="mandatory_star">*</span> :</label>
        <input onchange="signupEmptyValidation(this);" type="email" id="email" name="email" required>
        <p class="input_empty_warning"><i class="fas fa-exclamation-circle"></i> The field is empty</p>
        <p class="input_email_warning"><i class="fas fa-exclamation-circle"></i> Invalid email format</p>
      </div>
    </div>
  </div>

  <div class="profile_lower">
    <div>
      <label for="score"> Average score for 18 holes</label><br>
    </div>
  </div>
  <div class="profile_lower mb0">
    <div class="profile_lower_left">
      <div class="mb0">
        <label for="average"> Average :</label>
        <input type="text" id="average" name="average">
      </div>


    </div>

    <div class="profile_lower_right mb0">
      <div class="mb0">
        <label for="minimum"> Minimum :</label>
        <input type="text" id="minimum" name="minimum">
      </div>
    </div>
  </div>

  <div class="profile_lower">
    <div>
      <label for="maximum"> Maximum :</label>
      <input type="text" id="maximum" name="maximum">
    </div>
  </div>

  <div class="profile_lower mb0">
    <div class="profile_lower_left mb0">
      <div>
        <label for="select_golf_course">Preferred Golf Course (If any)<span class="mandatory_star"></span> :</label>
        <input type="text" id="select_golf_course" name="select_golf_course">
      </div>
    </div>
    <div class="profile_lower_right mb0">
      <div>
        <label for="played_golf_course"> Played Golf Course (If any)<span class="mandatory_star"></span> :</label>
        <input type="text" id="played_golf_course" name="played_golf_course">
      </div>
    </div>
  </div>



  <div class="profile_lower mb0">
    <div class="profile_lower_left mb0">
      <div>
        <label for="signup_password">Password<span class="mandatory_star">*</span> :</label>
        <input onchange="signupPasswordValidation(this);" type="password" id="signup_password" name="signup_password" required>
        <p class="password_warning">&#9679; The field is empty</p>
        <p class="password_warning">&#9679; Password should be greater than 6 and less than 20 characters</p>
        <p class="password_warning">&#9679; Should contain at least one special character(!&#$), one alphabet, one
          digit</p>
      </div>
    </div>
    <div class="profile_lower_right mb0">
      <div>
        <label for="confirmpassword">Confirm Password<span class="mandatory_star">*</span> :</label>
        <input onchange="signupPassRecheckValidation(this);" type="password" id="confirmpassword" name="confirmpassword" required>
        <p class="input_confirm_pass_warning"><i class="fas fa-exclamation-circle"></i> The field is empty</p>
        <p class="input_confirm_pass_warning"><i class="fas fa-exclamation-circle"></i> Passwords don't match</p>
      </div>
    </div>
  </div>


  <div class="profile_lower">
    <div class="profile_lower_left mb0">
      <div>
        <label for="birthday">Date of Birth<span class="mandatory_star">*</span> :</label>
        <input type="date" id="birthday" name="birthday" required>
        <p class="input_empty_warning">The field is empty</p>
      </div>
    </div>

    <div class="profile_lower_right mb0">
      <div class="mb0">
        <label for="gender">Gender<span class="mandatory_star">*</span> :</label>
        <div class="input_gender mb0">
          <div>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
          </div>
          <div>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
          </div>
          <div>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label>
          </div>
        </div>
        <p class="input_empty_warning">The field is empty</p>
      </div>
    </div>
  </div>


  <div>
    <fieldset class="input_fieldset">
      <legend>Address (Optional)</legend>
      <div class="profile_lower mb0">
        <div class="profile_lower_left mb0">
          <div>
            <label for="address">Current Address :</label>
            <input type="text" id="address" name="address">
          </div>
        </div>
        <div class="profile_lower_right mb0">
          <div>
            <label for="street">Street No/Name :</label>
            <input type="text" id="street" name="street">
          </div>
        </div>
      </div>
      <div class="profile_lower">
        <div class="profile_lower_left ">

          <div class="mb0">
            <label for="city">City/Town :</label>
            <input type="text" id="city" name="city">
          </div>
        </div>
        <div class="profile_lower_right">

          <div class="mb0">
            <label for="state">Country :</label>
            <input type="text" id="country" name="country">
          </div>
        </div>
      </div>
    </fieldset>
  </div>


  <div class="profile_lower mb0">
    <div class="profile_lower_left mb0">
      <div>
        <label for="number">Contact No<span class="mandatory_star">*</span> :</label>
        <input oninput="signupEmptyValidation(this);" type="text" id="number" name="number" required>
        <p class="input_empty_warning"><i class="fas fa-exclamation-circle"></i> The field is empty</p>
      </div>
    </div>
    <div class="profile_lower_right mb0">
      <div>
        <label for="website">Website :</label>
        <input type="text" id="website" name="website">
      </div>
    </div>
  </div>

  <div class="profile_lower mb0">
    <div class="profile_lower_left mb0">
      <div>
        <label for="languages">Languages :</label>
        <input type="text" id="languages" name="languages">
      </div>
    </div>
    <div class="profile_lower_right mb0">
      <div>
        <label for="twitter">Twitter :</label>
        <input type="text" id="twitter" name="twitter">
      </div>
    </div>
  </div>

  <div class="profile_lower mb0">
    <div class="profile_lower_left mb0">
      <div>
        <label for="facebook">Facebook :</label>
        <input type="text" id="facebook" name="facebook">
      </div>
    </div>
    <div class="profile_lower_right mb0">
      <div>
        <label for="linkedin">Linkedin :</label>
        <input type="text" id="linkedin" name="linkedin">
      </div>
    </div>
  </div>

  <div class="profile_lower mb0">
    <div class="profile_lower_left mb0">
      <div>
        <label for="instagram">Instagram :</label>
        <input type="text" id="instagram" name="instagram">
      </div>
    </div>
    <div class="profile_lower_right mb0">
      <div>
        <input type="checkbox" id="interest" name="interest" value="true">
        <label style="display: inline;" for="interest"> Interested to play with other members of this site?</label>
      </div>
    </div>
  </div>

  <div class="profile_lower mb0">
    <div class="profile_lower_left mb0">
      <div class="input_picture mb0">
        <label for="picture">Select Profile Picture :</label><br>
        <input type="file" id="picture" name="picture">
      </div>
    </div>
    <div class="profile_lower_right mb0">
      <div>
        <input type="checkbox" id="experience" name="experience" value="true">
        <label for="experience"> Have previous experience in Golf?</label>
      </div>
    </div>
  </div>

  <input class="form_input_button" type="submit" value="Submit">

</form>