<style type="text/css">
	
	.navbar{
     margin-bottom: 0px;
      border-radius: 0;
      background-color: #2980b9; 
      color: #FFFFFF;

  }
  li.menu{
    border-color: #2980b9;

  }
  li:hover{
    border:1px solid white;

  }
  a:hover{
    color: #2980b9;
  }
  a.text{
    color: white;
  }
</style>
<div class="navbar navbar-fixed-top" role="navigation">
  <div class="navbar-header">
  <?php
  if (isset($_SESSION['SES_LOGIN'])) {
    ?>
    <a class="navbar-brand text" href="http://localhost/sia-muhkayen/"><?php  echo "SIA SD Muhammadiyah Kayen" ?></a>
    <?php
  }
  else {
    ?>
    <a class="navbar-brand text" href="http://localhost/sia-muhkayen/"><?php  echo "Portal SD Muhammadiyah Kayen" ?></a>
    <?php
  }
  ?>
    
  </div>
  <div  class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
    
      <?php include "menu.php"; ?>
      
      <li><a href=""></a></li>
    </ul>
  </div>
</div>