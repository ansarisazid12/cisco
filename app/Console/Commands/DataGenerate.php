<?php

namespace App\Console\Commands;

use App\Crud;
use Illuminate\Console\Command;

class DataGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create N number of data';

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
        //
        $input = $this->ask('Enter N number of size?');
        //$this->info("Hello, $input");
        for($i=0;$i<$input;$i++)
        {
            $randIP = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
            $mac = implode(':', str_split(str_pad(base_convert(mt_rand(0, 0xffffff), 10, 16) . base_convert(mt_rand(0, 0xffffff), 10, 16), 12), 2));

            $create = Crud::firstOrNew(['hostname' =>$this->getRandomString(8),'loopback'=>$randIP,'mackaddress'=>$mac ]);

            if(! $create->sapid ) $create->save();
        }


    }
    public function getRandomString($length = 8) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
    
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
    
        return $string;
    }
}
