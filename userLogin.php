<?php
    require_once('includes/AdminUserDAO.php');
    session_start();
    if(isset($_SESSION['AdminID'])){
        if($_SESSION['AdminID']->isAuthenticated()){
            session_write_close();
            header('Location:mailing_list.php');
        }
    }
    $missingFields = false;
    if(isset($_POST['submit'])){
        if(isset($_POST['username']) && isset($_POST['password'])){
            if($_POST['username'] == "" || $_POST['password'] == ""){
                $missingFields = true;
            } else {
                //All fields set, fields have a value
                $AdminID = new AdminUserDAO();
                if(!$AdminID->hasDbError()){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $AdminID->authenticate($username, $password);
                    if($AdminID->isAuthenticated()){
                        $_SESSION['AdminID'] = $AdminID;
                        header('Location:mailing_list.php');
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<?php include "header.php";?>
    <body>
        <!-- MESSAGES -->
        <?php
            //Missing username/password
            if($missingFields){
                echo '<h3 style="color:#FFEBCD;">Please enter both a username and a password</h3>';
            }

            //Authentication failed
            if(isset($AdminID)){
                if(!$AdminID->isAuthenticated()){
                    echo '<h3 style="color:#FFEBCD;">Login failed. Please try again.</h3>';
                }
            }
        ?>

        <form name="login" id="login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit" value="Login"></td>
                <td><input type="reset" name="reset" id="reset" value="Reset"></td>
            </tr>
        </table>
            <?php //echo '<p>Session ID: ' . session_id() . '</p>';?>
        </form>
    </body>
</html>
