<?php 
$out = array();
    	$out[] = array(		"id" 	=> 256,
					    	"title" => "Event 1",
					    	"url" 	=> "http://example.com",
					    	"class" => "event-important",
					    	"start" => 1363155300000, 
					    	"end" 	=>  1363227600000  );
    	
    	$out[] = array(	"id" => "293",
    	"title" => "This is warning class event with very long title to check how it fits to evet in day view",
    	"url" => "http://www.example.com/",
    	"class" => "event-warning",
    	"start" => "1362938400000",
    	"end" => "1363197686300"
    	);

    	$out[] = array("id" => "276",
    		"title" => "Short day event",
    		"url" => "http://www.example.com/",
    		"class" => "event-success",
    		"start" => "1363245600000",
    		"end" => "1363252200000"
    	);
    	
    	$out[] = array(
    	
    		"id" => "294",
    		"title" => "This is information class ",
    		"url" => "http://www.example.com/",
    		"class" => "event-info",
    		"start" => "1363111200000",
    		"end" => "1363284086400"
    	);		
    	$out[] = array(
    		"id" => "297",
    		"title" => "This is success event",
    		"url" => "http://www.example.com/",
    		"class" => "event-success",
    		"start" => "1363234500000",
    		"end" => "1363284062400"
    	);
    	$out[] = array(
    		"id" => "54",
    		"title" => "This is simple event",
    		"url" => "http://www.example.com/",
    		"class" => "",
    		"start" => "1363712400000",
    		"end" => "1363716086400"
    	);
    	$out[] = array(
    		"id" => "532",
    		"title" => "This is inverse event",
    		"url" => "http://www.example.com/",
    		"class" => "event-inverse",
    		"start" => "1364407200000",
    		"end" => "1364493686400"
    	);
    	$out[] = array(
    		"id" => "548",
    		"title" => "This is special event",
    		"url" => "http://www.example.com/",
    		"class" => "event-special",
    		"start" => "1363197600000",
    		"end" => "1363629686400"
    	);
    	$out[] = array(
    		"id" => "295",
    		"title" => "Event 3",
    		"url" => "http://www.example.com/",
    		"class" => "event-important",
    		"start" => "1364320800000",
    		"end" => "1364407286400"
	    );
		//$this->PAR($arr);
    	echo json_encode(array('success' => 1, 'result' => $out));
		exit;
		
?>