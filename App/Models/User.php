<?php
namespace App\Models;
use App\Database;

class User
{
    public string $username;
    public string $name;

    public function getUser(string $username)
    {
        $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);

        $pdo = Database::getInstance()->getPDO();
        $sql = <<<EOD
            select *
            from users
            where username = ?
        EOD;
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        $this->username = $user->username ?? "Hittades inte";
        $this->name = $user->name ?? "Hittades inte";
    }
}