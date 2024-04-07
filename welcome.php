<?php
print_r($_POST);
if(isset($_POST['jsVariable'])) {
    $jsVariable = $_POST['jsVariable']; // Receive JavaScript variable
    echo "Received JavaScript variable: " . $jsVariable;
} else {
    echo "JavaScript variable not received.";
}
?>