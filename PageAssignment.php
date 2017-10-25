<?php
class Page{
	
	private $title = "";
	private $headAdditions = "";
	private $bodyAdditions = "";
	private $bottomAdditions = "";
	private $headHtml = "";
	private $bodyHtml = "";
	private $bottomHtml = "";
	
	function __construct($title){
		$this->title = $title;
	}
	
	function setTop(){
		$this->headHtml .= "<!doctype html><html>";
		$this->headHtml .= "<head><title>" . $this->title . "</title>";
		$this->headHtml .= $this->headAdditions;
		$this->headHtml .= "</head>";
	}
	
	function getTop(){
		return $this->headHtml;
	}
	
	function setBody(){
		$this->bodyHtml .= "<body>";
		$this->bodyHtml .= $this->bodyAdditions;
		$this->bodyHtml .= "</body>";
	}
	
	function getBody(){
		return $this->bodyHtml;
	}

	function setBottom(){
		$this->bottomHtml .= "<footer>";
		$this->bottomHtml .= $this->bottomAdditions;
		$this->bottomHtml .= "</footer>";
		$this->bottomHtml .= "</html>";
	}
	
	function getBottom(){
		return $this->bottomHtml;
	}
	
		
	function addHeadItem($addition){
		$this->headAdditions .= $addition;
	}
	
	function addBodyItem($addition){
		$this->bodyAdditions .= $addition;
	}
	function addBottomItem($addition){
		$this->bottomAdditions .= $addition;
	}
}
?>
