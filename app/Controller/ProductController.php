<?php

namespace App\Controller;

use App\Service\Form;
use App\Model\ProductModel;
use App\Service\Validation;
use App\Weblitzer\Controller;


/**
 *
 */
class ProductController extends Controller
{

    public function listing()
    {
        $products = ProductModel::all();
        $count = ProductModel::count();
        $this->render('app.product.listing', [
            'products' => $products,
            'count' => $count
        ]);
    }


    public function show($id)
    {
        $product = $this->isProductExistOr404($id);
        $this->render('app.product.show', [
            'product' => $product
        ]);
    }
    public function add()
    {
        $errors = [];
        if (!empty($_POST['submitted'])) {
            $post = $this->cleanXss($_POST);
            $valider = new Validation();
            $errors = $this->validProduct($errors, $valider, $post);
            if ($valider->IsValid($errors)) {
                ProductModel::insert($post);
                $this->redirect('products');
            }
        }
        $form = new Form($errors);
        $this->render('app.product.add', ['form' => $form]);
    }

    public function edit($id)
    {
        $product = $this->isProductExistOr404($id);
        $errors = [];
        if (!empty($_POST['submitted'])) {
            $post = $this->cleanXss($_POST);
            $v = new Validation();
            $errors = $this->validProduct($errors, $v, $post);
            if ($v->IsValid($errors)) {
                ProductModel::update($post, $id);
                $this->redirect('products');
            }
        }
        $form = new Form($errors);
        $this->render('app.product.edit', [
            'product'  => $product,
            'form' => $form
        ]);
    }

    public function delete($id)
    {
        $product = $this->isProductExistOr404($id);
        ProductModel::delete($id);
        $this->redirect('products');
    }

    private function validProduct($errors, $valider, $post)
    {
        $errors['titre'] = $valider->textValid($post['titre'], 'titre', 3, 100);
        $errors['reference'] = $valider->textValid($post['reference'], 'reference', 3, 100);
        $errors['description'] = $valider->textValid($post['description']);
    }

    private function isProductExistOr404($id)
    {
        $product = ProductModel::findById($id);
        if (empty($product)) {
            $this->Abort404();
        }
        return $product;
    }
}
