<?php
    function mine_paginates($search, $items){
        if ($search){

        }else{
            $takit= $items->links();
           echo("<div class='d-flex justify-content-center'>".$takit."</div>");
        }
    }

    function mine_searchs($searchs, $action, $text ){
        $search=$searchs;
        print("<form method='GET' action='$action'><input type='search' class='form-control' 
            name='search' placeholder='$text' value='$search'>
        </form>");
    }
