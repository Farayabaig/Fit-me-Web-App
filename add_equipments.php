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
    <form name="input" action="add_equipments.php" method="post">
        <table style="text-align: left; margin-left: auto; margin-right: auto; background-color: #d4d4d4; width: 500px; height: 200px;"

          border="1">
          <tbody>
            <tr align="center">
              <th colspan="2"> Equipment Info </th>
            </tr>
              <td style="text-align: center;">Equipment ID</td>
              <td>
                <div style="text-align: center;"> <input name="equipment_id" type="number">
                </div>
              </td>
	    </tr>
              <td style="text-align: center;">Exercise ID</td>
              <td>
                <div style="text-align: center;"> <input name="exe_id" type="number">
                </div>
              </td>
            </tr>
              <td style="text-align: center;">Equipment Name</td>
              <td>
                <div style="text-align: center;"> <input name="ëquipment_name" type="text" placeholder="Threadmill">
                </div>
              </td>
            </tr>
            <tr>

            <tr>
              <td style="text-align: center;"> <br>
              </td>
              <td style="text-align: center;"> <input value="Update" type="submit" name="create_equipment">
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
 

    if (isset($_POST["create_equipment"]))
     {
      $equipment_id=$_POST["equipment_id"];
      if($equipment_id!=NULL)
      {
      $equipment_id=$_POST["equipment_id"];
      $exe_id=$_POST["exe_id"];
      $equipment_name=$_POST["equipment_name"];

      
      $sql_insert = "insert into equipments values ('{$equipment_id}','{$exe_id}','{$equipment_name}')";
      $query_id3 = oci_parse($con, $sql_insert);
      $runselect = oci_execute($query_id3);
      if ($runselect) {
        echo "<h3 style='text-align: center;'><u><span style='font-family: MS Shell Dlg \32 ;'>!!!!!  Your Equipments Info Has Been Updated Successfully!!!!!</span></u></h3>";
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