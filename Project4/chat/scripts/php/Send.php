<?php
   require '../../includes/database/connect.db.php';
   require '../../includes/functions/chat.func.php';
   require '../../../connectivity.php';
   // if(isset($_GET['sender']) && !empty($_GET['sender'])) {
   // 		$sender= $_GET['sender'];

   // 		if(isset($_GET['message']) && !empty($_GET['message'])) {
   // 			$message = $_GET['message'];

   // 			if(send_msg($sender,$message)){
   // 				echo 'Message sent';
   // 			}else{
   // 				echo 'Message wasn\'t sent';

   // 			}

   // 		} else{
   // 			echo 'No message was entered';
   // 		}	

   // 	}else {
   // 		echo 'No Name was entered';
   // 	}
     

         if(isset($_GET['message']) && !empty($_GET['message'])) {
            $message = $_GET['message'];
            $sender = $_POST['user'];
            if(send_msg($sender,$message)){
               echo 'Message sent';
            }else{
               echo 'Message wasn\'t sent';

            }

         } else{
            echo 'No message was entered';
         }
?>   