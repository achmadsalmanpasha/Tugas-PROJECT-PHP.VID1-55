<?php 

    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        unset($_SESSION['_'.$id]);

    }

    if (isset($_GET['tambah'])) {
        $id = $_GET['tambah'];
        $_SESSION['_'.$id]++;
        
    }

    if (isset($_GET['kurang'])) {
        $id = $_GET['kurang'];
        $_SESSION['_'.$id]--;
        
        if ($_SESSION['_'.$id]==0){
            unset($_SESSION['_'.$id]);
        }

        
    }


    if (!isset($_SESSION['pelanggan'])) {
        header("location:?f=home&m=login");

    } else {
            
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            isi($id);
            header("location:?f=home&m=beli");
        } else {
            keranjang();
        }
        
    }




    function isi($id)
    {
        if (isset($_SESSION['_'.$id])) {
            $_SESSION['_'.$id]++;

        } else {
            $_SESSION['_'.$id] = 1;
        }
    }

    function keranjang(){

<<<<<<< HEAD
        <div class="card" style="width: 15rem; float: left; margin: 10px;">
            <img style="height: 200px;" src="upload/<?php echo $r['gambar'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $r['menu'] ?></h5>
                    <p class="card-text"><?php echo $r['harga'] ?></p>
                    <a class="btn btn-warning" href="?f=home&m=beli&id=<?php echo $r['idmenu'] ?>" role="button">Beli</a>
                </div>
        </div>
        
        <?php endforeach ?>
        <?php } ?>
    
=======
        global $db;
>>>>>>> aede267dda48a60dfcd5ad709711de2624ea55a7

        $total = 0;

        echo '
        
        <table class="table table-bordered w-70">
        
                <tr>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Hapus</th>
                </tr>
        ';

        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<>'idpelanggan') {
                $id = substr($key,1);

                $sql = "SELECT * FROM tblmenu WHERE idmenu = '$id'";

                $row = $db->getALL($sql);

                foreach ((array) $row as $r) {
                    echo '<tr>';
                    echo '<td>'.$r['menu'].'</td>';
                    echo '<td>'.$r['harga'].'</td>';
                    echo '<td><a href="?f=home&m=beli&tambah='.$r['idmenu'].'"> [+] </a> &nbsp &nbsp '.$value.' &nbsp &nbsp <a href="?f=home&m=beli&kurang='.$r['idmenu'].'"> [-] </a></td>';
                    echo '<td>'.$r['harga'] * $value.'</td>';
                    echo '<td><a href="?f=home&m=beli&hapus='.$r['idmenu'].'">Hapus</a></td>';
                    echo '</tr>';
                    $total = $total + ($value * $r['harga']);
                }

                
            }
  
        }
        echo '
            <tr>
                <td colspan = 4><h3>GRAND TOTAL :</h3></td>
                <td><h3>'.$total.'</h3></td>    
            </tr>';

<<<<<<< HEAD
    for ($i=1; $i <= $halaman ; $i++) { 
            echo '<a href = "?f=home&m=produk&p='.$i.$id.'" style="text-decoration:none">'.$i.'</a>';
            echo '&nbsp &nbsp &nbsp';
=======
        echo '</table>';
>>>>>>> aede267dda48a60dfcd5ad709711de2624ea55a7
    }


<<<<<<< HEAD
</div>
=======
?>
>>>>>>> aede267dda48a60dfcd5ad709711de2624ea55a7
