<?php
   // include("connection.php");

                    /*Login Functions*/
    function check_login($con){
        if(isset($_SESSION['user_id'])){
            $id = $_SESSION['user_id'];
            $query = "select * from users where user_id = '$id' limit 1";

            $result = mysqli_query($con,$query);
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }

        //ridirect to login
        header("Location:login.php");
        die;
    }

    function check_Admin($type){
        if($type == "Admin"){
            return 1;
        }else{
            return 0;
        }
    }

    function random_num($length){
        $text = "";
        if($length < 5){
            $length = 5;
        }
        //random number between 4 - length
        $len = rand(4,$length);

        for($i=0; $i < $len; $i++){
            $text .= rand(0,9);
        }
        return $text;
    }

    function testInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
                        /*Comment Functions*/
    function setComment($con,$user_data){
        if(isset($_POST['commentSubmit'])){
            $name = $_POST['name'];
            $name = testInput($name);
            if(empty($name)){
                $name = "Anonymous";
            }
            $date = $_POST['date'];
            $comment = $_POST['comment'];
            $comment = testInput($comment);

            $email=$user_data['email'];
            $user_id=$user_data['user_id'];

            $sql = "INSERT INTO comments (user_id,email,name,comment,date)
                VALUES ('$user_id','$email','$name','$comment','$date')";
            $result = $con->query($sql);
        }
    }

    function getYourComments($con,$user_data){
        $mailCheck = $user_data['email'];
        $sql = "SELECT * FROM comments WHERE email = '$mailCheck' ";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
            echo "<div class='comment-box'>";
                echo $row['name']."<br>";
                echo $row['date']."<br>";
                echo "<h4>";
                    echo $row['comment']."<br>";
                echo "</h4>";
                echo "<form class='del-form' method='POST' action='".@deleteCommentsUser($con)."'>
                        <input type='hidden' name='id' value='".$row['id']."'>
                        <button type='submit' name='commentDelete'>Delete</button>
                    </form>";
            echo "</div>";

            //to @ einai gia na kanei ignore ta warnings sto delete
        }

    }

    function getAllComments($con){
        $sql = "SELECT * FROM comments";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
            echo "<div class='comment-box'>";
                echo $row['name']."<br>";
                echo $row['date']."<br>";
                echo "<h4>";
                    echo $row['comment']."<br>";
                echo "</h4>";
            echo "</div>";
        }
    }

    function deleteCommentsUser($con){
        if(isset($_POST['commentDelete'])){
            $id = $_POST['id'];
            $sql = "DELETE FROM comments WHERE id='$id'";
            $result = $con->query($sql);
            header("Location:showComments.php");
        }
    }

    function deleteComments($con){
        if(isset($_POST['commentDelete'])){
            $id = $_POST['id'];
            $sql = "DELETE FROM comments WHERE id='$id'";
            $result = $con->query($sql);
            header("Location:adminDeleteSystem.php");
        }
    }

                            /*Admin Functions*/
    function deleteUsers($con){
        if(isset($_POST['userDelete'])){
            $email = $_POST['email'];
            $sql = "DELETE FROM users WHERE email='$email'";
            $result = $con->query($sql);
            $sql = "DELETE FROM comments WHERE email='$email'";
            $res = $con->query($sql);
            $sql = "DELETE FROM reservations WHERE email='$email'";
            $res = $con->query($sql);
            header("Location:adminDeleteSystem.php");
        }
    }

    function refresh($con){
        if(isset($_POST['refresh'])){
            $dt1 = $_POST['date'];
            $dt2 = date('Y-m-d');
            $sql = "DELETE FROM reservations WHERE date < DATE_SUB(NOW() , INTERVAL 1 DAY) ";
            $result = $con->query($sql);
            header("Location:adminDeleteSystem.php");
        }
    }

    function getUsers($con){
        echo "<div class='comment-box' style='text-align:center'>";
            echo "<form class='del-form' method='POST' action='".@deleteUsers($con)."'>
                <input name='email' type='email' style='margin-right:10px;border:1px solid black;border-radius:5px'>
                <button type='submit' name='userDelete'>Delete</button>
            </form>";
        echo "</div>";
    }

    function refreshReservations($con){
        echo "<div class='comment-box' style='text-align:center'>";
            echo "<form class='del-form' method='POST' action='".refresh($con)."'>
                <button type='submit' name='refresh'>Refresh Reservations</button>
            </form>";
        echo "</div>";
    }

    function getAllCommentsAdmin($con){
        $sql = "SELECT * FROM comments";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
            echo "<div class='comment-box'>";
                echo $row['name']."<br>";
                echo $row['date']."<br>";
                echo "<h4>";
                    echo $row['comment']."<br>";
                echo "</h4>";

                echo "<form class='del-form' method='POST' action='".deleteComments($con)."'>
                    <input type='hidden' name='id' value='".$row['id']."'>
                    <button type='submit' name='commentDelete'>Delete</button>
                </form>";
            echo "</div>";
        }
    }


    /*Reservation check full */
    function checkFull($con,$date){

        $fullCheck = "SELECT * FROM reservations WHERE date = '$date'";
        $result = mysqli_query($con,$fullCheck);

        if(mysqli_num_rows($result) > 80){
            return 0;
        }else{
            return 1;
        }
    }

    function checkAccRes($con,$email,$date){

        $fullCheck = "SELECT * FROM reservations WHERE email = '$email' AND date = '$date'";
        $result = mysqli_query($con,$fullCheck);

        if(mysqli_num_rows($result) >= 2){
            return 0;
        }else{
            return 1;
        }
    }



                    /*Population Functions*/

    /*User Populate*/
    function populate($con){
        $filename = "user.json";
        $data = file_get_contents($filename);

        $type = "Registerd";
        $r = json_decode($data,true);

        for($i=0;$i<50;$i++){
            $user_id = random_num(20);
            $email = $r['results'][$i]['email'];
            $pass = $r['results'][$i]['login']['md5'];

            $sql = "INSERT INTO users(user_id,email,password,type)
                VALUES ('$user_id','$email','$pass','$type')";
            $result = $con->query($sql);
        }

    }



    /*Comment insert*/
    function Commentspopulate($con){
        $filename = "user.json";
        $data = file_get_contents($filename);
        $r = json_decode($data,true);

        $filename2 = "comments.json";
        $data2 = file_get_contents($filename2);
        $c = json_decode($data2,true);

        $j=0;

        for($i=0;$i<50;$i+=5){
            $name = $r['results'][$i]['name']['first'];
            $email = $r['results'][$i]['email'];
            $comment = $c['results'][$j]['quote'];
            $date = date("Y/m/d h:i:s");

            $id = "SELECT user_id FROM users WHERE email = '$email'";
            $result = $con->query($id);

            /* fetch object array */
            if(!$row = $result->fetch_row()){
                echo "query fetch";
            }
            $sql = "INSERT INTO comments (user_id, email, name, comment,date)
                    VALUES ('$row[0]','$email','$name','$comment','$date')";
            if(!$result = $con->query($sql)){
                echo "$row[0] , $email , $name , $comment , $date "."<br>";
            }

            $j++;
        }

    }