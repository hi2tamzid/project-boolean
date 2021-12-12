<div class="wrapper">
  <div class="card">
    <form action="#" class="d-flex flex-column">
      <div class="h3 text-center">Login</div>
      <div class="d-flex align-items-center input-field my-3 mb-4">
        <span class="far fa-user p-2"></span> 
        <input type="text" placeholder="Username or Email" required class="form-control">
      </div>
      <div class="d-flex align-items-center input-field mb-4">
        <span class="fas fa-lock p-2"></span> 
        <input type="password" placeholder="Password" required class="form-control" id="pwd"> 
        <button class="btn " onclick="showPassword()"> <span class="pass_btn_icon fas fa-eye"></span> </button>
      </div>
      <div class="d-sm-flex align-items-sm-center justify-content-sm-between">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Remember Me
          </label>
        </div>
        <div class="mt-sm-0 mt-3">
          <a href="#">Forgot password?</a>
        </div>
      </div>
      <div class="my-3">
        
        <input type="submit" value="Login" class="loginsubmit_btn">
      </div>
      <div class="mb-3">
        <span>Don't have an account?</span>
        <a href="#">Register</a>
      </div>
    </form>
  </div>
</div>