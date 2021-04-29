<?php
session_start();

/**
 *   Clase 'UserModel' que implementa el modelo de usuarios de nuestra aplicación en una
 * arquitectura MVC. Se encarga de gestionar el acceso a la tabla usuarios
 */
class UserModel extends BaseModel
{

   private $id;

   private $nombre;

   private $apellido1;

   private $apellido2;

   private $nif;

   private $email;

   private $telefono;

   private $direccion;

   private $login;

   private $password;

   private $imagen;

   private $rol;

   public function __construct()
   {
      // Se conecta a la BD
      parent::__construct();
      $this->table = "usuario";
   }

   public function getId()
   {
      return $this->id;
   }

   public function setId($id)
   {
      $this->id = $id;
   }

   public function getNombre()
   {
      return $this->nombre;
   }

   public function setNombre($nombre)
   {
      $this->nombre = $nombre;
   }

   public function getApellido1()
   {
      return $this->apellido1;
   }

   public function setApellido1($apellido1)
   {
      $this->apellido1 = $apellido1;
   }

   public function getApellido2()
   {
      return $this->apellido2;
   }

   public function setApellido2($apellido2)
   {
      $this->apellido2 = $apellido2;
   }

   public function getNif()
   {
      return $this->nif;
   }

   public function setNif($nif)
   {
      $this->nif = $nif;
   }

   public function getEmail()
   {
      return $this->email;
   }

   public function setEmail($email)
   {
      $this->email = $email;
   }

   public function getTelefono()
   {
      return $this->telefono;
   }

   public function setTelefono($telefono)
   {
      $this->telefono = $telefono;
   }

   public function getDireccion()
   {
      return $this->direccion;
   }

   public function setDireccion($direccion)
   {
      $this->direccion = $direccion;
   }

   public function getLogin()
   {
      return $this->login;
   }

   public function setLogin($login)
   {
      $this->login = $login;
   }

   public function getPassword()
   {
      return $this->password;
   }

   public function setPassword($password)
   {
      $this->password = $password;
   }

   public function getImagen()
   {
      return $this->imagen;
   }

   public function setImagen($imagen)
   {
      $this->imagen = $imagen;
   }

   public function getRol()
   {
      return $this->rol;
   }

   public function setRol($rol)
   {
      $this->rol = $rol;
   }

   /**
    * Función que realiza el listado de todos los usuarios registrados
    * Devuelve un array asociativo con tres campos:
    * -'correcto': indica si el listado se realizó correctamente o no.
    * -'datos': almacena todos los datos obtenidos de la consulta.
    * -'error': almacena el mensaje asociado a una situación errónea (excepción) 
    * @return type
    */
    public function listado()
    {
       $return = [
          "correcto" => FALSE,
          "datos" => NULL,
          "error" => NULL
       ];
       //Realizamos la consulta...
       try {  //Definimos la instrucción SQL  
          $sql = "SELECT * FROM usuarios";
          // Hacemos directamente la consulta al no tener parámetros
          $resultsquery = $this->db->query($sql);
          //Supervisamos si la inserción se realizó correctamente... 
          if ($resultsquery) :
             $return["correcto"] = TRUE;
             $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
          endif; // o no :(
       } catch (PDOException $ex) {
          $return["error"] = $ex->getMessage();
       }
 
       return $return;
    }

    /**
    * Añadir un nuevo usuario a la lista
    * @param type $datos
    * @return type
    */
   public function adduser($datos)
   {
      $return = [
         "correcto" => FALSE,
         "error" => NULL
      ];

      try {
         //Inicializamos la transacción
         $this->db->beginTransaction();
         //Definimos la instrucción SQL parametrizada 
         $sql = "INSERT INTO `usuario`( `nombre`, `apellido1`, `apellido2`, `nif`, `email`, `telefono`, `direccion`, `login`, `password`, `imagen`, `rol`) 
                VALUES (:nombre,:apellido1,:apellido2,:nif,:email,:telefono,:direccion,:login,:password,:imagen,:rol)";
         // Preparamos la consulta...
         $query = $this->db->prepare($sql);
         // y la ejecutamos indicando los valores que tendría cada parámetro
         $query->execute([
            'nombre' => $datos["nombre"],
            'apellido1' => $datos["apellido1"],
            'apellido2' => $datos["apellido2"],
            'nif' => $datos["nif"],
            'email' => $datos["email"],
            'telefono' => $datos["telefono"],
            'direccion' => $datos["direccion"],
            'login' => $datos["login"],
            'password' => $datos["password"],
            'imagen' => $datos["imagen"],
            'rol' => $datos["rol"]
         ]); //Supervisamos si la inserción se realizó correctamente... 
         if ($query) {
            $this->db->commit(); // commit() confirma los cambios realizados durante la transacción
            $return["correcto"] = TRUE;
         } // o no :(
      } catch (PDOException $ex) {
         $this->db->rollback(); // rollback() se revierten los cambios realizados durante la transacción
         $return["error"] = $ex->getMessage();
         //die();
      }

      return $return;
   }