<?php
    if(isset($_GET['status']) && $_GET['status'] == 0) {
        echo "No !";
    }
   elseif(isset($_GET['status']) && $_GET['status'] == 1) {
        echo "Yes !";
   }
   else {
        echo "NOT set !";
   }
?>