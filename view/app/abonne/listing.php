<h2>Liste des abonnées</h2>
<p>Nombre d'abonnées : <?= $count; ?></p>
<p> <a href="<?= $view->path('add'); ?>">Ajouter un abonné</a></p>
<section class="abonne">
    <?php foreach ($abonnes as $abonne) { ?>
        <div>
            <p><?= $abonne->nom; ?></p>
            <ul>
                <li><a href="<?= $view->path('show', [$abonne->id]); ?>">Show</a></li>
            </ul>
            <ul>
                <li><a href="<?= $view->path('edit', [$abonne->id]); ?>">Edit</a></li>
            </ul>
            <ul>
                <li><a onclick="return confirm('Etes vous vraiment certain de vouloir supprimer cet abonné')" href="<?= $view->path('delete', [$abonne->id]); ?>">Delete</a></li>
            </ul>
        </div>
    <?php } ?>
</section>