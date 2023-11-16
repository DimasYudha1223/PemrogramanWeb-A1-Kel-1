<?php

$id_artikel = $_GET['id']; 
echo " <script>
document.location.href = '../read.php?id=$id_artikel';
</script>";
?>