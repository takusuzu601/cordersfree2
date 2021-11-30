<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //☆リレーション関係の3テーブルのダミーデーター挿入のSEEDERの書き方
        //Departmentを8件作り$department->idをCityに8件挿入しCityを8件作りDistrictを8件作り
        //各テーブルに$city->idを8件挿入している 
    
        Department::factory(8)->create()->each(function(Department $department){
            City::factory(8)->create([
                    'department_id'=>$department->id
                ])->each(function(City $city){
                    District::factory(8)->create([
                        'city_id'=>$city->id
                    ]);
                });
        });
    }
}
