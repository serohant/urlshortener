<?php

class URLShortener 
{
    public $urls;

    public function __construct($urls){
        $this->urls = $urls;    
    }

    public function getURLs(){
        return $this->urls;
    }

    public function checkName($name){
        if(isset($this->urls[$name])){
           return true;
        }else{
            return false;
        }
    }
    
    public function addURL($name,$URL){
        if(!$this->checkName($name)){
            $this->urls[$name] = array($name => $URL);
            file_put_contents('urls.json',json_encode($this->urls,JSON_PRETTY_PRINT));
            return true;
        }else{
            return false;
        }
    }

    public function removeURL($name){
        if($this->checkName($name)){
            unset($this->urls[$name]);
            file_put_contents('urls.json',json_encode($this->urls,JSON_PRETTY_PRINT));
            return true;
        }else{
            return false;
        }
    }
}

?>
