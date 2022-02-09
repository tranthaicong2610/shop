<?php include '/xampp/htdocs/shop/inc/header.php'; ?>
<?php 

//product
    $pro=new product();
    $id=(isset($_GET['productid']))? $_GET['productid'] :'';
    if($id=='') header('Location:./index.php');
    $result=$pro-> getproduct($id);
    $data=$result->fetch_assoc();
    // if(isset($_POST['submit'])){
    //     // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    //     $catName = $_POST['catName'];
        
    //     // hàm check catName khi submit lên
    //     $insertCat = $cat -> update_category($catName,$id); 
    // }
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
            echo "<span>thanh cong</span>";
            move_uploaded_file($_FILES['product_image']['tmp_name'], './uploads/'.$_FILES['product_image']['name']);
            $product_image=$_FILES['product_image']['name'];
        }
        $product_update=$pro->update_product($id,$productName,$product_code,$productQuantity,$category,$product_desc,$price,$product_type,$product_image);
        echo $product_update;
    
    }
?>   
<form action="" method="post" enctype="multipart/form-data">
<div class="rightcolumn">
    <div class="card">
        <h2>Edit Product</h2>
        <table class="form">

            <tr>
                <td>
                    <label>Tên sản phẩm</label>
                </td>
                <td>
                    <input name="productName" type="text" value="<?php echo $data['productName']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Code sản phẩm</label>
                </td>
                <td>
                    <input name="product_code" type="text" value="<?php echo $data['product_code']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Số lượng sản phẩm</label>
                </td>
                <td>
                    <input name="productQuantity" type="text" value="<?php echo $data['productQuantity']; ?>" class="medium" pattern="[0-9]+"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Danh mục sản phẩm</label>
                </td>
                <?php
                $cat = new category();
                $data_cat = $cat->show_category();

                ?>
                <td>
                    <select id="select" name="category">
                        <?php
                        $data_cat = $cat->show_category();
                        if ($data_cat) {
                            while ($item = $data_cat->fetch_assoc()) {

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
                    <textarea name="product_desc" class="tinymce" ><?php echo $data['product_desc']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Giá</label>
                </td>
                <td>
                    <input name="price" type="text" value="<?php echo $data['price']; ?>" class="medium" pattern="[0-9]+"/>
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
                        <option><?php if($data['product_type']) echo "Nổi bật";
                                        else echo "Không nổi bật";
                                ?></option>
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