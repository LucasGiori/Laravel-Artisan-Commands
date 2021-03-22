<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Utils\NumbersOperations;
use App\Console\Utils\Util;

class Descrescente extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'numeros:descrescente {numbers*} {--impares} {--limit=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retorna os números em ordem descrescentes';

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
                if(!$this->option("impares")){
                    return intval($n);
                }

                if(NumbersOperations::isImpar(intval($n))) {
                    return $n;
                }                 
            }, NumbersOperations::filterElementsIsNumeric($this->argument("numbers"))
        );

        $limit = $this->option("limit") ?? count($this->argument("numbers"));

        sort($numbers, SORT_NUMERIC);
        
        $numbers = array_slice(array_reverse($numbers), 0, $limit);

        $this->info(Util::formatArrayToString($numbers));

        return 0;
    }
}
