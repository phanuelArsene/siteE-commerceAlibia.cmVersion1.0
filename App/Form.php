<?php
 namespace App;
class Form{
    
    private $data ;
    private $tag = "div class = 'form-group'";

    public function __construct($data = [])
    {
        $this->data = $data;
    }

 private function save($index){
    if(isset($this->data["$index"])){
        return $this->data["$index"];
    }
    else{
        return null;
    }
 }

 private function tag($html){
    return "<{$this->tag}>{$html}</{$this->tag}>"; 
 }

public function Input($type,$name,$name_label):string{
    return $this->tag('
    <label for="'.$name.'">'.$name_label.'</label>
    <input type="'.$type.'" name="'.$name.'" value="'.$this->save($name).'"  class="form-control" >');
}

public function area($name,$name_label):string{
    return $this->tag('
    <label for="'.$name.'">'.$name_label.'</label>
    <textarea class="form-control" name="'.$name.'" id="sms">'.$this->save($name).'</textarea>
    ');
}

public function submit($action):string{
    return $this->tag("<button  class='btn btn-warning w-100' type='submit'>$action</button>");
}

}