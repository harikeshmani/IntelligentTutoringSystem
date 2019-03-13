<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
$postdata = $_POST;
$msg = '';
if (isset($postdata ['key'])) {
$key                =   $postdata['key'];
$salt               =   $postdata['salt'];
$txnid              =   $postdata['txnid'];
$amount             =   $postdata['amount'];
$productInfo        =   $postdata['productinfo'];
$firstname          =   $postdata['firstname'];
$email              =   $postdata['email'];
$udf5               =   $postdata['udf5'];
$mihpayid           =   $postdata['mihpayid'];
$status             =   $postdata['status'];
$resphash               =   $postdata['hash'];
//Calculate response hash to verify
$keyString          =   $key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
$keyArray           =   explode("|",$keyString);
$reverseKeyArray    =   array_reverse($keyArray);
$reverseKeyString   =   implode("|",$reverseKeyArray);
$CalcHashString     =   strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));


if ($status == 'success') {
$msg = "Transaction Successful";
$resp = '1';
//Do success order processing here...
}
else {
//tampered or failed
$msg = "Payment failed for Hasn not verified...";
$resp = '0';
}
}
else exit(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("header.php") ?>
    </head>
    <body>
        <div class="body">
            <?php include("menu.php") ?>
            <div role="main" class="main">
                <section class="page-header">
                    <div class="container">
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col">
                                <h1>Payment Status</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="heading heading-border heading-bottom-border">
                                <h3><?php echo $msg ?></h3>
                            </div>
                            <?php
                            if ($resp == '1') {
                            echo "<h3>Thank You. Your order is Successful</h3>";
                            echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
                            echo "<h4>We have received a payment of Rs. " . $amount . ".</h4>";
                            echo "<a href='home.php'><button class='btn btn-primary mb-5'>Home</button></a>";
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://pinkrickshawdesign.in/its/api/update_order_payment_status.php",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => "session_id=$udf5&user_id=$user_id",
                            CURLOPT_HTTPHEADER => array(
                            "Cache-Control: no-cache",
                            "Content-Type: application/x-www-form-urlencoded",
                            ),
                            ));
                            $response = curl_exec($curl);
                            $err = curl_error($curl);
                            curl_close($curl);
                            } else {
                            echo "<h3>Your order is Unsuccessful</h3>";
                            echo "<h4>Try Agin</h4>";
                            echo "<a href='home.php'><button class='btn btn-primary mb-5'>Home</button></a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("footer.php") ?>
        </div>
        <!-- Vendor -->
        <?php include("footer_files.php"); ?>
    </body>
</html>