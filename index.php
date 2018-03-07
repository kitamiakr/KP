<?php
session_start();
include_once "library/inc.connection.php";
include_once "library/inc.library.php";


// Baca Jam pada Komputer
date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SD Muhammadiyah Kayen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
  <script src="styles/js/jquery-1.11.3.min.js"></script>
  <script src="styles/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/bootstrap/css/bootstrap.min.css">
 
  <script  src="styles/bootstrap/js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/style/style.css">
  <link rel="stylesheet" type="text/css" href="styles/bootstrap/css/animate.min.css">
  <script  src="styles/bootstrap/js/smoothscroll"></script>
  <link rel="stylesheet" type="text/css" href="plugins/tigra_calendar/tcal.css"/>
		
		<link href="styles/css/dataTables.bootstrap.min.css" rel="stylesheet">

    
      <script>
        $(document).ready(function() {

          $('#tabeldata').DataTable();

      });
      </script>

  <script>
 $(document).ready(function(){

    $('[data-toggle="popover"]').popover().on("show.bs.popover", function () { $(this).data("bs.popover").tip().css("width", "900px").css("text-align","justify"); 

     });

    



    
});
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});




</script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    
    
    /* Remove the jumbotron's default bottom margin */ 

     .jumbotron {
      margin-bottom: 0;
      background-color:  #3498DC;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #2980b9;
      padding: 25px;
    }
   
   
    .btn-selengkapnya{
      margin-bottom: 20px;
      background-color: #2980b9;
      color: white;
    }

    /* Popover */
  .popover {
      border: 2px dotted white;
  }
  /* Popover Header */
  .popover-title {
      background-color: #2980b9; 
      color: #FFFFFF; 
      font-size: 28px;
      text-align:center;
  }
  /* Popover Body */
  .popover-content {
      background-color:#FFFFFF;
      color: #000000;
    
      padding: 25px;
  }
  /* Popover Arrow */
  .arrow {
      border-right-color: red !important;
  }
  
  body{
    background-color:#EEEEEE;
  }

  </style>
</head>
<body>
<div>
<?php 
include 'layout/navbar.php';
 include 'buka_file.php'; ?>

<!--modal-->

</div>
   
<?php include 'layout/library/footer.php'; ?>
<script src="styles/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/tigra_calendar/tcal.js"></script>
    <script src="styles/js/jquery-1.11.3.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="styles/js/jquery.dataTables.min.js"></script>
      <script src="styles/js/dataTables.bootstrap.min.js"></script>
    
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#select-all').click(function(event){
        if (this.checked) {
          $(':checkbox').each(function() {
            this.checked = true;
          });
        } else {
          $(':checkbox').each(function() {
            this.checked = false;
          });
        }
      });
    </script>
      <script>
        $(document).ready(function() {

          $('#tabeldata').DataTable();

      });
      </script>
</body>
</html>
