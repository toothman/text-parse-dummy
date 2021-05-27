<?php



class Priority
{
	private $text;
	private $priority; 

	public function getPriority($input)
	{
		if(preg_match("#\!p\d#i", $input))
		{
			preg_match("#\!p\d#i",$input,$result);
            preg_match("#\d#",$result[0],$number);
            $output['priority'] = $number[0];            
			$output['text'] = preg_replace("#\!p\d#i","",$input);
			return $output;
		}
		else
		{	
			$output['text'] = $input;
			return $output;
		}
	}
}