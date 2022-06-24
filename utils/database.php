<?php
class DB
{
    private $db;
    public function __construct()
    {
        $db_settings = parse_ini_file("Database.ini");
        $dsn = "mysql:host=" . $db_settings['HOST'] . ";dbname=" . $db_settings['DB'] . ";charset=" . $db_settings['CHARSET'] . ";";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => true
        ];

        $this->db =  new PDO($dsn, $db_settings['USER'], $db_settings['PASSWORD'], $options);
    }
    //user
    public function createUser($login, $email, $password)
    {
        $query = $this->db->prepare("INSERT INTO users (login, email, password) VALUES (:login, :email, :password)");
        $query->execute(array(
            "login" =>  $login,
            "email" => $email,
            "password" => $password
        ));
        return $this->db->lastInsertId();
    }


    public function getUserByLogin($login)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE login = :login");
        $query->execute(array(
            "login" =>  $login,
        ));
        return $query->fetch();
    }

    public function getUserByEmail($email)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(array(
            "email" =>  $email,
        ));
        return $query->fetch();
    }

    public function getUserById($id_user)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE id_user = :id_user");
        $query->execute(array(
            "id_user" =>  $id_user,
        ));
        return $query->fetch();
    }
    public function setLogin($id_user, $login)
    {
        $query = $this->db->prepare("UPDATE users SET login=:login WHERE id_user=:id_user");
        $query->execute(array(
            "login" => $login,
            "id_user" => $id_user
        ));
    }
    public function setDescription($id_user, $description)
    {
        $query = $this->db->prepare("UPDATE users SET description=:description WHERE id_user=:id_user");
        $query->execute(array(
            "description" => $description,
            "id_user" => $id_user
        ));
    }
    public function editPfp($id_user, $pfp)
    {
        $query = $this->db->prepare('UPDATE users SET pfp = :pfp WHERE id_user=:id_user');
        $query->execute(array(
            'pfp' => $pfp,
            'id_user' => $id_user
        ));
    }
    //logs
    public function createLog($id_user, $event, $ip_address, $user_agent)
    {
        $query = $this->db->prepare("INSERT INTO logs (id_user, event, ip_address, user_agent) VALUES (:id_user, :event, :ip_address, :user_agent)");
        $query->execute(array(
            "id_user" =>  $id_user,
            "event" => $event,
            "ip_address" => $ip_address,
            "user_agent" => $user_agent
        ));
        return $this->db->lastInsertId();
    }
    //categories
    public function getCategories()
    {
        $query = $this->db->prepare("SELECT * FROM categories");
        $query->execute();
        return $query->fetchAll();
    }
    //videos
    public function saveRawVideo($id_user, $duration, $thumbnail){
        $query = $this->db->prepare("INSERT INTO videos (id_user, duration, thumbnail) values (:id_user, :duration, :thumbnail)");
        $query->execute(array( 
            "id_user" => $id_user,
            "duration" => $duration,
            "thumbnail" => $thumbnail
        ));
        return $this->db->lastInsertId();
    }
    public function getVideoById($id_video){
        $query = $this->db->prepare("SELECT * FROM videos_with_data WHERE id_video = :id_video");
        $query->execute(array(
            "id_video" => $id_video
        ));
        return $query->fetch();
    }

    public function completeUploading($id_video, $title, $description, $id_category){
        $query = $this->db->prepare('UPDATE videos SET title = :title, description = :description, id_category = :id_category WHERE id_video=:id_video');
        $query->execute(array(
            "id_video" => $id_video,
            "title" => $title,
            "description" => $description,
            "id_category" => $id_category
        ));
    }

    public function editThumbnail($id_video, $thumbnail)
    {
        $query = $this->db->prepare('UPDATE videos SET thumbnail = :thumbnail WHERE id_video=:id_video');
        $query->execute(array(
            'thumbnail' => $thumbnail,
            'id_video' => $id_video
        ));
    }

}
