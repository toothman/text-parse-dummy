<?php

class Tag
{

	public function getTag($input)
	{
		if(preg_match("#\#\w+#", $input))
		{
			preg_match("#\#\w+#",$input,$result);
            $output['tag'] = $result[0];            
			$output['text'] = preg_replace("#\#\w+#","",$input);
			echo $output['text'];
			return $output;
		}
		else
		{
			$output['text'] = $input;
			return $output;
		}
	}
}

?>