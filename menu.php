<?php
    header('Content-type: text/html; charset=utf-8');
    require('./links.php');
            //$id = substr($_SERVER['REQUEST_URI'],7);

            $tipo = (!isset($_GET['tipo'])) ? 1 : $_GET['tipo'];
            //$sqlcat = "SELECT tipo FROM menu WHERE id=".$id.";";
            $sqlcat = "SELECT * FROM m_tipo WHERE id = " . $tipo;
    $rescat = $conn->query($sqlcat);
    if ($rescat->num_rows > 0) {
        while ($rowcat = $rescat->fetch_assoc()) {
        $category = $rowcat['tipo'];
        }
    }else{
        echo "Error in ".$sqlcat."<br>".$conn->error;
    }
            $sqlmax = "SELECT MAX(`id`) AS maxid, MIN(`id`) AS minid FROM `menu` WHERE tipo = " . $tipo;
    $resmax = $conn->query($sqlmax);
    if ($resmax->num_rows > 0) {
        while ($rowmax = $resmax->fetch_assoc()) {
        $minid = $rowmax['minid'];
        $maxid = $rowmax['maxid'];
        }
    }
            $id = (!isset($_GET['id'])) ? $minid : $_GET['id'];
?>
<head>
<style>
    .list-group-item.active {
        <?php if ($theme == "default") {
            echo "background-color: #28a745;
                    border-color: #28a745;";
            } else
            if ($theme == "yellow") {
            echo "color: #000;
                    background-color: #ffc107;
                    border-color: #ffc107;"; }
        ?>
    }
</style>
</head>
<body>
    <div class="container background-container">
        <p class="margin-top: 1rem;"></p>
        <br>
        <!-- Aca poner tabs categorias -->
        <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
	        <?php //echo $category_html; 
                $sql = "SELECT id, tipo FROM m_tipo LIMIT 10";
                $result = $conn->query($sql);;
                $category_html = '';
                while( $row = $result->fetch_assoc()) {
                    $current_tab = "";
                    if($tipo == $row['id']) {
                        $current_tab = 'active';
                    }	
                    $category_html.= '<a class="nav-item nav-link '.$current_tab.'" id="nav-home-tab" role="tab" aria-controls="nav-home" aria-selected="true" href="?tipo='.$row['id'].'">'.           
                    $row['tipo'].'</a>';
                }
                echo $category_html;
            ?>
	    </div>
        <nav>
        <div class="tab-content" id="nav-tabContent">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <p class="margin-top: 1rem;"></p>
                    <br>
                    <?php
            $sql = 'SELECT id,name FROM menu WHERE tipo="' . $tipo . '" order by id, tipo ASC';
                        $result = $conn->query($sql);
                        if ($result->num_rows > 1) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<a class="list-group-item list-group-item-action ';
                                if ($id==$row['id']) {
                                  echo 'active';
                                }
                            echo '" href="?tipo=' . $tipo . '&id=' . $row['id'] . '">' . $row['name'] . '</a>';
                            }
                        } else if ($_SERVER['REQUEST_URI'] == '/food/?54550') {
                            // Nothing
                        } else {
                            echo '<head><meta http-equiv="refresh" content="0;?1"></head>';
                        }
                    ?>
                </div>
                <br>
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if($id == $minid) {echo 'disabled';} ?>">
                            <a class="page-link text-<?php if($id != $minid) echo theme($theme); ?>" href="?tipo=<?php echo $tipo;?>&id=<?php echo $minid;?>" aria-label="Start">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only"><?php echo $arraylang[$lang]['start']; ?></span>
                            </a>
                        </li>
                        <li class="page-item <?php if($id == $minid) {echo 'disabled';} ?>">
                            <a class="page-link text-<?php if($id != $minid) echo theme($theme); ?>" href="?tipo=<?php echo $tipo;?>&id=<?php echo (!empty($id)) ? $id-1 : '#' ?>"><?php echo $arraylang[$lang]['previous']; ?></a>
                        </li>
                        <li class="page-item <?php if($id == $maxid) {echo 'disabled';} ?>">
                            <a class="page-link text-<?php if($id != $maxid) echo theme($theme); ?>" href="?tipo=<?php echo $tipo;?>&id=<?php echo (!empty($id)) ? $id+1 : '#'?>"><?php echo $arraylang[$lang]['next']; ?></a>
                        </li>
                        <li class="page-item <?php if($id == $maxid) {echo 'disabled';} ?>">
                            <a class="page-link text-<?php if($id != $maxid) echo theme($theme); ?>" href="?tipo=<?php echo $tipo;?>&id=<?php echo $maxid; ?>" aria-label="End">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only"><?php echo $arraylang[$lang]['end']; ?></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php
            $sql2 = (isset($id)) ? 'SELECT * FROM menu WHERE id='.$id : 'SELECT * FROM menu' ;
            //$sql2 = 'SELECT * FROM menu WHERE id='.$id;
            //$sql2 = 'SELECT * FROM menu';
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 1) {
            //     header('Location: errors/db.html');
            // elseif ($result2->num_rows < 1)
            //     header('Location: errors/404.html');
            }
            else {

                while($row2 = $result2->fetch_assoc()){
                    echo '<div class="col">
                            <h1 class="d-flex justify-content-center">'.$row2['name'].' ($'.$row2['price'].')</h1>
                            <h5 class="d-flex justify-content-center">'.$row2['descrizione'].'</h5>
                            <br>
                            <img src="'.$row2['photo_url'].'" alt="" class="rounded img-fluid mx-auto d-block shadow" style="max-width:80%;border-style: solid;border-width: 2px;">
                        </div>';
                    }
            }
        ?>
        </div>
        </div>    
    </div>
</body>
