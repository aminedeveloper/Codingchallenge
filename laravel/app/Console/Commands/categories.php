<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Artisan;
use App\Categorie;
use Illuminate\Console\Command;

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

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
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

        switch ($optionnumber) {
            case '1':


                // Get Lists Of Categories

                $this->table(
                    ['Id', 'Name'],
                    Categorie::all(['id', 'name'])->toArray()
                );
            break;// End of Case 1

            
            case '2':


                // Create New Category

                // ask user of category name
                $category_name = $this->ask('enter name of the category'); 

                // ask user of category parent 

                $this->table(
                    ['Id', 'Name'],
                    Categorie::all(['id', 'name'])->toArray()
                );


                $categoryparent=$this->ask('entrer id of category parent ( not nessecary )');

                // cast answer to integer 

                 $category_parent = intval($categoryparent); // Cast The Answer As an Integer

                 if($category_parent==0){ // This Check Is to set null if the user doesn't set any parent 

                    $category_parent=NULL;
                } 

                // add category to databse
                $categorie = new Categorie(); 

                $categorie->name = $category_name;
                $categorie->parentid  = $category_parent;

                $categorie->save();
                 

            break; // end of case 2


            case '3':

                // ask user id of category want to delete

                $this->table(
                    ['Id', 'Name'],
                    Categorie::all(['id', 'name'])->toArray()
                );


                $categoryparent=$this->ask('entrer id of category parent ( not nessecary )');

                $category_parent = intval($categoryparent); // Cast The Answer As an Integer

                if($category_parent==0){ // This Check Is to set null if the user doesn't set any parent 

                   $category_parent=NULL;
               } 

               // begin the deleting process 

               $category = Categorie::find($category_parent);

               $category->delete();
               Artisan::call('categories');



            break; // end of case 3
            
        }
    }
}
