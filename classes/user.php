<?php
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../lib/session.php');
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');

?>
<?php
class user{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function change_pass_admin($data)
    {
        $passold=mysqli_real_escape_string($this->db->link,md5($data['passold']));
        $passnew=mysqli_real_escape_string($this->db->link,md5($data['passnew']));
        if($passold==""||$passnew=="")
        {
            $alert="ko duoc de trong";
            return $alert;
        }
        else $query="select * from tbl_admin where adminpass='$passold'";
        $result_check=$this->db->select($query);
        if($result_check==false)
        {
            $alert="mat khau sai hoac muc dang de trong , vui long nhap lai";
            return $alert;

        }
        $query1="update tbl_admin set adminpass='$passnew' where adminpass='$passold'";
        $result=$this->db->insert($query1);
        if($result)
        {
            $alert="<span class='success'>da cap nhat thanh cong</span>";
            return $alert;
        }
        else 
        {
            $alert="<span class='error'> cap nhat that bai</span>";
            return $alert;
        }

    }
}

?>