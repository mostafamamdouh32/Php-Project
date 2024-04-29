<?php
require_once 'inc/header.php';
require_once 'inc/connection.php';
require_once 'App.php';

?>

<body class="container w-50 mt-5">
    <?php
            if ($request->CheckGet('id')):
                $id = $request->get('id');
                $stm=$conn->prepare ("select * from `todo` where id = :id");
                $stm ->bindParam(':id',$id,PDO::PARAM_INT);
                $stm->execute();
                if ($stm->rowCount() > 0) {
                    $note = $stm->fetch(PDO::FETCH_ASSOC);
                }
                
               
                    
                    ?>
            <form action="handle/edit.php?id=<?php echo $note['id'] ?>" method="post">
            
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note"><?php echo $note['title'] ?></textarea>
            <?php
            
            endif;
            ?>
        
        
        
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
</html>