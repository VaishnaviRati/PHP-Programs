<html>
   <h2 style= "color: green"><?php echo $_GET['msg']; ?></h2>
   &nbsp;
   <a href="index.php?page=login&&q=logout" >LOGOUT</a>
   <div id="container">
      <h1>Users Profile</h1>
         <?php if (isset($deleteMsg)) echo '<h4>'.$deleteMsg.'</h4>'; 
            if (isset($deleteErr)) echo '<h4>'.$deleteErr.'</h4>';
         ?>

      <form action="" method="post" name="submit">
         <table>
            <tbody>
               <tr>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
               </tr>
               <?php 
                  foreach ($users as $key => $userInfo) {
                  ?>	
               <tr>
                  <td><input type="text" name="name" value='<?php echo $userInfo['username']; ?>' readonly /></td>
                  <td><input type="text" name="email" value='<?php echo $userInfo['email']; ?>' readonly /></td>
                  <td><input type="text" name="phone_number" value='<?php echo $userInfo['phone_number']; ?>'readonly/></td>
                  <td><a href='index.php?page=edit&&userid=<?php echo $userInfo['id']; ?>' >Edit</a></td>
      <form  action="index.php?page=deleteUser" method="post" >
      <input type="hidden" name="deleteUser" value="<?php echo $userInfo['id']; ?>">
      <td><input type="submit" name="submit" value="delete"></td>
      </form>
      
      <?php if($userInfo['status'] == 1) { ?>
      
      
      <form action="index.php?page=userDisable" method="post" >
      <input type="hidden" name="dUser" value="<?php echo $userInfo['id']; ?>">
      <td><input type="submit" name="dsubmit" value="Make Disable" style="color:red"></td>
      </form>
      
      <?php
         }
         else{
         ?>
      
      <form action="index.php?page=userEnable" method="post" >
      <input type="hidden" name="eUser" value="<?php echo $userInfo['id']; ?>">
      <td><input type="submit" name="esubmit" value="Make Enable" style="color:green"></td>
      </form>
      </tr>
      <?php
         }
         }
         ?>
      </tbody>
      </table>
      </form>
   </div>
</html>

