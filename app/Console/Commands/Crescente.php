<?php

namespace App\Console\Commands;

use App\Console\Utils\NumbersOperations;
use Illuminate\Console\Command;
use App\Console\Utils\Util;

class Crescente extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'numeros:crescentes {numbers*} {--limit=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retorna os números em ordem crescentes';

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
        $numbers = NumbersOperations::filterElementsIsNumeric($this->argument("numbers"));
        
        $limit = $this->option("limit") ?? count($numbers);

        sort($numbers, SORT_NUMERIC);
        
        $numbers = array_slice($numbers, 0, $limit);
        
        $this->info(Util::formatArrayToString($numbers));

        return 0;
    }
}
