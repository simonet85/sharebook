<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Register User</h3>
  </div>
  <div class="panel-body">
   <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" role="form">
       <div class="form-group">
           <label for="">Name:</label>
           <input type="text" class="form-control" name="name" placeholder="Enter your name" required="require">
       </div>
       <div class="form-group">
           <label for="">Email:</label>
           <input type="email" class="form-control" name="email" placeholder="Enter your email" required="require">
       </div>
       <div class="form-group">
           <label for="link">Password:</label>
           <input type="password" name="password" id="input" class="form-control" placeholder="Enter your password" required="require">
       </div>
       
       <input type="submit" name="submit" class="btn btn-primary" value="submit">
       
   </form>
  </div>
</div>