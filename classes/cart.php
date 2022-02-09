<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../libs/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php

class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_cart($price,$quantity,$productname,$productid){
        $price = $this->fm->validation($price); //gọi ham validation từ file Format để ktra
        $price = mysqli_real_escape_string($this->db->link, $price);
        $quantity = $this->fm->validation($quantity); //gọi ham validation từ file Format để ktra
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $productname = $this->fm->validation($productname); //gọi ham validation từ file Format để ktra
        $productname = mysqli_real_escape_string($this->db->link, $productname);
        
        if(empty($price)||empty($quantity)||empty($productname)){
            $alert = "<span class='error'>không được để trống</span>";
            return $alert;
        }else{
            $query = "INSERT INTO cart(productname,quantity,price,productid) VALUES('$productname','$quantity','$price','$productid')";
            $result = $this->db->insert($query);
            if($result){
                header('Location:cart.php');
                $alert = "<span class='success'>đã được thêm thành công</span>";
                return $alert;
            }else {
                $alert = "<span class='error'>thêm không thành công</span>";
                return $alert;
            }
        }
    }
    public function show_cart()
    {
        $query = "SELECT * FROM cart order by id desc ";
			$result = $this->db->select($query);
			return $result;

    }
    public function del_cart($id)
    {
        $query="DELETE  FROM cart where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    
    }
    public function edit_quantity_product($id,$quantity)
    {
        $query="UPDATE  cart SET 
        quantity='$quantity'
        where id='$id'
         ";
         $result=$this->db->update($query);
         return $result;
    }
    public function get_cart($id)
    {
        $query="SELECT * FROM cart WHERE id='$id'";
        $result=$this->db->select($query);
        return $result;
    }
}

?>