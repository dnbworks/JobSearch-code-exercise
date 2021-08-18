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