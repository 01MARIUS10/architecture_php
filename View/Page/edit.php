<p>Hello , to edit page</p>
<div>
    <form action="<?= '/update/'.$user->id ?>" method="POST">
        <input type="number" name="id" value="<?=$user->id;?>" hidden >
        <input type="text" name="nom" id="nom" value="<?=$user->nom;?>">
        <input type="text" name="prenom" id="prenom" value="<?=$user->prenom;?>">
        <input type="email" name="email" id="email" value="<?=$user->email;?>">
        <input type="password" name="password" id="password" value="<?=$user->password;?>">
        <button type="submit">Modifier</button>
    </form>
</div>
<?php
//dump($user);

?>