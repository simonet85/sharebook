<?php
class UserModel extends Model{
    public function register(){
         //Sanitize the POST array
         $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
         if($post['submit']){
             if($_POST['name']=='' || $_POST['password']=='' ||$_POST['email']==''){
                Messages::setMsg('Please fill all fields', 'error');
                return;
             }
            $password = md5($_POST['password']);
            $this->query("INSERT INTO users(name,password,email) VALUES (:name,:password,:email) ");
            $this->bind(':name',$_POST['name']);
            $this->bind(':password',$password);
            $this->bind(':email',$_POST['email']);
            $this->execute();
 
            if($this->lastInsertId()){
                //redirect
                header('Location: '.ROOT_URL.'users/login');
            }
         }
         return;
    }

    public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			// Compare Login
			$this->query('SELECT * FROM users WHERE email = :email AND password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			
            $row = $this->single();
			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $row['id'],
					"name"	=> $row['name'],
					"email"	=> $row['email']
				);
				header('Location: '.ROOT_URL.'shares');
			} else {
				Messages::setMsg('Incorrect login', 'error');
			}
		}
		return;
	}
}