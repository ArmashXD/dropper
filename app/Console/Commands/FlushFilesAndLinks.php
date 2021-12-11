<?php

namespace App\Console\Commands;

use App\Helpers\Common;
use App\Models\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FlushFilesAndLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flush:files-links';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove not used links and files after 1 month';

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
        
        $paths = DB::table('files')->get();
        if(!empty($paths))
        {
            foreach ($paths as $key => $path) {
            # code...
             Common::deleteFileIfExists($path->path);
            }
            DB::table('files')->delete();
        }

        DB::table('links')->delete();
    }
}
