<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Artisan;
use App\Categorie;
use App\services\CreateCategorie;
use App\services\DeleteCategorie;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class categories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command Responsable to manipulating categories';
    protected $createCategorie;
    protected $deleteCategorie;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CreateCategorie $createCategorie , DeleteCategorie $deleteCategorie)
    {
        $this->createCategorie = $createCategorie;
        $this->deleteCategorie = $deleteCategorie;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

      
 
    public function handle()
    {
        $row = ['1', 'Show lists of all categories'];
        $row2 = ['2','Add a category'];
        $row3 = ['3','Delete a category'];
        $this->table(
            ['Number', 'Option'],
            [$row,$row2,$row3]
        );

        $optionnumber = $this->ask('Please Choose an option ?');
        $request = new Request();
        switch ($optionnumber) {
            case '1':


                // Get Lists Of Categories

                $this->table(
                    ['Id', 'Name'],
                    Categorie::all(['id', 'name'])->toArray()
                );
            break;// End of Case 1

            case '2':
                // ask user of category name
                $request['categoryname'] = $this->ask('enter name of the category'); 

                // ask user of category parent 

                $this->table(
                    ['Id', 'Name'],
                    Categorie::all(['id', 'name'])->toArray()
                );

                $request['category_parent']=intval($this->ask('entrer id of category parent ( not nessecary )'));

                 if($request['category_parent']==0)
                { // This Check Is to set null if the user doesn't set any parent 

                    $category_parent=NULL;
                } 

                $this->createCategorie->storeCategorie($request);
            break;

            case '3':
                // ask user id of category want to delete
                $this->table(
                    ['Id', 'Name'],
                    Categorie::all(['id', 'name'])->toArray()
                );

                $categorieId=intval($this->ask('entrer id of category want to delete'));

                if($categorieId==0)
                { // This Check Is to set null if the user doesn't set any parent 

                   $categorieId=NULL;
                } 
                $this->deleteCategorie->deleteCategorie($categorieid);
            break;     
        }
    }
}
