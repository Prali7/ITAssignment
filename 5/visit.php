<?php
session_start();
if (isset($_GET['reset'])) {
    unset($_SESSION['visit_count']);
}
if (isset($_SESSION['visit_count'])) {
    $_SESSION['visit_count']++;
} else {
    $_SESSION['visit_count'] = 1;
}

$visits = $_SESSION['visit_count'];
?>

<!DOCTYPE html>
<html>
<body>

<h2>Session Visit Counter</h2>

<p>You have visited this page <?php echo $visits; ?> times in this session.</p>
<a href="visit.php?reset=true">
    <button>Reset Counter</button>
</a>

</body>
</html>
