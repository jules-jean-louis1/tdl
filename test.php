<?php
if (isset($_POST['btn'])) {
    $test = $_POST['select'];
    var_dump($test);
}
?>

<form action="" method="post">
    <select name="select">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <button type="submit" name="btn">Submit</button>
</form>
