<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<?php
$id=$_GET['ID'];
$conn = mysqli_init();
mysqli_real_connect($conn, 'toenweek13.mysql.database.azure.com', 'toenteen@toenweek13', 'Kassinowa751', 'itflab', 3306);
$res = mysqli_query($conn, "SELECT * FROM guestbook WHERE ID='$id'");
$row = mysqli_fetch_array($res)
?>
<span class="badge badge-secondary"><form action = "update.php?ID=<?php echo $row['ID']; ?>" method = "post" id="CommentForm">
    Name:<br>
    <input type="text" name = "Name" id="idName" value="<?php echo "$row[Name]"; ?>" </span><br>
    Comment:<br>
    <input type="text" name = "Comment" id="idComment" value="<?php echo "$row[Comment]"; ?>" <br>
    <br><br>
    Link:<br>
    <input type="text" name = "Link" id="idLink" value="<?php echo "$row[Link]"; ?>"> <br><br>
    <input type="submit" id="commentBtn"class="btn btn-warning">
  </form>
