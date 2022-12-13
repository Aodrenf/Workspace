<html>
    <head><link rel="stylesheet" href="../local/coming_soon.css"></head>

      <body>
      <div class="container">
  <div class="wrapper">
    <div class="content">
      <div class="item">
        <!-- Place your content here to have it be centered vertically and horizontally  -->
        <h1>COMING SOON</h1>
        <p>This website is under construction.</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php
session_start();
include('../functions/function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();
