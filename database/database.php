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
        $query = "SELECT idaccount FROM account WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che restituisce l'email dell'user dato l'idaccount
    public function getUserEmail($idaccount){
        $query = "SELECT email FROM account WHERE idaccount = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //controlla se esiste un account che abbia idaccount e password uguali a quelle passate in input
    public function checkLogin($email, $password, $active){
        //prende l'id dell'account con la mail indicata
        $idaccount = $this->getId($email)[0]["idaccount"];
        $query = "SELECT idaccount FROM account WHERE attivo= ? AND idaccount = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        //prende il salt dell'account con l'id trovato in precedenza
        $salt = $this->getSalt($idaccount)[0]["salt"];
        $pass = $salt.$password.$salt;
        $pass = hash('sha256', $pass, false);
        $stmt->bind_param('iis', $active, $idaccount, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //prende il salt di un account passato in input
    public function getSalt($idaccount){
        $query = "SELECT salt FROM account WHERE idaccount = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //metodo che viene utilizzato quando il login fallisce, viene aggiunto 1 ai tentativi di login
    public function loginFailed($email){
        $query = "UPDATE account SET tentativoLogin = tentativoLogin + 1 WHERE email = ? AND attivo = 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        
        return $stmt->execute();
    }

    //va nella tabella e inserisce 0 ai tentativi di login
    public function loginSucceed($email){
        $query = "UPDATE account SET tentativoLogin = 0 WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        
        return $stmt->execute();
    }

    //funzione per la verifica che l'utente che ha fatto il login sia un cliente o un venditore
    public function userIsClient($idaccount){
        $query = "SELECT venditore FROM account WHERE idaccount = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //metodo per controllare i tentativi di accesso eseguiti da un utente.
    public function getLoginAttemps($email){
        $query = "SELECT tentativoLogin FROM account WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //metodo utilizzato per la disabilitazione temporanea di un account fino a che esso non cambia la password
    public function disableAccount($email){
        $query = "UPDATE account SET tentativoLogin = 0 , attivo = 0 WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        
        return $stmt->execute();
    }

    //metodo utilizzato per l'attivazione di un account, successivamente alla verifica o alla rimpostazione della password
    public function activateAccount($email){
        $query = "UPDATE account SET attivo=1 WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        
        return $stmt->execute();
    }

    //metodo chiamato quando si reimposta la password, fornisce un nuovo salt e inserisce la nuova password nel db
    public function changePassword($email, $password, $salt){
        $pass = $salt.$password.$salt;
        $modifiedPassword = hash('sha256', $pass, false);
        $query = "UPDATE account SET password=?, salt=? WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $modifiedPassword, $salt, $email);
        
        return $stmt->execute();
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
    public function createAccount($email, $password, $salt, $tentativoLogin, $venditore, $attivo, $nome, $cognome){
        $pass = $salt.$password.$salt;
        $modifiedPassword = hash('sha256', $pass, false);
        $query = "INSERT INTO account (email, password, salt, tentativoLogin, venditore, attivo, nome, cognome) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssiiiss',$email, $modifiedPassword, $salt, $tentativoLogin, $venditore, $attivo, $nome, $cognome);
        $stmt->execute();
        
        return $stmt->insert_id;
        
    }

    //funzione per prendere tutte le informazioni rigurdanti un determinato prodotto
    public function getProductInfos($foto){
        $query = "SELECT nome, descrizione, prezzo, sconto, foto, quantità, idprodotto FROM prodotti WHERE foto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$foto);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione per prendere tutte le informazioni rigurdanti un determinato prodotto dato il suo id
    public function getProductInfosbyId($idprodotto){
        $query = "SELECT nome, descrizione, prezzo, sconto, foto, quantità, idprodotto FROM prodotti WHERE idprodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione per ottenere tutte le recensioni di un prodotto
    public function getProductReviews($idprodotto){
        $query = "SELECT voto, testorecensione, titolorecensione, nome, cognome FROM recensioni r, account a WHERE idprodotto = ? and r.idaccount = a.idaccount";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che ritorna i 3 nuovi prodotti inseriti
    public function getNewProducts(){
        $query = "SELECT idprodotto, nome, descrizione, prezzo, sconto, foto, quantità FROM prodotti ORDER BY datainserimento desc limit 3";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che ritorna i 3 prodotti piu popolari nell'ultimo mese
    public function getPopularProducts(){
        $query = "SELECT prodotti.idprodotto, prodotti.nome, prodotti.descrizione, prodotti.prezzo, prodotti.sconto, prodotti.foto, prodotti.quantità from ordini o, prodottiordinati p, prodotti prodotti where o.idordine = p.idordine and p.idprodotto = prodotti.idprodotto and o.dataordine BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() group by prodotti.idprodotto,prodotti.nome ORDER BY count(*) desc LIMIT 3";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che restituisce tutti gli articoli che un utente ha nel carrello
    public function getUserCart($idaccount){
        $query = "SELECT prodotti.idprodotto, prodotti.nome, prodotti.prezzo, prodotti.sconto, prodotti.foto, p.quantita from prodottinelcarrello p, prodotti prodotti where p.idprodotto = prodotti.idprodotto and p.idaccount = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione per la rimozione di un prodotto dal carrello
    public function removeProductFromCart($idaccount, $idprodotto){
        $query = 'DELETE FROM prodottinelcarrello WHERE idaccount = ? AND idprodotto = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idaccount, $idprodotto);
        return $stmt->execute();
    }

    //funzione per l'inserimento di un prodotto nel carrello
    public function addProductToCart($idaccount, $idprodotto){
        $query = 'INSERT INTO prodottinelcarrello(quantita,idprodotto,idaccount) VALUES(1,?,?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idprodotto, $idaccount);
        return $stmt->execute();
    }
    
    //funzione che ritorna la quantità per ciascun prodotto
    public function getProductQuantity($idprodotto){
        $query = "SELECT quantità from prodotti where idprodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che ritorna la quantità di prodotti nel carrello di uno specifico account
    public function getQuantityProductInCart($idaccount){
        $query = "SELECT quantita from prodottinelcarrello where idaccount = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    //funzione che aggiunge l'utente alla lista delle notifiche di un dato prodotto
    public function addUserToNotifyList($idaccount, $idprodotto){
        $query = 'INSERT INTO avvisi(idprodotto,idaccount) VALUES(?,?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idprodotto, $idaccount);
        return $stmt->execute();
    }

    //funzione che ritorna tutti i prodotti con un nome simile a quello inserito nella ricerca
    public function getProducts($name, $cathegory, $selector){
        //ricerca per nome e categoria
        if($selector == 1){
            $query = "SELECT p.idprodotto, p.nome, p.descrizione, p.prezzo, p.sconto, p.foto, p.quantità from prodotti p, categorie c where c.nomecategoria = ? and p.nome like ? and c.idprodotto = p.idprodotto";
            $stmt = $this->db->prepare($query);
            $name = '%'.$name.'%';
            $stmt->bind_param('ss',$cathegory, $name);
        //ricerca per nome
        } else if($selector == 2){
            $query = "SELECT idprodotto, nome, descrizione, prezzo, sconto, foto, quantità from prodotti where nome like ?";
            $stmt = $this->db->prepare($query);
            $name = '%'.$name.'%';
            $stmt->bind_param('s',$name);
        //ricerca per categoria
        } else if($selector == 3){
            $query = "SELECT p.idprodotto, p.nome, p.descrizione, p.prezzo, p.sconto, p.foto, p.quantità from prodotti p, categorie c where c.nomecategoria = ? and c.idprodotto = p.idprodotto";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$cathegory);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funziona che ritorna tutte le categorie presenti nel db
    public function getCathegories(){
        $query = "SELECT nomecategoria from listacategorie";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che restituisce i dati relativi all'account
    public function getAccountInfo($idaccount){
        $query = "SELECT nome, cognome, email from account where idaccount = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che ritorna tutti gli ordini fatti da un utente
    public function getOrders($idaccount){
        $query = "SELECT idordine, stato, prezzo, dataordine from ordini where idaccount = ? order by dataordine desc";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //fuzione che ritorna tutti i prodotti facenti parti di un ordine
    public function getProductsInOrder($idordine){
        $query = "SELECT p.quantita, p.idprodotto, p.costo, pr.nome, pr.foto from prodottiordinati p, prodotti pr where p.idordine = ? and p.idprodotto = pr.idprodotto";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idordine);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che inserisce una recensione di un utente nel database
    public function addReview($idaccount, $idprodotto, $titolo, $testo, $voto){
        $query = 'INSERT INTO recensioni(voto,testorecensione, titolorecensione, idprodotto, idaccount) VALUES(?,?,?,?,?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('issii',$voto, $testo, $titolo, $idprodotto, $idaccount);
        return $stmt->execute();
    }

    //funzione che restituisce l'id di un prodotto dato il nome
    public function getProductIdFromName($name){
        $query = "SELECT idprodotto from prodotti where nome = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$name);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che restituisce tutte le recensioni di un utente
    public function getUserReviews($idaccount){
        $query = "SELECT voto, testorecensione, titolorecensione, idprodotto from recensioni where idaccount = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che elimina una determinata recensione
    public function deleteReview($idaccount, $idprodotto){
        $query = 'DELETE FROM recensioni WHERE idaccount = ? AND idprodotto = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idaccount, $idprodotto);
        return $stmt->execute();
    }

    //funzione per aggiornare il numero di prodotti nel carrello
    public function updateQuantityProductInCart($idaccount, $idprodotto, $quantita){
        $query = "UPDATE prodottinelcarrello SET quantita = ? WHERE idaccount = ? and idprodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $quantita, $idaccount, $idprodotto);
        
        return $stmt->execute();
    }

    //funzione che ritorna la quantità di un prodotto nel carrello di un utente
    public function getProductInCartQuantity($idaccount, $idprodotto){
        $query = "SELECT quantita from prodottinelcarrello where idaccount = ? and idprodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idaccount, $idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductCathegory($idprodotto){
        $query = "SELECT nomecategoria from categorie where idprodotto = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che ritorna tutte le notifiche di un user
    public function getUserNotifications($idaccount){
        $query = "SELECT idnotifica, contenuto, anteprima, datanotifica, idaccount from notifiche where idaccount = ? order by datanotifica desc";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che permette l'inserimento della notifica nel account dell'utente
    public function insertUserNotification($idaccount, $contenuto, $anteprima){
        $query = 'INSERT INTO notifiche(contenuto,anteprima, idaccount) VALUES(?,?,?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssi',$contenuto, $anteprima, $idaccount);
        return $stmt->execute();
    }

    //funzione che permette la diminuzione della quantità di un prodotto dopo che viene acquistato
    public function decreaseProductQuantity($idprodotto, $quantita){
        $query = "UPDATE prodotti SET quantità = quantità - ? WHERE idprodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $quantita, $idprodotto);
        
        return $stmt->execute();
    }

    //funzione che restituisce l'idaccount del venditore
    public function getSellerId(){
        $query = "SELECT idaccount from account where venditore = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che rimuove da tutti i carrelli un determinato prodotto
    public function removeProductFromCarts($idprodotto){
        $query = 'DELETE FROM prodottinelcarrello WHERE idprodotto = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        return $stmt->execute();
    }

    //funzione per ottenere il numero di ordine che verrà effettuato
    public function getLastOrderId(){
        $query = "SELECT idordine from ordini order by idordine desc limit 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che permette l'inserimento di un nuovo ordine
    public function insertNewOrder($idordine, $stato, $prezzo, $idaccount){
        $query = 'INSERT INTO ordini(idordine,stato, prezzo, idaccount) VALUES(?,?,?,?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iidi',$idordine, $stato, $prezzo, $idaccount);
        return $stmt->execute();
    }

    //funzione che inserisce i prodotti nella tabllea prodottiordinati
    public function insertProductInOrder($idordine, $quantita, $idprodotto, $costo){
        $query = 'INSERT INTO prodottiordinati(idordine,quantita, idprodotto, costo) VALUES(?,?,?,?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iiid',$idordine,$quantita, $idprodotto, $costo);
        return $stmt->execute();
    }

    //funzione che aggiorna la data di ultimo acquisto del prodotto passato in input
    public function changeLastBuyDate($idprodotto){
        $query = "UPDATE prodotti SET dataUltimoAcquisto = NOW() WHERE idprodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        
        return $stmt->execute();
    }
    
    //funzione che ritorna tutti i prodotti
    public function getAllProducts(){
        $query = "SELECT idprodotto, nome, descrizione, prezzo, sconto, dataUltimoAcquisto, quantità, foto, dataInserimento from prodotti order by nome";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che elimina il prodotto da tutte le tabelle
    public function removeProductFromAdvice ($idprodotto){
        $query = 'DELETE FROM avvisi WHERE idprodotto = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        return $stmt->execute();
    }

    //funzione che elimina il prodotto dalle categorie
    public function removeProductFromCathegory($idprodotto){
        $query = 'DELETE FROM categorie WHERE idprodotto = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        return $stmt->execute();
    }

    //funzione che elimina il prodotto dal carrello degli user
    public function removeProductFromProductInCart($idprodotto){
        $query = 'DELETE FROM prodottinelcarrello WHERE idprodotto = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        return $stmt->execute();
    }

    //funzione che elimina il prodotto dal carrello dalle recensioni
    public function removeProductFromReviews($idprodotto){
        $query = 'DELETE FROM recensioni WHERE idprodotto = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        return $stmt->execute();
    }

    //funzione che elimina il prodotto dal carrello di prodotti
    public function removeProductFromProducts($idprodotto){
        $query = 'DELETE FROM prodotti WHERE idprodotto = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        return $stmt->execute();
    }

    //funzione che permette l'inserimento di un prodotto all'interno del database
    public function insertProduct($nome, $descrizione, $prezzo, $sconto, $quantità, $foto){
        $query = 'INSERT INTO prodotti(nome, descrizione, prezzo, sconto, quantità, foto) VALUES(?,?,?,?,?,?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssdiis',$nome,$descrizione, $prezzo, $sconto, $quantità, $foto);
        return $stmt->execute();
    }

    //funzione che permette di inserire all'interno della tabella categoria la categoria a cui appartiene un prodotto
    public function insertProductInCathegory($idprodotto, $nomeCategoria){
        $query = 'INSERT INTO categorie(nomecategoria, idprodotto) VALUES(?,?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si',$nomeCategoria,$idprodotto);
        return $stmt->execute();
    }

    //funzione che restituisce le notifiche del venditore riguardanti gli ordini
    public function getSellerNotificationsOrders(){
        $query = "SELECT  idnotifica, contenuto, anteprima, datanotifica from notifiche n, account a where n.idaccount = a.idaccount and a.venditore = 1 and anteprima = 'Ordine ricevuto' order by datanotifica desc ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che restituisce le notifiche del venditore riguardanti gli ordini
    public function getSellerNotificationsProducts(){
        $query = "SELECT  idnotifica, contenuto, anteprima, datanotifica from notifiche n, account a where n.idaccount = a.idaccount and a.venditore = 1 and anteprima = 'Prodotto terminato' or anteprima = 'Prodotto non venduto da tempo' order by datanotifica desc ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //funzione che inserisce una nuova categoria nel database
    public function insertCathegory($nomecategoria){
        $query = 'INSERT INTO listacategorie(nomecategoria) VALUES(?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$nomecategoria);
        return $stmt->execute();
    }

    //funzione che rimuove una data categoria dal database
    public function deleteCathegory($nomecategoria){
        $query = 'DELETE FROM listacategorie WHERE nomecategoria = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $nomecategoria);
        return $stmt->execute();
    }

    //funzione che elimina le tuple che associano una data categoria ai prodotti
    public function deleteCathegoryProduct($nomecategoria){
        $query = 'DELETE FROM categorie WHERE nomecategoria = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $nomecategoria);
        return $stmt->execute();
    }

    //funzione che prende i dati delle chat e le ordina per data
    public function getChatsInfo($idaccount){
        $query = 'SELECT m.testo, m.data, a.nome, a.cognome FROM chats c, messaggi m,  account a
                    WHERE  m.idchat = c.idchat
                    AND c.idaccount = ? 
                    AND a.idaccount = ?
                    GROUP BY c.idchat
                    ORDER BY m.data DESC';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $idchats, $idchats);
        return $stmt->execute();
    }

    //funzione che aggiorna i dati relativi a un prodotto, se value = 1 non inserisco una nuova foto, se value = 0 inserisco nuova foto
    public function updateProductInformation($idprodotto, $titolo, $descrizione, $prezzo, $sconto, $quantità, $foto, $value){
        if($value == 1){
            $query = "UPDATE prodotti SET nome = ?, descrizione = ?, prezzo = ?, sconto = ?, quantità = ? WHERE idprodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssdiii', $titolo, $descrizione, $prezzo, $sconto, $quantità, $idprodotto);
        } else if ($value == 0){
            $query = "UPDATE prodotti SET nome = ?, descrizione = ?, prezzo = ?, sconto = ?, quantità = ?, foto = ? WHERE idprodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssdiisi', $titolo, $descrizione, $prezzo, $sconto, $quantità, $foto, $idprodotto);
        }
        
        return $stmt->execute();
    }

    //funzione che aggiorna la categoria di un prodotto
    public function updateCathegoryProduct($idprodotto, $nomecategoria){
        $query = "UPDATE categorie SET nomecategoria = ? WHERE idprodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $nomecategoria,  $idprodotto);
        return $stmt->execute();
    }

    //funzione che ritorna tutti gli utenti in lista di attesa per un prodotto
    public function getUsersWaitingForAdvice($idprodotto){
        $query = "SELECT  idaccount from avvisi where idprodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserMessages($idaccount){
        $query = "SELECT  idmessaggio, testo, c.idchat, datamessaggio, venditore from messaggi m, chats c where c.idaccount = ? and c.idchat = m.idchat order by datamessaggio";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idaccount);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>