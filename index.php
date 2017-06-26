<html>
<head>
	<meta charset="UTF-8">
	<title>PHP prueba</title>
</head>
<body>
	<?php
	////php -S 127.0.0.1:8000
		$teamsList = array("A", "B", "C", "D", "E");
		$teamsLength = count($teamsList);
		$days = [];
		

		if($teamsLength % 2 == 0){
			//1. function odd numbers shift of 2 number.Receives an array of odd numbers and distribute the first round for each day.
			for($x = 0; $x < $teamsLength; $x++){
			$first = array_splice($teamsList, 0, 1);
			$added = array_push($teamsList, $first[0]);
			array_push($days,$teamsList);	
			}
		} else {
			//2. function even number shift of 1 team.Receives an array as a parameter and distribute the first round into days.
			for($x = 0; $x < $teamsLength; $x++){
			$firstTwo = array_splice($teamsList, 0, 2);
			$added = array_push($teamsList, $firstTwo[0], $firstTwo[1]);
			// should add this to a day object
			array_push($days,$teamsList);
			};
		}

//3.print the team playing even number of teams
				// $daysLength = count($days);
//4.print the team playing even number of teams
		$daysLength = count($days);
		if ($daysLength%2 == 0){
			 $j = 0 ;
					for($i = 0; $i < $daysLength; $i++){
					// //even
						$dayGame = $days[$i];
						echo  "day: " ;
						echo $i+1;
						// print_r($dayGame);
						echo "<br/>";
						$dayGameLength = count($dayGame);
						for ($j = 0; $j < $dayGameLength/2; $j++){
							if($dayGameLength > 0){
								$first = array_shift($dayGame);
	    						$last = array_pop($dayGame);
	    					echo $first . " vs " . $last;
	    					echo "<br/>";
							}
							
						};
					}
		} else {
			$j = 0 ;
					for($i = 0; $i < $daysLength; $i++){
					// //even
						$dayGame = $days[$i];
						echo  "day: " ;
						echo $i+1;
						// print_r($dayGame);
						echo "<br/>";
						$dayGameLength = count($dayGame);
						$removeLast = array_pop($dayGame);
						for ($j = 0; $j < $dayGameLength/3; $j++){

							if($dayGameLength > 0){
								$first = array_shift($dayGame);
	    						$last = array_pop($dayGame);
	    					echo $first . " vs " . $last;
	    					echo "<br/>";
							}
							
						};
					}

	}
				
				
	

	?>
</body>
</html>