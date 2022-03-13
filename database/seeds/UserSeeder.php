<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = config("users-filler");

    foreach ($users as $user) {
      $newUser = new User();
      $newUser->name = $user["name"];
      $newUser->surname = $user["surname"];
      $newUser->email = $user["email"];
      $newUser->password = Hash::make($user["password"]);
      $newUser->VAT_number = $user["VAT_number"];
      $newUser->save();
    }
  }
}
