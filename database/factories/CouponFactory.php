<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Models\Coupon_data;
use Illuminate\Database\Eloquent\Factories\Factory;

class Coupon_dataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon_data::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
return [
        'coupon_code' => $this->strtolower(str_random(5)),
        'discount_per' => (int)$this->$faker->boolean(60) ? 15 : 20,
        'expired_date' => $this->Carbon::parse('2021-08-25'),
        'coupon_status' => 1,
        'name' => $this->faker->name,
        'slug' => Str::slug($this->faker->name),
        'detail' => $this->faker->text,

    ];


    // $data=[
    //     'coupon_code' => strtolower(str_random(5)),

    //     'expired_date' => Carbon::parse('2020-01-25'),
    //     'coupon_status' => 1,
    // ];
    // $i=1;
    // while($i<=20){
    //     if($i%5 == 0){
    //         $data['discount_per']=$i;
    //     }
    //    $i++;
    // }

}
}
