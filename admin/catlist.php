<?php include '/xampp/htdocs/shop/inc/header.php'; ?>
<?php
$cat=new category();
$data=$cat->show_category();
if(isset($_GET['catid']))
{
    $id=$_GET['catid'];
    $del=$cat->del_category($id);
    echo $del;
}
?>
<div class="rightcolumn">
    <div class="card">
        <h2>List Category</h2>
        <table id="customers">
            <tr>
                <th>id</th>
                <th>Tên danh mục </th>
                <th>Hành Động</th>
            </tr>
            <?php  
            $i=1;
            $data=$cat->show_category();
            if($data)
            {
                while($item=$data->fetch_assoc())
                {

            
            ?>


            <tr>
                <td><?php  echo $i; ?></td>
                <td><?php echo $item['catName'] ?></td>
                <td><a href="../admin/catedit.php?catid=<?php echo $item['id'] ?>">Sửa</a> || <a onclick="return confirm('Bạn có chắc muốn xóa không?');" href="?catid=<?php echo $item['id'] ?>" name='delete'>Xóa</a></td>
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