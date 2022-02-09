<?php
class Format{
    public function formatDate($date)
    {
        return date('F j,Y,g:i a',strtotime($date));
    }
    public function textShorten($text,$limit=400)
    {
        $text=$text." ";
        $text=substr($text,0,$limit);
        $text=substr($text,0,strrpos($text,' '));
        $text=$text."...";
        return $text; 
    }
    public function validation($data)
    {
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    public function tittle()
    {
        $path=$_SERVER['SCRIPT_FILENAME'];
        $tittle=basename($path,'.php');
        if($tittle='index'){
            $tittle='home';
        }
        elseif($tittle=='contact'){
            $tittle='contact';
        }
        return $tittle=ucfirst($tittle);



    }
    public function format_currency($n=0)
    {
        $n=(string)$n;
        $n=strrev($n);
        $res='';
        for($i=3;$i<strlen($n);$i=$i+3)
        {
            $res.='.'.$n[$i];
        }
        $res=strrev($res);
        return $res;
    }

}
?>