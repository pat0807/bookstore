<?php
session_start();
$connect = mysqli_connect("localhost", "root", "12345678", "system(2)"); 

if (isset($_POST['userId'])) {
    $toUser = $_POST['userId'];

    // Get the user ID of the logged-in user from the database
    $fromUserQuery = mysqli_query($connect, "SELECT id FROM memberdata WHERE account = '".$_SESSION['account']."'")
        or die("Failed to retrieve user ID: " . mysqli_error($connect));
    $fromUser = mysqli_fetch_assoc($fromUserQuery)['id'];

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
