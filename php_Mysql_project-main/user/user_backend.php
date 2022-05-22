<?php 
    require "../connect2.php";
    function user_singup($connect , $name , $address , $email , $password , $phone ){
        $sql = "INSERT INTO userstable (user_name , user_address,user_email,user_password , user_phone) VALUES (:name , :address , :email , :pass , :phone)
        ";
        $stat = $connect->prepare($sql);
        $stat->execute([
            ":name"=>$name ,
            ":address"=> $address ,
            ":email"=> $email ,
            ":pass"=> $password ,
            ":phone"=>$phone
        ]);

    }

    function select_user($connect , $id){
        $sqlSelectUser = " SELECT * FROM userstable WHERE user_id = '$id'";

        $stat = $connect->query($sqlSelectUser);
        $row = $stat->fetch(PDO::FETCH_ASSOC);
        
        return $row ;
    }

    function history_orders($connect ,$id ){
        $sqlSelectHistoryOrdeers = "SELECT orders_details.order_id , orders.order_id , orders.user_id , orders_details.product_id , products.product_name ,products.product_price , orders_details.quantity ,orders.order_time
        FROM orders_details 
        INNER JOIN orders
        ON orders_details.order_id = orders.order_id
        INNER JOIN products
        ON orders_details.product_id = products.product_id
        WHERE orders.user_id = '$id'
        ";
    
        $stat = $connect->query($sqlSelectHistoryOrdeers);
        $row = $stat->fetchall(PDO::FETCH_ASSOC);



        return $row;
    }
    // $test = history_orders($connect , 1);
    // echo "<pre>";
    // print_r($test);
    // echo "</pre>";
    

    function update_user($connect ,$name , $address , $email , $pass , $phone , $id){

        $sqlUpdate = "UPDATE userstable SET user_name=:name,user_address=:address,user_email=:email,user_password=:pass,user_phone=:phone WHERE user_id = '$id'  

        ";

        $stat = $connect->prepare($sqlUpdate);

        $stat->execute([
           ':name'=>$name , 
           ':address'=>$address,
           ':email'=>$email,
           ':pass'=>$pass,
           ':phone'=>$phone 
        ]);
    }
    


?>