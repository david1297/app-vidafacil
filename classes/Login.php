<?php
class Login
{
    private $db_connection = null;
    public $errors = array();
    public $messages = array();
    public function __construct()
    {
        session_start();
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }
    private function dologinWithPostData()
    {
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
            if (!$this->db_connection->connect_errno) {
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);
                $sql = "select Razon_Social,Correo,Clave,Tipo,Rol,Nit,Porcentaje from Usuarios
                        WHERE Estado='Activo' and ( Correo = '" . $user_name . "' OR Nit = '" . $user_name . "' );";
                $result_of_login_check = $this->db_connection->query($sql);
                if ($result_of_login_check->num_rows == 1) {
                    $result_row = $result_of_login_check->fetch_object();
                    if (password_verify($_POST['user_password'], $result_row->Clave)) {
                        $_SESSION['Razon_Social'] = $result_row->Razon_Social;
                        $_SESSION['Correo'] = $result_row->Correo;
                        $_SESSION['Nit'] = $result_row->Nit;
                        $_SESSION['Tipo'] = $result_row->Nombre;
                        $_SESSION['Rol'] = $result_row->Rol;
                        $_SESSION['Porcentaje'] = $result_row->Porcentaje;
                        $_SESSION['user_login_status'] = 1;

                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "El Usuario No Existe o No se encuentra Activo";
                }
            } else {
                $this->errors[] = "Problema de conexión de base de datos.";
            }
        }
    }
    public function doLogout()
    {
        $_SESSION = array();
        session_destroy();
        $this->messages[] = "Se Ha Cerrado La Sesion";

    }
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        return false;
    }
}
?>