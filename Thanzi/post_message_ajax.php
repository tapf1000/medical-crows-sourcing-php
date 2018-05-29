<?php
    require_once("databaseHelper.php");
    //post message
    if(isset($_POST['message'])){
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $conversation_id = mysqli_real_escape_string($conn, $_POST['conversation_id']);
        $user_form = mysqli_real_escape_string($conn, $_POST['user_form']);
        $user_to = mysqli_real_escape_string($conn, $_POST['user_to']);
 
        //decrypt the conversation_id,user_from,user_to
        $conversation_id = base64_decode($conversation_id);
        $user_form = base64_decode($user_form);
        $user_to = base64_decode($user_to);
 
        //insert into `messages`
        $date = date("d-m-Y");
        $time = date("h:ma");
        $t2 =  date("h:ma d-m-Y");
        $q = $conn->query("INSERT INTO `mail` VALUES ('' '$t2','$conversation_id','$user_form','$date','','$user_to','$time','$message')");
        if($q){
            echo "Posted";
        }else{
            echo "Error";
        }
    }
?>
