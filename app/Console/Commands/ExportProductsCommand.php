<?php

namespace App\Console\Commands;

use App\Jobs\ExportProductsJob;
use Illuminate\Console\Command;

class ExportProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        dispatch(new ExportProductsJob());
        $this->info('Задача экспорта товаров запущена');
    }
}
