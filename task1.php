<?php 
            $url='localhost';
        $username='root';
        $password='';
        $con=mysqli_connect($url,$username,$password,"mcq");


 // $data = json_decode(file_get_contents('php://input'), true);
// print_r($data);exit;
if($_REQUEST!=''){

    $staffId = $_REQUEST['user_id'];



    $response=array();
    
if($_REQUEST['user_id']!=""){

$question= mysqli_query($con,"select * from questions"); 
while($questions1=mysqli_fetch_array($question)) {
       $q_id=$questions1['id'];
       $dep_value['text']= $questions1['question'];
       $dep_value['createdat']= $questions1['created_at'];
       
    $choices= mysqli_query($con,"select * from choices where question_id='$q_id'");
  
  $dep_value['choices']= array();
  while($choices1=mysqli_fetch_array($choices)) {
    $choice=array();
    
    
    $choice['text']=$choices1['choices'];
   array_push($dep_value['choices'], $choice);
  
  

         
  }
     $dep_values[]=$dep_value;
            
     

}
$response=$dep_values; 

 
 } else {      $dep_values ="data_not_found";  }

 

 
     echo json_encode($dep_values);
     
}else{
  $response["result"] ="data_not_found"; 

 

 
     echo json_encode($response);
}
?>

