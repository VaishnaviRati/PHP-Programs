<?php
include 'db_config.php';
	
	class Admin {

	   	public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}

		/*** for login process ***/
		public function check_login($emailusername, $password){

        	$password = md5($password);
			$sql2="SELECT id from dbUsers WHERE email='$emailusername' or username='$emailusername' and password='$password' and role_id=1";
			
			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	//echo $user_data;
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true;
	            $_SESSION['id'] = $user_data['id'];
	            return true;
	        }
	        else{
			    return false;
			}
    	}
			/*** To get the details in editprofile in user ***/
    	public function user_details($id)
    	{
    		$sql4="SELECT * FROM dbUsers WHERE role_id=2";
	        $result = mysqli_query($this->db,$sql4);
	        //$user_data = mysqli_fetch_array($result);
	        return  $result;
    	}

    	public function user_detailsOnId($id)
    	{
    		$sql4="SELECT id, username,email,phone_number FROM dbUsers WHERE id=$id";
	        $result = mysqli_query($this->db,$sql4);
	        //$user_data = mysqli_fetch_array($result);
	        return  $result;
    	}
    	
    	public function update_changes($name,$email,$phone_number,$id) {
    		$sql4="UPDATE dbUsers SET username = '$name', email ='$email' ,phone_number='$phone_number' WHERE id = $id";
    		
    		$result = mysqli_query($this->db,$sql4);
    		//$user_data = mysqli_fetch_array($result);

    		if ($result === TRUE) {
		       return TRUE;
		    } 
		    else {
               return FALSE;
			}


    	}

    	public function delete_user($id)
    	{
    		$sql="DELETE FROM dbUsers WHERE id=$id";
    		//echo $sql;
    		$result = mysqli_query($this->db,$sql);
    		return $result;

    		/*if ($result === TRUE) {
		       return TRUE;
		    } 
		    else {
               return FALSE;
			}*/

    	}

    	public function status_disable($id)
    	{

    		$sql4="UPDATE dbUsers SET status = 0 WHERE id = $id";
    		
    		$result = mysqli_query($this->db,$sql4);
    		//$user_data = mysqli_fetch_array($result);

    		if ($result === TRUE) {
		       return TRUE;
		    } 
		    else {
               return FALSE;
			}

    	}


    	public function status_enable($id)
    	{

    		$sql4="UPDATE dbUsers SET status=1 WHERE id = $id";
    		
    		$result = mysqli_query($this->db,$sql4);
    		//$user_data = mysqli_fetch_array($result);

    		if ($result === TRUE) {
		       return TRUE;
		    } 
		    else {
               return FALSE;
			}

    	}




    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }


	}




















?>