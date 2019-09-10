<?php


class AdminUserDAO
{


    protected static $DB_HOST = "localhost:8889";
    /* Database username */
    protected static $DB_USERNAME = "root";
    /* Database password */
    protected static $DB_PASSWORD = "root";
    /* Name of database */
    protected static $DB_DATABASE = "wp_eatery";

    private $username;
    private $password;

    private $lastLogin;
    private $adminID;

    private $mysqli;
    private $dbError;
    private $authenticated = false;





    function __construct() {

        $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME,
            self::$DB_PASSWORD, self::$DB_DATABASE);
        if($this->mysqli->errno){
            $this->dbError = true;
        }else{
            $this->dbError = false;
        }
    }


    /**
     * Responsible for user authentication
     *
     * @param $username String admin name
     * @param $password String admin password
     */
    public function authenticate($username, $password){
        $query = "SELECT * FROM adminusers WHERE username = ? AND password = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $this->username = $username;
            $this->password = $password;
            $this->authenticated = true;
            $user = $result->fetch_assoc();
            if(!is_null($user['Lastlogin'])){

                $this->lastLogin = $user['Lastlogin'];
                $this->adminID = $user['AdminID'];
            }else{
                // when user logs in first time
                $this->lastLogin = 'never';
            }

            /**
             * Updating LastLogin
             */
            $query = "UPDATE adminusers SET lastLogin = now() WHERE username = ? AND password = ?";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();


        }
        // Frees up the memory
        $stmt->free_result();
    }





    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param mixed $lastLogin
     * @return AdminUserDAO
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdminID()
    {
        return $this->adminID;
    }

    /**
     * @param mixed $adminID
     * @return AdminUserDAO
     */
    public function setAdminID($adminID)
    {
        $this->adminID = $adminID;
        return $this;
    }



    public function isAuthenticated(){
        return $this->authenticated;
    }
    public function hasDbError(){
        return $this->dbError;
    }
    public function getUsername(){
        return $this->username;
    }




    /**
     * @return string
     */
    public static function getDBHOST(): string
    {
        return self::$DB_HOST;
    }

    /**
     * @param string $DB_HOST
     */
    public static function setDBHOST(string $DB_HOST): void
    {
        self::$DB_HOST = $DB_HOST;
    }

    /**
     * @return string
     */
    public static function getDBUSERNAME(): string
    {
        return self::$DB_USERNAME;
    }

    /**
     * @param string $DB_USERNAME
     */
    public static function setDBUSERNAME(string $DB_USERNAME): void
    {
        self::$DB_USERNAME = $DB_USERNAME;
    }

    /**
     * @return string
     */
    public static function getDBPASSWORD(): string
    {
        return self::$DB_PASSWORD;
    }

    /**
     * @param string $DB_PASSWORD
     */
    public static function setDBPASSWORD(string $DB_PASSWORD): void
    {
        self::$DB_PASSWORD = $DB_PASSWORD;
    }

    /**
     * @return string
     */
    public static function getDBDATABASE(): string
    {
        return self::$DB_DATABASE;
    }

    /**
     * @param string $DB_DATABASE
     */
    public static function setDBDATABASE(string $DB_DATABASE): void
    {
        self::$DB_DATABASE = $DB_DATABASE;
    }



    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMysqli()
    {
        return $this->mysqli;
    }

    /**
     * @param mixed $mysqli
     */
    public function setMysqli($mysqli): void
    {
        $this->mysqli = $mysqli;
    }

    /**
     * @return mixed
     */
    public function getDbError()
    {
        return $this->dbError;
    }

    /**
     * @param mixed $dbError
     */
    public function setDbError($dbError): void
    {
        $this->dbError = $dbError;
    }

    /**
     * @return bool
     */


    /**
     * @param bool $authenticated
     */
    public function setAuthenticated(bool $authenticated): void
    {
        $this->authenticated = $authenticated;
    }









}