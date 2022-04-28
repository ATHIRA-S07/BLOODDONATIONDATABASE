<?php 
session_start();
require 'connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select blood.*, bloodbank.* from blood, bloodbank where blood.BBNO=bloodbank.BBNUMBER && BTYPE LIKE '%$searchKey%'";
}else{
    $sql = "select blood.*, bloodbank.* from blood, bloodbank where blood.BBNO=bloodbank.BBNUMBER";
}
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
?>

<!DOCTYPE html>
<html>
<?php $title="Available Blood Samples"; ?>
<?php require 'head.php'; ?>
<body>
    <?php require 'header.php'; ?>
    <div class="container cont">
        
        <?php require 'message.php'; ?>
        
        <div class="row col-lg-8 col-md-8 col-sm-12 mb-3">
            <form method="get" action="" style="margin-top:-20px; ">
            <label class="font-weight-bolder">Select Blood Group:</label>
               <select name="search" class="form-control">
               <option><?php echo @$_GET['search']; ?></option>
               <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
               </select><br>
               <a href="blood.php" class="btn btn-info mr-4"> Reset</a>
               <input type="submit" name="submit" class="btn btn-info" value="search">
           </form>
        </div>
	
        <table class="table table-responsive table-striped rounded mb-5">
            
            <tr>
                <th>#</th>
                <th>Blood Bank Name</th>
                <th>Blood Bank address</th>
                <th>Availability</th>
		
                <th>Blood Group</th>
                <th>Action</th>
            </tr>

            <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
            }
            ?>
            </div>

        <?php while($row = mysqli_fetch_array($result)) { ?>

            <tr>
                <td><?php echo ++$counter;?></td>
                <td><?php echo $row['BBNAME'];?></td>
                <td><?php echo ($row['ADDRESS']); ?></td>
                <td><?php echo($row['AVAILABILITY']); ?></td>
		
                <td><?php echo ($row['BTYPE']); ?></td>

                <?php $BCODE= $row['BCODE'];?>
                <?php $BBNO= $row['BBNO'];?>
                <?php $BTYPE= $row['BTYPE'];?>
                <form action="request.php" method="post">
                    <input type="hidden" name="BCODE" value="<?php echo $BCODE; ?>">
                    <input type="hidden" name="BBNO" value="<?php echo $BBNO; ?>">
                    <input type="hidden" name="BTYPE" value="<?php echo $BTYPE; ?>">

                <?php if (isset($_SESSION['$BBNO'])) { ?>
                <td><a href="javascript:void(0);" class="btn btn-info bloodbank">Request Sample</a></td>
                <?php } else {(isset($_SESSION['REGNO']))  ?>
                <td><input type="submit" name="request" class="btn btn-info" value="Request Sample"></td>
                <?php } ?>
                
                </form>
            </tr>

        <?php } ?>
        </table>
    </div>
</body>

<script type="text/javascript">
    $('.bloodbank').on('click', function(){
        alert("bloodbank user can't request for blood.");
    });
</script>