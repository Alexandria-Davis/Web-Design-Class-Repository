<?php
class dbConn {
    var $conn;
    var $host = "localhost";
    var $username='alexandriadavis';
    var $password = '';
    var $dbname = 'final';
    
    function set()
    {
        $conn;
        $host = "localhost";
        $username='alexandriadavis';
        $password = '';
        $dbname = 'final';
        
        
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
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    function login($username, $password)
    {
       
        $sql = "SELECT user_id, password from users WHERE username = :username";
        $namedParameters["username"] = $username;
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute($namedParameters);
        $records = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        $hash = $records[0]["password"];
        $isAuthenticated = password_verify($password, $hash);
        if($isAuthenticated)
        {
            $_SESSION["user"] = $records[0]["user_id"];
        }   
        return $records[0]["user_id"];
    }
    function signup($username, $password)
    {
        $options = [
        'cost' => 11,
      ];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        
        try
        {
        $sql = "Insert into users (username, password) VALUES (:username, :password)";
        $namedParameters["username"] = $username;
        $namedParameters["password"] = $hashedPassword;
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute($namedParameters);
        return array("status" => "success");
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
    function get_events()
    {
        $sql = "select `date`, `start`, `end`, `username`, `id` from `events` join users on `events`.`by` = `users`.`user_id` where `host` = :user and `date` > NOW()";
        $namedParameters["user"] = $_SESSION['user'];
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute($namedParameters);
        $records = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($records);
        
    }
    function get_free($host)
    {
        $sql = "select `date`, `start`, `end`, `by`, `id` from `events` where `host` = :user and `by` IS NULL and `date` > NOW()";
        $namedParameters["user"] = $host;
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute($namedParameters);
        $records = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($records);
        
    }
    function add_event($start, $end, $date,$details)
    {
        $sql = "insert into `events` (`host`, `start`, `date`, `end`, `details`) values (:host, :start, :date, :end, :details);";
        $namedParameters["host"] = $_SESSION['user'];
        $namedParameters["start"] = $start;
        $namedParameters["end"] = $end;
        $namedParameters["date"] = $date;
        $namedParameters["details"] = $details;
        
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute($namedParameters);
    }
    function book($guest, $appointment){
        $sql = "update events SET `by` = :user where id = :id";
        $namedParameters["user"] = $guest;
        $namedParameters["id"] = $appointment;
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute($namedParameters);
    }
}

        $conn = new dbConn;
        $conn->connect();
?>