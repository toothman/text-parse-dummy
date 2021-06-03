<?php

class Tag
{   
/**
    *This function takes a string as parameter, search for tags and return an array.
    *@param string $input 
    *@return array $output[]
    **/
    public static function getTag($input) :array
    {   
        /**
    	*It check first if the pattern of a tag is detected in the input string:
        * - If yes: start a loop in case there are other tags. The loop split the tag add them to the string 'tags' of the output array, and update the 'text' array.
        * - If no: send back the original input string. 
    	**/    
        if (preg_match("#\#\w+#", $input)) {
            $output['tags'] = '';
            while (preg_match("#\#\w+#", $input)) {
                    preg_match("#\#\w+#",$input,$result);
                    preg_match("#\w+#",$result[0],$tags);
                    if ($output['tags'] == "") {
                    	$output['tags'] .= "" . $tags[0] . "";
                    } else {
                        $output['tags'] .= ", " . $tags[0] . "";  
                    }                             
                    $output['text'] = preg_replace("#\s?\#\w+#","",$input,1);
                    $input = $output['text'];               
                }
            return $output;                
        } else {
            $output['text'] = $input;
            return $output;
        }	    
    }
}

?>