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
    <form name="input" action="add_checklist.php" method="post">
        <table style="text-align: left; margin-left: auto; margin-right: auto; background-color: #d4d4d4; width: 500px; height: 200px;"

          border="1">
          <tbody>
            <tr align="center">
              <th colspan="2"> Plan Form </th>
            </tr>
              <td style="text-align: center;">Plan ID</td>
              <td>
                <div style="text-align: center;"> <input name="p_id" type="number">
                </div>
              </td>
	    </tr>
              <td style="text-align: center;">Customer ID</td>
              <td>
                <div style="text-align: center;"> <input name="customer_id" type="number" placeholder="001">
                </div>
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">Plan type</td>
              <td style="text-align: center;"> <input name="pt_id" type="text" placeholder="Wishful Shrinking..."><br>
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">Starting Date</td>
              <td>
                <div style="text-align: center;"> <input name="sd_id" type="text" ><br>
                </div>
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">Ending Date</td>
              <td>
                <div style="text-align: center;"> <input name="ed_id" type="text"><br>
                </div>
              </td>
            </tr>  
              <tr>
              <td style="text-align: center;">Plan Duration Type</td>
              <td>
                <div style="text-align: center;"> <input name="pd_id" type="text" placeholder="Monthly basis..."><br>
                </div>
              </td>
            </tr>
            <tr>

            <tr>
              <td style="text-align: center;"> <br>
              </td>
              <td style="text-align: center;"> <input value="Add Plan" type="submit" name="create_plan">
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
 

    if (isset($_POST["create_plan"]))
     {
      $p_id=$_POST["p_id"];
      if($p_id!=NULL)
      {
      $p_id=$_POST["p_id"];
      $customer_id=$_POST["customer_id"];
      $pt_id=$_POST["pt_id"];
      $sd_id=$_POST["sd_id"];
      $ed_id=$_POST["ed_id"];
      $pd_id=$_POST["pd_id"];

      $sql_insert = "insert into plans values ('{$p_id}','{$customer_id}','{$pt_id}','{$sd_id}','{$ed_id}','{$pd_id}')";
      $query_id3 = oci_parse($con, $sql_insert);
      $runselect = oci_execute($query_id3);
      if ($runselect) {
        echo "<h3 style='text-align: center;'><u><span style='font-family: MS Shell Dlg \32 ;'>!!!!!  Your Plan Record Has Been Added Successfully!!!!!</span></u></h3>";
      }
      else 
      {
      $er=oci_error($query_id3);
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