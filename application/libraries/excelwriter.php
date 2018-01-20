<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once 'PEAR.php';
$path  =  APPPATH.'libraries/excel/';
require_once $path.'Workbook.php';

  class Excelwriter{
	  var $workbook   = "";
	  var $worksheet  = array();
	  var $sheet_index  =1;
	  var $formating ="";
     function  Excelwriter($xls_config= array()){
		 	$file_name = "";
	    $this->workbook = new Spreadsheet_Excel_Writer_Workbook($file_name);
		$file_name = "course.xls";
		if(isset($xls_config['file_name'])){
		 $file_name = $xls_config['file_name'];
		 }
		$this->HeaderingExcel($file_name);

	 }
	
	 function addWorksheet($sheet_index = 0,$sheet_name =""){
		   $this->worksheet[$sheet_index]  =& $this->workbook->addWorksheet($sheet_name);
	 }
	 
	  function addFormat($properties = array()){
		   $this->formating   = NULL;
		   $this->formating  =& $this->workbook->addFormat($properties);
		   return $this->formating;
	 }
	     /**
    * Sets the font size 
    *
    * @access public
    * @param integer $size The font size (in pixels I think).
    */
	   function setSize($size=""){
	     $this->formating->setSize($size);
	  }
	  
	  function setAlign($location=""){
	       $this->formating->setAlign($location);
	  }
	  
	  function setColor($color=""){
	     $this->formating->setColor($color);
	  }
	  
	   function setPattern($arg=1){
	      $this->formating->setPattern($arg);
	  }
	   function setFgColor($color=""){
	       $this->formating->setFgColor($color);
	  }
	   function setMerge(){
	      $this->formating->setMerge();
	  }
	    function setLocked(){
	      $this->formating->setLocked();
	    }
		 function setUnLocked (){
	      $this->formating->setUnLocked();
	    }
		
	  
	  function setTextWrap(){
	      $this->formating->setTextWrap();
	  }
	 function setFontFamily($font_family="")
     {
		  $this->formating->setFontFamily($font_family);
	 }
	 function setHAlign($location)
     {
	     $this->formating->setHAlign($location);
	 }
	 
	  function setVAlign($location)
     {
	     $this->formating->setVAlign($location);
	 }
	 
	 
    /**
    * Bold has a range 0x64..0x3E8.
    * 0x190 is normal. 0x2BC is bold.
    *
    * @access public
    * @param integer $weight Weight for the text, 0 maps to 0x190, 1 maps to 0x2BC. 
                             It's Optional, default is 1 (bold).
    */
	   function setBold($weight= ""){
	       $this->formating->setBold($weight);
	  }
	  //Sets the width for the right border of the cell
	  function setRight($style=""){
	    $this->formating->setRight($style);
	  }
	  //Sets the width for the left border of the cell
	  function setLeft($style=""){
	    $this->formating->setLeft($style);
	  }
	  //Sets the width for the top border of the cell
	  function setTop($style=""){
	    $this->formating->setTop($style);
	  }
	  //Sets the width for the bottom border of the cell
	   function setBottom($style=""){
	    $this->formating->setBottom($style);
	  }
	  
	  //Set cells borders to the same style
	  function setBorder($style=""){
	    $this->formating->setBorder($style);
	  }
	   function setBgColor($color=""){
	      $this->formating->setBgColor($color);
	  }
	  function setBorderColor($color=""){
	    $this->formating->set_border_color($color);
	  }
       function setVersion($version="")
       {
	      $this->workbook->setVersion($version); 
	   }

	 function setColumn($sheet_index = 0,$firstcol, $lastcol, $width, $format = 0, $hidden = 0,$level=0){
	   $this->worksheet[$sheet_index]->setColumn($firstcol, $lastcol, $width,$format,$hidden,$level);
	 }
	 
	 function setRow($sheet_index = 0,$row, $height, $format = 0, $hidden = false, $level = 0){
		 $this->worksheet[$sheet_index]->setRow($row, $height, $format);
	 }
       
	 function writeString($sheet_index = 0,$row, $col, $str, $format = 0){
		  $this->worksheet[$sheet_index]->writeString($row, $col,$str,$format);
	 }

	 function write($sheet_index = 0,$row, $col, $token, $format = 0){
		  $this->worksheet[$sheet_index]->write($row, $col,$token,$format);
	 }

	 function writeNumber ($sheet_index = 0,$row, $col, $num, $format = 0){
		   $this->worksheet[$sheet_index]->writeNumber ($row, $col,$num,$format);
	 }

	 function writeFormula($sheet_index = 0,$row, $col, $formula, $format = 0){
		    $this->worksheet[$sheet_index]->writeFormula($row, $col,$formula,$format);
 	
	 }
     function writeBlank($sheet_index = 0,$row, $col, $format = 0){
	       $this->worksheet[$sheet_index]->writeBlank($row, $col,$format);
	 
	 }
	 function writeUrl($sheet_index = 0,$row, $col, $url, $string = '', $format = 0){
			   $this->worksheet[$sheet_index]->writeUrl($row, $col,$url,$string,$format);
		 
		 }
	  function writeNote($sheet_index,$row, $col, $note){
		$this->worksheet[$sheet_index]->writeNote($row, $col,$note);
      } 
		 
		 	 
	 function set_merge($sheet_index = 0,$first_row, $first_col, $last_row, $last_col){
			   $this->worksheet[$sheet_index]->setMerge($first_row, $first_col,$last_row,$last_col);
		 
	 }
 //	This is an Excel97/2000 method. It is required to perform more complicated
	function mergeCells($sheet_index = 0,$first_row, $first_col, $last_row, $last_col)
	{
				$this->worksheet[$sheet_index]->mergeCells($first_row, $first_col,$last_row,$last_col);
	}
	 function getName ($sheet_index=0){
		 return $this->worksheet[$sheet_index]->getName();
	  }
	   function getData($sheet_index=0){
		  $this->worksheet[$sheet_index]->get_data();
	  }
	  
	  function setInputEncoding($sheet_index,$encoding="utf-8")
     {
	      $this->worksheet[$sheet_index]->setInputEncoding($encoding);
	 }
	 
	   function setOutline($sheet_index, $visible=true , $symbols_below=true , $symbols_right=true , $auto_style=false)
     {
	      $this->worksheet[$sheet_index]->setOutline($visible=true , $symbols_below=true , $symbols_right=true , $auto_style=false);
	 }
	 
	 function setHeader($sheet_index,$string,$margin = 0.50)
    {
	        $this->worksheet[$sheet_index]->setHeader($string, $margin);
	}
	 function writeRow($sheet_index,$row, $col, $val, $format = null)
    {
    	$this->worksheet[$sheet_index]->writeRow($row, $col,$val,$format);
	}
     function writeCol($sheet_index,$row, $col, $val, $format = null)
    {
    	$this->worksheet[$sheet_index]->writeRow($row, $col,$val,$format);
	}
	 
	 
	 function worksheets(){
	   return  $this->workbook->worksheets();
	 }
	 
	 
	 function close(){
		 $this->workbook->close();
	 }
	 
	function HeaderingExcel($filename) {
      header("Content-type: application/vnd.ms-excel;charset=utf-8");
      header("Content-Disposition: attachment; filename=$filename" );
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
      header("Pragma: public");
     }

	 
	 
 }
 
 
?>