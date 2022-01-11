<?php 
    require_once(MODELS_PATH.'model.php');
    require_once(CLASSES_PATH.'Category.php');
?>

<?php
    class CategoriesManager extends Model
    {
        private $_db;

        public function __construct($connection)
        {
            $this->_db = $connection;
        }

        public function getDb()
        {
            return $this->_db;
        }

        public function getAllCategories()
        {
            $categoriesList = [];
            $query = "SELECT * FROM categories";
            $categories = $this->queryAll($query);
            foreach ($categories as $result)
            {
                $category = new Category($result['id'],
                $result['name']);
                $categoriesList[] = $category;
            }
            return $categoriesList;
        }

        public function getCategoryById($id)
        {
            $query = "SELECT * FROM `categories` WHERE id=?";
            $result = $this->queryRow($query,[$id]);
            $category = new Category($result['id'],$result['name']);
            return $category;
        }
    }



?>