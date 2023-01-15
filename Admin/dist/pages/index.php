<?php include'../layout/header.php'; ?>
        
        <!-- start page title -->
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="page-title-content">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <?php 
                                $adminsor=$db->prepare("SELECT * FROM admin where email=:email");
                                $adminsor->execute(array(
                                    'email'=>$_SESSION['email']
                                ));
                                $admincek=$adminsor->fetch(PDO::FETCH_ASSOC); 
                                ?>
                                <h4>Admin Paneline Hoşgeldiniz <?php echo $admincek['name'] ?></h4> <br>
                                <h4>Yukarıdaki Menülerden İşlemlerinizi Gerçekleştirebilirsiniz</h4>
                            </div>

                            <div class="col-sm-6">
                                <div class="float-end d-none d-md-block">
                                    <form class="app-search ">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="fa fa-search"></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </header>
           

<?php include'../layout/footer.php'; ?>