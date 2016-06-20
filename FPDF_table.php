<?php

//Page width in points
define("PAGEWIDTH",595.28*25.4/72.0);

class FPDF_Table {
	
		private $num_columns;
///////////////////////////////////////PUBLIC FUNCTIONS////////////////////////////////////////////////

	//Constructor: this ,setTableHeader(), the adding of one single row and print() 
	//are enough for a correct printing of the table (with default formatting values)
	public function FPDF_Table($pdf){
		$this->pdf=$pdf;
		$this->rows_data=array();
		//Default settings (they all can be modified before the printing) 
		$this->setCellHeight(12);
		$this->default_cell_width=30;
		$this->baseColor=array(255,255,255);
		$this->setDataColor(0,0,0);
		$this->margin_left_right=20;
		$this->setTableAlign("LEFT");
		$this->setMarginLeft(20);
		$this->setInitialVerticalPosition($this->pdf->GetY()+20);
		$this->setHeaderColors(100,100,100,255,255,255);
		$this->setInnerMargin(5);
	}
	
	//Sets the header values. The method is required, because it sets the number of columns
	public function setTableHeader($values){
		$this->setColumns(count($values));
		$this->addRow($values);
	}
	
	//Adds row data, $values is an array with size equal to the number of columns
	public function addRow($values){
		if (count($values)!=($this->num_columns)){
			$row_exploded=explode(",",$values);
			echo "The number of elements doesn't match the settings given in the constructor in row {$row_exploded}";
			exit();
		}
		else
		{
			$this->rows_data[]=$values;
		}
	}
	
	//Sets background color and text color (in order) of the header (not required, default values set in constructor
	public function setHeaderColors($r,$g,$b,$r1,$g1,$b1){
		if($this->checkColor($r)&&$this->checkColor($g)&&$this->checkColor($b))
			$this->headerColor=array($r,$g,$b);
		else
		{
			echo "Header color is incorrect";
			exit();
		}
		if($this->checkColor($r1)&&$this->checkColor($g1)&&$this->checkColor($b1))
			$this->headerTextColor=array($r1,$g1,$b1);
		else
		{
			echo "Header text color is incorrect";
			exit();
		}
	}
	
	public function setInnerMargin($inner_margin){
		if ($inner_margin>0){
			$this->inner_margin=$inner_margin;
		}
	}
	
	//Set the horizontal margin (both left and right)
	public function setMarginLeft($margin){
		$this->margin_left_right=$margin;
	}
	
	//Set the wished horizontal align (real assingment made before printing)
	public function setTableAlign($align){
		switch($align){
			case "RIGHT":
			case "CENTER":
				$this->align=$align;
				break;
			//If the parameter given is wrong, align is set to LEFT (default value)
			default:
				$this->align="LEFT";
				break;
		}
	}
	
	//Set the initial vertical position (from the top of the page, in points)
	public function setInitialVerticalPosition($posY){
		$this->posY=$posY;
		$this->posY_in=$posY;
	}
	
	//Set the color of the text to be written in every row
	public function setDataColor($r,$g,$b){
		if($this->checkColor($r)&&$this->checkColor($g)&&$this->checkColor($b))
			$this->dataColor=array($r,$g,$b);
		else
		{
			echo "<br/>Header color is incorrect";
			exit();
		}
	}
	
	//Sets the activation of alternate lines background and the chosen colors
	public function setColorsAlternateLines($r1,$g1,$b1,$r2,$g2,$b2){
		if($this->checkColor($r1)&&$this->checkColor($g1)&&$this->checkColor($b1)&&$this->checkColor($r2)&&$this->checkColor($g2)&&$this->checkColor($b2)){
			$this->baseColor=array($r1,$g1,$b1);
			$this->alternateColor=array($r2,$g2,$b2);
		}
		else
		{
			echo "<br/>Color Settings are wrong";
			exit();
		}
	}
	
	//Sets cell height in points
	public function setCellHeight($height){
		$this->cell_height=$height;
	}
	
	//Sets default cell width (same width for every cell)
	public function setDefaultCellWidth($width){
		if ($width>0){
			for($i=0;$i<$this->getColumns();$i++){
				$this->cell_width_settings[$i]=$width;	
			}
		}
	}
	
	//Sets the width of a specific column
	public function setCellWidth($column,$width){
		if (!empty($this->numColumns)){
			if (($column>0)&&($column<=$this->num_columns)&&($width>0))
				$this->cell_width_settings[$column]=$width;	
		}
		else
		{
			echo "You can't set a specific cell width before setting header properties";
		}
	}
	
	//Sets specific column align (number of columns starts from 0, align can be "LEFT", "RIGHT", "CENTER"
	public function setColumnAlign($column,$align){
		if (($column < 0)||	($column > ($this->num_columns))){
			echo "Incorrect Column Setting";	
			exit();
		}
		else
		{
			switch ($align) {
				case 'RIGHT':
				case 'CENTER':
					$this->column_alignment_settings[$column]=$align;
					break;
				default:
					$this->column_alignment_settings[$column]='LEFT';
					break;
			}
		}
		
	}
	
	//Prints the table (last function to be called)
	public function printTable(){
		$this->setHorizontalAlign($this->align);
		if (!count($this->rows_data)==0){
			$this->checkWidth();
			for($row=0; $row<count($this->rows_data); $row++){
				$values=$this->rows_data[$row];
				for($column=0; $column<($this->num_columns); $column++)
				{
					if ($this->pdf->GetStringWidth($values[$column])+2*$this->inner_margin>$this->cell_width_settings[$column]){
						echo " Value {$values[$column]} is too long to be written. Enlarge cell width";
						exit();
					}
					else
					{
						if($row==0){
							$this->pdf->SetFont('','B',''); 
							$this->pdf->SetTextColor($this->headerTextColor[0],$this->headerTextColor[1],$this->headerTextColor[2]); 
							$this->pdf->SetFillColor($this->headerColor[0],$this->headerColor[1],$this->headerColor[2]); 
						}
						else
						{
							$this->pdf->SetTextColor($this->dataColor[0],$this->dataColor[1],$this->dataColor[2]); 
							if($row%2==0){
								$this->pdf->SetFillColor($this->baseColor[0],$this->baseColor[1],$this->baseColor[2]); 
							}
							else
							{
								if(!empty($this->alternateColor)){
									$this->pdf->SetFillColor($this->alternateColor[0],$this->alternateColor[1],$this->alternateColor[2]); 
								}
								else
								{
									$this->pdf->SetFillColor($this->baseColor[0],$this->baseColor[1],$this->baseColor[2]); 
								}
							}
						}
						$this->pdf->Rect($this->posX,$this->posY-6, $this->cell_width_settings[$column], 12.0, 'DF');
						$alignment=$this->getColumnAlignment($column);
						switch ($alignment) {
							case "RIGHT":
								$this->pdf->Text($this->posX+$this->cell_width_settings[$column]-$this->pdf->GetStringWidth($values[$column])-$this->inner_margin,$this->posY,$values[$column]);
								break;
							case "CENTER":
								$this->pdf->Text($this->posX+(($this->cell_width_settings[$column]-$this->pdf->GetStringWidth($values[$column]))*0.5),$this->posY,$values[$column]);
								break;
							default:
								$this->pdf->Text($this->posX+$this->inner_margin,$this->posY,$values[$column]);
								break;
						}
						$this->posX+=$this->cell_width_settings[$column];
					}
				}
				$this->posY+=$this->cell_height;
				$this->posX=$this->posX_in;
			}
			$this->pdf->SetTextColor(0,0,0); 
			$this->pdf->SetFillColor(255,255,255); 
			$this->pdf->SetXY(20,$this->getFinalPositionY());
		}
		else
		{
			echo "No data inserted in table";	
			exit();
		}
	}
	
	
///////////////////////////////////////PRIVATE FUNCTIONS////////////////////////////////////////////////	
	
	//Sets the actual horizontal align, with the required checks
	private function setHorizontalAlign($align){
		if ($this->checkExceedsMargin()){
			switch($align){
				case "RIGHT":
					$this->posX=(PAGEWIDTH-$this->margin_left_right-$this->getTableWidth());
					$this->posX_in=$this->posX;
					break;
				case "CENTER":
					$this->posX=(PAGEWIDTH-($this->getTableWidth()))/2;
					$this->posX_in=$this->posX;
					break;
				default: //LEFT
					$this->posX=$this->margin_left_right;
					$this->posX_in=$this->posX;
					break;
			}
		}
		else
		{
			echo "Table Exceeds Margins";
			exit;
		}
	}
	
	//Sets the number of columns and default properties
	public function setColumns($num_columns){
		$this->num_columns=$num_columns;
		$column_alignment_settings=array();
		for ($i=0; $i<$num_columns; $i++){
			$column_alignment_settings[$i]="LEFT";
		}
		$this->column_alignment_settings=$column_alignment_settings;
		$cell_width_settings=array();
		for ($i=0; $i<$num_columns; $i++){
			$cell_width_settings[$i]=$this->default_cell_width;
		}
		$this->cell_width_settings=$cell_width_settings;
	}
	
	public function getColumns(){
		return ($this->num_columns);
	}
	
	//Checks if the component given is between 0 and 255
	private function checkColor($component){
		return ($component>=0&&$component<=255); 
	}
	
	//Return the alignment of the given column
	private function getColumnAlignment($column){
		return $this->column_alignment_settings[$column];
	}
	
	//Calculates table width with the settings given
	private function getTableWidth(){
		$table_width=0;
		for($l=0; $l<count($this->cell_width_settings); $l++){
			$table_width+=$this->cell_width_settings[$l];
		}
		return $table_width;
	}
	
	//Checks if the table fits the page and the margins set
	private function checkWidth(){
		if ($this->getTableWidth()>(PAGEWIDTH-2*$this->margin_left_right)){
			echo "Table doesn't fit the page and the margins set";
			exit();
		}
	}
	
	//Checks if the table fits the margins set
	private function checkExceedsMargin(){
		return (( 
			(PAGEWIDTH-$this->getTableWidth())
			/2
			)>$this->margin_left_right);
	}
	
	//Return final vertical position
	private function getFinalPositionY(){
		return $this->posY;
	}
	
	
}

?>
