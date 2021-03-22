<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Utils\NumbersOperations;

class Media extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'numeros:media {numbers*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retorna a média de uma coleção!';

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

        $media = array_sum($numbers) / count($numbers);

        $this->info($media);
        return 0;
    }
}
