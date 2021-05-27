<?php

class DayDate
{
	private $word = [
  		"Heute",
  		"Gestern",
  		"Vorgestern",
  		"Morgen",
  		"Übermorgen"
		];

	public function isDate($input)
	{
		foreach ($this->word as $value) 
		{
			if (preg_match("#". $value ."#i", $input,$result)) 
				{
					$output['date']  = $this->calculateDate($value);
					$output['text'] = preg_replace("#". $result[0]. "#","",$input);
					return $output;					
				}

		}
		if(preg_match("#[0-3][0-9]\.[0-1][0-9]\.[0-9]{4}#", $input,$result))
		{
			$output['date'] = $result[0];
			$output['text'] = preg_replace("#[0-3][0-9]\.[0-1][0-9]\.[0-9]{4}#","",$input);
			return $output;
		} 
		else
		{
			$output['text'] = $input;
			return $output;
		}
		
	}

	public function calculateDate($date)
	{
		switch ($date) {			
			case 'Heute':
				$date = date("d-m-Y");
				return $date;
				break;
			case 'Morgen':
				$date = date("d-m-Y");
				$finalDate = date("d-m-Y", strtotime($date. ' +1 day'));
				return $finalDate;
				break;
			case 'Übermorgen':
				$date = date("d-m-Y");
				$finalDate = date("d-m-Y", strtotime($date. ' +2 day'));
				return $finalDate;
				break;
			case 'Gestern':
				$date = date("d-m-Y");
				$finalDate = date("d-m-Y", strtotime($date. ' -1 day'));
				return $finalDate;
				break;
			case 'Vorgestern':
				$date = date("d-m-Y");
				$finalDate = date("d-m-Y", strtotime($date. ' -2 day'));
				return $finalDate;
				break;			
		}
	}
}