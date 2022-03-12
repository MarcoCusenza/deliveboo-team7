<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $courses = config("courses-filler");

    foreach ($courses as $course) {
      $newCourse = new Course();
      //
      $newCourse->slug = $course["slug"];
      $newCourse->name = $course["name"];
      //
      $newCourse->save();
    }
  }
}
