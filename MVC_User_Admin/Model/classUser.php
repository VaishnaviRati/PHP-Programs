<?php
include "db_config.php";

	class User{

		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}

		/*** for registration process ***/
		public function reg_user($name,$username,$password,$email,$phone_number,$role,$status){

			$password = md5($password);
			$sql="SELECT * FROM dbUsers WHERE username='$username' OR email='$email'";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;


			//if the username is not in db then insert to the table username,password,email,phone_Number,role_id
			if ($count_row == 0){
/*				$sql1="INSERT INTO dbUsers SET username='$username', password='$password',email='$email',
				phone_Number='$phone_Number',role_id='$role'";*/
				 $sql1 = "INSERT INTO dbUsers (username,password,email,phone_number,role_id,status) 
                 VALUES('$name','$password','$email',$phone_number,2,0)";
           
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else {
			 return false;
			}
		}

		/*** for login process ***/
		public function check_login($emailusername, $password){

        	$password = md5($password);
			$sql2="SELECT id from dbUsers WHERE  username='$emailusername' and password='$password' and role_id=2 ";
			
			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	
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

    	/*** for showing the username or fullname ***/
    	public function get_fullname($id){
    		$sql3="SELECT * FROM dbUsers WHERE id = $id";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);

	        echo "<b>User Name:</b>".$user_data['username']."<br>";
	        echo "<b>email :</b> ".$user_data['email']."<br>";
	        echo "<b>Phone Number :</b> ".$user_data['phone_number'];
    	}
    	/*** To get the details in editprofile in user ***/
    	public function details($id)
    	{
    		$sql4="SELECT * FROM dbUsers WHERE id = $id";
	        $result = mysqli_query($this->db,$sql4);
	        $user_data = mysqli_fetch_array($result);
	        return $user_data;
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