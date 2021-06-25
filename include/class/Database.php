<?php

class Database
{
    private $link;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect()
    {
        $config = require_once 'config_bd.php';
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];
        $this->link = new PDO( $dsn, 'u1332733_avtokol', 'AvtoKolesa' );
        return $this;
    }
    //============================= Select ================================//

    /**
     * @return array
     */
    public function SelectGoods()
    {
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $gamesAll = $this->link->query("SELECT * FROM `goods`");
        while($game = $gamesAll->fetch(PDO::FETCH_ASSOC))
        {
            $games[] = $game;
        }
        return $games;
    }

    public function GetCategory()
    {
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $gamesAll = $this->link->query("SELECT * FROM `categoris`");
        while($game = $gamesAll->fetch(PDO::FETCH_ASSOC))
        {
            $games[] = $game;
        }
        return $games;
    }

    public function SelectGood($id)
    {
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $botUser =  $this->link->prepare("SELECT * FROM `goods` WHERE `id` = ?");
        $botUser->execute(array($id));
        return $botUser->fetch(PDO::FETCH_ASSOC);
    }

    public function SelectCategoriesMini()
    {
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $gamesAll = $this->link->query("SELECT * FROM `categoris`");
        while($game = $gamesAll->fetch(PDO::FETCH_ASSOC))
        {
            $games[] = $game;
        }
        return $games;
    }

    public function SelectGoodsCategoriesMini($idCategori)
    {
        $gamesAll = $this->link->query("SSELECT * FROM `goods` WHERE `category` = $idCategori LIMIT 4");
        while($game = $gamesAll->fetch(PDO::FETCH_ASSOC))
        {
            $games[] = $game;
        }
        return $games;
    }


    /**
     * @return array
     */
    public function SelectGamesMini()
    {
        $gamesMiniAll = $this->link->query("SELECT * FROM `goods` LIMIT 4");
        while($game = $gamesMiniAll->fetch(PDO::FETCH_ASSOC))
        {
            $games[] = $game;
        }
        return $games;
    }
    public function GetProducts()
    {
        $gamesMiniAll = $this->link->query("SELECT * FROM `goods`");
        while($game = $gamesMiniAll->fetch(PDO::FETCH_ASSOC))
        {
            $games[] = $game;
        }
        return $games;
    }

    public function SelectFullCatalog($idCategori)
    {
        $gamesMiniAll = $this->link->query("SELECT * FROM `goods` WHERE `category` = $idCategori");
        while($game = $gamesMiniAll->fetch(PDO::FETCH_ASSOC))
        {
            $games[] = $game;
        }
        return $games;
    }



    /**
     * @param $login
     * @return mixed
     */
    public function SelectUser($login)
    {
        $user = $this->link->prepare("SELECT * FROM `admins` WHERE `login` = ?");
        $user->execute(array($login));
        return $user->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function SelectAdmin($userId)
    {
        $user = $this->link->prepare("SELECT admin_permission.add_data, admin_permission.upd_data, admin_permission.del_data, `login` FROM `admins` INNER JOIN `admin_permission` WHERE admins.id = ? AND `permission` = admin_permission.id");
        $user->execute(array($userId));
        return $user->fetch(PDO::FETCH_ASSOC);
    }

    //============================= Insert ================================//

    /**
     * @param $name
     * @param $cost
     * @param $amount
     * @param $img
     * @param $description
     * @param $stars
     * @param $category
     */
    public function AddProduct($name, $cost, $amount, $img, $description, $stars, $category)
    {
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $game = $this->link->prepare("INSERT INTO `goods` (`name`, `cost`, `amount`, `img`, `description`, `stars`, `category`) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $game->execute(array($name, $cost, $amount, $img, $description, $stars, $category));
    }

    public function AddCategory($name)
    {
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $game = $this->link->prepare("INSERT INTO `categoris` (`name`) VALUES(?)");
        $game->execute(array($name));
    }



    //============================= Update ================================//

    /**
     * @param $id
     * @param $name
     * @param $cost
     * @param $amount
     * @param $img
     * @param $description
     * @param $stars
     * @param $category
     * @param $activation_type
     */
    public function UpdateProduct($id, $name, $cost, $amount, $img, $description, $stars, $category)
    {
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $game = $this->link->prepare("UPDATE `goods` SET `name` = ?, `cost` = ?, `amount` = ?, `img` = ?, `description` = ?, `stars` = ?, `category` = ?  WHERE `id` = ?");
        $game->execute(array($name, $cost, $amount, $img, $description, $stars, $category, $id));
    }

    /**
     * @param $idGame
     * @param $description
     * @param $img
     */
    public function UpdateStock($idGame, $description, $img)
    {
        $stock = $this->link->prepare("UPDATE `stock` SET `id_game` = ?, `description` = ?, `img` = ? WHERE `id` = 1");
        $stock->execute(array($idGame, $description, $img));
    }

    /**
     * @param $id
     * @param $name
     */
    public function UpdateCategory($id, $name)
    {
        $stock = $this->link->prepare("UPDATE `categoris` SET `name` = ? WHERE `id` = ?");
        $stock->execute(array($name, $id));
    }

    //============================= Delete ================================//

    /**
     * @param $id
     */
    public function DeleteProduct($id)
    {
        $game = $this->link->prepare("DELETE FROM `goods`  WHERE `id` = ?");
        $game->execute(array($id));
    }

    /**
     * @param $id
     */
    public function DeleteCategory($id)
    {
        $game = $this->link->prepare("DELETE FROM `categoris`  WHERE `id` = ?");
        $game->execute(array($id));
    }
}
