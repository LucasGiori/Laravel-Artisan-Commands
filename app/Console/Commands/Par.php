<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Utils\NumbersOperations;
use App\Console\Utils\Util;

class Par extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'numeros:par {numbers*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retornas os número pares de uma coleção informada!';

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
     * @return int
     */
    public function handle()
    {
        $numbers = array_map(
            function($n){ 
                if(NumbersOperations::isPar(intval($n))) {
                    return $n;
                }                 
            }, NumbersOperations::filterElementsIsNumeric($this->argument("numbers"))
        );

        $this->info(Util::formatArrayToString($numbers));

        return 0;
    }
}
