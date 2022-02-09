<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
* {box-sizing: border-box;}
.header {
  padding: 60px;
  text-align: center;
  background: #1abc9c;
  color: black;
  font-size: 30px;
}
body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.test a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.test a.logo {
  font-size: 25px;
  font-weight: bold;
}

.test a:hover {
  background-color: #ddd;
  color: black;
}

.test a.active {
  background-color: dodgerblue;
  color: white;
}

.test-right {
  float: right;
}
.footer {
  position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
    text-align: center;
    margin: auto;

}
/* .w3-content{
  max-width: 20%;
 max-height: 50px;
  border-radius: 50%;
} */
.resize{
  background-repeat: repeat-x;
  width:100%;
  height: 200px;
}
.intro{
  width: 50%;
  font-size: 20px;
  float: none;
  display: block ;
}
.product-image{
  max-width: 430px;
  height: 400px;
  background-color: #1abc9c;
  display: block;
  text-align: center;
  float: left;
  margin: 20px;
}
.home-product-img{
  width: 300px;
  height: 100px;
  position: relative;
  float: left;
  margin: 50px;
  text-align: center;
}
.product-image {
  width: 100%;
}
.button{
  
  background-color: gray;
  color: green;
  font-size: 20px;
  padding: 10px;
  margin: 20px 25px 30px 100px;
  display: block;

}
.button a{
  text-decoration: none;
}
.details{
  display: block;
  position:absolute;
  top: 400px;
  font-size: 50px;
}
.details-image{
  width: 400px;
  display: block;
  float: left;
  margin-right: 200px;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

@media screen and (max-width: 500px) {
  .test a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>
    <!-- //header -->
<div class="header">
  <h1>Trang bán hàng </h1>
  <p>luôn đem lại sự hạnh phúc cho khách hàng</p>
</div>
<div class="test">
  <a href="./index.php" class="logo">CompanyLogo</a>
  <a class="active" href="./index.php">Trang chủ</a>
    <a href="./introduce.php">Giới thiệu</a>
    <a href="#about">Sản phẩm</a>
    <a href="./index.php"> Giỏ hàng </a>
    <a href="./index.php">Liên Hệ</a>
    <a href="./index.php">Hướng Dẫn</a>
  <div class="test-right">
    <a href="./login.php">Đăng nhập</a>
    <a href="./register.php">Đăng ký</a>
  </div>
</div>






