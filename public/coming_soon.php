<?php
session_start();
if ($_SESSION['workspace'] = true) {
include('function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();?>
<html>
    <head><link rel="stylesheet" href="assets/css/coming_soon.css"></head>

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
} else
header('Location: index.php');