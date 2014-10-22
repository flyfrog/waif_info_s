<?php
session_start(); //Запускаем сессии

 
class AuthClass {
    private $_login = "demo"; //Устанавливаем логин
    private $_password = "www"; //Устанавливаем пароль
    private $_rule = 0; //права доступа 
 
 //0 banned
 //1 user
 //2 master   
 //3 super master   

    private $hostname = "localhost"; 
    private $username = "root"; 
    private $password_db = "frog555";  // для таблицы
    
    private $dbName = "test"; 

/* Таблица MySQL, в которой хранятся данные */ 
    private $userstable = "users"; 
 
    /**
     * Проверяет, авторизован пользователь или нет
     * Возвращает true если авторизован, иначе false
     * @return boolean 
     */
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //Если сессия существует
            return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
    }
    
    /**
     * Авторизация пользователя
     * @param string $login
     * @param string $passwors 
     */
    public function auth($login, $passwors) { // обработка с базы
 
mysql_connect($this->hostname,$this->username,$this->password_db) or die("No connection"); 
/* выбрать базу данных. Если произойдет ошибка - вывести ее */ 
mysql_select_db($this->dbName) or die(mysql_error());  

/* составить запрос, который выберет всех клиентов - яблочников */ 
$query = 'SELECT * FROM  users WHERE name="'.$login.'"'; 
/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
$res = mysql_query($query) or die(mysql_error()); 

/* Как много нашлось таких */ 
$number = mysql_num_rows($res); //если нашли запись по логину 

        if($number==1){
            $row=mysql_fetch_array($res);
            $this->_password = $row['pass']; // выберем на проверку данные
            $this->_login = $row['name']; 
            $this->_rule = $row['rule']; 
          

        }else{// пришло гавно
            $_SESSION["is_auth"] = false; // завершаем все
            return false; 
        }//if для базы
 
 
        if ($login == $this->_login && $passwors == $this->_password&&$this->_rule!=0) { //Если логин и пароль введены правильно
            
            $_SESSION["is_auth"] = true; //Делаем пользователя авторизованным
            $_SESSION["login"] = $login; //Записываем в сессию логин пользователя
            $_SESSION["rule"] = $this->_rule;

            return true;
        }
        else { //Логин и пароль не подошел
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
    
    /**
     * Метод возвращает логин авторизованного пользователя 
     */
    public function getLogin() {
        if ($this->isAuth()) { //Если пользователь авторизован
            return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
        }
    }
    
    
    public function out() {
        $_SESSION = array(); //Очищаем сессию
        session_destroy(); //Уничтожаем
    }
}

$auth = new AuthClass();

if (isset($_POST["login"]) && isset($_POST["password"])) { //Если логин и пароль были отправлены
    if (!$auth->auth($_POST["login"], $_POST["password"])) { //Если логин и пароль введен не правильно
        echo "<h2 style=\"color:red;\">Логин и пароль введен не правильно!</h2>";
    }
}

if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //Выходим
        header("Location: ?is_exit=0"); //Редирект после выхода
    }
}
 
 if ($auth->isAuth()) { // Если пользователь авторизован, приветствуем:  
   header('Location:  editor.php');
    exit;
 
}
else { //Если не авторизован, показываем форму ввода логина и пароля
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    
    <title>Примеры </title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" /></head><body>

<form method="post" action="">
    Логин: <input type="text" name="login"  required
    value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // Заполняем поле по умолчанию ?>" />
    <br/>
    Пароль: <input type="password" name="password" value=""  required/><br/>
    <input type="submit" value="Войти" />
</form>
 
</body>

</html>
<?php } ?>