<form action="" method="post">
    <input type="text" name="name">
    <button type="submit">Submit</button>
</form>
<?php
if(isset($_POST['name'])) {
    echo strip_tags($_POST['name']);
}
?>