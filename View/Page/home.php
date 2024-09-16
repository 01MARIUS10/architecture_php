<button><a href="/deconnection">deconnection</a></button>
<button><a href="/new">Ajouter</a></button>

    <h2>Hello Mr/Mme <?= $_SESSION['user']->nom. " " .$_SESSION['user']->prenom?></h2>
    
    <h2>Liste des utilisateurs</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user) :?>
            <tr>
                <td><?=$user->id?></td>
                <td><?=$user->nom?></td>
                <td><?=$user->prenom?></td>
                <td><?=$user->email?></td>
                <td>
                    <button class="edit-btn">
                        <a href="<?= '/edit/'.$user->id ?>">
                            Éditer
                        </a>
                    </button>
                    <button class="delete-btn">
                        <a href="<?= '/delete/'.$user->id ?>">
                            Supprimer
                        </a>    
                    </button>
                </td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
