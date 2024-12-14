<?php
include 'include/config.php';
$course = $_POST['course'];
$charge = $_POST['charge'];
$sql=$pdo->prepare("SELECT * from teacher where learn LIKE '%{$course}%' and charge <= '{$charge}' order by charge");
$sql->execute();
$data='';
if($sql->rowCount() > 0)
{
    echo '<div class="card shadow py-3 my-1 bg-light">
    <div class="card-body ">
        <h3 class="text-center text-danger">Total '.$sql->rowCount().' search result</h3>
    </div>
</div>';
    while($result=$sql->fetch(PDO::FETCH_ASSOC))
    {
        $data.='';
        ?>
            <div class="card shadow py-3 my-1">
                <div class="card-body">
                    <div class="container col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <div style="width: 150px;height:150px;border-radius:50%;overflow:hidden;background-color:rgba(0, 0, 0, 0.6)">
                                    <img src="<?=$result['image']?>" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row my-4 fw-bold">
                                    <div class="col-sm-4">
                                        Name : 
                                    </div>
                                    <div class="col-sm-8">
                                    <?=$result['name']?> 
                                    </div>
                                </div>
                                <div class="row my-4 fw-bold">
                                    <div class="col-sm-4">
                                        Email : 
                                    </div>
                                    <div class="col-sm-8">
                                    <?=$result['email']?> 
                                    </div>
                                </div>
                                <div class="row my-4 fw-bold">
                                    <div class="col-sm-4">
                                        Contact : 
                                    </div>
                                    <div class="col-sm-8">
                                    <?=$result['contact']?> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row my-4 fw-bold">
                                    <div class="col-sm-4">
                                        Subject : 
                                    </div>
                                    <div class="col-sm-8">
                                    <?=$result['learn']?> 
                                    </div>
                                </div>
                                <div class="row my-4 fw-bold">
                                    <div class="col-sm-4">
                                        Fees : 
                                    </div>
                                    <div class="col-sm-8">
                                    <?=$result['charge']?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}else{
    $data.='<div class="card shadow py-3 my-1 bg-light">
    <div class="card-body ">
        <h3 class="text-center text-danger">No Teacher Found !</h3>
    </div>
</div>';
}
echo $data;
?>
