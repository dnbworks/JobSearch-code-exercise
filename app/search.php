<?php


include_once('config/Database.php');
include_once('models/Search.php');

if(ISSET($_GET['submit'])){


  
    $user_search = $_GET['search'];
    $where_clause = '';

    // for fixing an extra OR operator on our query
    $whereList = [];

    $search_words = explode(' ', $user_search);

    foreach($search_words as $word){
        // $where_clause .= "description LIKE '%$word%' OR ";
        $whereList[] = "description LIKE '%$word%'";

    }


    $where_clause = implode(' OR ', $whereList);

  

    // Instantiate Db & connect

    $database = new Database();
    $db = $database->connect();


    $search =  new Search($db);


    // passing the search_query as a param on the search method
    if(!empty($where_clause)){
        $result = $search->search($user_search, $where_clause);
    }
    

    $results = $result->fetchAll();

    $rowcount = $result->rowCount();


    // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    // $sql = 'SELECT id, title, state, description, date_post FROM jobs WHERE title LIKE ?';

    // $stmt = $pdo->prepare($sql);

    // var_dump($whereList);

    // echo $where_clause;

} 


// Instantiate Db & connect

// $database = new Database();
// $db = $database->connect();

// Instantiate Post blog object

// $post = new Post($db);


// query
// $result = $post->read();

// get row count
// $rowcount = $result->rowCount();


// check if there's posts
// if($rowcount > 0){
//     $post_arr = array();
// } else {

// }