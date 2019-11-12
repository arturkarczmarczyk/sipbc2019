<?php


namespace App\Model;


class User extends Model
{
    /** @var int */
    private $id;

    /** @var string */
    private $login;

    /** @var string */
    private $email;

    /** @var string */
    private $password;

    /** @var string */
    private $role;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return User
     */
    public static function findOneByEmailAndPassword($email, $password)
    {
        $dbh = self::getConnection();

        // robimy hash hasla
        $passHash = sha1($password);

        $sql = "SELECT * FROM appuser WHERE email = :email AND password = :password";
        $statement = $dbh->prepare($sql);

        $status = $statement->execute([
            'email' => $email,
            'password' => $passHash,
        ]);

        $userArray = $statement->fetch();

        if (! $userArray) {
            return null;
        }

        $user = new self();
        $user->setId($userArray['id']);
        $user->setLogin($userArray['login']);
        $user->setEmail($userArray['email']);
        $user->setPassword(null);
        $user->setRole($userArray['role']);

        return $user;
    }

    public function __construct($id = null)
    {
        if ($id && is_numeric($id) && $id > 0) {
            $dbh = self::getConnection();
            $sql = "SELECT * FROM appuser WHERE id = $id";
            $result = $dbh->query($sql);
            $resultArray = $result->fetch();

            $this->setId($resultArray['id']);
            $this->setLogin($resultArray['login']);
            $this->setEmail($resultArray['email']);
            $this->setPassword($resultArray['password']);
            $this->setRole($resultArray['role']);
        }
    }


}