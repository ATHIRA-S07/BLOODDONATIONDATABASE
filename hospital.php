<?php 
session_start();
require 'connection.php';
$sql = "select hospital.*, orders.*,hospital_location.* from hospital, orders,hospital_location where hospital.REGNO=orders.REGNO && hospital.REGNO=hospital_location.REGNO ";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
?>

<!DOCTYPE html>
<html>
<?php $title="hospital list"; ?>
<?php require 'head.php'; ?>
<body>
    <?php require 'header.php'; ?>
    <div class="container cont">
        
        <?php require 'message.php'; ?>
        
                <table class="table table-responsive table-striped rounded mb-5">
            
            <tr>
                <th>#</th>
                <th>Hospital Name</th>
		<th>Hospital Location</th>
		<th>Phone</th>
		<th>Blood Bank number</th>
                <th>Hospital regno</th>
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
                <td><?php echo ($row['NAME']); ?></td>
		<td><?php echo ($row['LOCATION']); ?></td>
		<td><?php echo ($row['PHONE']); ?></td>
		<td><?php echo ($row['BBNUMBER']); ?></td>
		<td><?php echo ($row['REGNO']); ?></td>
		

                <?php $REG_NO= $row['REGNO'];?>
                
                <form action="hospital.php.php" method="post">
                    <input type="hidden" name="REGNO" value="<?php echo $REGNO; ?>">
                    

                
                
                </form>
            </tr>

        <?php } ?>
        </table>
    </div>
</body>

