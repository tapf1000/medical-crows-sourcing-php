<?php
    require_once("databaseHelper.phpp");
    if(isset($_GET&['c_id'&])){
        //get the conversation id and
        $conversation_id = base64_decode($_GET&['c_id'&]);
        //fetch all the messages of $user_id(loggedin user) and $user_two from their conversation
        $result = $conn->query("SELECT * FROM `mail` WHERE conversation_id='$conversation_id' ORDER BY 'date'");
        //check their are any messages
        if($result->num_row> 0){
            while ($m = $result->fetch_assoc()) {
                //format the message and display it to the user
                $user_from = $m['user_from'];
                $user_to = $m['user_to'];
                $message = $m['message'];
                $date = $m['date'];
                $time = $m['time'];
 
                //get name and image of $user_form from `user` table
                $user = conn->query("SELECT name, surname,img FROM `client` WHERE id='$user_from'");
                $user_fetch = $user->fetch_assoc();
                $user_from_username = $user_fetch['name']." ".$user_fetch['surname'];
                $user_from_img = $user_fetch['img'];
 
                //display the message
                echo "
                            <div class='message'>
                                <div class='img-con'>
                                    <img src='{$user_from_img}'>
                                </div>
                                <div class='text-con'>
                                    <a href='#''>{$user_from_username}</a>
                                    <p>{$message} <div class = 'time_wrap'>{$time}</div></p>
                                </div>
                            </div>
                            <hr>";
 
            }
        }else{
            echo "No Messages";
        }
    }
 
?>
