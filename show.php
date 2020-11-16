<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>ITF Lab</title>
    <script>
        function myHide() {
            document.getElementById('hidepage').style.display = 'block'; //content ที่ต้องการแสดงหลังจากเพจโหลดเสร็จ
            document.getElementById('hidepage2').style.display = 'none'; //content ที่ต้องการแสดงระหว่างโหลดเพจ
        }
        $(window).load(function(){
    var timer = window.setTimeout(show,2000);
});
    </script>
</head>
<body onload="myHide();">
    <div class="d-flex justify-content-center">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'toenweek13.mysql.database.azure.com', 'toenteen@toenweek13', 'Kassinowa751', 'itflab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$res = mysqli_query($conn, 'SELECT * FROM guestbook');
?>
<div class="table-responsive">
    <table width="600" border="1" class="table table-dark table-striped table-hover">
      <tr>
        <th width="100"> <div align="center">Name</div></th>
        <th width="350"> <div align="center">Comment </div></th>
        <th width="150"> <div align="center">Link </div></th>
        <th width="150"> <div align="center">Action </div></th>

      </tr>
    <?php
    while($Result = mysqli_fetch_array($res))
    {
    ?>
      <tr class="table-info">
        <td><?php echo $Result['Name'];?></div></td>
        <td><?php echo $Result['Comment'];?></td>
        <td><?php echo $Result['Link'];?></td>
        <td><a href="edit.php?ID=<?php echo $Result['ID']?><button type="button" class="btn btn-info">Edit</button></a>    <a href="del.php?ID=<?php echo $Result['ID']?>" class="btn btn-danger"onclick="return confirm('Confirm data deletion?')">Remove</a></td>
      </tr>
    <?php
    }
    ?>
    </table>
</div>
<td><a href="https://toenweek13.azurewebsites.net/form.html"><button type="button" class="btn btn-success">Add</button></a></td>
<?php
mysqli_close($conn);
?>
</body>
</html>
