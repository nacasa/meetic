<?php
class dbase
{
    private $dbase = '';
    private $host = '';
    private $db_name = '';
    private $db_user = '';
    private $db_pass = '';

    public function __construct($host = 'localhost', $db_name = 'my_meetic', $db_user = 'root', $db_pass = ''){
        try {
            $dbase = new PDO('mysql:host='.$host.'; db_name='.$db_name.'', $db_user, $db_pass);
            return $dbase;
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function connexion()
    {
        return $this->dbase;
    }

}

$DBase = new dbase;
$db = $DBase->connexion();

?>


