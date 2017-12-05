<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mortgage Calculator</title>      
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keyword" content="PHP, 'Mortgage Calculator', 'Github Project'">
        <meta name="description" content="This app helps you to calculate your monthly mortgage payment.">
        <meta name="author" content="Moses Ajireloja">
        <link rel="stylesheet" href="style.css" type="text/css" media="all">
    </head>  
    <body>
        <div id="container">
        <h2 class="title">MORTGAGE CALCULATOR</h2>
        <p class="welcome">
        Welcome to the Mortgage Calculator.<br>
        This app helps you to calculate your monthly mortgage payment.<br>
        Simply fill out the fields required.
        </p>
        <!-- Display the Input Form by default -->
            <form action="" method="post" class="form">
            <table border=1 cellpadding=5px>
                <tr>
                    <td>How much would you like to borrow? (Amount of mortgage): </td>
                    <td><input type="number" name="loan" value="" required="required"></td>
                </tr>
                <tr>
                    <td> What is the interest rate per year?: </td>
                    <td><input type="number" name="rate" value="" required="required"></td>
                </tr>
                <tr>
                    <td> How long do you wish to pay back the mortgage? (years): </td>
                    <td><input type="number" name="time" value="" required="required"></td>
                </tr>
                <tr>
                    <td colspan=2>
                        <input type="submit" name="submit" value="Calculate Now" class="button">
                        <input type="reset" name="Reset"  value="Reset" class="button">
                    </td>
                </tr>
            </table>            
            </form>
            
            <div id="result">
        <?php                   
        // Validate the user's input.
            if (isset($_POST['submit'])) {
                
                 if (!empty($_POST['loan']) && !empty($_POST['rate']) && !empty($_POST['time']) && is_numeric($_POST['loan']) && is_numeric($_POST['rate']) && is_numeric($_POST['time'])) {
                    // Obtain the entered data
                        $loan = htmlentities($_POST['loan']);
                        $rate1 = htmlentities($_POST['rate']);
                        $time1 = htmlentities($_POST['time']);
                        // Start performing arithmetic operation.
                       $rate2 = ($rate1/100)/12;
                       $time2 = $time1*12;
                       $output = ($rate2/(1-(pow((1+$rate2), -$time2))))*$loan;
                }
                else {
                    // If the textfields are empty, display this:
                    echo "<h2 class='title'><b>NOTIFICATION</b></h2>";
                    echo "Please type your values in the textfields displayed.<br> Thank you.";
                }
            
            // Display notification after conversion.
            if (isset($output)) {
                echo "<h2 class='title'><b>RESULT</b></h2>";
                echo "<b>Your monthly mortgage payment is: " . number_format($output) . ".</b>";
                echo "<br>Thank you.";
                echo "<hr>";
                echo "<u>Mortgage Summary</u><br>";
                echo "Mortgage Amount: " . number_format($loan) . "<br>";
                echo "Annual Interest Rate: " . $rate1 . "<br>";
                echo "Mortgage term: " . $time1 . " years.<br>";
            }
            }
            ?>
        </div>
        </div>
    </body>
</html>
