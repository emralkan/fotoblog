<?php include'../layout/header.php';
            $usersor=$db->prepare("SELECT * FROM user where id=:id ");
            $usersor->execute(array(
                'id'=>$_GET['id']));
            $usercek=$usersor->fetch(PDO::FETCH_ASSOC); ?>

<br><br><br><br><br><br><br><br><br>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Üye Düzenleme İşlemleri</h4>
                                <p class="card-title-desc">Üye Düzenleme İşlemlerinizi Buradan Yapabilirsiniz.
                                </p>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <form action="../islem.php" method="POST"> 
                                        <thead>
                                            <tr>
                                                <th>İD</th>
                                                <th>İsim</th>
                                                <th>Soyisim</th>
                                                <th>E-Mail</th>
                                                <th>Durum</th>
                                                <th>Düzenle</th>
                                                <th>Sil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr> 
                                                <td><input type="text" name="id" value="<?php echo $usercek['id'] ?>" class="form-control col-xs-5 col-xs-7"></td>
                                                <td><input type="text" name="name" value="<?php echo $usercek['name'] ?>" class="form-control col-xs-5 col-xs-7"></td>
                                                <td><input type="text" name="username" value="<?php echo $usercek['username'] ?>" class="form-control col-xs-5 col-xs-7"></td>
                                                <td><input type="text" name="email" value="<?php echo $usercek['email'] ?>" class="form-control col-xs-5 col-xs-7"></td>
                                                <td><select id="heard" class="form-control" name="yetki" >
                                                <option value="1" <?php echo $usercek['yetki'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
                                                <option value="0" <?php echo $usercek['yetki'] == '0' ? 'selected=""' : ''; ?>>Pasif</option>
                                                </select></td>
                                                <input type="hidden" name="id" value="<?php echo $usercek['id'] ?>">
                                                <td><button type="submit" name="kaydet" class="btn btn-primary waves-effect waves-light"> Kaydet</button></td>
                                                <td><button type="submit" name="sil" class="btn btn-danger waves-effect waves-light"> Sil</button></td>
                                            </tr>

                                        </tbody>
                                        </form>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    
<?php  include'../layout/footer.php'; ?>