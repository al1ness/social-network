<?php

namespace App\Console\Commands;

use App\Events\Log\CompletionLogging;
use App\Events\Log\StartLogging;
use App\Models\Category;
use App\Models\Log;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $post = Post::find(50);
//
//        $post->update([
//            'title' => 'MyAwesomeTitle2',
//            'body' => 'MyAwesomeBody2'
//        ]);

//        $post = Post::find(50);
//        $post->delete();

//        $category = new Category();
//        $category->create([
//            'title' => 'Nature'
//        ]);

        dd(Hash::make('secret123'));

        $user = User::find(21);
        dd($user->roles);
    }
}
