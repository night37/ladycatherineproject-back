<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    
    <main class="container">
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Ajouter un compte</h1>
            <input type="email" name="email" id="" placeholder="saisir votre email">
            <input type="text" name="pseudo" id="" placeholder="choisir un pseudo">
            <input type="password" name="password" id="" placeholder="saisir votre mot de passe">
            <input type="password" name="verif_password" id="" placeholder="confirmer votre mot de passe">
            <label for="profile_image">Image de profil (optionnelle) :</label>
            <input type="file" name="profile_image" id="profile_image">
            <input type="submit" value="Ajouter" name="submit">
        </form>
        <p><?= $data["message"] ?? "" ?></p>
    </div>
</main>

</body>

</html>