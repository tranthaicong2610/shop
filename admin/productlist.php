<?php include '/xampp/htdocs/shop/inc/header.php'; ?>
<?php  $pro =new product();
        $data=$pro->get_all_product();
        if(isset($_GET['productid']))
        {
            $id=$_GET['productid'];
            $del=$pro->del_product($id);
            echo $del;
        }
?>
<div class="rightcolumn">
    <div class="card">
        <h2>List Product</h2>
        <table id="customers">
            <tr>
                <th>id</th>
                <th>Tên sản phẩm </th>
                <th>Mã code</th>
                <th>Số lượng sản phẩm </th>
                <th>Danh mục sản phẩm </th>
                <th>Giá</th>
                <th>Loại sản phẩm </th>
                <th>ảnh </th>
                <th>Hành Động</th>
            </tr>
            <?php
                $i=1;
                if($data)
                {
                    while($item=$data->fetch_assoc())
                    {

                
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $item['productName']; ?></td>
                <td><?php echo $item['product_code']; ?></td>
                <td><?php echo $item['productQuantity']; ?></td>
                <td><?php echo $item['category']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td><?php echo $item['product_type']; ?></td>
                <td><img src="./uploads/<?php echo $item['product_image']; ?>"name='product_image' alt="" style="width:100px;height:100px;"></td>
                <td><a href="productedit.php?productid=<?php echo $item['id'] ?>">Sửa</a> || <a onclick="return confirm('Bạn có chắc muốn xóa không?');" href="?productid=<?php echo $item['id'] ?>">Xóa</a></td>
            </tr>
            <?php
            $i++;
                }
            }
            ?>
            
        </table>
    </div>
</div>
</div>
<?php include '/xampp/htdocs/shop/inc/footer.php'; ?>