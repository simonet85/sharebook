<?php
class ShareModel extends Model{
    public function index(){
        $this->query('SELECT * FROM shares ORDER BY date_time DESC LIMIT 5');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add(){
        //Sanitize the POST array
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']){

            if($_POST['title']=='' || $_POST['body']=='' ||$_POST['link']==''){
                Messages::setMsg('Please fill all fields', 'error');
                return;
             }
            $last_id = $this->lastInsertId();
           $this->query("INSERT INTO shares(user_id,title, body, link) VALUES (:user_id,:title,:body,:link) ");
           $this->bind(':user_id',$last_id);
           $this->bind(':title',$_POST['title']);
           $this->bind(':body',$_POST['body']);
           $this->bind(':link',$_POST['link']);
           $this->execute();

           if($this->lastInsertId()){
               //redirect
               header('Location: '.ROOT_URL.'shares');
           }
        }
        return;  
    }
}