<?php 
	
	# Update user profile
	if (isset($_POST['edit']) && $_POST['_action_'] == 'TRUE') {
		$query  = "UPDATE users SET user_firstname='" . $_POST['firstname'] . "', user_lastname='" . $_POST['lastname'] . "', user_email='" . $_POST['email'] . "', user_name='" . $_POST['username'] . "', user_country='" . $_POST['country'] . "', user_archive='" . $_POST['archive'] . "'";
        $query .= " WHERE id=" . (int)$_POST['edit'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($MySQL, $query);
		# Close MySQL connection
		@mysqli_close($MySQL);
		
		$_SESSION['message'] = '<p>You successfully changed user profile!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=1");
	}
	# End update user profile
	
	# Delete user profile
	if (isset($_GET['delete']) && $_GET['delete'] != '') {
	
		$query  = "DELETE FROM users";
		$query .= " WHERE id=".(int)$_GET['delete'];
		$query .= " LIMIT 1";
		$result = @mysqli_query($MySQL, $query);

		$_SESSION['message'] = '<p>You successfully deleted user profile!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=1");
	}
	# End delete user profile
	
	
	#Show user info
	if (isset($_GET['id']) && $_GET['id'] != '') {
		$query  = "SELECT * FROM users";
		$query .= " WHERE user_id=".$_GET['id'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
		print '
		<h2>User profile</h2>
		<p><b>First name:</b> ' . $row['user_firstname'] . '</p>
		<p><b>Last name:</b> ' . $row['user_lastname'] . '</p>
		<p><b>Username:</b> ' . $row['user_name'] . '</p>';
		$_query  = "SELECT * FROM countries";
		$_query .= " WHERE country_code='" . $row['user_country'] . "'";
		$_result = @mysqli_query($MySQL, $_query);
		$_row = @mysqli_fetch_array($_result);
		print '
		<p><b>Country:</b> ' .$_row['country_name'] . '</p>
		<p><b>Date:</b> ' . pickerDateToMysql($row['user_date']) . '</p>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	#Edit user profile
	else if (isset($_GET['edit']) && $_GET['edit'] != '') {
		if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
			$query  = "SELECT * FROM users";
			$query .= " WHERE user_id=".$_GET['edit'];
			$result = @mysqli_query($MySQL, $query);
			$row = @mysqli_fetch_array($result);
			$checked_archive = false;
			
			print '
			<h2><b>Edit user profile<b></h2>
			<form action="" id="registration_form" name="registration_form" method="POST">
				<input type="hidden" id="_action_" name="_action_" value="TRUE">
				<input type="hidden" id="edit" name="edit" value="' . $_GET['edit'] . '">
				
				<label for="fname">First Name:</label>
				<input type="text" id="fname" name="firstname" value="' . $row['user_firstname'] . '" placeholder="Your name.." required><br>
				<label for="lname">Last Name:</label>
				<input type="text" id="lname" name="lastname" value="' . $row['user_lastname'] . '" placeholder="Your last natme.." required><br>
					
				<label for="email">User E-mail:</label>
				<input type="email" id="email" name="email"  value="' . $row['user_email'] . '" placeholder="Your e-mail.." required><br>
				
				<label for="username">Username:<small></small></label>
				<input type="text" id="username" name="username" value="' . $row['user_name'] . '" pattern=".{5,10}" placeholder="Username.." required><br>
				
				<!--	<label for="country">Country</label><br>
			<select name="country" id="country">
					<option value="">Odaberite</option>';
					#Select all countries from database webprog, table countries
					$_query  = "SELECT * FROM countries";
					$_result = @mysqli_query($MySQL, $_query);
					while($_row = @mysqli_fetch_array($_result)) {
						print '<option value="' . $_row['country_code'] . '"';
						if ($row['country'] == $_row['country_code']) { print ' selected'; }
						print '>' . $_row['country_name'] . '</option>';
					}
				print '
				</select> -->
				<br>
				<label for="archive">Archive:</label><br/>
				<input type="radio" name="archive" value="Y"'; if($row['user_archive'] == 'Y') { echo ' checked="checked"'; $checked_archive = true; } echo ' /> YES &nbsp;&nbsp;
				<input type="radio" name="archive" value="N"'; if($checked_archive == false) { echo ' checked="checked"'; } echo ' /> NO
				
				<hr>
				
				<input type="submit" value="Submit">
			</form>
			<br>
			<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
		}
		else {
			print '<p>Zabranjeno</p>';
		}
	}
	else {
		print '
		<h2>List of users</h2>
		<div id="users">
			<table>
				<thead>
					<tr>
						<th width="16"></th>
						<th width="16"></th>
						<th width="16"></th>
						<th>First name</th>
						<th>Last name</th>
						<th>E mail</th>
						<th>Država</th>
						<th width="16"></th>
					</tr>
				</thead>
				<tbody>';
				$query  = "SELECT * FROM users";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '
					<tr>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;id=' .$row['user_id']. '"><img src="img/user.png" alt="user"></a></td>
						<td>';
							if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
								print '<a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['user_id']. '"><img src="img/edit.png" alt="uredi"></a></td>';
							}
						print '
						<td>';
							if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
								print '<a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['user_id']. '"><img src="img/delete.png" alt="obriši"></a>';
							}
						print '	
						</td>
						<td><strong>' . $row['user_firstname'] . '</strong></td>
						<td><strong>' . $row['user_lastname'] . '</strong></td>
						<td>' . $row['user_email'] . '</td>
						<td>';
							$_query  = "SELECT * FROM countries";
							$_query .= " WHERE country_code='" . $row['user_country'] . "'";
							$_result = @mysqli_query($MySQL, $_query);
							$_row = @mysqli_fetch_array($_result, MYSQLI_ASSOC);
							print $_row['country_name'] . '
						</td>
						<td>';
							if ($row['user_archive'] == 'Y') { print '<img src="img/inactive.png" alt="" title="" />'; }
                            else if ($row['user_archive'] == 'N') { print '<img src="img/active.png" alt="" title="" />'; }
						print '
						</td>
					</tr>';
				}
			print '
				</tbody>
			</table>
		</div>';
	}
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>