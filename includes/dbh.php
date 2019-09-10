<?php
/**
 * @author: antongritsyk
 * Date: 2019-04-03
 * Time: 03:48
 */


class Dbh {


//   private $servername = "localhost:8889";
//   private $username = "root";
//   private $password = "root";
//   private $dbname = "wp_eatery";

   private $conn;
   private $mysqli;

    /**
     * Dbh constructor.
     *
     * @param $servername
     * @param $username
     * @param $password
     * @param $dbname
     */
   public function __construct($servername, $username, $password, $dbname) {
       $this->setConn(new mysqli($servername, $username, $password, $dbname));
       if($this->mysqli->errno){
           $this->dbError = true;
       }else{
           $this->dbError = false;
       }
   }

    /**
     * @param mixed $conn
     */
    public function setConn($conn): void
    {
        $this->conn = $conn;
    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }


    /**
     * This function adds user to the database .
     *
     * @param $name
     * @param $phone
     * @param $email
     * @param $referral
     */
   function addUser($name, $phone, $email, $referral)
   {
       
       if ($this->valid($name, $phone, $email, $referral)) {



           $saltedEmail = password_hash($email, PASSWORD_BCRYPT);

           $sql = "INSERT INTO mailingList (customerName, phoneNumber, emailAddress, referrer)
          VALUES ('$name', '$phone', '$saltedEmail', '$referral')";


           if ($this->getConn()->query($sql) === TRUE) {
               echo "New record created successfully";

           } else {
               echo "Error: " . $sql . "<br>" . $this->getConn()->error;
           }

       }
   }


   function deleteUser($id)
   {


       $query = "DELETE FROM mailingList WHERE _id = $id";

       if ($this->getConn()->query($query) === TRUE) {
           echo "record #$id deleted successfully";

       } else {
           echo "error";
       }
   }




    /**
     * This function validates inputs.
     *
     * @param $name
     * @param $phone
     * @param $email
     * @param $referral
     *
     * @return bool true  if input is valid
     *              false if input is not valid.
     */
   function valid($name, $phone, $email, $referral) {

       $flag = true;
       // Validates name.
       if(!preg_match("/^([a-zA-Z' ]+)$/",$name)){
           echo 'Invalid name given.'."<br>";
           $flag = false;
       }

        // validates phone
       if(!preg_match("/^[0][1-9]\d{9}$|^[1-9]\d{9}$/", $phone)) {
           echo "invalid phone number"."<br>";
           $flag = false;
       }

       // validates email
       if(!preg_match("/^\S+@\S+$/", $email)) {
           echo "invalid email address"."<br>";
           $flag = false;
       }

       // validates referrals
       if (!isset($referral)) {
           echo "select referrer"."<br>";
           $flag = false;
       }
       return $flag;
    }

    /**
     * This function displays all users in a table;
     */
    public function displayAllUsers() {

       $sql = "SELECT * FROM mailingList;";

       $result = mysqli_query($this->getConn(), $sql);
       $resultCheck = mysqli_num_rows($result);
       echo "<table>";
       if ($resultCheck > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<tr>";
               echo "<td>".$row['_id']."</td>";
               echo "<td>".$row['customerName']."</td>";
               echo "<td>".$row['phoneNumber']."</td>";
               echo "<td>".$row['emailAddress']."</td>";
               echo "<td>".$row['referrer']."</td>";
               echo "</tr>";
           }
       }

       echo "</table>";

    }

}































//
//
//
//
//
//
//<?php
///**
// * Created by PhpStorm.
// * @author: antongritsyk
// * Date: 2019-04-03
// * Time: 03:48
// */
//
//
//
//$servername = "localhost:8889";
//$username = "root";
//$password = "root";
//$dbname = "wp_eatery";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//
//$name = $_POST['customerName'];
//$phone = $_POST['phoneNumber'];
//$email = $_POST['emailAddress'];
//$referral = $_POST['referral'];
//
//$sql = "INSERT INTO mailingList (customerName, phoneNumber, emailAddress, referrer)
//VALUES ('$name', '$phone', '$email', '$referral')";
//
//if (Dbh::valid($name, $phone, $email, $referral)) {
//    if ($conn->query($sql) === TRUE) {
//        echo "New record created successfully";
//        header("LOCATION: ../mailing_list.php");
//
//    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error;
//    }
//
//}
//
//$conn->close();
//
//class Dbh {
//
//    function addUser() {
//
//    }
//
//    static function valid($name, $phone, $email, $referral) {
//
//        $flag = true;
//        if (preg_match("/^[^<,\"@/{}()*$%?=>:|;#]*$/i", $name))
//            return true;
//        else {
//            echo "bad name";
//            return false;
//        }
//
//        return $flag;
//
//
//
//    }
//
//}
//
//
//
//



















