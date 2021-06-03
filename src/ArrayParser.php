<?php

class ArrayParser
{
	/**
	*This function is used to search for a date, a priority and tags and gather them in a single array.
	*@param string $input : the text we are searching in.
	*@return array $output[]: the results separated in an array.
	**/
    public static function Parse(string $input)
    {	
    	/** 
    	*We create an instance of all of our parsing classes.
    	*We execute the parsing function of one of the object:
    	* - if the resulting array contains the searched element, we add them in the final array and execute the function of the next object on the resulting text.
    	* - if not we execute the function of the next object on the resulting text.
    	**/	    
	    $result = DayDate::isDate($input);
	    $output["input"] = $input;
	    $output["text"] = $result["text"];	
	    if (isset($result["date"])){
		    $output["date"] = $result["date"];
		    $output["text"] = $result["text"];			
	    }
	    $result = Tag::getTag($output["text"]);
	    if (isset($result["tags"])){
		    $output["tags"] = $result["tags"];
		    $output["text"] = $result["text"];				
	    }
	    $result = Priority::getPriority($output["text"]);
	    if (isset($result["priority"])){
		    $output["priority"] = $result["priority"];
		    $output["text"] = $result["text"];				
	    }
	    return $output;
    }
}

?>