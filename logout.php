<?php 
session_start();
session_destroy();
echo"
<script>
alert('logged out');
window.location='index.php';
</script>
";
?>