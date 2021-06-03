<?php

class Priority
{
    /**
    *This function takes a string as parameter, search for a priority and return an array.
    *@param string $input 
    *@return array $outpu[]
    *We consider that only the first priority will be removed.
    **/
    public static function getPriority(string $input) :array
    {
    	/**
    	*It check first if the pattern of a priority is detected in the input string:
        * - If yes: it extract the priority, then the number of the priority, split both of the informations and send them back in an array.
        * - If no: it just send back the original input string. 
    	**/
	    if (preg_match("#\!p\d#i", $input)){		
	        preg_match("#\!p\d#i",$input,$result);	
            preg_match("#\d#",$result[0],$number);
            $output['priority'] = $number[0];            
		    $output['text'] = preg_replace("#\s?\!p\d#i","",$input,1);
		    return $output;
	    } else {	
		    $output['text'] = $input;
		    return $output;
	    }
	}
}