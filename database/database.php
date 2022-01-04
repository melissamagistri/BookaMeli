<?php 
class database{
    private $db;
    
    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    //prende l'idaccount dell'account con email uguale a quella passata in input
    public function getId($email){
        $query = "SELECT idaccount FROM account WHERE attivo=1 AND email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //controlla se esiste un account che abbia idaccount e password uguali a quelle passate in input
    public function checkLogin($email, $password){
        //prende l'id dell'account con la mail indicata
        $idaccount = $this->getId($email)[0]["idaccount"];
        $query = "SELECT idaccount FROM account WHERE attivo=1 AND idaccount = ? and password = ?";
        $stmt = $this->db->prepare($query);
        //prende il salt dell'account con l'id trovato in precedenza
        $salt = $this->getSalt($idaccount)[0]["salt"];
        $pass = $salt.$password.$salt;
        $pass = hash('sha256', $pass, false);
        $stmt->bind_param('is',$idaccount, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //prende il salt di un account passato in input
    public function getSalt($idaccount){
        $query = "SELECT salt FROM account WHERE attivo=1 AND idaccount = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function loginFailed($idaccount){
        //va nella tabella e inserisce +1 ai tentativi di login
    }

    public function loginSucceed($idaccount){
        //va nella tabella e inserisce 0 ai tentativi di login
    }

    public function disableAccount($idaccount){
        //mette attivo a 0, per risolvere bisogna cambiare password
    }

    public function activeAccount($idaccount){
        //mette attivo a 1, per risolvere bisogna verificare l'account o cambiare password
    }

    //controlla se nel db esiste gia un account con l'email inserita
    public function checkEmail($email){
        $query = "SELECT idaccount FROM account WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //crea un nuovo account all'interno del db
    public function createAccount($email, $password, $salt, $tentativoLogin, $venditore, $attivo){
        $query = "INSERT INTO account (email, password, salt, tentativoLogin, venditore, attivo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssiii',$email, $password, $salt, $tentativoLogin, $venditore, $attivo);
        $stmt->execute();
        
        return $stmt->insert_id;
        
    }
    
}

?>