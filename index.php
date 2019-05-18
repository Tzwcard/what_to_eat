<?php
header("Content-type: text/html; charset=utf-8");

$rest = NULL;
$rand_seed = NULL;
$rest_list_last = "Please input restaurant list here";
if(isset($_POST ['rest_list'])){
  $list = explode("\n", trim($_POST ['rest_list']));
  $rest_list_last = $_POST ['rest_list'];
  $seed = intval(microtime(1)*1000000);
  srand($seed);
  if (count($list)) {
    $rest = trim($list [rand(0, count($list) - 1)]);
    $rand_seed = md5($seed);
  }
}

?><!DOCTYPE html>
<html>
<body>

<form method="post">
<textarea name="rest_list" cols="40" rows="5"><?php echo $rest_list_last ?></textarea><br>
<input type="submit" value="Rand">
</form>

<?php if ($rest) echo '<p>Random result: '.$rest.'</p>' ?>
<?php if ($rand_seed) echo '<p>Hashed random seed: '.$rand_seed.'</p>' ?>

</body>
</html>
