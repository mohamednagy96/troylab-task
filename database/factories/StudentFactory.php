<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name ,
            'email' => $this->faker->email,
            'mobile' =>$this->faker->phoneNumber ,
            'parent_number' =>$this->faker->phoneNumber ,
            'is_active' => rand(0,1) ,
            'dob' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male' , 'female']) ,
            'join_date' =>  $this->faker->date ,
            'school_id' => School::factory(),
            'level' => rand(1,3),
            'code' => rand(1111,9999)
        ];
    }
}
