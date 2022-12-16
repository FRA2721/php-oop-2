<!-- php -->
<?php

/**
 * define class Categories 
 * @author FRANCESCO CIMINO
 */
class Categories
{
    // public $type;

    /**
     * define Categories construct
     * @author FRANCESCO CIMINO
     */
    public function __construct(public String $type)
    {
        $this->type = $type;
    }
}

/**
 * define class Products
 * @author FRANCESCO CIMINO
 */
class Products
{
    // public $name;
    // public $type;
    // public $category;
    // private $price;

    /**
     * define Products construct
     * @author FRANCESCO CIMINO
     */
    public function __construct(public String $name, public String $type, public Categories $category, public int $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->category = $category;
        $this->price = $price;
    }

    /**
     * getPrice() function
     * @author FRANCESCO CIMINO
     */
    public function getPrice() {
        return $this->price;
    }
}

/**
 * define class Food 
 * (extends Products class) 
 * @author FRANCESCO CIMINO
 */
class Food extends Products
{
    // public $ingredients;
    // public $kg;

    /**
     * define Food construct
     * @author FRANCESCO CIMINO
     */
    public function __construct(public String $name, public String $type, public Categories $category, public int $price, public String $ingredients, public int $kg)
    {
        /**
         * parent construct
         * @author FRFANCESCO CIMINO
         */
        parent::__construct($name, $type, $category, $price);
        $this->ingredients = $ingredients;
    }
}

/**
 * define class TOYS 
 * (extends Products class)
 * @author FRANCESCO CIMINO
 */
class Toys extends Products
{
    // public $color;
    // public $material; 
    // public $size;

    /**
     * define Toys construct
     * @author FRANCESCO CIMINO
     */
    public function __construct(public String $name, public String $type, public Categories $category, public int $price, public String $color, public String $material, public String $size)
    {
        /**
         * parent construct
         * @author FRFANCESCO CIMINO
         */
        parent::__construct($name, $type, $category, $price);
        $this->color = $color;
        $this->size = $size;
    }
}

/**
 * define class Kennel
 * (extends Products class)
 * @author FRANCESCO CIMINO
 */
class Kennel extends Products
{
    // public $material;
    // public $size;

    /**
     * define Kennel construct
     * @author FRANCESCO CIMINO
     */
    public function __construct(public String $name, public String $type, public Categories $category, public int $price, public String $material, public String $size)
    {
        parent::__construct($name, $type, $category, $price);
        $this->material = $material;
        $this->size = $size;
    }
}

// products array list
// remember to implement array of array for heach type
$products = [
    // dog data
    // meat & vegetables type product from "exclusion diet" production
    $dog_food = new Food("Exclusion Diet", "food",  new Categories("Dog"), 15.00, "Salt, Pork and Peas", 15),
    // dog peluche
    $dog_peluche = new Toys("Bone", "toys", new Categories("Dog"), 10.00, "white", "plastic", "Medium"),
    // dog meat food
    $dog_food = new Food("Pedigree Adult", "food", new Categories("Dog"), 11.50, "Beef and Vegetables", 10),

    // cat data
    // fish product from "natural trainer" production
    $cat_food = new Food("Natural Trainer", "food", new Categories("Cat"), 12.00, "Salt and Salmon", 27),
    // cat peluche
    $cat_peluche = new Toys("Fish puppet", "toys", new Categories("Cat"), 28.99, "light blue", "fabric", "Small"),
    // cat fish food
    $cat_food = new Food("Virtus Cat Adult", "food", new Categories("Cat"), 13.00, "Tuna with Shrimps", 17),

    // dog & cat data
    $dog_kennel = new Kennel("Dog Kennel", "kennel", new Categories("Dog"), 200.00, "Velvet", "Medium"),
    $cat_kennel = new Kennel("Cat Kennel", "kennel", new Categories("Cat"), 120.99, "Thermoplastic", "Small"),
    $dog_kennel = new Kennel("Dog Kennel", "kennel", new Categories("Dog"), 500.99, "wood", "Large")
];
?>
<!-- /php -->

<!-- html -->
<!DOCTYPE html>
<html lang="en">

<!-- head -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- title -->
    <title>Animals & Co. E-Commerce</title>
    <!-- /title -->

    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- /css -->

    <!-- import bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- /import bootstrap cdn -->

</head>
<!-- /head -->

<!-- body -->
<body>

    <!-- container section -->
    <div class="container">
        <h1 class="text-center mt-4">Animals & Co.</h1>

        <div class="row row-cols-3 g-3 mt-4 text-left">

            <!-- foreach iteration cicle for my products -->
            <?php foreach ($products as $product) { ?>
                <div class="col">
                    <div class="card mb-5">
                        <div class="card-body py-4">
                            <h2 class="card-title text-center py-2 mb-4"><?php echo $product->name ?></h2>
                            <p class="card-text">Category: <?php echo $product->category->type ?>;</p>
                            <p class="card-text">Price: &euro; <?php echo $product->getPrice() ?>;</p>

                            <!-- types conditional statements -->
                            <!-- food type condition -->
                            <?php if($product->type === "food") { ?>
                                <p class="card-text">Ingredients: <?php echo $product->ingredients?>;</p>
                                <p class="card-text">Weight: kg <?php echo $product->kg?>;</p>
                            <!-- /food type condition -->
                            
                            <!-- toys condition -->
                            <?php } elseif ($product->type === "toys") { ?> 
                                <p class="card-text">Material:  <?php echo $product->material ?>;</p>
                                <p class="card-text">Color:  <?php echo $product->color ?>;</p>
                                <p class="card-text">Size:  <?php echo $product->size ?>;</p>
                            <!-- /toys condition -->

                            <!-- other type condition -->
                            <?php } else {?>
                                <p class="card-text">Material: <?php echo $product->material ?>;</p>
                                <p class="card-text">Size:  <?php echo $product->size ?>;</p>
                            <?php } ?>
                            <!-- other type condition -->
                            <!-- /types conditional statements -->
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- /foreach iteration cicle for my products -->

        </div>
    </div>
    <!-- /container section -->

</body>
<!-- /body -->

</html>
<!-- /html -->