
<div class="row">
    <div class="col-10"></div>
    <div class="col-2">
    Xin chào <?php 
    if(isset($_SESSION["user"]))
        echo $_SESSION["user"];
    else if (isset($_SESSION["admin"]))
        echo $_SESSION["admin"];
    ?>
    <a href="index.php?controller=login&action=logout"> <button class="btn-primary"> Logout </button></a>
    </div>
</div>