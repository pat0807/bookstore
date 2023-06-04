<?php
    session_start();
    include("../conn/connect.php");
    include("links.php");

    if(isset($_SESSION["nameid"]))
    {
        $nameid = $_SESSION["nameid"];
        $name = mysqli_query($connect, "SELECT * FROM memberdata WHERE id = '".$nameid."'")
            or die("Failed to query the database: ".mysqli_error($connect));
        $name = mysqli_fetch_assoc($name);
        
        // Redirect to chatbox.php
        header("location: chatbox.php");
        exit; // Optional: terminate the script to prevent further execution
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Please Select Your Account</h4>
            </div>
            <div class="modal-body">
                <?php if(isset($_SESSION["name"])): ?>
                    <p><a href="startchat.php?nameid=<?php echo $_SESSION["nameid"]; ?>"><?php echo $_SESSION["name"]; ?></a></p>
                <?php else: ?>
                    <p>No account logged in.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
