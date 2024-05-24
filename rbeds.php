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
        	<li><a href="dashboard.php">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="patients.php">PATIENTS</a></li>
        	<li><a href="beds.php" >BEDS</a></li>
            <li><a href="rbeds.php" class="active">RESERVE BEDS</a></li>
        	<li class="logout"><a href="logout.php">LOGOUT</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="rbeds.php" class="active">VIew All Reserve Beds</a></li>
                    	<li><a href="add-rbed.php">Add New Reserve Bed</a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2>View All Reserve Beds</h2>
                
                <div id="main">
					<h3>Available Beds</h3>
                    	<table cellpadding="0" cellspacing="0">
							<tr>
                                <td><b>Reserve Bed ID</b></td>
                                <td><b>Type</b></td>
                                <td><b>Ward</b></td>
                            </tr> 
                            <?php
								$result=mysqli_query($server,"SELECT * FROM rbeds ORDER BY rbed_id DESC");
								while($row=mysqli_fetch_assoc($result))
								{
									echo"<tr class=odd>
                                	<td>$row[rbed_id]</td>
                                	<td>$row[type]</td>
                                	<td>$row[ward]</td>
                            		</tr>";
								}
							?>                       
                        </table>
                        <br /><br />
                </div>
                <!-- // #main -->
 <?php
	require_once('footer.php');
?>               