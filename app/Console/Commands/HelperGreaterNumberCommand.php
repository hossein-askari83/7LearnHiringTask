<?php

namespace App\Console\Commands;

use App\Http\Helper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class HelperGreaterNumberCommand extends Command
{
    protected $signature = 'helper:test {targetSum} {numbers*}';

    protected $description = 'Test the number helper function';

    public function handle()
    {
        $numbers = $this->argument('numbers');
        $targetSum = (int) $this->argument('targetSum');
        $pair = Helper::findPairGreaterThanSum($numbers, $targetSum);

        if ($pair) {
            $this->info("Pair found: " . implode(',', $pair));
        } else {
            $this->info("No pair found with sum greater than $targetSum");
        }
    }
}
