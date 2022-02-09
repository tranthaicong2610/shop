<?php 
    include '../libs/session.php';
    Session::checkLogin();
     Session::init();
     
 ?>
 <?php include '../classes/category.php'; 
  include '../classes/product.php';
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
if(isset($_GET['action'])&&$_GET['action']=='logout')
{
  Session::destroy();
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial;
      padding: 10px;
      background: #f1f1f1;
      font-size: 25px;
    }

    /* Header/Blog Title */
    .header {
      padding: 30px;
      text-align: center;
      background: white;
    }

    .header h1 {
      font-size: 50px;
    }

    /* Style the top navigation bar */
    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    /* Style the topnav links */
    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    /* Change color on hover */
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    /* Create two unequal columns that floats next to each other */
    /* Left column */
    .leftcolumn {
      float: left;
      width: 25%;
      height: 100%;
      text-align: center;
    }

    /* Right column */
    .rightcolumn {
      float: left;
      width: 75%;
      background-color: #f1f1f1;
      padding-left: 20px;
    }

    /* Fake image */
    .fakeimg {
      background-color: #aaa;
      width: 100%;
      padding: 20px;
    }

    /* Add a card effect for articles */
    .card {
      background-color: white;
      padding: 20px;
      margin-top: 20px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Footer */
    .footer {
      padding: 20px;
      text-align: center;
      background: #ddd;
      margin-top: 20px;
    }

    .dropbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      width: 400px;
      margin-bottom: 10px;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background-color: #f9f9f9;
      min-width: 400px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;

    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;

    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }

    input,
    textarea {
      width: 300px;
      padding: 10px;
      margin: 5px;
    }
    input[type=submit]:hover{
      background-color: blue;
    }
    select,
    option {
      width: 300px;
      padding: 10px;
      margin: 5px;
    }

    /* //list  */

    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
    

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 800px) {

      .leftcolumn,
      .rightcolumn {
        width: 100%;
        padding: 0;
      }
    }

    /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
    @media screen and (max-width: 400px) {
      .topnav a {
        float: none;
        width: 100%;
      }
    }
  </style>
</head>

<body>

  <div class="header">
    <h1>Trang website bán hàng </h1>
    <p>sự uy tín sẽ đem đến cho khách hàng sự hài lòng</p>
  </div>
  <div class="logout"><a onclick="return confirm('Bạn có chắc muốn xóa không?');"  href="?action=logout">Đăng xuất</a></div>
   
  <div class="topnav">
    <a href="../admin/index.php">Trang chủ </a>
    <a href="#">ĐƠN HÀNG </a>
    <a href="#">THAY ĐỔI MẬT KHẨU</a>
    <a href="#" style="float:right">BÌNH LUẬN </a>
  </div>
  <div class="row">
    <div class="leftcolumn">
      <!-- category -->
      <div class="dropdown">
        <button class="dropbtn">Category</button>
        <div class="dropdown-content">
          <a href="../admin/catadd.php">Add Category</a>
          <a href="../admin/catlist.php">List Category</a>
        </div>
      </div>
      <!-- product -->
      <div class="dropdown">
        <button class="dropbtn">Product</button>
        <div class="dropdown-content">
          <a href="../admin/productadd.php">Add Product</a>
          <a href="../admin/productlist.php">List product</a>
        </div>
      </div>
    </div>