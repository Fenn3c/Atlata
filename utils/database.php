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
            PDO::ATTR_EMULATE_PREPARES => true,
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
    public function editBanner($id_user, $banner)
    {
        $query = $this->db->prepare('UPDATE users SET banner = :banner WHERE id_user=:id_user');
        $query->execute(array(
            'banner' => $banner,
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
    public function saveRawVideo($id_user, $duration, $thumbnail, $file)
    {
        $query = $this->db->prepare("INSERT INTO videos (id_user, duration, thumbnail, file) values (:id_user, :duration, :thumbnail, :file)");
        $query->execute(array(
            "id_user" => $id_user,
            "duration" => $duration,
            "thumbnail" => $thumbnail,
            "file" => $file
        ));
        return $this->db->lastInsertId();
    }
    public function getVideoById($id_video)
    {
        $query = $this->db->prepare("SELECT * FROM videos_with_data WHERE id_video = :id_video");
        $query->execute(array(
            "id_video" => $id_video
        ));
        return $query->fetch();
    }

    public function completeUploading($id_video, $title, $description, $id_category)
    {
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

    public function getVideos()
    {
        $query = $this->db->prepare("SELECT * FROM videos_with_data");
        $query->execute();
        return $query->fetchAll();
    }

    public function getVideosByChannel($id_channel)
    {
        $query = $this->db->prepare("SELECT * FROM videos_with_data WHERE id_user = :id_user");
        $query->execute(array(
            "id_user" => $id_channel
        ));
        return $query->fetchAll();
    }
    
    public function getVideosByCategory($id_category)
    {
        $query = $this->db->prepare("SELECT * FROM videos_with_data WHERE id_category = :id_category");
        $query->execute(array(
            "id_category" => $id_category
        ));
        return $query->fetchAll();
    }
    public function getSuggestions($id_video)
    {
        $query = $this->db->prepare("SELECT * FROM videos_with_data WHERE id_video != :id_video LIMIT 0, 10");
        $query->execute(array(
            "id_video" => $id_video
        ));
        return $query->fetchAll();
    }
    
    public function getVideosByUser($id_user){
        $query = $this->db->prepare("SELECT * FROM videos_with_data WHERE id_user = :id_user");
        $query->execute(array(
            "id_user" => $id_user
        ));
        return $query->fetchAll();
    }

    public function searchVideos($search){
        $query = $this->db->prepare("SELECT * FROM videos_with_data WHERE title LIKE :search");
        $query->execute(array(
            "search" => "%$search%"
        ));
        return $query->fetchAll();
    }
    //video rating
    public function getRating($id_user, $id_video)
    {
        $query = $this->db->prepare("SELECT * FROM video_rating WHERE id_user = :id_user AND id_video = :id_video");
        $query->execute(array(
            "id_user" => $id_user,
            "id_video" => $id_video
        ));
        return $query->fetch();
    }
    public function setRating($id_user, $id_video, $rating)
    {
        $query = $this->db->prepare("INSERT INTO video_rating (id_user, id_video, rating) VALUES (:id_user, :id_video, :rating)");
        $query->execute(array(
            "id_user" => $id_user,
            "id_video" => $id_video,
            "rating" => $rating
        ));
    }
    public function updateRating($id_video_rating, $id_user, $id_video, $rating)
    {
        $query = $this->db->prepare("UPDATE video_rating SET id_user=:id_user, id_video=:id_video, rating=:rating WHERE id_video_rating = :id_video_rating");
        $query->execute(array(
            "id_video_rating" => $id_video_rating,
            "id_user" => $id_user,
            "id_video" => $id_video,
            "rating" => $rating
        ));
    }
    
    //comments rating
    public function getCommentRating($id_user, $id_comment)
    {
        $query = $this->db->prepare("SELECT * FROM comments_rating WHERE id_user = :id_user AND id_comment = :id_comment");
        $query->execute(array(
            "id_user" => $id_user,
            "id_comment" => $id_comment
        ));
        return $query->fetch();
    }
    public function setCommentRating($id_user, $id_comment, $rating)
    {
        $query = $this->db->prepare("INSERT INTO comments_rating (id_user, id_comment, rating) VALUES (:id_user, :id_comment, :rating)");
        $query->execute(array(
            "id_user" => $id_user,
            "id_comment" => $id_comment,
            "rating" => $rating
        ));
    }
    public function updateCommentRating($id_comment_rating, $id_user, $id_comment, $rating)
    {
        $query = $this->db->prepare("UPDATE comments_rating SET id_user=:id_user, id_comment=:id_comment, rating=:rating WHERE id_comment_rating = :id_comment_rating");
        $query->execute(array(
            "id_comment_rating" => $id_comment_rating,
            "id_user" => $id_user,
            "id_comment" => $id_comment,
            "rating" => $rating
        ));
    }



    //subscribes
    public function subscribtionsCount($id_user){
        $query = $this->db->prepare("SELECT COUNT(*) as num FROM subscribes WHERE id_channel = :id_channel");
        $query->execute(array(
            "id_channel" => $id_user
        ));
        return $query->fetch()['num'];

    }
    public function isSubscribed($id_user, $id_channel)
    {
        $query = $this->db->prepare("SELECT * FROM subscribes WHERE id_channel = :id_channel AND id_subscriber = :id_subscriber");
        $query->execute(array(
            "id_channel" => $id_channel,
            "id_subscriber" => $id_user
        ));
        return $query->fetch();
    }
    public function subscribe($id_user, $id_channel)
    {
        $query = $this->db->prepare("INSERT INTO subscribes (id_channel, id_subscriber) VALUES (:id_channel, :id_subscriber)");
        $query->execute(array(
            "id_channel" => $id_channel,
            "id_subscriber" => $id_user,
        ));
    }
    public function unsubscribe($id_user, $id_channel)
    {
        $query = $this->db->prepare("DELETE FROM subscribes WHERE id_channel = :id_channel AND id_subscriber = :id_subscriber");
        $query->execute(array(
            "id_channel" => $id_channel,
            "id_subscriber" => $id_user,
        ));
    }

    //comments
    public function getComments($id_video)
    {
        $query = $this->db->prepare("SELECT * FROM comments_with_data WHERE id_video = :id_video");
        $query->execute(array(
            "id_video" => $id_video
        ));
        return $query->fetchAll();
    }
    public function sendComment($id_user, $id_video, $content)
    {
        $query = $this->db->prepare("INSERT INTO comments (id_user, id_video, content) VALUES (:id_user, :id_video, :content)");
        $query->execute(array(
            "id_user" => $id_user,
            "id_video" => $id_video,
            "content" => $content
        ));
        return $this->db->lastInsertId();
    }
    //views
    public function addView($id_user, $id_video){
        $query = $this->db->prepare("INSERT INTO views (id_user, id_video) VALUES (:id_user, :id_video)");
        $query->execute(array(
            "id_user" => $id_user,
            "id_video" => $id_video,
        ));
    }
}
