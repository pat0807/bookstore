<?php
session_start();
include("../conn/connect.php");

if (isset($_POST['userId'])) {
    $fromUser = $_SESSION['nameid'];
    $toUser = $_POST['userId'];

    // Delete the chat records between the users from the database
    $deleteChat = mysqli_query($connect, "DELETE FROM messages WHERE (FromUser = '$fromUser' AND ToUser = '$toUser') OR (FromUser = '$toUser' AND ToUser = '$fromUser')")
        or die("Failed to delete chat: " . mysqli_error($connect));

    // Handle the deletion success response or error message accordingly
    if ($deleteChat) {
        echo "Chat deleted successfully!";
    } else {
        echo "Failed to delete chat.";
    }
}
?>
