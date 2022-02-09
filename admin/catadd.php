<?php include '/xampp/htdocs/shop/inc/header.php';?>

<?php
    // gọi class category
    $cat = new category(); 
    if(isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $catName = $_POST['catName'];
        
        // hàm check catName khi submit lên
        $insertCat = $cat -> insert_category($catName); 
        // echo $insertCat;
    }
  ?>
        <?php if(isset($insertCat)) echo $insertCat ?>
        <form action="" method="post">
        <div class="rightcolumn">
            <div class="card">
                
                <h2>Add Category</h2>
                <label for="">Tên danh mục</label><input type="text" name="catName" placeholder="nhập tên danh mục" id=""><br>
                <input type="submit" value="submit" style="width:100px" name='submit'>
            </div>
        </div>
        </form>
  </div>
  <?php include '/xampp/htdocs/shop/inc/footer.php';?>