<?php
require '..\assets\class\database.class.php';
require '..\assets\class\function.class.php';
if($_GET){
    $post=$_GET;
    if($post['resume_id'] && $post['id'] ){
     
     
        try{
            $query="DELETE FROM education where id={$post['id']} AND resume_id={$post['resume_id']}";
     
            $db->query($query);
           
            $fn ->setAlert('Education deleted !');
            $fn->redirect('../updateresume.php?resume='.$post['slug']);
        }catch(Exception $error){
        
            $fn ->setError($error->getMessage());
            // $fn->redirect('../register.php');
            

        }
        
    }else{
        $fn ->setError('Please fill the form !');
        $fn->redirect('../updateresume.php?resume='.$post['slug']);
    }
}
else{
    $fn->redirect('../updateresume.php?resume='.$post['slug']);
}