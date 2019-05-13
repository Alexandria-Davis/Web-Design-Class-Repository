<?php
class dbConn {
    var $conn;
    var $host = "localhost";
    var $username='alexandriadavis';
    var $password = '';
    var $dbname = 'ottermart';
    
    function set()
    {
        $conn;
        $host = "localhost";
        $username='alexandriadavis';
        $password = '';
        $dbname = 'ottermart';
        
        
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
        }
    }
    
    
    function connect()
    {
    $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password);
    $this->conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    function login($username, $password)
    {
       
        $sql = "SELECT * from om_user WHERE username = :username";
        $namedParameters["username"] = $username;
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute($namedParameters);
        $records = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        $hash = $records[0]["password"];
        $isAuthenticated = password_verify($password, $hash);
        return $isAuthenticated;
            
    }
    function signup($username, $password)
    {
        $options = [
        'cost' => 11,
      ];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        
        try
        {
        $sql = "Insert into om_user (username, password) VALUES (:username, :password)";
        $namedParameters["username"] = $username;
        $namedParameters["password"] = $hashedPassword;
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute($namedParameters);
        }
        catch (PDOException $ex) {
            switch ($ex->getCode()) {
                case "23000":
                    return array(
                         "problem"=> "account cannot be taken",
                         "message"=> $ex->getMessage()
                    );
                    break;
                default:
                    return array(
                    "problem"=> "There was a problem signing up",
                    "message"=> $ex->getMessage(),
                );
                break;
            }
        
        }
    }   
}

?>