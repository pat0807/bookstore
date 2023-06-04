<?php
    session_start();
    include("../conn/connect.php");
    include("links.php");

    
    if (isset($_SESSION['nameid']) && $_SESSION['nameid'] !== "") {
        $nameid = $_SESSION['nameid'];
        
        $name = mysqli_query($connect, "SELECT * FROM memberdata WHERE id = '".$nameid."'")
            or die("Failed to query the database: ".mysqli_error($connect));
        $name = mysqli_fetch_assoc($name);
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
                <p>Hi <?php echo $name["name"]; ?></p>
                <input type="text" id="fromUser" value=<?php echo $name['id']; ?> hidden />

                <p>Send Message to :</p>
                <ul>
                    <?php
                        $msgs= mysqli_query($connect, "SELECT * FROM memberdata")
                            or die("Failed to query database");
                            while($msg = mysqli_fetch_assoc($msgs))
                            {
                                echo '<li><a href="?toUser='.$msg["id"].'">'.$msg["name"].'</a></li>';
                            }
                        ?>
                </ul>
                <a href="index.php"><-- Back</a>
            </div>
            <div class="col-md-4">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>
                            <?php
                                if (isset($_GET["toUser"])) {
                                    $userName = mysqli_query($connect, "SELECT * FROM memberdata WHERE id = '" . $_GET["toUser"] . "' ")
                                        or die("Failed to query database" );
                                    $uName = mysqli_fetch_assoc($userName);
                                    echo '<input type="text" value=' . $_GET["toUser"] . ' id="toUser" hidden/>';
                                    echo $uName["name"] . ' <button class="delete-btn" data-id="' . $_GET["toUser"] . '">Delete</button>';
                                } else {
                                    $userName = mysqli_query($connect, "SELECT * FROM memberdata")
                                        or die("Failed to query database" );
                                    $uName = mysqli_fetch_assoc($userName);
                                    $_SESSION["toUser"] = $uName["id"];
                                    echo '<input type="text" value=' . $_SESSION["toUser"] . ' id="toUser" hidden/>';
                                    echo $uName["name"] . ' <button class="delete-btn" data-id="' . $_SESSION["toUser"] . '">Delete</button>';
                                }
                                ?>
                             </h4>
                        </div>
                        <div class="modal-body" id="msgBody" style="height:400px; overflow-y: scroll; overflow-x: hidden;">
                            <?php
                                if(isset($_GET["toUser"])) 
                                    $chats = mysqli_query($connect, "SELECT * FROM messages where (FromUser = '".$_SESSION["nameid"]."' AND
                                        ToUser = '".$_GET["toUser"]."') OR (FromUser = '".$_GET["toUser"]."' AND ToUser = '".$_SESSION["nameid"]
                                        ."')")
                                    or die("Failed to query database");
                                else
                                    $chats = mysqli_query($connect, "SELECT * FROM messages where (FromUser = '".$_SESSION["nameid"]."' AND
                                        ToUser = '".$_SESSION["toUser"]."') OR (FromUser = '".$_SESSION["toUser"]."' AND ToUser = '".$_SESSION["nameid"]
                                        ."')")
                                    or die("Failed to query database");


                                    while($chat = mysqli_fetch_assoc($chats))
                                    {
                                        if($chat["FromUser"] == $_SESSION["nameid"])
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
    $(document).ready(function(){
        $("#send").on("click",function(){
            $.ajax({
                url:"insertMessage.php",
                method:"POST",
                data:{
                    fromUser: $("#fromUser").val(),
                    toUser: $("#toUser").val(),
                    message: $("#message").val()
                },
                dateType:"text",
                success:function(data)
                {
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

        setInterval(function(){
            $.ajax({
                url:"realTimeChat.php",
                method:"POST",
                data:{
                    fromUser:$('#fromUser').val(),
                    toUser:$('#toUser').val()
                },
                dataType:"text",
                success:function(data)
                {
                    $("#msgBody").html(data);
                }
            });
        }, 700);
    });
</script>
</html>

