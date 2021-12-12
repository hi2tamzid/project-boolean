// ==================
// Form Validation
// ==================

// Adding Empty field warning

function signupEmptyValidation(e) {
  input_sections = {
    "fullname": 0,
    "signup_username": 1,
    "surname": 2,
    "email": 3,
    "signup_password": 4,
    "birthday": 5,
    "confirmpassword": 6,
    "number": 7
  }
  message_box = document.querySelectorAll(".input_empty_warning");
  if (e.value == "") {
    message_box[input_sections[e.id]].classList.add("show_empty_warning");
    e.style.borderColor = "#FF0000";

    // Signup Username
    document.querySelector(".input_username_warning").classList.remove("show_empty_warning");

    // Signup Email
    document.querySelector(".input_email_warning").classList.remove("show_empty_warning");
  }
  else {
    message_box[input_sections[e.id]].classList.remove("show_empty_warning");
    e.style.borderColor = "#9035b5";

    // Signup Username
    if (e.id === "signup_username" && (/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/).test(e.value)) {
      document.querySelector(".input_username_warning").classList.add("show_empty_warning");
      e.style.borderColor = "#FF0000";
    }
    else {
      // Signup Username
      document.querySelector(".input_username_warning").classList.remove("show_empty_warning");
      e.style.borderColor = "#9035b5";
    }

    if (e.id === "email") {
      if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/).test(e.value)) {
        document.querySelector(".input_email_warning").classList.add("show_empty_warning");
        e.style.borderColor = "#FF0000";
      }
      else {
        document.querySelector(".input_email_warning").classList.remove("show_empty_warning");
        e.style.borderColor = "#9035b5";
      }
    }
  }
}

/**

 Signup Password Validation
 - Check for empty string
 - Password should be greater than 6 && less than 20 characters
 - Should contain at least one symbol, one  letter, one number

 */

function signupPasswordValidation(e) {

  password_message = document.querySelectorAll(".password_warning");
  let input_red_flag = [0, 0, 0];
  if (e.value == "") {
    password_message[0].classList.add("show_empty_warning");
    input_red_flag[0] = 1;
    password_message[1].classList.remove("show_empty_warning");
    input_red_flag[1] = 0;
    password_message[2].classList.remove("show_empty_warning");
    input_red_flag[2] = 0;
  }
  else {
    password_message[0].classList.remove("show_empty_warning");
    input_red_flag[0] = 0;

    if (e.value.length < 6 || e.value.length > 20) {
      password_message[1].classList.add("show_empty_warning");
      input_red_flag[1] = 1;
    }
    else {
      password_message[1].classList.remove("show_empty_warning");
      input_red_flag[1] = 0;
    }

    if (e.value.search(/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])(?!.*\s)/)) {
      password_message[2].classList.add("show_empty_warning");
      input_red_flag[2] = 1;
    }
    else {
      password_message[2].classList.remove("show_empty_warning");
      input_red_flag[2] = 0;
    }
  }

  let decision = false;

  for (let i = 0; i < input_red_flag.length; i++) {
    if (input_red_flag[i])
      decision = true;
  }
  if (decision)
    e.style.borderColor = "#FF0000";
  else
    e.style.borderColor = "#9035b5";
}

function signupPassRecheckValidation(e) {
  let pass = document.querySelector("#signup_password");
  let pass_message = document.querySelectorAll(".input_confirm_pass_warning");

  if (e.value === "") {
    pass_message[0].classList.add("show_empty_warning");
    pass_message[1].classList.remove("show_empty_warning");
    e.style.borderColor = "#FF0000";
  }
  else if (pass.value !== e.value) {
    pass_message[0].classList.remove("show_empty_warning");
    pass_message[1].classList.add("show_empty_warning");
    e.style.borderColor = "#FF0000";
  }
  else {
    pass_message[0].classList.remove("show_empty_warning");
    pass_message[1].classList.remove("show_empty_warning");
    e.style.borderColor = "#9035b5";
  }
}