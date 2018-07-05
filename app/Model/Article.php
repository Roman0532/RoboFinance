<?php

namespace app\Model;

use PDO;

class Article
{

    private $connection;

    /**
     * User constructor.
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Метод возвращающий количество записей в таблце `articles`
     */
    public function getCountArticles(): array
    {
        $result = $this->connection->query("
            SELECT count(*) as count
            FROM `articles`
        ");

        $count = $result->fetch(PDO::FETCH_ASSOC);

        return $count;
    }

    /**
     * Метод возвращающий все статьи из таблцы `articles` и пользователей которым принадлежат эти статьи
     * @param $offset
     * @param int $limit
     * @return array
     */
    public function getAllArticles($offset, $limit = 3): array
    {
        $sql = "
            SELECT u.full_name,a.* 
            FROM `articles` a 
            JOIN `users` u 
            ON a.user_id = u.id 
            ORDER BY a.`id` DESC";

        $sql .= " LIMIT {$offset}, {$limit}";

        $result = $this->connection->query($sql);

        $articles = $result->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }

    /**
     * Метод возвращающий одну статью по id из таблицы `articles`
     * @param $id
     * @return array
     */
    public function getOneArticleById($id)
    {
        $result = $this->connection->prepare("
            SELECT * 
            FROM `articles` 
            WHERE id = :id
        ");

        $result->execute(['id' => $id]);

        $article = $result->fetch(PDO::FETCH_ASSOC);

        return $article;
    }

    /**
     *  Метод обновления количества просмотров
     * @param $id
     */
    public function updateArticleView($id)
    {
        $update = $this->connection->prepare("
            UPDATE `articles` SET
            `count_view` = `count_view`+1
            WHERE `id` = :id
        ");

        $update->execute(['id' => $id]);
    }

    /**
     *  Метод обновления статьи
     * @param $id
     * @param null $filename
     * @param $title
     * @param $content
     * @return bool
     */
    public function updateArticle($id, $filename = null, $title, $content) : bool
    {
        if ($filename) {
            $update = $this->connection->prepare("
                UPDATE `articles` SET
                `image` = :filename,
                `title` = :title,
                `content` = :content
                WHERE `id` = :id
            ");

            $result = $update->execute([
                'filename' => $filename,
                'title' => $title,
                'content' => $content,
                'id' => $id
            ]);
        } else {
            $update = $this->connection->prepare("
                UPDATE `articles` SET
                `title` = :title,
                `content` = :content
                WHERE `id` = :id 
            ");

            $result = $update->execute([
                'title' => $title,
                'content' => $content,
                'id' => $id
            ]);
        }

        return $result;
    }

    /**
     *  Метод создания новой статьи
     * @param null $filename
     * @param $userId
     * @param $title
     * @param $content
     * @return bool
     */
    public function createArticle($filename = null, $userId, $title, $content): bool
    {
        $insert = $this->connection->prepare("
            INSERT INTO `articles` SET
             `image` = :fileName,
             `user_id` =  :userId,
             `title` = :title,
             `content` = :content
         ");

        $result = $insert->execute([
            'fileName' => $filename,
            'userId' => $userId,
            'title' => $title,
            'content' => $content
        ]);

        return $result;
    }

    /**
     *  Метод возвращающий самые популярные статьи за неделю
     */
    public function getPopularArticle(): array
    {
        $result = $this->connection->query("
        SELECT * 
        FROM `articles` 
        WHERE created_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) 
        ORDER BY `count_view` 
        DESC LIMIT 10
        ");

        $articles = $result->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }
}