<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../libs/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 
	/**
	* 
	*/
	class category
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_category($catName){
			$catName = $this->fm->validation($catName); //gọi ham validation từ file Format để ktra
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($catName)){
				$alert = "<span class='error'>không được để trống</span>";
				return $alert;
			}else{
				$query = "INSERT INTO category(catName) VALUES('$catName')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>đã được thêm thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>thêm không thành công</span>";
					return $alert;
				}
			}
		}
		public function show_category()
		{
			$query = "SELECT * FROM category order by id desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_category($catName,$id)
		{
			$catName = $this->fm->validation($catName); //gọi ham validation từ file Format để ktra
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$id = mysqli_real_escape_string($this->db->link, $id);  
			if(empty($catName)){
				$alert = "<span class='error'>không được để trống</span>";
				return $alert;
			}else{
				$query = "UPDATE category SET catName = '$catName' WHERE id = '$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>đã cập nhật thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>chưa được cập nhật </span>";
					return $alert;
				}
			}

		}
		public function del_category($id)
		{
			$query = "DELETE FROM category where id = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>đã xóa thành công</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>xóa không thành công</span>";
				return $alert;
			}
		}
		public function getcatbyId($id)
		{
			$query = "SELECT * FROM category where id = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_category_fontend()
		{
			$query = "SELECT * FROM category order by catId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_cat($id)
		{
			$query = "SELECT * FROM tbl_product where catId = '$id' order by catId desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_cat($id)
		{
			$query = "SELECT tbl_product.*,category.catName,category.catId 
					  FROM tbl_product,category 
					  WHERE tbl_product.catId = category.catId
					  AND tbl_product.catId ='$id' LIMIT 1 ";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>