<?php include'../layout/header.php' ?>


<br><br><br><br><br>

<div class="container-fluid">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Üyelik Bilgilerim</h4>
                                <p class="card-title-desc">Üyelik Bilgilerinizi Aşağıdaki Kutucuklardan Görüntüleyebilir Ve Güncelleyebilirsiniz.</p>
                                 <?php 

                                      if (@$_GET['durum']=="ok") {?>

                                     <h5> <b style="color:blue;">Güncelleme Başarılı</b></h5>

                                      <?php } elseif (@$_GET['durum']=="no") {?>

                                      <h5><b style="color:red;">Güncelleme Başarısız</b></h5>

                                      <?php }

                                      ?>

                                <form class="row needs-validation" action="../../islem.php" method="POST" novalidate="">
                                    
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Giriş Bilgileri(Güncellediğiniz takdirde yeniden giriş yapmanız gerekmektedir.)</label>
                                        <input type="text" name="email" value="<?php echo $usercek['email'] ?>" id="pass2" class="form-control"  required="">
                                        <div class="mt-2">
                                            <input type="text-center" name="password" value="<?php echo $usercek['password'] ?>" class="form-control" data-parsley-equalto="#pass2" placeholder="Password" required="">
                                        </div>

                                    </div>
                                   <div class="mb-3 position-relative">
                                        <label class="form-label">Kullanıcı Bilgileri</label>
                                        <input type="text" name="username" value="<?php echo $usercek['username'] ?>" id="pass2" class="form-control" placeholder="E-Mail" required="">
                                        <div class="mt-2">
                                            <input type="text" disabled value="<?php echo $usercek['id'] ?>" class="form-control" data-parsley-equalto="#pass2" placeholder="Password" required="">
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <div>
                                        	<input type="hidden" name="id" value="<?php echo $usercek['id'] ?>">
                                            <button type="submit" name="userkaydet" class="btn btn-pink waves-effect waves-light">
                                                Kaydet
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Fotoğraf Yükle</h4>
                                <p class="card-title-desc">Yükleyeceğiniz Fotoğrafın Özelliklerini seçiniz</p><?php 

                                      if (@$_GET['ekleme']=="ok") {?>

                                     <h5> <b style="color:blue;">Fotoğraf İsteği Başarılı</b></h5>

                                      <?php } elseif (@$_GET['ekleme']=="no") {?>

                                      <h5><b style="color:red;">Fotoğraf İsteği Başarısız</b></h5>

                                      <?php }

                                      ?>

                                <form action="../../islem.php" method="POST" enctype="multipart/form-data" class="custom-validation" novalidate="">

                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Fotoğraf İçeriği</label>
                                        <div>
                                            <input type="text" name="description" class="form-control" placeholder="Fotoğraf İçeriğini Giriniz." required="">
                                        </div>
                                    </div>
                                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"></h4>
                                <p class="card-title-desc">
                                </p>

                                <div class="mb-5">
                                   
                                        <div class="fallback">
                                            <input name="dosyayol" type="file" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                                            </div>

                                            <h4>Fotoğraf Seçiniz.</h4>
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <input type="hidden" name="status" value="0">
                </div>
                                    <div class="mb-0">
                                        <div>
                                        	<input type="hidden" name="user_id" value="<?php echo $usercek['id'] ?>">
                                            <button type="submit" name="fotokaydet" class="btn btn-primary waves-effect waves-light">
                                                Yükleme İsteği Gönder
                                            </button>
                                           
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>





<?php include'../layout/footer.php' ?>