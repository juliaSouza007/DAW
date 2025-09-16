<?php
class User {
    public $nome;
    public $email;
    public $login;
    private $senhaHash;

    public function __construct($nome, $email, $login, $senhaHash) {
        $this->nome = $nome;
        $this->email = $email;
        $this->login = $login;
        $this->senhaHash = $senhaHash;
    }

    public static function loadAll($file) {
        if (!file_exists($file)) return [];
        $json = file_get_contents($file);
        $arr = json_decode($json, true) ?: [];
        $users = [];
        foreach ($arr as $u) {
            $users[] = new User($u['nome'], $u['email'], $u['login'], $u['senhaHash']);
        }
        return $users;
    }

    public static function findByLogin($file, $login) {
        $users = self::loadAll($file);
        foreach ($users as $u) {
            if ($u->login === $login) return $u;
        }
        return null;
    }

    public static function addUser($file, User $user) {
        // load, append, save with lock
        $arr = [];
        if (file_exists($file)) {
            $arr = json_decode(file_get_contents($file), true) ?: [];
        }
        $arr[] = [
            "nome" => $user->nome,
            "email" => $user->email,
            "login" => $user->login,
            "senhaHash" => $user->senhaHash
        ];
        $tmp = tmpfile();
        file_put_contents($file, json_encode($arr, JSON_PRETTY_PRINT));
    }

    public function verifyPassword($senha) {
        return password_verify($senha, $this->senhaHash);
    }
}
?>
