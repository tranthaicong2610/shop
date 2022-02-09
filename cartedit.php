<?php include '/xampp/htdocs/shop/header.php'; ?> 
<?php include '/xampp/htdocs/shop/classes/cart.php' ;?>
<?php include '/xampp/htdocs/shop/classes/product.php' ;?>

<?php 
$id=$_GET['cartid'];
//khai bao cart 
$cart =new  cart();
$data=$cart->get_cart($id);
$item=$data->fetch_assoc();
if(isset($_POST['submit']))
{
    echo '<span>hello</span>';
    $quantity=$_POST['quantity'];
    $update=$cart->edit_quantity_product($id,$quantity);
    header('Location:cart.php');
}
// $pro=new product();
// $data_pro=$pro->getproduct($item['productid']);
// $item_pro=$data_pro->fetch_array();


?>
<form action="" method="post">
<div class="details">
    <p><span><img class="details-image" src="admin/uploads/<?php echo $item_pro['product_image']; ?>" alt=""></span></p>
    <p><span>Tên sản phẩm : <?php echo $item['productname']; ?></span></p>
    <p><span>Giá Bán :<?php echo $item['price']; ?> VNĐ</span></p>
    <span style="margin: 15px;">Số lượng cần mua:<input style="margin:15px;width:600px;" type="number" name='quantity' class="form-control" value="1" min="1" max=""  required="required" title=""></span>
    <span><input type="submit" name='submit' value="Mua Ngay" style="background-color: green;"></span>
</div>
</form>
<?php include '/xampp/htdocs/shop/footer.php'; ?> 
