<?php
session_start();
require_once("cosmetics.php");
require_once("cosmeticstype.php");
?>
<!DOCTYPE html>
<html>
<head>
   <title>Cosmetic Store Shop</title>
</head>
<body>
   <header>
       <?php include("header.inc.php"); ?>
   </header>
   <section style="height: 425px;">
       <nav>
           <?php include("nav.inc.php"); ?>
       </nav>
       <main>
           <?php
          if (isset($_REQUEST['content'])) {
            $content = $_REQUEST['content'];

    // ✅ Handle alternate or legacy file names safely
                if ($content === 'addtype') {
                    $content = 'addcosmeticstype';
                }
                if ($content === 'additem') {
                    $content = 'addcosmetics';
                }
                if ($content === 'updateitem') {
                    $content = 'updatecosmetic'; 
                }
                if ($content === 'displaycosmetictype') {
                    $content = 'displaycosmeticstype'; // ✅ Fix: map to your real file name
                }

                include($content . ".inc.php");
          } else {
                include("main.inc.php");
          }
           ?>
       </main>
   </section>
   <footer>
       <?php include("footer.inc.php"); ?>
   </footer>
</body>
</html>
