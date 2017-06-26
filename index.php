<html>
<head>
	<meta charset="UTF-8">
	<title>PHP prueba</title>
</head>
<body>
	<?php
	////php -S 127.0.0.1:8000
		$teamsList = array("CA Brive", "Lyon OU", "Oyonnax Rugby", "Racing 92", "Stade Rochelais", "Stade Français Paris", "Stade Toulousain");
		$teamsLength = count($teamsList);
		$days = [];
		
// FUNCTION 1: This should probably be a function that determines the total number of team, and creates the teamlist per day
	//1. even numbers shift of 1 team.Receives an array of even numbers and distribute the first round for each day.
		if($teamsLength % 2 == 0){
			// a. if the total number is less or equal to 4
			if($teamsLength <= 4){
				for($x = 0; $x < $teamsLength; $x++){
				$first = array_splice($teamsList, 0, 1);
				$added = array_push($teamsList, $first[0]);
				array_push($days,$teamsList);
				}	
			//b. if it is superior to 4
			} else {
				for($x = 0; $x < $teamsLength; $x++){
				// pop always first number
				$poppedFirstNumber = array_shift($teamsList);
				// shift 1 number
				$first = array_splice($teamsList, 0, 1);
				$added = array_push($teamsList, $first[0]);
				// add popped team to the array at the same position from before
				array_unshift($teamsList, $poppedFirstNumber);
				array_push($days,$teamsList);
				}	
			}
	//2. odd number shift of 2 teams.
		} else {
			for($x = 0; $x < $teamsLength; $x++){
			$firstTwo = array_splice($teamsList, 0, 2);
			$added = array_push($teamsList, $firstTwo[0], $firstTwo[1]);
			array_push($days,$teamsList);
			};
		}


// FUNCTION 2: organize matches per day.Would have to be called twice....: not really DRY at the moment.
		$daysLength = count($days);
		// 1. Organize teams if team number is less than 4 and is even
		if ($daysLength%2 == 0 && $daysLength <= 4){
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
		// 2. Organize teams if team number is more than 4 and is even
		} elseif ($daysLength%2 == 0 && $daysLength > 4) {
			// echo "superior to 4";
			// print_r($days);
			$j = 0 ;
			
					for($i = 0; $i < $daysLength -1 ; $i++){
					//a. shift the first
						$first_popped = array_shift($days[$i]);
					//b. shift the second
						$second_popped = array_shift($days[$i]);
						// print_r($first_popped);
						// print_r($second_popped);
						// print_r($days);
					//c. pair up the rest and print
						$dayGame = $days[$i];
						echo "<br/>";
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
						}
						//add the first_two shifted at the end of the rest
						echo $first_popped . " vs " . $second_popped;
					}
			
		// 3. Organize teams if team number is odd 
		}else{
			$j = 0 ;
					for($i = 0; $i < $daysLength; $i++){
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