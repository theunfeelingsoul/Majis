<?php 
	
	include "../database.php";
	include "../functions/query.func.php";

	if ($_GET['q'] == "no_of_porb") {

        $sql = "SELECT 
                count(*) AS count_by_month,
                MONTH(`prob_date`) AS month   
                FROM `faci_problems` 
                GROUP BY MONTH(`prob_date`)";
               $data = false;

        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

        // add the data to an array
        while ($row = mysqli_fetch_assoc($result)) {  
            $data[] = $row;
        }

        // create an array with 12 positions
        $o = array(0,0,0,0,0,0,0,0,0,0,0,0);

        // splice the darray from the query into the empty array created
        foreach ($data as $key => $value) {
        	$inserted = (int)$value['count_by_month']; 
			unset($o[$value['month']]); // unset the array at position to be spliced.
			array_splice( $o, $value['month'], 0, $inserted ); 
        }

        // encode the array to json
        echo json_encode($o);

	}elseif($_GET['q'] == "summary"){
        $f_no_wor=(int)countWhere('faci_problems','status',0);
        $f_yes_wor=(int)countWhere('faci_problems','status',1);
        $prob_rptd=(int)countAll('faci_problems');

        $o = array(
            'f_no_wor' =>$f_no_wor , 
            'f_yes_wor' =>$f_yes_wor , 
            'prob_rptd' =>$prob_rptd 
            );

        echo json_encode($o);

    }


 ?>