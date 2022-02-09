<?php include '/xampp/htdocs/shop/inc/header.php'; ?>
<?php
// gọi class product
$pro = new product();
if (isset($_POST['submit'])) {
    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST

    $productName=$_POST['productName'];
    $product_code=$_POST['product_code'];
    $productQuantity=$_POST['productQuantity'];
    $category=$_POST['category'];
    $product_desc=$_POST['product_desc'];
    $price=$_POST['price'];
    $product_type=$_POST['product_type'];
    $product_image='';

    if($_FILES['product_image']['error']>0)
    {
        echo "<span>Fail  file upload </span>";

    }
    else {
        echo "<span>them anh thanh cong</span>";
        move_uploaded_file($_FILES['product_image']['tmp_name'], './uploads/'.$_FILES['product_image']['name']);
        $product_image=$_FILES['product_image']['name'];
    }
    $product_insert=$pro->insert_product($productName,$product_code,$productQuantity,$category,$product_desc,$price,$product_type,$product_image);
    echo $product_insert;

}
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="rightcolumn">
    <div class="card">
        <h2>Add Product</h2>
        <table class="form">

            <tr>
                <td>
                    <label>Tên sản phẩm</label>
                </td>
                <td>
                    <input name="productName" type="text" placeholder="Nhập tên sản phẩm..." class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Code sản phẩm</label>
                </td>
                <td>
                    <input name="product_code" type="text" placeholder="Nhập code sản phẩm..." class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Số lượng sản phẩm</label>
                </td>
                <td>
                    <input name="productQuantity" type="text" placeholder="Nhập số lượng sản phẩm..." class="medium" pattern="[0-9]+"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Danh mục sản phẩm</label>
                </td>
                <?php
                $cat = new category();
                $data = $cat->show_category();

                ?>
                <td>
                    <select id="select" name="category">
                        <?php
                        $data = $cat->show_category();
                        if ($data) {
                            while ($item = $data->fetch_assoc()) {

                        ?>
                                <option><?php echo $item['catName'] ?></option>

                        <?php }
                        } ?>

                    </select>
                </td>
            </tr>


            <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                    <label>Mô tả</label>
                </td>
                <td>
                    <textarea name="product_desc" class="tinymce" placeholder="Thêm mô tả"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Giá</label>
                </td>
                <td>
                    <input name="price" type="text" placeholder="Nhập giá..." class="medium" pattern="[0-9]+"/>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Tải ảnh</label>
                </td>
                <td>
                    <input name="product_image" type="file" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Loại sản phẩm</label>
                </td>
                <td>
                    <select id="select" name="product_type">
                        <option>Chọn</option>
                        <option value="1">Nổi bật</option>
                        <option value="0">Không nổi bật</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Lưu lại" style="width:100px" />
                </td>
            </tr>
        </table>


    </div>
</div>
</form>
</div>
<?php include '/xampp/htdocs/shop/inc/footer.php'; ?>