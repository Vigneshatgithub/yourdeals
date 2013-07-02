<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?> - Celebrity Profiles</title>

</head>
<body>
	<?php
	/*echo $profile_data['person_name'];
	echo $profile_data['short_bio'];
	*/
	
	//echo var_dump($profile_data);
	echo json_encode($profile_data);
	?>
</body>
</html>