<?php


include_once('config/Database.php');
include_once('models/Search.php');

if(ISSET($_GET['submit'])){

    // Instantiate Db & connect
    $database = new Database();
    $db = $database->connect();

    $search =  new Search($db);

    $user_search = $_GET['search'];
    $where_clause = '';
     // for fixing an extra OR operator on our query
    $whereList = [];

    // Extract the search keywords into an array
    $clean_search = str_replace(',', ' ', $user_search);
    

    $search_words = explode(' ', $clean_search);
  

    $final_search_words = [];

    $defaultSort = [1, 3, 5];


    // echo !empty($where_clause);
    if(count($search_words) > 0){
        foreach($search_words as $word){
            if($word != ''){
                $final_search_words[] = $word;
                
            }
            
        }
    }
    // var_dump($final_search_words);

    if(count($final_search_words) > 0){
        foreach($final_search_words as $word){
            // $where_clause .= "description LIKE '%$word%' OR ";
            $whereList[] = "description LIKE '%$word%'";
            
            
        }
    }


    // $links = generate_sort_links();
    // var_dump(links);



    $where_clause = implode(' OR ', $whereList);
    // echo $where_clause;

    
    //passing the search_query as a param on the search method
    if(!empty($where_clause)){
        $result = $search->search($user_search, $where_clause);
        //  echo $where_clause;
    }
    
    $results = $result->fetchAll();

    $rowcount = $result->rowCount();

    

} 


if(ISSET($_GET['userSearch']) && ISSET($_GET['sort'])){

    $user_search = $_GET['userSearch'];
    $database = new Database();
    $db = $database->connect();

    $search =  new Search($db);

    $defaultSort = [];

    $query = build_query($_GET['userSearch'], $_GET['sort']);
    // echo $query;

     if(!empty($query)){
        $result = $search->search($_GET['userSearch'], $query);
    }

    $defaultSort = generate_sort_links($_GET['sort']);
  
    
    $results = $result->fetchAll();

    $rowcount = $result->rowCount();
}



function build_query($userTerm, $sort){
    $user_search = $userTerm;
    $where_clause = '';
     // for fixing an extra OR operator on our query
    $whereList = [];

    // Extract the search keywords into an array
    $clean_search = str_replace(',', ' ', $user_search);
    

    $search_words = explode(' ', $clean_search);
  

    $final_search_words = [];


    // echo !empty($where_clause);
    if(count($search_words) > 0){
        foreach($search_words as $word){
            if($word != ''){
                $final_search_words[] = $word;
                
            }
            
        }
    }
    // var_dump($final_search_words);

    if(count($final_search_words) > 0){
        foreach($final_search_words as $word){
            // $where_clause .= "description LIKE '%$word%' OR ";
            $whereList[] = "description LIKE '%$word%'";
            
            
        }
    }

    $where_clause = implode(' OR ', $whereList);
    // echo $where_clause;

    // sort the search query using the sort setting

    switch ($sort) {
        case 1:
            $where_clause .= " ORDER BY title";
            break;
        case 2:
            $where_clause .= " ORDER BY title DESC";
            break;
        case 3:
            $where_clause .= " ORDER BY state";
            break;
        case 4:
            $where_clause .= " ORDER BY state DESC";
            break;
        case 5:
            $where_clause .= " ORDER BY date_post";
            break;
        case 6:
            $where_clause .= " ORDER BY date_post DESC";
            break;
            
        default:
    
    }

   

    return $where_clause;
}

function generate_sort_links($sort){
    $sort_links = [];

    switch ($sort) {
        case 1:
            $sort_links = [2, 3, 5] ;
            break;
        case 3:
            $sort_links = [1, 4, 3] ;
            break;
        
        case 5:
            $sort_links = [1, 3, 6] ;
            break;
        
        default:
            $sort_links = [1, 3, 5] ;
            break;
    }

    return $sort_links;

}



