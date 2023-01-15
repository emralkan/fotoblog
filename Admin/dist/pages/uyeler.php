<?php include'../layout/header.php';
						$usersor=$db->prepare("SELECT * FROM user ");
						$usersor->execute();
						$usercek=$usersor->fetch(PDO::FETCH_ASSOC); ?>

<br><br><br><br><br><br><br><br><br>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Üye Listesi</h4>
                                <p class="card-title-desc">Kayıtlı Kullanıcıları Aşağıdaki Tablodan Görebilir Ve Düzenleyebilirsiniz.
                                </p>
                                <?php 

                                      if (@$_GET['durum']=="ok") {?>

                                      <b style="color:blue;">İşlem Başarılı</b>

                                      <?php } elseif (@$_GET['durum']=="no") {?>

                                      <b style="color:red;">İşlem Başarısız</b>

                                      <?php }

                                      ?>

                                <div class="table-responsive">
                                    <table class="table mb-0">

                                        <thead>
                                            <tr>
                                                <th>İD</th>
                                                <th>İsim</th>
                                                <th>Soyisim</th>
                                                <th>E-Mail</th>
                                                <th>Durum</th>
                                                <th>Düzenle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                            while($usercek=$usersor->fetch(PDO::FETCH_ASSOC)) {	?>
                                            <tr> 
                                                <td><?php echo $usercek['id'] ?></td>
                                                <td><?php echo $usercek['name'] ?></td>
                                                <td><?php echo $usercek['username'] ?></td>
                                                <td><?php echo $usercek['email'] ?></td>
                                                <td><?php $usercek['yetki']?>
                                               <?php if ($usercek['yetki']==1) { ?><button type="submit" class="btn btn-primary btn-sm waves-effect waves-light"> Aktif</button>
                                                     <?php }elseif($usercek['yetki']==0) { ?>
                                                    <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light"> Pasif</button>
                                                     
                                                   <?php } ?></td>
                                                <td><a href="uye-duzenle.php?id=<?php echo $usercek['id'] ?>"><button type="submit" class="btn btn-primary waves-effect waves-light"> Düzenle</button></a></td>

                                            </tr>
                                      <?php   } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    
<?php  include'../layout/footer.php'; ?>