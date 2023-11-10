<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessSector;
use App\Models\BusinessSubSector;

class BusinessSectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if(BusinessSector::count() == 0)
        {
            $one = BusinessSector::create([
                'name' => 'Sector 1'
            ]);
            
            
            $two =BusinessSector::create([
                'name' => 'Sector 1'
            ]);
            
            
            $three =BusinessSector::create([
                'name' => 'Sector 1'
            ]);
            
            BusinessSubSector::create([
                'sector_id' => $one->id,
                'name' => 'Sub Sector 1'
            ]);
            
            BusinessSubSector::create([
                'sector_id' => $two->id,
                'name' => 'Sub Sector 2'
            ]);
            
            BusinessSubSector::create([
                'sector_id' => $three->id,
                'name' => 'Sub Sector 3'
            ]);
            
        }
        
    }
}
