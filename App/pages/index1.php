<?php
session_start();
@include 'config.php';
$id = $_GET['buy'];
if (isset($_POST['pay'])) {
    global $id;
    // $pname=$_SESSION['pname'];
    // $sql1="SELECT * FROM items WHERE id='$id'";
    // $select1=mysqli_query($conn,$sql1);
    // $row1 = mysqli_fetch_assoc($select1);
    // $itemid=$row1['id'];
    // $tx_ref = $_POST['tx_ref'];
    $query = "UPDATE items SET status = 'sold' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();

 
    if(isset($message)){
        foreach($message as $mess){
           echo '<span class="message">'.$mess.'</span>';
        }
     }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <form method="POST" action="https://api.chapa.co/v1/hosted/pay" onsubmit="handleSubmit(event)">
            <h2>Payment Form</h2>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="first_name" required>
            </div>
            <!-- <?php echo $id; ?> -->
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="amount" value="<?=$_GET['price'];?>" readonly required>
            </div>

            <!-- Hidden Chapa fields -->
            <input type="hidden" name="public_key" value="CHAPUBK_TEST-wC9rJ7sXg3w4JFPydLWx2UhEG6ZMXFpl">
            <input type="hidden" name="tx_ref" id="tx_ref" value="">
            <input type="hidden" name="currency" value="ETB">
            <input type="hidden" name="description" value="Paying with Confidence with cha">
            <input type="hidden" name="title" value="Let us do this">
            <input type="hidden" name="logo" value="https://chapa.link/asset/images/chapa_swirl.svg">
            <input type="hidden" name="callback_url" value="https://example.com/callbackurl">
            <input type="hidden" name="meta[title]" value="test">
            
            <!-- <input type="hidden" name="item_id" value="ID_OF_THE_ITEM_BEING_PURCHASED"> -->

            <!-- Hidden fields dynamically populated -->
            <input type="hidden" id="hidden_email" name="hidden_email" value="">
            <input type="hidden" id="hidden_first_name" name="hidden_first_name" value="">
            <input type="hidden" id="hidden_last_name" name="hidden_last_name" value="">
            <input type="hidden" id="hidden_amount" name="hidden_amount" value="">

            <button type="submit" name="pay">Pay</button>
        </form>
    </div>

    <script>
        function handleSubmit(event) {
            const txRef = 'tx-' + Date.now();
            document.getElementById('tx_ref').value = txRef;
            
            // Populate hidden fields
            document.getElementById('hidden_email').value = document.getElementById('email').value;
            document.getElementById('hidden_first_name').value = document.getElementById('fname').value;
            document.getElementById('hidden_last_name').value = document.getElementById('lname').value;
            document.getElementById('hidden_amount').value = document.getElementById('price').value;
        }
    </script>
</body>
</html>
