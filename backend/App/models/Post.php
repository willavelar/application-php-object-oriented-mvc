<?php

namespace app\models;

use app\libraries\Model;
use stdClass;

class Post extends Model
{
    protected string $table = 'posts';

    public function getPosts() : array
    {
        $sql = '
            SELECT *, 
                   posts.id as postId, 
                   users.id as userId,
                   posts.created_at postCreated,
                   users.created_at as userCreated
                FROM '.$this->table.' 
                INNER JOIN users ON posts.user_id = users.id 
                    ORDER BY posts.created_at DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function addPost(array $data) : bool
    {
        $this->db->query('INSERT INTO '.$this->table.' (title, user_id, body, created_at) VALUES (:title, :user_id, :body, :created_at)');

        $this->db->bind(':title', $data['title'],);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        return ($this->db->execute());
    }

    public function updatePost(array $data) : bool
    {
        $this->db->query('UPDATE '.$this->table.' SET title = :title, body = :body WHERE id = :id');

        $this->db->bind(':id', $data['id'],);
        $this->db->bind(':title', $data['title'],);
        $this->db->bind(':body', $data['body']);

        return ($this->db->execute());
    }

    public function getPostById(string $id) : stdClass
    {
        $this->db->query("SELECT * FROM ".$this->table." WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function deletePost(string $id) : bool
    {
        $this->db->query("DELETE FROM ".$this->table." WHERE id = :id");
        $this->db->bind(':id', $id);

        return  ($this->db->execute());
    }

}