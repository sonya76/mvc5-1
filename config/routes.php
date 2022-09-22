<?php

$routes = [
    // Abonne
    ['home', 'default', 'index'],
    ['abonnes', 'abonne', 'listing'],
    ['show', 'abonne', 'show', ['id']],
    ['edit', 'abonne', 'edit', ['id']],
    ['delete', 'abonne', 'delete', ['id']],
    ['add', 'abonne', 'add']
];
