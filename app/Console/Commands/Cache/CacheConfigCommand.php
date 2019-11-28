<?php

namespace App\Console\Commands\Cache;

use Encore\Admin\Config\ConfigModel;
use Illuminate\Console\Command;

class CacheConfigCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:cache-config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '缓存配置';

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
        cache(["config" => ConfigModel::all(['name', 'value'])->toArray()], now()->addDay());

        $this->info("缓存配置成功");
    }
}
