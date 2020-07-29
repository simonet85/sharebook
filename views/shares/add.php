<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Share Something</h3>
  </div>
  <div class="panel-body">
   <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" role="form">
       <div class="form-group">
           <label for="">Share title</label>
           <input type="text" class="form-control" name="title" placeholder="Enter the title" required="require">
       </div>
       <div class="form-group">
           <label for="">Text message</label>
           <textarea name="body" id="inputbody" class="form-control" rows="3" placeholder="write something cool"></textarea> 
       </div>
       <div class="form-group">
           <label for="link">link</label>
           <input type="text" name="link" id="input" class="form-control" placeholder="Add a link">
       </div>
       
       <input type="submit" name="submit" class="btn btn-primary" value="submit">
       <a href="<?php echo ROOT_PATH;?>shares" class="btn btn-danger">Cancel</a>
   </form>
  </div>
</div>