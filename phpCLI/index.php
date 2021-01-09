<?php
require_once 'Console/Table.php';

 
$menu_table = new Console_Table(); // Define Menu Table Template 
 

// Begin Function To Add a Category //

function createCategory($category_name,$category_parent){

    include('config.php');
    if(!empty($category_name)){
        $sql = "INSERT INTO `category`(`Name`, `Parent_category`) VALUES (?,?)";

        $query=$connection->prepare($sql);
    
        $query->execute([$category_name,$category_parent]);
    
        printf(' => Category Has been added !');
    }else{
        printf('Please , You need to Fill in All the fields !!');
        exit;
    }
 

}

 
// Begin Function To Get All Categories //

function getCategories(){
    include('config.php');

    $sql = "SELECT * FROM `category`";

    $query=$connection->prepare($sql);

    $query->execute();

    $categories=$query->fetchAll();

    return $categories;
}


// Begin Function To Get Delete Category By ID //

function deleteCategories($category_number){

    include('config.php');
        
    $sql = "DELETE FROM `category` WHERE `ID`=?";

    $query=$connection->prepare($sql);

    $query->execute([$category_number]);

    printf(' => Category Has been Deleted !');
    

}


// Begin Function To Create a Product //

function createProduct($product_name , $product_description , $product_price , $product_image , $category_number){
    include('config.php');

    if(!empty($product_name) && !empty($product_description) && !empty($product_price) && !empty($product_image) && !empty($category_number) ){
        $sql = "INSERT INTO `product`(`Name`, `Description`, `Price`, `Image`, `Category_id`) VALUES (?,?,?,?,?)";

        $query=$connection->prepare($sql);
    
        $query->execute([$product_name , $product_description , $product_price , $product_image , $category_number]);
    
        printf(' => Product Has been added !');
    } else{
        printf('Please , You need to Fill in All the fields !!');
        exit;
    }
   
    

}


// Begin Function To Get all Products //

function getProducts(){
    include('config.php');

    $sql = "SELECT * FROM `product`";

    $query=$connection->prepare($sql);

    $query->execute();

    $products=$query->fetchAll();

    return $products;
}

// Begin Function To Delete Product by IF //

function deleteProduct($product_number){
    include('config.php');
        
    $sql = "DELETE FROM `product` WHERE `ID`=?";

    $query=$connection->prepare($sql);

    $query->execute([$product_number]);

    printf(' => Product Has been Deleted !');
}



// Dashboard Menu Starting : 
$menu_table->setHeaders(array('Number', 'Option'));

 
$menu_table->addRow(array('1', 'Create a Category')); 
 
$menu_table->addRow(array('2', 'Delete a Category'));
 
$menu_table->addRow(array('3', 'Create a Product'));

$menu_table->addRow(array('4', 'Delete a Product'));

echo $menu_table->getTable();

echo "\n";

printf(' =>  Please Choose an Option : '); 




 
$handle = fopen ("php://stdin","r"); // Read The Answer

$option_number = fgets($handle); // Get menu Option

switch (trim($option_number)) {

    // If The User choosed Option 1 (Create a Category)
    case '1': 

        printf(' => Enter category name : ');
        $handle = fopen ("php://stdin","r");
        $category_name = fgets($handle); // Get Category Name 

        $categories = getCategories(); // Get All Categories to set the parent

        $menu_table = new Console_Table();
        $menu_table->setHeaders(array('Number', 'Category'));

        foreach($categories as $category){
            
            $menu_table->addRow(array($category['ID'], $category['Name']));
                
        }
        echo "\n";
        echo $menu_table->getTable(); // Print All Categories 

        printf(' => Enter category parent number ( not necessary )  : ');

        $handle = fopen ("php://stdin","r"); // Get Category Parent Number

        $category_parent = intval(fgets($handle)); // Cast The Answer As an Integer

        if($category_parent==0){ // This Check Is to set null if the user doesn't set any parent 

            $category_parent=NULL;
        } 

        createCategory($category_name,$category_parent); // Create Category Method 

    break;
    

    case '2':

        $categories = getCategories(); // Get All Categories 

        $menu_table = new Console_Table();

        $menu_table->setHeaders(array('Number', 'Category'));

        foreach($categories as $category){
            
            $menu_table->addRow(array($category['ID'], $category['Name']));
                
        }
        echo "\n";
        echo $menu_table->getTable(); // Print All Categories 

        printf(' => Enter category number To Delete  : ');

        $handle = fopen ("php://stdin","r"); // Get Category  Number

        $category_number = intval(fgets($handle)); // Cast The Answer As an Integer

        if($category_number==0){ // Exit If the user doesn't choose a category 

            exit;
        } 
        deleteCategories($category_number);

    break;
     
    case '3':

        printf(' => Enter Product name : ');
        $handle = fopen ("php://stdin","r");
        $product_name = fgets($handle); // Get product Name 


        printf(' => Enter Product description : ');
        $handle = fopen ("php://stdin","r");
        $product_description = fgets($handle); // Get product Description 


        printf(' => Enter Product price : ');
        $handle = fopen ("php://stdin","r");
        $product_price = floatval(fgets($handle)); // Get product Price 


        printf(' => Enter Product image path : ');
        $handle = fopen ("php://stdin","r");
        $product_image = fgets($handle); // Get product Image 


        $categories = getCategories(); // Get All Categories 

        $menu_table = new Console_Table();

        $menu_table->setHeaders(array('Number', 'Category'));

        foreach($categories as $category){
            
            $menu_table->addRow(array($category['ID'], $category['Name']));
                
        }
        echo "\n";
        echo $menu_table->getTable(); // Print All Categories 

        printf(' => Enter category number of this Product  : ');

        $handle = fopen ("php://stdin","r"); // Get Category  Number

        $category_number = intval(fgets($handle)); // Cast The Answer As an Integer

        createProduct($product_name , $product_description , $product_price , $product_image , $category_number);

    break;

    case '4':
        $products = getProducts(); // Get All Products 

        $menu_table = new Console_Table();

        $menu_table->setHeaders(array('Number', 'Products'));

        foreach($products as $product){
            
            $menu_table->addRow(array($product['ID'], $product['Name'], $product['Description']));
                
        }
        echo "\n";
        echo $menu_table->getTable(); // Print All Categories 

        printf(' => Enter product number To Delete  : ');

        $handle = fopen ("php://stdin","r"); // Get Category  Number

        $product_number = intval(fgets($handle)); // Cast The Answer As an Integer

        if($product_number==0){ // Exit If the user doesn't choose a category 

            exit;
        } 
        deleteProduct($product_number);
    break;
}

