<?php

namespace App\Controller;

use App\Model\AbonneModel;
use App\Weblitzer\Controller;


/**
 *
 */
class AbonneController extends Controller
{

    public function listing()
    {
        $abonnes = AbonneModel::all();
        $count = AbonneModel::count();
        $this->render('app.abonne.listing', [
            'abonnes' => $abonnes,
            'count' => $count
        ]);
    }

    public function show($id){
        $abonne = $this->isAbonneExistOr404($id);
        $this->render('app.abonne.show',[
            'abonne' => $abonne
        ]);
    }

    private function isAbonneExistOr404($id){
        $abonne = AbonneModel::findById($id);
        if(empty($abonne)){
            $this->Abort404();
        }
        return $abonne;
    }


}