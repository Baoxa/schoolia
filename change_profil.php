
    <?php
    include('navbar.php');
    require_once 'function.php';
    $user = getProfil($db,1,$_GET['id']);

    if (isset($_POST['id']) && !isset($_POST['id'])) {
      header("location: gestion.php?message=Le profil n'a pas été modifié.");
      exit;
    }

    if(isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
    	$acceptable = [
    		'image/jpeg',
    		'image/png',
    		'image/gif'
    	];

    	if(!in_array($_FILES['image']['type'], $acceptable)){
    		header('location: change_profil.php?message=Format de fichier incorrect.&type=danger');
    		exit;
    	}

    	$maxSize = 2 * 1024 * 1024;

    	if($_FILES['image']['size'] > $maxSize){
    		header('location: change_profil.php?message=Ce fichier est trop lourd !&type=danger');
    		exit;
    	}

    	$path = 'uploads';

    	if(!file_exists($path)){
    		mkdir($path, 0777);
    	}


    	$filename = $_FILES['image']['name'];


    	$array = explode('.', $filename);
    	$ext = end($array);

    	$filename = 'image-' . time() . '.' . $ext;

    	$destination = $path . '/' . $filename;
    	$tempName = $_FILES['image']['tmp_name'];
    	move_uploaded_file($tempName, $destination);
    }

    if(isset($_POST) AND !empty($_POST)){
      if(!empty($_POST['name']) AND !empty($_POST['firstname']) AND !empty($_POST['mail']) AND !empty($_POST['address']) AND !empty($_POST['postal']) AND !empty($_POST['city']) AND !empty($_POST['birthday'])){
        $req = $db->prepare('UPDATE student SET name = :name, firstname = :firstname, mail = :mail, address = :address, postal = :postal, city = :city, birthday = :birthday WHERE id = :id');
        $req->execute([
          'name' => htmlspecialchars($_POST['name']),
          'firstname' => htmlspecialchars($_POST['firstname']),
          'mail' => htmlspecialchars($_POST['mail']),
          'address' => htmlspecialchars($_POST['address']),
          'postal' => htmlspecialchars($_POST['postal']),
          'city' => htmlspecialchars($_POST['city']),
          'birthday' => htmlspecialchars($_POST['birthday']),
          'id' => $_POST['id']
        ]);
        if(isset($_FILES['image'])){
          $req = $db->prepare('UPDATE student SET image = :image WHERE id = :id');
          $req->execute([
            'image' =>  isset($filename) ? $filename : '',
            'id' => $_GET['id']
          ]);
        }
        header('location:gestion.php?message=Modification réussi.');
      }else{
        header('location:change_profil.php?message=Profil non modifié.');
      }
    }
     ?>

    <div class="container">
      <h1>Modifier le profil de "<?= $user->name . ' ' . $user->firstname?>"</h1>
      <h1>Laissez vide si aucun changement</h1>
      <form method="POST">
        <input type="hidden" name="id" value="<?= $user->id ?>">
        <div class="form-group">
          <label>Nom :</label>
          <input type="text" name="name" class="form-control" value="<?= $user->name ?>">
        </div>
        <div class="form-group">
          <label>Prénom :</label>
          <input type="text" name="firstname" class="form-control" value="<?= $user->firstname ?>">
        </div>
        <div class="form-group">
          <label>Email :</label>
          <input type="email" name="mail" class="form-control" value="<?= $user->mail ?>">
        </div>
        <div class="form-group">
            <label>Date de naissance</label>
            <input class="form-control" type="date" name="birthday" id="dateDeNaissance" value="<?= $user->birthday ?>">
        </div>
        <div class="form-group">
          <label>Code postal :</label>
          <input type="text" name="address" class="form-control" value="<?= $user->address ?>">
        </div>
        <div class="form-group">
          <label>Code postal :</label>
          <input type="number" name="postal" class="form-control" value="<?= $user->postal ?>">
        </div>
        <div class="form-group">
          <label>Ville :</label>
          <input type="text" name="city" class="form-control" value="<?= $user->city ?>">
        </div>
        <div class="form-group">
          <label>Image de profil :</label>
          <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/gif" value="<?= $user->image ?>">
        </div>
        <button class="btn btn-dark">Modifier</button>
      </form>
    </div>
  </body>
</html>
