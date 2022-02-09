<?php include '/xampp/htdocs/shop/inc/header.php';?>

<?php
    // gọi class category
    $cat = new category();
    $id=(isset($_GET['catid']))? $_GET['catid'] :'';
    if($id=='') header('Location:index.php');
    $result=$cat-> getcatbyId($id);
    $data=$result->fetch_assoc();
    if(isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $catName = $_POST['catName'];
        
        // hàm check catName khi submit lên
        $insertCat = $cat -> update_category($catName,$id); 
    }
  ?>
<form action="" method="post">
    <a href="./catlist.php">Back List Category</a>
    <div class="rightcolumn">
        <div class="card">
            <h2>Edit Category</h2>
            <label for="">Tên danh mục</label><input type="text" name="catName" value="<?php echo $data['catName']; ?>" id=""><br>
            <input type="submit" value="submit" style="width:100px" name='submit'>
        </div>
    </div>
</form>
</div>
<?php include '/xampp/htdocs/shop/inc/footer.php'; ?>