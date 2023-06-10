<?php
session_start();
include("/Applications/XAMPP/xamppfiles/htdocs/dashboard/2ndbstore/conn/connect.php");
include("links.php");
$connect = mysqli_connect("localhost", "root", "12345678", "system(2)");

if (isset($_SESSION['account']) && $_SESSION['account'] !== "") {
    $account = $_SESSION['account'];

    $name = mysqli_query($connect, "SELECT * FROM memberdata WHERE account = '".$account."'")
        or die("Failed to query the database: " . mysqli_error($connect));
    $name = mysqli_fetch_assoc($name);

    $productAccount = isset($_GET['account']) ? $_GET['account'] : ""; // Get the specific account from details.php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Chatbox</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <p>Hi <?php echo $name["account"]; ?></p>
                <input type="text" id="fromUser" value=<?php echo $name['id']; ?> hidden />

                <p>Send Message to :</p>
                <ul>
                    <?php
                    $msgs = mysqli_query($connect, "SELECT DISTINCT p.account, m.id FROM product p
                        JOIN memberdata m ON p.account = m.account
                        WHERE p.account != '$account'")
                        or die("Failed to query database: " . mysqli_error($connect));
                    
                    while ($msg = mysqli_fetch_assoc($msgs)) {
                        if ($msg['account'] === $productAccount) {
                            echo '<li><a href="?toUser=' . $msg["id"] . '&account=' . $productAccount . '">' . $msg["account"] . '</a></li>';
                        }     
                    }       
                    ?>
                </ul>
                <a href="../index.php"><-- Back</a>
            </div>
            <div class="col-md-4">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4>
                        <?php
                            $toUser = isset($_GET["toUser"]) ? $_GET["toUser"] : $_SESSION["toUser"];
                            $userNameQuery = mysqli_query($connect, "SELECT * FROM memberdata WHERE id = '" . $toUser . "' ")
                                or die("Failed to query database" . mysqli_error($connect));
                            
                            if (mysqli_num_rows($userNameQuery) > 0) {
                                $uName = mysqli_fetch_assoc($userNameQuery);
                                echo '<input type="text" value="' . $toUser . '" id="toUser" hidden/>';
                                echo $uName["account"] . ' <button class="delete-btn" data-id="' . $toUser . '">Delete</button>';
                            } else {
                                $uName = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM memberdata WHERE id = '" . $_SESSION["toUser"] . "' "))
                                    or die("Failed to query database" . mysqli_error($connect));
                                echo '<input type="text" value="' . $_SESSION["toUser"] . '" id="toUser" hidden/>';
                                echo $uName["account"] . ' <button class="delete-btn" data-id="' . $_SESSION["toUser"] . '">Delete</button>';
                            }
                        ?>
                        </h4>
                    </div>
                        <div class="modal-body" id="msgBody" style="height:400px; overflow-y: scroll; overflow-x: hidden;">
                            <?php
                            if (isset($_GET["toUser"])) 
                                $chats = mysqli_query($connect, "SELECT * FROM messages where (FromUser = '".$_SESSION["account"]."' AND
                                    ToUser = '".$_GET["toUser"]."') OR (FromUser = '".$_GET["toUser"]."' AND ToUser = '".$_SESSION["account"]
                                    ."')")
                                    or die("Failed to query database".mysqli_error($connect));
                            else
                                $chats = mysqli_query($connect, "SELECT * FROM messages where (FromUser = '".$_SESSION["account"]."' AND
                                    ToUser = '".$_SESSION["toUser"]."') OR (FromUser = '".$_SESSION["toUser"]."' AND ToUser = '".$_SESSION["account"]
                                    ."')")
                                    or die("Failed to query database".mysqli_error($connect));

                            while ($chat = mysqli_fetch_assoc($chats)) {
                                if ($chat["FromUser"] == $_SESSION["account"])
                                    echo "<div style= 'text-align:right;'>
                                        <p style= 'background-color:lightblue; word-wrap:break-word; display:inline-block;
                                            padding:5px; border-radius:10px; max-width:70%;'>
                                            ".$chat["Message"]."
                                        </p>
                                        </div>";
                                else
                                    echo "<div style= 'text-align:left;'>
                                        <p style= 'background-color:yellow; word-wrap:break-word; display:inline-block;
                                            padding:5px; border-radius:10px; max-width:70%;'>
                                            ".$chat["Message"]."
                                        </p>
                                        </div>";
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <textarea id="message" class="form-control" style="height:70px;"></textarea>
                            <button id="send" class="btn btn-primary" style="height:70%;">send</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

            </div>

        </div>

    </div>
    <?php
} else {
?>
    <script>
        alert('LOGIN FIRST!');
        history.back();
    </script>
<?php
}
?>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $("#send").on("click", function() {
        $.ajax({
            url: "insertMessage.php",
            method: "POST",
            data: {
                fromUser: $("#fromUser").val(),
                toUser: $("#toUser").val(),
                message: $("#message").val()
            },
            dataType: "text",
            success: function(data) {
                $("#message").val("");
            }
        });
    });

    $(document).ready(function() {
        $(".delete-btn").on("click", function() {
            var userId = $(this).data("id");
            if (confirm("Are you sure you want to delete the chat with this user?")) {
                $.ajax({
                    url: "deleteChat.php",
                    method: "POST",
                    data: {
                        userId: userId
                    },
                    dataType: "text",
                    success: function(data) {
                        // Handle the success response, such as removing the chat from the UI or showing a success message
                    }
                });
            }
        });
    });

    setInterval(function() {
        $.ajax({
            url: "realTimeChat.php",
            method: "POST",
            data: {
                fromUser: $('#fromUser').val(),
                toUser: $('#toUser').val()
            },
            dataType: "text",
            success: function(data) {
                $("#msgBody").html(data);
            }
        });
    }, 1000);
});
</script>
</html>
