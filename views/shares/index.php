<div>
<?php if(isset($_SESSION['is_logged_in'])):?>
    <a href="<?php echo ROOT_PATH;?>shares/add" class="btn btn-success btn-share">Share something</a>
<?php endif;?>
        <?php foreach ($viewModel as $item) :?>
            <div class="well">
                <h3><?php echo $item['title'];?></h3>
                <small><?php echo $item['date_time'];?></small>
                <hr>
                <p><?php echo $item['body'];?></p>
                <br>
                <a href="<?php echo $item['link'];?>" class="btn btn-success" target="_blank">Read</a>
            </div>
        <?php endforeach ;?>
   
</div>