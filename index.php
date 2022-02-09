 <?php include '/xampp/htdocs/shop/header.php'; ?> 
 <?php include '/xampp/htdocs/shop/slider.php'; ?> 
<?php include '/xampp/htdocs/shop/classes/product.php' ;?>
<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'./libs/database.php');
include_once ($filepath.'./helpers/format.php');

?>
<?php
$fm = new format();
$pro=new product();  
$data=$pro->get_all_product();

?>
<div class="home-product">
    <h1>Sản phẩm nổi bật </h1>
    <?php 
	      	if ($data){
	      		while ($result = $data->fetch_assoc()){
	      			?>
				<div class="product-image">
					 <a href="details.php?proid=<?php echo $result['id']?>"><img src="admin/uploads/<?php echo $result['product_image'] ?>" alt="loi " class='home-product-img'/></a>
					 <h2><?php echo $result['productName']?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],30)?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])?>VND</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['id']?>" class="detailss">Chi tiết</a></span></div>
				</div>
				<?php
			}
		}
				?>
</div>


 <?php include '/xampp/htdocs/shop/footer.php'; ?> 