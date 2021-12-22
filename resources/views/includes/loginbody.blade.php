<div class="wrapper">
  <div class="card">
    <form action="{{ URL::to('/supervisor-login') }}" class="d-flex flex-column" method="post">
      <div class="h3 text-center">Login</div>
      <div class="d-flex align-items-center input-field my-3 mb-4">
        <span class="far fa-user p-2"></span> 
        <input type="text" name="login_id" placeholder="Username or Email" required class="form-control">
      </div>
      <div class="d-flex align-items-center input-field mb-4">
        <span class="fas fa-lock p-2"></span> 
        <input type="password" name="password" placeholder="Password" required class="form-control" id="pwd"> 
        <button class="btn " onclick="showPassword()"> <span class="pass_btn_icon fas fa-eye"></span> </button>
      </div>
      
      <div class="my-3">
        
        <input type="submit" value="Login" class="loginsubmit_btn">
      </div>
      
    </form>
  </div>
</div>