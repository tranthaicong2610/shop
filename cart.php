<?php include '/xampp/htdocs/shop/header.php'; ?> 
<?php include '/xampp/htdocs/shop/classes/product.php' ;?>
<?php include '/xampp/htdocs/shop/classes/cart.php' ;?>
<?php 
    $pro=new product();
    $cart=new cart();
    $data=$cart->show_cart();
    if(isset($_GET['cartid']))
    {
        $id=$_GET['cartid'];
        $del=$cart->del_cart($id);
        echo $del;
    }
?>

<h1>Giỏ Hàng của bạn</h1>

<table id="customers">
  <tr>
  <th>Tên sản phẩm </th>
        <th>Số lượng </th>
        <th>Giá Sản Phẩm</th>
        <th>Tổng Giá</th>
        <th>Hoạt Động</th>
  </tr>
  <?php  
    
        
        if($data)
        {
            while($item=$data->fetch_assoc())
            {
                $id=$item['productid'];
  ?>
  <tr>
    <td><?php echo $item['productname'] ?></td>
    <td><?php echo $item['quantity'] ;?></td>
    <td><?php echo $item['price'] ;?></td>
    <td><?php echo  $item['quantity'] * $item['price'] ; ?> </td>
    <td><a href="cart.php?cartid=<?php  echo $item['id']; ?>">xóa</a>||<a href="cartedit.php?cartid=<?php  echo $item['id']; ?>">Sửa</a></td>
  </tr>
  <?php  }} ?>
</table>
<h3><a href="index.php">Tiếp tục mua hàng </a></h3>


<?php include '/xampp/htdocs/shop/footer.php'; ?> 
