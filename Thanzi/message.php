<?php
    //connect to the database
    require('databaseHelper.php');
    session_start();
    //shop not login  users from entering 
    if(isset($_SESSION['email'])){
        $user_id = $_SESSION['email'];
    }else{
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title> Messages </title>
</head>
<body>
	<?php require("header.php"); ?>
	<center>
        <strong>Hey <?php echo $_SESSION['name']." ".$_SESSION['surname']; ?>
    </center>
     
    <div class="message-body">
        <div class="message-left">
            <ul>
                <?php
                    //show all the users expect me
                    $sql = "SELECT * FROM `client` WHERE `client`.email != '$user_id'; ";
                    $result = $conn->query($sql);
                   
                    //display client table the results
                    if($result->num_rows > 0 ){
                    	while($row = $result->fetch_assoc()){
                        echo "<a href='message.php?email={$row['email']}&ref=cli'><li><img src='{$row['img']}'> {$row['name']} {$row['surname']}</li></a>";
                    	}
                    }
                    //display med_prac table the results
                     $sql1 = "SELECT * FROM `med_prac` WHERE `med_prac`.email != '$user_id'; ";
                     $result1 = $conn->query($sql1);
                     if($result1->num_rows > 0 ){
                    	while($row1 = $result1->fetch_assoc()){
                        echo "<a href='message.php?email={$row1['email']}&ref=mp'><li><img src='{$row1['img']}'> {$row1['name']} {$row1['surname']}</li></a>";
                    	}
                    }
                    if($result1->num_rows == 0 && $result->num_rows == 0){echo "<div class='alert'>No Messages</div>";}
                ?>
            </ul>
        </div>
 
        <div class="message-right">
            <!-- display message -->
            <div class="display-message">
            <?php
                //check id is set
                if(isset($_GET['email']) && isset($_GET['ref'])){
                    $user_two = trim(mysqli_real_escape_string($conn, $_GET['email']));
                    //check $user_two is valid
                    if($_GET['ref'] == "cli"){
                    	$result = $conn->query("SELECT `email` FROM `client` WHERE email = '$user_two' AND email != '$user_id'");
                    }	
                    if($_GET['ref'] == "mp"){
		           	$result = $conn->query("SELECT `email` FROM `med_prac` WHERE email = '$user_two' AND email != '$user_id'");
		           }
                    //valid $user_two
                    if($result->num_rows == 1){
                        //check $user_id and $user_two has conversation or not if no start one
                        $conver = $conn->query("SELECT * FROM `conversation` WHERE (user_1='$user_id' AND user_2='$user_two') OR (user_1='$user_two' AND user_2='$user_id')");
 
                        //they have a conversation
                        if($conver->num_rows == 1){
                            //fetch the converstaion id
                            $fetch = $conver->fetch_assoc();
                            $conversation_id = $fetch['conversation_id'];
                        }else{ //they do not have a conversation
                            //start a new converstaion and fetch its id
                            $conversation_id = $user_id."&c&". $user_two;
                            $q = $conn->query("INSERT INTO `conversation` VALUES ('$conversation_id','$user_id','$user_two')");
                           // $conn->insert_id($conn);
                        }
                    }else{
                        die("Invalid $_GET ID.");
                    }
                }else {
                    die("Click On the Person to start Chating.");
                }
            ?>
            </div>
            <!-- /display message -->
 
            <!-- send message -->
            <div class="send-message">
                <!-- store conversation_id, user_from, user_to so that we can send send this values to post_message_ajax.php -->
                <input type="hidden" id="conversation_id" value="<?php echo base64_encode($conversation_id); ?>">
                <input type="hidden" id="user_form" value="<?php echo base64_encode($user_id); ?>">
                <input type="hidden" id="user_to" value="<?php echo base64_encode($user_two); ?>">
                <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Enter Your Message"></textarea>
                </div>
                <button class = "button_group" name = "reply" id="reply">Reply</button> 
                <span id="error"></span>
            </div>
            <!-- / send message -->
        </div>
    </div>
    <script type="text/javascript" src="js/script.js"></script> 
</body>
</html>
