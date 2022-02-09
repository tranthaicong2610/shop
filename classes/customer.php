<?php
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../libs/session.php');
	Session::checkLogin(); // gọi hàm check login để ktra session
	include_once($filepath.'/../libs/database.php');
	include_once($filepath.'/../helpers/format.php');
?>
<?php
class customer
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function register_cus($cus_name,$cus_email,$cus_pass,$cus_phone,$cus_address){
        $cus_name=$this->fm->validation($cus_name);
        $cus_name=mysqli_real_escape_string($this->db->link,$cus_name);
        $cus_email=$this->fm->validation($cus_email);
        $cus_email=mysqli_real_escape_string($this->db->link,$cus_email);
        $cus_pass=$this->fm->validation($cus_pass);
        $cus_pass=mysqli_real_escape_string($this->db->link,$cus_pass);
        $cus_phone=$this->fm->validation($cus_phone);
        $cus_phone=mysqli_real_escape_string($this->db->link,$cus_phone);
        $cus_address=$this->fm->validation($cus_address);
        $cus_address=mysqli_real_escape_string($this->db->link,$cus_address);
        if($cus_name==''||$cus_phone==''||$cus_address==''||$cus_pass==''||$cus_email=='')
        {
            $alert="<span>khong duoc de chong</span>";
        }
        else{
            $query="INSERT INTO customer(cus_name,cus_email,cus_pass,cus_phone,cus_address) VALUES('$cus_name','$cus_email','$cus_pass','$cus_phone','$cus_address')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>đã được thêm thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>thêm không thành công</span>";
                return $alert;
            }
        }

    }
    
    public function login_cus($cus_email,$cus_pass){
        $cus_email = $this->fm->validation($cus_email); //gọi ham validation từ file Format để ktra
        $cus_pass = $this->fm->validation($cus_pass);

        $cus_email = mysqli_real_escape_string($this->db->link, $cus_email);
        $cus_pass = mysqli_real_escape_string($this->db->link, $cus_pass); //mysqli gọi 2 biến. (cus_email and link) biến link -> gọi conect db từ file db
        
        if(empty($cus_email) || empty($cus_pass)){
            $alert = "Email and Pass không nhập rỗng";
            return $alert;
        }else{
            $query = "SELECT * FROM customer WHERE cus_email = '$cus_email' AND cus_pass = '$cus_pass' LIMIT 1 ";
            $result = $this->db->select($query);

            if($result != false){
                //session_start();
                // $_SESSION['login'] = 1;
                //$_SESSION['user'] = $user;
                $value = $result->fetch_assoc();
                Session::set('cus_login', true); // set cus_login đã tồn tại
                // gọi function Checklogin để kiểm tra true.
                Session::set('cus_id', $value['id']);
                Session::set('cus_email', $value['cus_email']);
                Session::set('cus_pass', $value['cus_pass']);
                header("Location:index.php");
            }else {
                $alert = "email and Pass not match";
                return $alert;
            }
        }


    }
    
}

?>