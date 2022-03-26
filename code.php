

<?php
    
    session_start();
    //include_once 'dbconfig.php';
    $con = mysqli_connect('localhost','root','','studentdb');

   
    if(isset($_POST['insert_button']))
    {    
        //$fullname = $_POST['fullname'];
        $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
        $course = $_POST['course'];
        $email = $_POST['email'];
        //$image = $_POST['image_profile'];
        //*******insert pic */
        //$fullname = mysqli_real_escape_string($con, $_POST['fullname']);
        $image1 = $_FILES['image_profile']['name'];
    
        $path = "uploads/"; /** Path for Uploading your Image **/
            
        $image_extension = pathinfo($image1, PATHINFO_EXTENSION); /** Image Extension **/
        $filename = time().'.'.$image_extension; /** Renaming the Image **/

        ///*********************** */

        $query = "INSERT INTO students (fullname,course,email,image) VALUES ('$fullname','$course','$email','$filename')";
        $result = mysqli_query($con, $query); 
//******************** */
//$query_run = mysqli_query($con, $query);

//move_uploaded_file($_FILES['image_profile']['tmp_name'], $path."/".$filename);

    //********* */
        if($result) 


        {

           // Upload Image to uploads folder
          move_uploaded_file($_FILES['image_profile']['tmp_name'], $path."/".$filename);
          exit(0);
            echo "Data Inserted Successfully!";
            //header('Location: index-login.php');
        } 
        else
        {
            echo "Data Not Inserted!. Error: " . $sql . "" . mysqli_error($conn);
            exit(0);
        }
    }

    
?>