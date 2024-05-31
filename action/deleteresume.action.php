<?php
require '..\assets\class\database.class.php';
require '..\assets\class\function.class.php';
if($_GET){
    $post=$_GET;
    if( $post['id'] ){
        $authid=$fn->Auth()['id'];
     
        try{
            $query="DELETE resumes,skills,education,experiences FROM resumes ";
            $query.="LEFT JOIN skills ON resumes.id=skills.resume_id";
            $query.=" LEFT JOIN education ON resumes.id=education.resume_id";
            $query.=" LEFT JOIN experiences ON resumes.id=experiences.resume_id";
            $query.=" WHERE resumes.id={$post['id']} AND resumes.user_id=$authid";
            // echo $query;
            // die();
            $db->query($query);
           
            $fn ->setAlert('Resume deleted !');
            $fn->redirect('../myresumes.php');
        }catch(Exception $error){
        
            $fn ->setError($error->getMessage());
            echo $error->getMessage();
            // $fn->redirect('../register.php');
            

        }
        
    }else{
        $fn ->setError('Please fill the form !');
        $fn->redirect('../myresumes.php');
    }
}
else{
    $fn->redirect('../myresumes.php');}