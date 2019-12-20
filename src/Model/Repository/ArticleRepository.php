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

    /**
     * Récupère le dernier article
     *
     * @return bool|Article|null
     * false si l'objet n'a pu être inséré, objet Article si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function last(): Object
    {

        $this->pdoStatement = $this->pdo->query('SELECT * FROM article WHERE lastArticle = 1 ORDER BY date DESC LIMIT 1');

        //execution de la requête
        $executeIsOk = $this->pdoStatement->execute();

        if ($executeIsOk) {
            //$article = $this->pdoStatement->fetchObject('App\Model\Entity\Article');
            $article = $this->pdoStatement->fetchObject(Article::class);
            if ($article === false) {
                return null;
            }
            return $article;
        }

        if (!$executeIsOk) {
            return false;
        }

    }

    /**
     * Récupère un objet Article à partir de son identifiant
     *
     * @param int $id identifiant d'un article
     * @return bool|Article
     * false si l'objet n'a pu être inséré, objet Article si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function read(int $id): Object
    {

        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM article WHERE lastArticle = 1 AND id=:id ORDER BY date DESC LIMIT 1');

        //Liaison paramètres
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        //execution de la requête
        $executeIsOk = $this->pdoStatement->execute();

        if ($executeIsOk) {
            //$article = $this->pdoStatement->fetchObject('App\Model\Entity\Article');
            $article = $this->pdoStatement->fetchObject(Article::class);
            if ($article === false) {
                header("Location: index.php?p=listesArticles");
                exit;
            }
            return $article;
        }

        if (!$executeIsOk) {
            return false;
        }

    }

    /**
     * Récupère tous les objet Article dans la bdd
     *
     * @return array|bool
     * tableau d'objet Article ou un tableau vide s'il n'y pas d'objet en bdd
     * false si une erreur survient
     */
    public function readAll(): array
    {

        $this->pdoStatement = $this->pdo->query("SELECT * FROM article WHERE id!=(SELECT max(id) FROM article) ORDER BY date DESC");

        $articles = [];

        while ($article = $this->pdoStatement->fetchObject(Article::class)) {
            $articles[] = $article;
        }

        return $articles;
    }

    /**
     * Insert un objet Article en bdd des articles
     * et met à jour l'objet passé en paramètre en lui
     * spécifiant un identifiant
     *
     * @param Article $article objet de type Article passé par référence
     * @return bool true si l'objet est inséré en bdd, false si il y a une erreur
     */
    private function create(Article $article): bool
    {
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO article VALUES (null, :title, :legende,  :description, :image, :date, :posted, :lastArticle)');

        //liaison paramètres
        $this->bind($article);

        //execution de la requète
        $executeIsOk = $this->pdoStatement->execute();

        if ($executeIsOk) {
            $article = $this->last();
            return true;
        }

        if (!$executeIsOk) {
            return false;
        }
    }

    /**
     * Met à jour un objet Article stocké en bdd
     *
     * @param Article $article objet de type Article
     * @return bool true en cas de succès, false en cas d'erreur
     */
    private function update(Article $article): bool
    {
        $this->pdoStatement = $this->pdo->prepare('UPDATE article SET null, title=:title, legende=:legende, description=:description, image=:image, date=:date, posted=:posted, lastArticle=:lastArticle WHERE id=:id LIMIT 1');

        //liaison paramètres
        $this->bind($article);
        $this->pdoStatement->bindValue(':id', $article->getId(), PDO::PARAM_INT);

        //execution de la requete
        return $this->pdoStatement->execute();
    }

    /**
     * Factorisation du bindvalue
     *
     * @param [type] $article
     * @return void
     */
    private function bind(Article $article): void
    {
        $this->pdoStatement->bindValue(':title', $article->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':legende', $article->getLegende(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':description', $article->getDescription());
        $this->pdoStatement->bindValue(':image', $article->getImage(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':date', $article->getDate());
        $this->pdoStatement->bindValue(':posted', $article->getPosted(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':lastArticle', $article->getLastArticle(), PDO::PARAM_INT);
    }

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

    /**
     *Insere un objet et met à jour l'objet passé en argument en
     *lui spécifiant un identifiant ou le met à jour dans la bdd s'il en est issu
     *
     *@param Article $article objet Article passé par référence
     *
     * @return bool true en cas de succès ou false en cas d'erreur
     */
    public function save(Article $article): bool
    {
        //il faut utiliser la méthode create lorsqu'il s'agit d'un nouvel objet
        //et la méthode Update lorsque l'objet n'est pas nouveau
        //Objet n'a pas d'id
        if (is_null($article->getId())) {
            return $this->create($article);
        }

        //Objet ayant un id
        if (!is_null($article->getId())) {
            return $this->update($article);
        }
    }
}