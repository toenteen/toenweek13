<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>ITF Lab</title>
</head>
<body>
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
        <td><a href="edit.php?ID=<?php echo $Result['ID']?><button type="button" class="btn btn-info">Edit</button></a>    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Remove</button></td>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="del.php?ID=<?php echo $Result['ID']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Remove</a>
            </div>
        </div>
    </div>
</div>
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
