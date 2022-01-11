<?php
    require_once(MODELS_PATH.'model.php');
    require_once(CLASSES_PATH.'Product.php');
?>
<?php
    class ProductsManager extends Model
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

        public function getProductsByCategory($category)
        {
            $productsList = [];
            $query = "SELECT * FROM products WHERE cat_id = ?";
            $products = $this->queryAll($query,array($category));
            foreach ($products as $result)
            {
                
                $product = new Product($result['id'],
                $result['cat_id'],
                $result['name'],
                $result['description'],
                $result['image'],
                $result['price'],
                $result['quantity']);
                $productsList[] = $product;
            }
            return $productsList;
        }



        public function getAllProducts()
        {
            $productsList = [];
            $query = "SELECT * FROM products";
            $products = $this->queryAll($query);
            foreach ($products as $product)
            {
                $product = new Product($product['id'],
                $product['cat_id'],
                $product['name'],
                $product['description'],
                $product['image'],
                $product['price'],
                $product['quantity']);
                $productsList[] = $product;
            }
            return $productsList;
        }

        public function getProductsById($id)
        {
            $query = "SELECT * FROM products WHERE id = ?";
            $product = $this->queryRow($query,[$id]);
            $product = new Product($product['id'],
                $product['cat_id'],
                $product['name'],
                $product['description'],
                $product['image'],
                $product['price'],
                $product['quantity']);
            return $product;
        }

        public function updateProduct($id,$cat_id,$name,$description,$image,$price,$quantity)
        {
            $query = "UPDATE `products` SET `cat_id`=?,`name`=?,`description`=?,`image`=?,`price`=?,`quantity`=? WHERE id=?";
            $updateProduct = $this->queryRow($query,[
                $cat_id,
                $name,
                $description,
                $image,
                $price,
                $quantity,
                $id]);
        }
    }
?>