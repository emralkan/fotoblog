<?php include'../layout/header.php';
						$fotosor=$db->prepare("SELECT * FROM photos LEFT JOIN user ON photos.user_id=user.id where photos.status=:status ");
						$fotosor->execute(array(
                            'status'=>'1'
                        ));
                        ?>
                        <div class="row m-1">
                            <h4 style="color: white;">Onaylanan Fotoğraflarınızı Buradan Görüntüleyebilirsiniz</h4>
                            <div class="row m-1">
                                <h5><?php 

                                      if (@$_GET['durum']=="ok") {?>
                                      <b style="color:blue;">İşlem Başarılı</b>
                                      <?php } elseif (@$_GET['durum']=="no") {?>
                                      <b style="color:red;">İşlem Başarısız</b>
                                      <?php }
                                      ?></h5>
                            </div>
                        </div>
                <div class="row m-1">
                        <?php while ($fotocek=$fotosor->fetch(PDO::FETCH_ASSOC)) { ?>

                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">
                                  <div class="card-body">
                                      <form action="../islem.php" method="POST">
                                    <div class="card-img-top">
                                        <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;" src="<?php echo $fotocek['dosyayol'] ?>" data-holder-rendered="true">
                                    </div>
                                    <h5 class="card-title"><?php echo $fotocek['username'] ?></h5>
                                    <p class="card-text"><?php echo $fotocek['description'] ?></p>
                                    <button class="btn btn-danger waves-effect waves-light" name="reddet" value="2" type="submit">Kaldır</button>
                                    <input type="hidden" name="foto_id" value="<?php echo $fotocek['foto_id'] ?>">
                                     
                                 </form>
                                  </div>
                                </div>
                           </div>

                        <?php } ?>
                </div>

                

<?php  include'../layout/footer.php'; ?>