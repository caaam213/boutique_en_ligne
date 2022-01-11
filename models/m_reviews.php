<?php
    require_once(MODELS_PATH."model.php");
    require_once(CLASSES_PATH.'Review.php');
?>

<?php
    class ReviewsManager extends Model
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
        public function getReviewsByIdProduct($idProduct)
        {
            $listReviews = [];
            $query = "SELECT * FROM `reviews` WHERE id_product=?";
            $results = $this->queryAll($query,[$idProduct]);
            foreach($results as $result)
            {
                $review = new Review($result['id_product'],$result['name_user'],$result['photo_user'],$result['stars'],$result['title'],$result['description']);
                $listReviews[] = $review;
            }
            return $listReviews;
        }
    }

?>