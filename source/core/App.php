<?php
require_once __DIR__ . '/../services/__require__.php';
require_once __DIR__ . '/../models/__require__.php';
require_once __DIR__ . '/Service.php';

/**
 * @property User $user
 * @property AppData $data
 *
 * @property WalkerData $walkerData;
 * @property UserData $userData;
 * @property UserMessages $userMessages;
 * @property DogData $dogData;
 */
class App
{
    protected ?PDO $db;

    protected static array $routes = [

    ];

    public function __construct(array $routes = [])
    {
        session_start();

        $this->db = connect_database();
        $this->getUser();

        self::$routes = $routes;
    }

    // region User Data

    protected ?User $_user = null;
    protected ?UserInfo $_userInfo = null;

    public function getUser(): User
    {
        if ($this->_user !== null) return $this->_user;

        $this->_user = new User([
            "role" => "guest",
        ]);

        if (isset($_SESSION['logged-in-user']))
        {
            $userId = $_SESSION['logged-in-user'];
            $user = $this->userData->getUserById($userId);
            if (!$user) unset($_SESSION['logged-in-user']);

            $user->info = $this->userData->getUserInfo($user);
            $this->_user = $user;
        }

        return $this->_user;
    }

    // endregion

    // region App Data

    protected ?AppData $_data = null;

    public function getData(): AppData
    {
        if ($this->_data !== null) return $this->_data;

        $this->_data = new AppData([
            // TODO
        ]);

        return $this->_data;
    }

    // endregion

    // region Services

    protected array $_classes = [];

    public function getClass(string $className): Service
    {
        if (isset($this->_classes[$className])) return $this->_classes[$className];

        $class = ucfirst($className);
        $this->_classes[$className] = new $class($this, $this->db);

        return $this->_classes[$className];
    }

    // endregion

    // region API

    public function action($actionName)
    {
        http_response_code(500);

        if (!isset(self::$routes[$actionName])) return $this->respond([
            "error" => "Akció nincs definiálva!"
        ]);

        $action = self::$routes[$actionName];
        $className = $action[0];
        $method = $action[1];

        $handler = new $className($this, $this->db);
        $response = $handler->$method($_REQUEST);
        $this->respond($response);
    }

    public function respond($data): string
    {
        $data = json_decode(json_encode($data), true);
        $json = json_encode($data);

        header('Content-Type: application/json; charset=utf-8');

        $status = 204;
        if (sizeof($data) > 0) $status = 200;
        if (isset($data['error'])) $status = 500;
        http_response_code($status);
        echo $json;

        return $json;
    }

    // endregion

    // region Frontend

    protected static string $currentView;

    public function parseView($viewName, $params = []): string
    {
        $viewName = trim($viewName, '/');
        $currentView = str_replace('/', '-', $viewName);

        if (!isset(self::$currentView)) self::$currentView = $currentView;
        $currentView = self::$currentView;

        $this->_data = new AppData([
            "viewName" => $currentView,
        ]);

        $viewPath = realpath(__DIR__ . "/../views");
        $userType = ($this->user->role ?? 'guest');

        $viewFileOptions[] = "{$viewPath}/roles/$userType/$viewName.php";

        if ($userType !== 'guest')
            $viewFileOptions[] = "{$viewPath}/roles/user/$viewName.php";

        $viewFileOptions[] = "{$viewPath}/$viewName.php";

        $data = $this->getData();
        $app = $this;

        extract($params);

        @ob_start();
        $viewRendered = false;
        foreach ($viewFileOptions as $viewFile)
            if (file_exists($viewFile)) {
                $viewRendered = true;
                include $viewFile;
                break;
            }

        if (!$viewRendered)
        {
            $this->_data = new AppData([
                "viewName" => $currentView,
                "siteType" => 'error',
            ]);

            /** @noinspection PhpIncludeInspection */
            include "{$viewPath}/error.php";
        }

        $compiledView = ob_get_contents();
        @ob_end_clean();

        return $compiledView;
    }

    public function renderPage($viewName)
    {
        $viewName = trim($viewName, '/');
        $currentView = str_replace('/', '-', $viewName);
        self::$currentView = $currentView;

        echo $this->parseView($viewName);
    }

    public function render($viewName)
    {
        echo $this->parseView($viewName);
    }

    // endregion

    // region Helpers

    public function __get(string $name)
    {
        switch ($name) {
            case "user":
                return $this->getUser();

            case "data":
                return $this->getData();

            default:
                return $this->getClass($name);
        }
    }

    // endregion
}