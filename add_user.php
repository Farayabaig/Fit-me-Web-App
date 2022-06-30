<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href='css/bootstrap.css'>
    <title>Fit Me - Sign Up</title>
  </head>
  <body style="background-color: #ddecad; height: 100px;">
    <div style=" background-color: hsl(284, 44%, 78%);"> 
      <img src="https://www.graphicsprings.com/filestorage/stencils/0b9e79b37796b4f9200d26edfa127d19.png" height="100px" >
       <span class="header"> Fit Me Management System</span>
      </div>
    <br>
    <form name="input" action="add_membership.php" method="post">
        <table style="text-align: left; margin-left: auto; margin-right: auto; background-color: #d4d4d4; width: 500px; height: 200px;"

          border="1">
          <tbody>
            <tr align="center">
              <th colspan="2"> Sign Up Form </th>
            </tr>
              <td style="text-align: center;">Member ID</td>
              <td>
                <div style="text-align: center;"> <input name="customer_id" type="number" placeholder="001">
                </div>
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">Name</td>
              <td style="text-align: center;"> <input name="name_id" type="text" placeholder="First Name, Last Name"><br>
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">Userame</td>
              <td>
                <div style="text-align: center;"> <input name="user_name" type="text" placeholder="john03"><br>
                </div>
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">Email</td>
              <td>
                <div style="text-align: center;"> <input name="email_id" type="email" placeholder="contact@fitme.com"><br>
                </div>
              </td>
            </tr>  
              <tr>
              <td style="text-align: center;">Password</td>
              <td>
                <div style="text-align: center;"> <input name="password_id" type="password" placeholder="Alpha-Numeric"><br>
                </div>
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">Gender</td>
              <td>
                <div style="text-align: center;"> <input name="sex_id" type="text" placeholder="Male/Female">
                </div>
              </td>
            </tr>
              <td style="text-align: center;">Height</td>
              <td>
                <div style="text-align: center;"> <input name="height_id" type="decimal" placeholder="6.12 (in feet.inches)">
                </div>
              </td>
            </tr>
              <td style="text-align: center;">Age</td>
              <td>
                <div style="text-align: center;"> <input name="age_id" type="number" placeholder="in years">
                </div>
              </td>
            </tr>
              <td style="text-align: center;">Phone Number</td>
              <td>
                <div style="text-align: center;"> <input name="phone_id" type="number" placeholder="03xxxxxxxxx">
                </div>
              </td>
            </tr>

            <tr>
              <td style="text-align: center;"> <br>
              </td>
              <td style="text-align: center;"> <input value="Create an account" type="submit" name="create_user">
              </td>
            </tr>
          </tbody>
        </table>
      </form>
      <br>
      <br> 


<?php  // creating a database connection 

   $db_sid = 
   " (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-4AB7PRT)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = FarayaDB)
    )
  )
";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "scott";   // Oracle username e.g "scott"
   $db_pass = "f6a1raya";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful."; 
		} 
   else 
      { die('Could not connect to Oracle: '); } 
 

    if (isset($_POST["create_user"]))
     {
      $customer_id=$_POST["customer_id"];
      if($customer_id!=NULL)
      {
      $customer_id=$_POST["customer_id"];
      $name_id=$_POST["name_id"];
      $user_name=$_POST["user_name"];
      $email_id=$_POST["email_id"];
      $password_id=$_POST["password_id"];
      $sex_id=$_POST["sex_id"];
      $height_id=$_POST["height_id"];
      $age_id=$_POST["age_id"];
      $phone_id=$_POST["phone_id"];

      $sql_insert = "insert into customers values ('{$customer_id}','{$name_id}','{$user_name}','{$password_id}','{$email_id}','{$sex_id}','{$height_id}','{$age_id}','{$phone_id}')";
      $query_id1 = oci_parse($con, $sql_insert);
      $runselect = oci_execute($query_id1);
      if ($runselect) {
        echo "<h3 style='text-align: center;'><u><span style='font-family: MS Shell Dlg \32 ;'>!!!!!  Congratulations! You have Signed Up successfully!!!!!</span></u></h3>";
      }
      else 
      {
      $er=oci_error($query_id1);
      echo "Query not executed.<br>";
      echo $er['message'];
      }
    }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ?>
  </body>
</html>


<style>
.header{
  font-size: larger;
}
</style>