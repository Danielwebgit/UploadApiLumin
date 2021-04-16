<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Entity\Ingredients;

use Carbon\Carbon;
use Laravel\Lumen\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class IngredientController extends Controller
{

    protected $ingredient;
    protected $title;
    protected $best_before;
    protected $useByDate;
    private $getData;
    private $recipe;

    public function __construct( Ingredient $ingredient,Recipe $recipe)
    {
        $this->ingredient=$ingredient;
        $this->getData=$_GET;
        $this->recipe=$recipe;



    }

    public function findAll(Ingredient $ingredient)
    {

        return $this->ingredient=$ingredient->all();

    }

    /*
     * //Traz todos os ingredientes com validações
     * */

    public function getValid($criteria)
    {


        $recipe=$this->recipe->all();

        //$ingredients=$this->ingredient->all(); //Lista todos os ingredients
        //$recipe=$this->recipe->where('id',$ingredient['id'])->get();
        // $ingredients=$this->recipe->where('id',$criteria[1])->get();
        // var_dump($ingredients);

    }

    public function getValidation()
    {
        $utcTimeZone=new \DateTimeZone("UTC");
        $dataNow= Carbon::now();

        $documents=$this->findAll($this->ingredient);

        foreach ($documents as $document){
            $useByDate = new \DateTime($document['use_by'], $utcTimeZone);

            if($dataNow > $useByDate){
                continue;
            }

            $this->getValid([$document['id'], $document['id_recipe'],$document['title'],$document['best_before']]);
        }

       //return false;
    }


    public function lunch($criteria)
    {

        foreach ($criteria as $row){
            echo $row;
        }
       // return json_encode($recipe->all());
       // $recipe=$this->recipe->find(1)->ingredient;//recebe todos os ingredientes de uma receita

        // dd($recipe);




    }

}
