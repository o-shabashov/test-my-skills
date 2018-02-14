<?php
session_start();

require_once 'vendor/autoload.php';

class App
{
    public function __construct()
    {
        $dotEnv = new Dotenv\Dotenv(__DIR__);
        $dotEnv->load();
    }

    public function run()
    {
        $controller = new Controller();

        if ($_SERVER['REQUEST_URI'] === '/') {
            $controller->auth();
        }
        if ($_SERVER['REQUEST_URI'] === '/withdraw') {
            $controller->withdraw();
        }
    }
}

class Db
{
    private static $instance = null;

    private function __construct() { }

    private function __clone() { }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO(
                    sprintf('mysql:host=%s;dbname=%s', getenv('DB_HOST'), getenv('DB_NAME')),
                    getenv('DB_USER'), getenv('DB_PASSWORD'),
                    [
                        PDO::ATTR_PERSISTENT       => true,
                        PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            } catch (PDOException $e) {
                echo "Error!: " . $e->getMessage();
                die();
            }
        }

        return self::$instance;
    }
}

class User
{
    public $id;
    public $login;
    public $password;
    public $balance;

    /**
     * @param $login
     *
     * @return User|boolean
     */
    public static function find($login)
    {
        $pdo = Db::getInstance();

        $stmt = $pdo->prepare('SELECT * FROM user WHERE login=?');
        $stmt->execute([$login]);

        return $stmt->fetchObject(User::class);
    }

    public function auth(string $password): bool
    {
        if (!password_verify($password, $this->password)) {
            return false;
        }

        $_SESSION['user'] = $this->login;
        session_write_close();

        return true;
    }

    public function save()
    {
        $pdo = Db::getInstance();
        $pdo->beginTransaction();

        try {
            $stmt = $pdo->prepare('UPDATE user SET balance=? WHERE id=?');
            $stmt->execute([$this->balance, $this->id]);
            $pdo->commit();
        } catch (PDOException $e) {
            echo $e->getMessage();
            $pdo->rollBack();
            die();
        }
    }
}

class Controller
{
    public function auth()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /withdraw');
            die();
        }

        if (!isset($_POST['login']) || !isset($_POST['pwd'])) {
            return require_once 'views/auth.php';
        }

        $user = User::find($_POST['login']);

        if ($user && $user->auth($_POST['pwd'])) {
            header('Location: /withdraw');
            die();
        }

        return require_once 'views/auth.php';
    }

    public function withdraw()
    {
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
        session_write_close();

        if (!$user) {
            header('Location: /');
            die();
        }

        $user = User::find($user);

        if (isset($_POST['amount']) && !empty($_POST['amount'])) {
            $user->balance -= abs(intval($_POST['amount']));
            $user->save();
        }

        return require_once 'views/withdraw.php';
    }
}

(new App())->run();