<?php if (!defined('BASEPATH')) exit('No direct script access allowed');




class FileReader {
	/**
	 * Parse a file containing tab delimited formatted data.
	 *
	 * @access    public
	 * @param    string
	 * @return    array
	 */
	function parse_file($p_Filepath,$line_separator = "\n",$separator = "\t",$header=true) {
		
		$lines = file_get_contents($p_Filepath); 
		// debug($lines);
		// $lines = str_replace( array( "\r\n" , "\t" ) , array( "[NEW*LINE]" , "[tAbul*Ator]" ) , $lines );
		$lines = explode($line_separator,$lines);
		return $this->parse_lines($lines,$separator,$header);
		// return $lines;
		// echo '<pre>'.print_r($lines).'</pre>';
	}
	
	/**
	 * Parse an array of text lines containing CSV formatted data.
	 *
	 * @access    public
	 * @param    array
	 * @return    array
	 */
	function parse_lines($p_Lines,$separator,$header) {
		$content = FALSE;
		if($header){
			foreach($p_Lines as $line_num => $line ) {
				if( $line != '' ) { // skip empty lines
					$elements = explode($separator, $line);
					
					if( !is_array($content) ) { // the first line contains fields names
						$this->fields = $elements;
						$content = array();
					} else {
						$item = array();
						foreach( $this->fields as $id => $field ) {
							if( isset($elements[$id]) ) {
								$item[trim($field)] = trim($elements[$id]);
							}
						}
						$content[] = $item;
						
						
					}
					
					//echo '<pre>'.print_r($line).'</pre>';
				}
			}
		}else{
			foreach($p_Lines as $line ) {
				if( $line != '' ) { // skip empty lines
					$elements = explode($separator, $line);
					
					$content[] = $elements ;

				}
			}
		}
		
	   
		return $content;
	}
}