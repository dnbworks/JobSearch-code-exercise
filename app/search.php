<?php


include_once('config/Database.php');
include_once('models/Search.php');

$order = [
    '1' => 'order by title',
    '2' => 'order by title desc',
    '3' => 'order by state',
    '4' => 'order by state desc',
    '5' => 'order by date',
    '6' => 'order by date desc'
];

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
            $where_clause;
            break;
    
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

function paginationQuery($page, $numRows, $query){
    // calculate pagination infor
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    $result_per_page = 5;

    $skip = (($current_page - 1) * $result_per_page);

    $num_pages = ceil($numRows / $result_per_page);

   $query = $query . " LIMIT $skip,  $result_per_page";

   return $query;


}

function generate_page_links($user_search, $sort, $current_page, $num_pages){
    $page_links = "";

    if($current_page > 1){
        $page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?search=' . $user_search . '&sort=' . $sort . '&page=' . ($current_page - 1) . '"><-</a>';
    } else {
        $page_links .= ' <-';
    }

    for ($i=1; $i <= $num_pages ; $i++) { 
        if($current_page == $i){
            $page_links .= ' ' . $i;
        } else {
            $page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?search=' . $user_search . '&sort=' . $sort . '&page=' . $i . '">' . $i .'</a>';
        }

    }

    // if this page is not the last page, generate the next link

    if($current_page < $num_pages){
        $page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?search=' . $user_search . '&sort=' . $sort . '&page=' . ($current_page + 1) . '">-></a>';
    } else {
        $page_links .= ' ->';
    }

    return $page_links;
}




if(isset($_GET['search'])){

    // Instantiate Db & connect
    $database = new Database();
    $db = $database->connect();

    $search =  new Search($db);

    $sort = ISSET($_GET['sort']) ? $_GET['sort'] : 0;
    $user_search = $_GET['search'];
    $page = ISSET($_GET['page']) ? $_GET['page'] : null;


    
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $result_per_page = 5;
    $skip = (($current_page - 1) * $result_per_page);


    
    $defaultSort = generate_sort_links($sort);


    $where_clause = build_query($user_search, $sort);



  
    //passing the search_query as a param on the search method
    if(!empty($where_clause)){
        $result = $search->search($user_search, $where_clause);
        //  echo $where_clause;
    }

    $rowcount = $result->rowCount();


    $num_pages = ceil($rowcount / $result_per_page);

    $query = $where_clause . " LIMIT $skip,  $result_per_page";



    if(!empty($query)){
        $result = $search->search($user_search, $query);
   
    }

    $results = $result->fetchAll();
    

    if($num_pages > 1){
        $pagination_links = generate_page_links($user_search, $sort, $current_page, $num_pages);
        
    } 



}





// searching by title
