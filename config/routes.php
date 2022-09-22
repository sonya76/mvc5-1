<?php

$routes = [
    // Abonne
    ['home', 'default', 'index'],
    ['abonnes', 'abonne', 'listing'],
    ['show', 'abonne', 'show', ['id']],
    ['edit', 'abonne', 'edit', ['id']],
    ['delete', 'abonne', 'delete', ['id']],
    ['add', 'abonne', 'add']

     // Product
    
     ['products', 'product', 'listing'],
     ['show', 'product', 'show', ['id']],
     ['edit', 'product', 'edit', ['id']],
     ['delete', 'product', 'delete', ['id']],
     ['add', 'product', 'add']
];
