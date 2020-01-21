<?php
declare (strict_types = 1);
namespace App\Model\Repository;

use App\Model\Entity\Article;
use App\Tools\Database;
use \PDO;

class ArticleRepository
{

    private $pdo;
    private $pdoStatement;
    private $article;

    /**
     * Fonction constructeur, instanciation de la bdd
     * dans la propriété pdo
     */
    public function __construct()
    {
        $this->pdo = Database::getPdo();
        $this->article = new Article;
    }

/************************************last Article************************************************* */
    /**
     * Récupère le dernier article
     *
     * @return bool|Article|null
     * false si l'objet n'a pu être inséré, objet Article si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function last(): ?Object
    {

        $this->pdoStatement = $this->pdo->query('SELECT * FROM article WHERE lastArticle = 1 AND posted = 1 ORDER BY date DESC LIMIT 1');

        //execution de la requête
        $executeIsOk = $this->pdoStatement->execute();

        if ($executeIsOk) {
            //$article = $this->pdoStatement->fetchObject('App\Model\Entity\Article');
            $this->article = $this->pdoStatement->fetchObject(Article::class);
            if ($this->article === false) {
                $articleFake = (object) [
                    'id' => '1',
                    'title' => 'Pas d\'article en bdd',
                    'legende' => 'Pas d\'article en bdd',
                    'description' => 'Pas d\'article en bdd',
                    'image' => 'default.png',
                    'date' => '',
                    'posted' => '1',
                    'lastArticle' => '1',
                ];
                return $articleFake;
            }
            return $this->article;
        }

        if (!$executeIsOk) {
            return null;
        }
    }
/************************************End last Article************************************************* */
/************************************ Update last Article with 0 for 1************************************************* */
    /**
     * Met à 0 le dernier article
     *
     * @return void
     */
    public function updateLast(): void
    {

        $this->pdoStatement = $this->pdo->prepare("UPDATE article SET lastArticle = 0 WHERE lastArticle = 1");
        $this->pdoStatement->execute();
    }
/************************************End Update last Article with 0 for 1************************************************* */
/************************************Read Post with id************************************************* */
    /**
     * Récupère un objet Article à partir de son identifiant
     *
     * @param int $id identifiant d'un article
     * @return bool|Article
     * false si l'objet n'a pu être inséré, objet Article si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function read(int $id): ?Object
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM article WHERE  posted = 1 AND id=:id');
        //Liaison paramètres
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        //execution de la requête
        $executeIsOk = $this->pdoStatement->execute();
        if ($executeIsOk) {
            //$article = $this->pdoStatement->fetchObject('App\Model\Entity\Article');
            $this->article = $this->pdoStatement->fetchObject(Article::class);
            if ($this->article === false) {
                $articleFake = (object) [
                    'id' => '1',
                    'title' => 'Article inconnu',
                    'legende' => 'Défault',
                    'description' => 'Article inconnu',
                    'image' => 'default.png',
                    'date' => '',
                    'posted' => '1',
                    'lastArticle' => '0',
                ];
                return $articleFake;
            }
            return $this->article;
        }

        if (!$executeIsOk) {
            return null;
        }
    }
/************************************End Read Post with id************************************************* */
/************************************Not Repeat Read All************************************************* */
    public function articleReadAll(int $firstOfPage, int $perPage, string $side): array
    {

        if (isset($side) && !empty($side) && $side !== null) {
            if ($side === "readAll") {
                $this->pdoStatement = $this->pdo->query("SELECT * FROM article ORDER BY date LIMIT $firstOfPage,$perPage");
            } else if ($side === "readArticleAll") {
                $this->pdoStatement = $this->pdo->query("SELECT * FROM article WHERE id!=(SELECT max(id) FROM article WHERE lastArticle = 1) AND posted = 1 ORDER BY id LIMIT $firstOfPage,$perPage");
            }
        }

        $this->article = [];
        $articles = 1;
        while ($articles = $this->pdoStatement->fetchObject(Article::class)) {
            $this->article[] = $articles;
            $articles++;
        }
        if ($this->article === false) {
            $articleFake[] = [
                'id' => '1',
                'title' => 'Que le dernier article en bdd',
                'legende' => 'Défault',
                'description' => 'Que le dernier article en bdd',
                'image' => 'default.png',
                'date' => '',
                'posted' => '1',
                'lastArticle' => '1',
            ];
            return $articleFake;
        };
        return $this->article;
    }
/************************************End Not Repeat Read All************************************************* */
/************************************Write Post************************************************* */
    /**
     * insert en bdd
     *
     * @param string $title
     * @param string $legende
     * @param string $description
     * @param integer $posted
     * @param integer $lastArticle
     * @param string $tmpName
     * @param string $extention
     * @return void
     */
    public function articleWrite(string $title, string $legende, string $description, string $date, int $posted, int $lastArticle, string $tmpName, string $extention): void
    {
        if (!$tmpName) {
            $id = "post";
            $extention = ".png";
        }
        $this->pdoStatement = $this->pdo->query('SELECT MAX(id) FROM article ORDER BY date = NOW()');
        $response = $this->pdoStatement->fetch();
        $id = $response['MAX(id)'] + 1;
        $p = [
            ':title' => $title,
            ':legende' => $legende,
            ':description' => $description,
            ':image' => $id . "." . $extention,
            ':date' => $date,
            ':posted' => $posted,
            ':lastArticle' => $lastArticle,
        ];
        $sql = "
        INSERT INTO article(title, legende, description, image, date, posted, lastArticle)
        VALUES(:title, :legende, :description, :image, :date, :posted, :lastArticle)
        ";
        $query = $this->pdo->prepare($sql);
        $query->execute($p);
        move_uploaded_file($tmpName, "img/article/" . $id . '.' . $extention);
    }
/************************************End Write Post************************************************* */
/************************************Delete Post Bdd With ID************************************************* */
    /**
     * Supprime un objet Article stocké en bdd
     *
     * @param Article $article objet de type Article
     * @return bool true en cas de succès, false en cas d'erreur
     */
    public function delete(Article $article): bool
    {
        $this->pdoStatement = $this->pdo->prepare('DELETE FROM article WHERE id=:id LIMIT 1');
        //Liaison paramètres
        $this->pdoStatement->bindValue(':id', $article->getId(), PDO::PARAM_INT);
        //execution de la requête
        return $this->pdoStatement->execute();
    }
/************************************End Delete Post Bdd With ID************************************************* */
/************************************Not repeat Count************************************************* */
    public function count(string $side): ?string
    {
        if (isset($side) && !empty($side) && $side !== null) {
            if ($side === 'front') {
                $this->pdoStatement = $this->pdo->query("SELECT count(*) AS total FROM article WHERE id!=(SELECT max(id) FROM article WHERE lastArticle = 1) AND posted = 1 ");
            } else if ($side === 'back') {
                $this->pdoStatement = $this->pdo->query("SELECT count(*) AS total FROM article WHERE posted = 1 ");
            }
        }

        $req = $this->pdoStatement->fetch();
        if ($req) {
            $total = $req['total'];
            return $total;
        }
        return null;
    }
/************************************End Not repeat Count************************************************* */
/************************************Return Post With Year************************************************* */
    /**
     * Retourne les articles en fonctions de la date données dans l'url
     * sinon  si c'est false ou null alors par défaults ce sera 2019
     *
     * @param [type] $years
     * @return array
     */
    public function articleDate($years): array
    {
        $this->pdoStatement = $this->pdo->query("SELECT * FROM article WHERE YEAR( date ) = $years");
        return $this->pdoStatement->fetchAll();
    }
/************************************End Return Post With Year************************************************* */

}