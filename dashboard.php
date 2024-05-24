<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		require_once('header.php');
	}
?>
        <ul id="mainNav">
        	<li><a href="dashboard.php" class="active">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="patients.php">PATIENTS</a></li>
        	<li><a href="beds.php">BEDS</a></li>
			<li><a href="rbeds.php">RESERVE BEDS</a></li>
        	<li class="logout" ><a href="logout.php">LOGOUT</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a>Welcome, <?php echo $_SESSION['name']; ?></a></li> 
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2>Dashboard</h2>
                
                <div id="main">
					<h3>Statistics</h3>
               	  <table>
                  <?php
				  	$result=mysqli_query($server,"SELECT COUNT(pat_id) FROM patients");
					$row=mysqli_fetch_row($result);
					
					$result2=mysqli_query($server,"SELECT COUNT(bed_id) FROM beds");
					$row2=mysqli_fetch_row($result2);
					
					$result3=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id>0");
					$row3=mysqli_fetch_row($result3);
					
					$result4=mysqli_query($server,"SELECT COUNT(bed_id) FROM pat_to_bed WHERE bed_id>0");
					$row4=mysqli_fetch_row($result4);
					
					$result5=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id=0 AND bed_id!='none'");
					$row5=mysqli_fetch_row($result5);
					
					$row6[0] = $row2[0] - $row4[0];
					
					$result7=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id='none'");
					$row7=mysqli_fetch_row($result7); 
					
					
					
  							echo"<tr>
    							<td align=center valign=middle><b>Patients</b></td>
    							<td align=center valign=middle><b>Beds</b></td>
  							</tr>
  							<tr>
    							<td align=center valign=middle>Total - $row[0]</td>
    							<td align=center valign=middle>Total - $row2[0]</td>
							</tr>
  							<tr>
    							<td align=center valign=middle>Admitted - $row3[0]</td>
    							<td align=center valign=middle>Occupied - $row4[0]</td>
							</tr>
  							<tr>
   		 						<td align=center valign=middle>Discharged - $row5[0]</td>
    							<td align=center valign=middle>Vacant - $row6[0]</td>
							</tr>
  							<tr>
   							  <td align=center valign=middle>Unassigned to bed - $row7[0]</td>
    							<td align=center valign=middle>&nbsp;</td>
							</tr>";
					?>
				  </table>
                        <br /><br />
                </div>
                <!-- // #main -->
 <?php
	require_once('footer.php');
?>               