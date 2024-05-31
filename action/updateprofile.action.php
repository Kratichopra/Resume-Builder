<?php

require '..\assets\class\database.class.php';
require '..\assets\class\function.class.php';
if($_POST){
    $post=$_POST;
    if($post['full_name'] && $post['email_id'] ){
        $full_name=$db->real_escape_string($post['full_name']);
        $email_id=$db->real_escape_string($post['email_id']);
        $password=md5($db->real_escape_string($post['password']));
        $authid=$fn->Auth()['id'];
        $result =$db->query("select count(*) as user from users where (email_id='$email_id' && id=$authid)");
        $result = $result->fetch_assoc();
        if($result['user']){
            $fn ->setError($email_id .' is already registered !' );
            $fn->redirect('../account.php');
            die(); 
        }
        if($password!=''){
            $db->query("update users set full_name='$full_name', email_id ='$email_id',password='$password' where id=$authid");
        }else{
            $db->query("update users set full_name='$full_name', email_id ='$email_id' where id=$authid");
        }
            
            $fn ->setAlert('Profile is updated!');
            $fn->redirect('../account.php');
             
    }else{
        
        $fn ->setError('Please fill the form !');
        $fn->redirect('../account.php');
    }
}
else{
    $fn->redirect('../account.php');
}