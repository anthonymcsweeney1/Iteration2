  <?php
        
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 

try {
    // prepare select query
    // Update claim status to 'Pending Approval' and a preser approver
    $query = "UPDATE `claims` SET `Status` = 'Pending Approval', `Approver` = 'David Foley', `ApproverEmail` = 'davidfoley1@techguys.com' WHERE `claims`.`ClaimID` = $id;";  echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
    $stmt = $con->prepare( $query );
 
  
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
   

   
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
            
           
        
    
    ?>
<htm>
    <a href="Claims.php" >Go back to Claim page</a>
    
</htm>