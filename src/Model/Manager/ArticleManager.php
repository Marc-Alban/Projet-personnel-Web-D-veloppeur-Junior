<?php

namespace App\Model\Manager;

use App\Model\Database;
use App\Model\Entity\Article;
use \PDO;

class ArticleManager
{

    private $pdo;
    private $pdoStatement;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    /**
     * Insert un objet Article en bdd des articles
     * et met à jour l'objet passé en paramètre en lui
     * spécifiant un identifiant
     *
     * @param Article $article objet de type Article passé par référence
     * @return bool true si l'objet est inséré en bdd, false si il y a une erreur
     */
    private function create(Article &$article)
    {
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO article VALUES (null, :title, :legende,  :description, :image, :date, :posted, :lastArticle)');

        //liaison paramètres
        $this->pdoStatement->bindValue(':title', $article->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':legende', $article->getLegende(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':description', $article->getDescription());
        $this->pdoStatement->bindValue(':image', $article->getImage(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':date', $article->getDate());
        $this->pdoStatement->bindValue(':posted', $article->getPosted(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':lastArticle', $article->getLastArticle(), PDO::PARAM_INT);

        //execution de la requète
        $executeIsOk = $this->pdoStatement->execute();

        if ($executeIsOk) {
            $id = $this->pdo->lastInsertId();
            $article = $this->read($id);
            return true;
        }

        if (!$executeIsOk) {
            return false;
        }
    }

    /**
     * Récupère un objet Article à partir de son identifiant
     *
     * @param int $id identifiant d'un article
     * @return bool|Article|null
     * false si l'objet n'a pu être inséré, objet Article si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function read($id)
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM article WHERE id=:id');

        //liason des paramètres
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        //execution de la requête
        $executeIsOk = $this->pdoStatement->execute();

        if ($executeIsOk) {
            $article = $this->pdoStatement->fetchObject('App\Model\Entity\Article');
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
     * Récupère tous les objet Article dans la bdd
     *
     * @return array|bool
     * tableau d'objet Article ou un tableau vide s'il n'y pas d'objet en bdd
     * false si une erreur survient
     */
    public function readAll()
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM article ORDER BY date');

        $articles = [];

        while ($article = $this->pdoStatement->fetchObject('App\Model\Entity\Article')) {
            $articles[] = $article;
        }

        return $articles;
    }

    /**
     * Met à jour un objet Article stocké en bdd
     *
     * @param Article $article objet de type Article
     * @return bool true en cas de succès, false en cas d'erreur
     */
    private function update(Article $article)
    {
        $this->pdoStatement = $this->pdo->prepare('UPDATE article SET null, title=:title, legende=:legende, description=:description, image=:image, date=:date, posted=:posted, lastArticle=:lastArticle WHERE id=:id LIMIT 1');

        //liaison paramètres
        $this->pdoStatement->bindValue(':title', $article->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':legende', $article->getLegende(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':description', $article->getDescription());
        $this->pdoStatement->bindValue(':image', $article->getImage(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':date', $article->getDate());
        $this->pdoStatement->bindValue(':posted', $article->getPosted(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':lastArticle', $article->getLastArticle(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':id', $article->getId(), PDO::PARAM_INT);

        //execution de la requete
        return $this->pdoStatement->execute();
    }

    /**
     * Supprime un objet Article stocké en bdd
     *
     * @param Article $article objet de type Article
     * @return bool true en cas de succès, false en cas d'erreur
     */
    public function delete(Article $article)
    {
        $this->pdoStatement = $this->pdo->prepare('DELETE FROM article WHERE id=:id LIMIT 1');

        //Liaison paramètres
        $this->pdoStatement->bindValue(':id', $article->getId(), PDO::PARAM_INT);

        //execution de la requête
        return $this->pdoStatement->execute();
    }

    /**
     *Insere un objet et met à jour l'objetpassé en argument en
     *lui spécifiant un identifiant ou le met à jour dans la bdd s'il en est issu
     *
     *@param Article $article objet Article passé par référence
     *
     * @return bool true en cas de succès ou false en cas d'erreur
     */
    public function save(Article $article)
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