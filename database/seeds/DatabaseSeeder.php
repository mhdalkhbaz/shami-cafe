<?php

use Illuminate\Database\Seeder;
use App\choco_details;
use App\user;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsDemoSeeder::class);
        $this->call(UsersSeeder::class);
        // $this->call(UserSeeder::class);

//         choco_details::create([
//             'color' => 'ذهبي' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'سادة حلوة' ,
//             'choco_id' => '1'
            
//         ]);
//         choco_details::create([
//             'color' => 'فضي' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'سادة مرة' ,
//             'choco_id' => '1'
            
//         ]);
//         choco_details::create([
//             'color' => 'برونز' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'سادة كراميل' ,
//             'choco_id' => '1'
            
//         ]);
// /////////////////////////// 2222222222222222
//         choco_details::create([
//             'color' => 'اصفر' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'حلوة كراميل' ,
//             'choco_id' => '2'
            
//         ]);
//         choco_details::create([
//             'color' => 'سماوي' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'حلوة كيندر' ,
//             'choco_id' => '2'
            
//         ]);
//         choco_details::create([
//             'color' => 'برونز' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'حلوة لوتس' ,
//             'choco_id' => '2'
//         ]);
//         choco_details::create([
//             'color' => 'رمادي فاتح' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'حلوة كروكان' ,
//             'choco_id' => '2'
//         ]);


//         choco_details::create([
//             'color' => 'سماوي ' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'كريمة كيندر' ,
//             'choco_id' => '2'
//         ]);
//         choco_details::create([
//             'color' => 'احمر فاتح' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'حلوة فريز' ,
//             'choco_id' => '2'
//         ]);
//         choco_details::create([
//             'color' => 'زهري' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'كرانشي حلوة' ,
//             'choco_id' => '2'
//         ]);
//         choco_details::create([
//             'color' => 'توتي' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'كرانشي بيضاء' ,
//             'choco_id' => '2'
//         ]);
//         choco_details::create([
//             'color' => 'رمادي غامق' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'سادة مرة كروكان' ,
//             'choco_id' => '2'
//         ]);
//         choco_details::create([
//             'color' => 'احمر غامق' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'سادة مرة  فريز' ,
//             'choco_id' => '2'
//         ]);
//         choco_details::create([
//             'color' => 'اخضر' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'سادة مرة نعنع' ,
//             'choco_id' => '2'
//         ]);
//         choco_details::create([
//             'color' => 'تركواز' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'كريمة البندق' ,
//             'choco_id' => '2'
//         ]);
//         choco_details::create([
//             'color' => 'بيج' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'كريمة الشوكولا' ,
//             'choco_id' => '2'
//         ]);

//         //////////////////// 333333333333333333

//         choco_details::create([
//             'color' => 'توتي' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'غزل بنات' ,
//             'choco_id' => '3'
//         ]);
//         choco_details::create([
//             'color' => 'بيج' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'كريمة اللوز مع كسر اللوز' ,
//             'choco_id' => '3'
//         ]);
//         choco_details::create([
//             'color' => 'برونز' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'كريمة البندق مع كسر البندق' ,
//             'choco_id' => '3'
//         ]);
//         choco_details::create([
//             'color' => 'فضي' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'مرة مع زبيب' ,
//             'choco_id' => '3'
//         ]);
//         choco_details::create([
//             'color' => 'ازرق' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'أوريو' ,
//             'choco_id' => '3'
//         ]);

//         /////////////////////////44444444444444

//         choco_details::create([
//             'color' => 'بيج' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'كريمة الكيندر مع اللوتس' ,
//             'choco_id' => '4'
//         ]);
//         choco_details::create([
//             'color' => 'احمر فاتح' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'كريمة الكيند مع الرمان' ,
//             'choco_id' => '4'
//         ]);
//         choco_details::create([
//             'color' => 'اصفر' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'حلوة كراميل' ,
//             'choco_id' => '4'
//         ]);

// //////////////////////////////5555555


//         choco_details::create([
//             'color' => 'سماوي' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'كريمة كيندر' ,
//             'choco_id' => '5'
//         ]);
//         choco_details::create([
//             'color' => 'اصفر' ,
//             'label' => 'فضي' ,
//             'typeFilling' => 'سنيكرز مع كراميل' ,
//             'choco_id' => '5'
//         ]);
//         choco_details::create([
//             'color' => 'رمادي غامق' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'شوكولا مكسرات' ,
//             'choco_id' => '5'
//         ]);
//         choco_details::create([
//             'color' => 'اسود' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'بسكويت' ,
//             'choco_id' => '5'
//         ]);
//         choco_details::create([
//             'color' => 'بيج' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'كابتشينو' ,
//             'choco_id' => '5'
//         ]);
//         choco_details::create([
//             'color' => 'رمادي فاتح' ,
//             'label' => 'ذهبي' ,
//             'typeFilling' => 'كريمة البن (قهوة)' ,
//             'choco_id' => '5'
//         ]);

// ////////////////////////666666666666666

// choco_details::create([
//     'color' => 'زهري' ,
//     'label' => 'فضي' ,
//     'typeFilling' => 'كريمة الحليب مع رز الكرز' ,
//     'choco_id' => '6'
// ]);
// choco_details::create([
//     'color' => 'تركواز' ,
//     'label' => 'فضي' ,
//     'typeFilling' => 'حلوة بندق' ,
//     'choco_id' => '6'
// ]);
// choco_details::create([
//     'color' => 'توتي' ,
//     'label' => 'فضي' ,
//     'typeFilling' => 'تشيز كيك' ,
//     'choco_id' => '6'
// ]);
// choco_details::create([
//     'color' => 'اصفر' ,
//     'label' => 'فضي' ,
//     'typeFilling' => 'مرة بندق' ,
//     'choco_id' => '6'
// ]);
// choco_details::create([
//     'color' => 'برونز' ,
//     'label' => 'ذهبي' ,
//     'typeFilling' => 'لوتس' ,
//     'choco_id' => '6'
// ]);


// ////////////////////////////77777777777

// choco_details::create([
//     'color' => 'ذهبي' ,
//     'label' => 'ذهبي' ,
//     'typeFilling' => 'حلوة ويفر' ,
//     'choco_id' => '7'
// ]);
// choco_details::create([
//     'color' => 'فضي' ,
//     'label' => 'فضي' ,
//     'typeFilling' => 'مرة ويفر' ,
//     'choco_id' => '7'
// ]);




    }

}
