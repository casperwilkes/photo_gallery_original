</div>
<div id="footer">
    Copyright 2002-<?php echo date("Y", time()); ?>, Pawtucket Inc.
</div>
</body>
</html>
<?php
if (isset($database)) {
    $database->close_connection();
}
?>