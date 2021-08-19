<?php


// original
// if(ISSET($_GET['submit'])){

//     // Instantiate Db & connect
//     $database = new Database();
//     $db = $database->connect();

//     $search =  new Search($db);




//     $user_search = $_GET['search'];
//     $where_clause = '';
//      // for fixing an extra OR operator on our query
//     $whereList = [];

//     // Extract the search keywords into an array
//     $clean_search = str_replace(',', ' ', $user_search);
    

//     $search_words = explode(' ', $clean_search);
  

//     $final_search_words = [];

//     $defaultSort = [1, 3, 5];


//     // echo !empty($where_clause);
//     if(count($search_words) > 0){
//         foreach($search_words as $word){
//             if($word != ''){
//                 $final_search_words[] = $word;
                
//             }
            
//         }
//     }
//     // var_dump($final_search_words);

//     if(count($final_search_words) > 0){
//         foreach($final_search_words as $word){
//             // $where_clause .= "description LIKE '%$word%' OR ";
//             $whereList[] = "description LIKE '%$word%'";
            
            
//         }
//     }


//     // $links = generate_sort_links();
//     // var_dump(links);



//     $where_clause = implode(' OR ', $whereList);
//     // echo $where_clause;

    
//     //passing the search_query as a param on the search method
//     if(!empty($where_clause)){
//         $result = $search->search($user_search, $where_clause);
//         //  echo $where_clause;
//     }
    
//     $results = $result->fetchAll();

//     $rowcount = $result->rowCount();

//     $sort = ISSET($_GET['sort']) ? $_GET['sort'] : 0;
    

//     $links = generate_sort_links($sort);
//     var_dump($links);



    

// } 











if(ISSET($_GET['submit'])){

    // Instantiate Db & connect
    $database = new Database();
    $db = $database->connect();

    $search =  new Search($db);

    $sort = ISSET($_GET['sort']) ? $_GET['sort'] : 0;
    $user_search = $_GET['search'];
    $page = ISSET($_GET['page']) ? $_GET['page'] : null;

   

  
    $defaultSort = generate_sort_links($sort);
    $where_clause = build_query($user_search, $sort);


  
    //passing the search_query as a param on the search method
    if(!empty($where_clause)){
        $result = $search->search($user_search, $where_clause);
        //  echo $where_clause;
    }

    $rowcount = $result->rowCount();

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    $result_per_page = 5;

    $skip = (($current_page - 1) * $result_per_page);

    $num_pages = ceil($rowcount / $result_per_page);

    $query = $where_clause . " LIMIT $skip,  $result_per_page";



    // final query with pagination
    // $final_query = paginationQuery($page, $rowcount, $where_clause);
    
    



    if(!empty($query)){
        $result = $search->search($user_search, $query);
   
    }

    $results = $result->fetchAll();
    

    if($num_pages > 1){
        $pagination_links = generate_page_links($user_search, $sort, $current_page, $num_pages);
        
    } 




} 
