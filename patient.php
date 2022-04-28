<?php 
session_start();
require 'connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select donor.*, patient.* from donor, patient where patient.DONORID=donor.DONORID && BGROUP LIKE '%$searchKey%'";
}else{
    $sql = "select donor.*, patient.* from donor, patient where patient.DONORID=donor.DONORID";
}
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
?>

<!DOCTYPE html>
<html>
<?php $title=" patient list"; ?>
<?php require 'head.php'; ?>
<body>
    <?php require 'header.php'; ?>
    <div class="container cont">
        
        <?php require 'message.php'; ?>
        
        <div class="row col-lg-8 col-md-8 col-sm-12 mb-3">
            <form method="get" action="" style="margin-top:-20px; ">
            <label class="font-weight-bolder">Check Patient Group:</label>
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
               <a href="patient.php" class="btn btn-info mr-4"> Reset</a>
               <input type="submit" name="submit" class="btn btn-info" value="search">
           </form>
        </div>

        <table class="table table-responsive table-striped rounded mb-5">
            
            <tr>
                <th>#</th>
                <th>First Name</th>
		<th>Middle Name</th>
		<th>Last Name</th>
                <th>Sex</th>
                <th>Age</th>
		<th>Address</th>
		<th>Phone</th>
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
                <td><?php echo ($row['FNAME']); ?></td>
		<td><?php echo ($row['MNAME']); ?></td>
		<td><?php echo ($row['LNAME']); ?></td>
		<td><?php echo ($row['SEX']); ?></td>
		<td><?php echo ($row['AGE']); ?></td>
		<td><?php echo ($row['ADDRESS']); ?></td>
		<td><?php echo ($row['PHONE']); ?></td>
                <td><?php echo ($row['BGROUP']); ?></td>

                <?php $DONOR_ID= $row['DONORID'];?>
                <?php $ID= $row['ID'];?>
                <?php $BGROUP= $row['BGROUP'];?>
                <form action="donor.php" method="post">
                    <input type="hidden" name="DONORID" value="<?php echo $DONORID; ?>">
                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                    <input type="hidden" name="BLGROUP" value="<?php echo $BLGROUP; ?>">

                <?php if (isset($_SESSION['$DONORID'])) { ?>
                <td><a href="javascript:void(0);" class="btn btn-info donor">Need Donor ?</a></td>
                <?php } else {(isset($_SESSION['BBNO']))  ?>
                <td><input type="submit" name="request" class="btn btn-info" value="Need Donor ?"></td>
                <?php } ?>
                
                </form>
            </tr>

        <?php } ?>
        </table>
    </div>
</body>

<script type="text/javascript">
    $('.donor').on('click', function(){
        alert("donor user can't request for blood.");
    });
</script>