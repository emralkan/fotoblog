<?php include'baglan.php';
ob_start();
session_start(); ?>

<?php 
if (isset($_POST['giris'])) {
		$email= $_POST['email'];
		$password= md5($_POST['password']);

		$kullanicisor=$db->prepare("SELECT * FROM admin where email=:email AND password=:password ");
		$kullanicisor->execute(array(
		'email' =>  $email,
		'password' => $password,
		));
		 
		  $say=$kullanicisor->rowCount();

		 if ($say==1) {
		 	$_SESSION['email']= $email;
			$_SESSION['password']= $password;
		 	header("location:pages/index.php");
		 }else{
		 		header("location:login/login.php");
		 	
		 }
	}
	if (isset($_POST['usergiris'])) {
		$email= $_POST['email'];
		$password= md5($_POST['password']);

		$userbak=$db->prepare("SELECT * FROM user where email=:email AND password=:password AND yetki=:yetki ");
		$userbak->execute(array(
		'email' =>  $email,
		'password' => $password,
		'yetki'=> 1
		));
		 
		  $bak=$userbak->rowCount();

		 if ($bak==1 ) {
		 	$_SESSION['email']= $email;
			$_SESSION['password']= $password;
		 	header("location:user/pages/index.php");
		 }else{
		 		header("location:login/login.php");
		 	
		 }
	}

	if (isset($_POST['kaydet'])) {
		$kaydet=$db->prepare("UPDATE user SET
			id=:id,
			name=:name,
			username=:username,
			email=:email,
			yetki=:yetki
			where id={$_POST['id']}");
		$update=$kaydet->execute(array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name'],
			'username'=>$_POST['username'],
			'email'=>$_POST['email'],
			'yetki'=>$_POST['yetki']
		));
		if ($update) {
			header("location:pages/uyeler.php?durum=ok");
		}else{
			header("location:pages/uye-duzenle.php=durum=no");
		}
	}

	if (isset($_POST['sil'])) {
	
	$uyesil=$db->prepare("DELETE from user where id=:id");
	$kontrol=$uyesil->execute(array(
		'id' => $_POST['id']
		));

	if ($kontrol) {

		
		Header("Location:pages/uyeler.php?id=$id&durum=ok");

	} else {

		Header("Location:pages/uyeler.php?id=$id&durum=no");
	}

}

if (isset($_POST['kabulet'])) {
	$foto_id=$_POST['foto_id'];
		$fotokabul=$db->prepare("UPDATE photos SET
			status=:status
			where foto_id={$_POST['foto_id']}");
		$update=$fotokabul->execute(array(
			'status'=>1
		));
		if ($update) {
			header("location:pages/photos.php?id=$foto_id&durum=ok");
		}else{
			header("location:pages/photos.php=durum=no");
		}
	}

	
	if (isset($_POST['reddet'])) {
		$redfoto=$db->prepare("UPDATE photos SET
			status=:status
			where foto_id={$_POST['foto_id']}");
		$update=$redfoto->execute(array(
			'status'=>2
		));
		if ($update) {
			header("location:pages/photos.php?durum=ok");
		}
	}

	if (isset($_POST['userkaydet'])) {
		$userkaydet=$db->prepare("UPDATE user SET
			email=:email,
			password=:password,
			username=:username
			where id={$_POST['id']}
			");
		$update=$userkaydet->execute(array(
			'email'=>$_POST['email'],
			'password'=>$_POST['password'],
			'username'=>$_POST['username']
		));
		if ($update) {
			header("location:user/pages/profil.php?durum=ok");
		}
	}
if (isset($_POST['fotokaydet'])) {
	$uploads_dir='../images';
	$gecici_ad=$_FILES["dosyayol"]["tmp_name"];
	$kalici_yol_ad="images/".$_FILES["dosyayol"]["name"];
	$refimgyol="../".$kalici_yol_ad;
	$fotokayit=$db->prepare("INSERT INTO photos SET
		description=:description,
		dosyayol=:dosyayol,
		user_id=:user_id
		");
	$insert=$fotokayit->execute(array(
		'description' => $_POST['description'],
		'dosyayol' => $refimgyol,
		'user_id'=>$_POST['user_id']
		));

if (move_uploaded_file($gecici_ad,$kalici_yol_ad))
   header("location:user/pages/profil.php?ekleme=ok");
else
   header("location:user/pages/profil.php?ekleme=no");

}




























?>