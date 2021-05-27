<?php



class ArrayParser
{
	

	public function parse($input)
	{
		$date = new DayDate;
		$tag = new Tag;
		$priority = new Priority;

		$result = $date->isDate($input);
		$output["input"] = $input;
		$output["text"] = $result["text"];	
		if(isset($result["date"]))
		{
			$output["date"] = $result["date"];
			$output["text"] = $result["text"];			
		}
		$result = $tag->getTag($result["text"]);
		if(isset($result["tag"]))
		{
			$output["tag"] = $result["tag"];
			$output["text"] = $result["text"];				
		}
		$result = $priority->getPriority($result["text"]);
		if(isset($result["priority"]))
		{
			$output["priority"] = $result["priority"];
			$output["text"] = $result["text"];				
		}
		return $output;

	}
}

?>