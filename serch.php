<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<div class="container "> 
<form method='POST'>
 <div class='shadow mt-3 p-2 ' >بحث </div>
<div class='shodaw '><input type="text" class="form-control mt-3" name="serch" ></div>
<button type='submit' class='btn btn-dark mt-3 form-control' name="click">Serch-بحث</button>
</form>   
</div>
<?php
session_start();
if(isset($_SESSION['role'])){
    if($_SESSION['role']->ROLE ==="admin"){
if(isset($_POST['click'])){
    $username="root";
    $password="";
    $database=new PDO("mysql:host=localhost;dbname=users;charset=utf8",$username,$password);
    $serch=$database->prepare("SELECT * FROM user WHERE nom LIKE :name ");
    $valueserch= "%".$_POST['serch'] ."%";
    $serch->bindParam("name",$valueserch);
    $serch->execute();
    foreach($serch AS $list){
      echo "<div class='shadow mt-3 p-2 container'><span >".$list['nom']."</span> 
      <span>".$list['email']."</span></div>
      ";
    }
}
}
}

?>