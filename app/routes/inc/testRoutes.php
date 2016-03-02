<?php 


// For testing, just alter the query and refresh
$app->get('/mini_dump_orders', function () use ($app) {

    // get an address from db
    
        $address = $app->db->query("
            
            ")->fetchAll(PDO::FETCH_ASSOC);
        $address = json_encode($address);
        echo $address;
        
});
// For testing, just alter the query and refresh
$app->get('/add_column_orders', function () use ($app) {

    // get an address from db
    
        $address = $app->db->query("
            
             ");
        $address2 = $app->db->query("
            SELECT * 
              FROM orders
             ORDER BY id DESC  
             LIMIT 1;
            ")->fetchAll(PDO::FETCH_ASSOC);
        $address2 = json_encode($address2);
        echo $address2;
        
        
});
// =============================================================================
$app->get('/mini_new_insert', function () use ($app) {

    // get an address from db
    
        $address = $app->db->query("
            
            ");
        
        
});

// INSERT INTO orders 
//                     (quantity_deluxe, quantity_basic, quantity_mini ,model, quantity, name, street, city, state, zip, email, btcAdd, confirmID, processed) 
//                     VALUES('. $quantity_deluxe.','. $quantity_basic.','. $quantity_mini.','.NULL.','. NULL.',"'. $name.'","'. $fullStreet.'","'. $city.'","'. $state.'",'. $zip.',"'. $email.'",'. $btcaddress_id.',"'. $confirmId.'",'. $processed.')';

//                     INSERT INTO orders 
//                     (quantity_deluxe, quantity_basic, quantity_mini , name, street, city, state, zip, email, btcAdd, confirmID, processed) 
//                     VALUES('. $quantity_deluxe.','. $quantity_basic.','. $quantity_mini.',"'. $name.'","'. $fullStreet.'","'. $city.'","'. $state.'",'. $zip.',"'. $email.'",'. $btcaddress_id.',"'. $confirmId.'",'. $processed.')';