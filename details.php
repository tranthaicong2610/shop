<?php include '/xampp/htdocs/shop/header.php'; ?> 
<?php include '/xampp/htdocs/shop/classes/product.php' ;?>
<?php include '/xampp/htdocs/shop/classes/cart.php' ;?>

<?php 
$id=$_GET['proid'];
$pro=new product();
$data=$pro->getproduct($id);
$item=$data->fetch_assoc();
//khai bao cart 
$cart =new  cart();
if(isset($_POST['submit']))
{
    echo '<span>hello</span>';
    $quantity=$_POST['quantity'];
    $insert=$cart->insert_cart($item['productName'],$quantity,$item['price'],$id);
    echo $insert;
}


?>
<form action="" method="post">
<div class="details">
    <p><span><img class="details-image" src="admin/uploads/<?php echo $item['product_image']; ?>" alt=""></span></p>
    <p><span>Tên sản phẩm : <?php echo $item['productName']; ?></span></p>
    <p><span>Giá Bán :<?php echo $item['price']; ?> VNĐ</span></p>
    <span style="margin: 15px;">Số lượng cần mua:<input style="margin:15px;width:600px;" type="number" name='quantity' class="form-control" value="1" min="1" max=""  required="required" title=""></span>
    <span><input type="submit" name='submit' value="Mua Ngay" style="background-color: green;"></span>
</div>
</form>
<?php include '/xampp/htdocs/shop/footer.php'; ?> 
