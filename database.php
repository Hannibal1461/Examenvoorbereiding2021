<?php  



class database{​​​​



    // properties

    private $host;

    private $dbh;

    private $user;

    private $pass;

    private $db;



    function __construct(){​​​​

        $this->host = 'localhost';

        $this->user = 'root';

        $this->pass = '';

        $this->db = 'FlowerPower';



        try{​​​​

            $dsn = "mysql:host=$this->host;dbname=$this->db"; // data source name = dsn

            $this->dbh = new PDO($dsn, $this->user, $this->pass);

        }​​​​catch(PDOException $e){​​​​

            // die en exit zijn hetzelfde

            die("Unable to connect: " . $e->getMessage());

        }​​​​

    }​​​​



    public function addFirstUser(){​​​​



        $sql = "INSERT INTO users VALUES (:id, :username, :password, :created_at, :updated_at);";



        $statement = $this->dbh->prepare($sql); // prepared statement



        $statement->execute([

            'id'=>NULL, // NULL want kolom is auto_increment

            'username'=>'',

            'password'=>password_hash('', PASSWORD_DEFAULT), // sensitive data (niet leesbaar voor menselijk oog)

            'created_at'=>date("Y-m-d H:i:s"), // datetime mysql

            'updated_at'=>date("Y-m-d H:i:s")

        ]);

    }​​​​



    // login -> login + error_log()

    public function login($uname, $psw){​​​​



    }​​​​



}​​​​



?>