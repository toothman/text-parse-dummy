<?php

class DayDate
{	
	//A premade list of all the words to search for a day. 
    private static $word = [
  	    "Heute",
  	    "Gestern",
  	    "Vorgestern",
  	    "Morgen",
  	    "Übermorgen"];
    /**
    *This function  search for two pattern of dates:
    * - a date in format dd.mm.yyy .
    * - a specific word for a day indication that are in the premade list. 
    *It return an array:
    * - if a pattern was found, the date corresponding and the text separated in an array.
    * - if not, the original input string in an array.
    *We consider that only the first date or word detected will be taken
    *Word has the priority on date. 
    *The priority of word is along the list e.g: if 'Heute' and 'Morgen' are in the string, only the 'Heute' will be taken as it is befor in the list.
    *@param string $input
    *@return array $output[]
    **/
    public static function isDate(string $input) :array
    {   
    	/**
    	*We go through the premade list and search if one of the words is matching in the input string:
    	*If yes, we use the function calculateDate to transform it into a date, split the word and the text, and return them in an array
    	*Then we search for the date pattern:
    	* - if we find one, we split them and return them in an array.
    	* - if not, we return the text in an array.
    	**/
        foreach (DayDate::$word as $value){
            if (preg_match("#". $value ."#i", $input,$result)){
                $output['date'] = DayDate::calculateDate($value);
                $output['text'] = preg_replace("#\s?". $result[0]. "#","",$input,1);
                return $output;					
            }
        }
        if (preg_match("#[0-3][0-9]\.[0-1][0-9]\.[0-9]{4}#", $input,$result)){ //The format of the date has to be dd.mm.yyyy .
            $output['date'] = $result[0];
            $output['text'] = preg_replace("#\s?[0-3][0-9]\.[0-1][0-9]\.[0-9]{4}#","",$input,1);
            return $output;
        } else {
            $output['text'] = $input;
            return $output;
        }		
    }
    
    /**
    *This function is used in the function isDate to get the date in the format dd-mm-yyyy from a word matching one in the premade list.
    *It is a simple switch case on the word with the corresponding calculation from today's date.
    *It return a date.
    *@param string $date
    *@return date $finalDate
    **/
    public static function calculateDate(string $date) :string
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