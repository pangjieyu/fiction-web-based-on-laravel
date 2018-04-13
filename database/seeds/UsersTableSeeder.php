<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = factory(User::class)->times(500)->make();
        User::insert($users->makeVisible(['password','remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'Pang';
        $user->email = 'pang.jie.yu@outlook.com';
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->activated = true;
        $user->save();
    }
}
