<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SettigDetailsOldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::table('settings', function(Blueprint $table)
        {
            // $table->dropIndex('key');
            $table->dropUnique(['key']);

        });
         DB::table('settings')->insert(['key' => 'header_title',
        'value' => 'اجمع كل ما يخص بياناتك في صفحة واحدة واعرضها على جمهورك',
        'type' => 'home']);

        DB::table('settings')->insert(['key' => 'header_content',
        'value' => 'نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك',
        'type' => 'home']);

        DB::table('settings')->insert(['key' => 'header_image',
        'value' => 'assets/img/images/intro_img.png',
        'type' => 'home']);


        DB::table('settings')->insert(['key' => 'header_title',
        'value' => 'نعمل على تقريب المسافة بينك وبين جمهورك',
        'type' => 'aboutUs']);

        DB::table('settings')->insert(['key' => 'header_content',
        'value' => 'نسهل عليك آلية إنشاء الفواتير وتسجيلها واستلامها لغير الخبراء بالمجال المحاسبي وتوفير الوقت والجهد على غير المختصين وتأمين الوقت اللازم لهم لتطوير أعمالهم نسهل عليك آلية إنشاء الفواتير وتسجيلها واستلامها لغير الخبراء بالمجال المحاسبي وتوفير الوقت والجهد على غير المختصين وتأمين الوقت اللازم لهم لتطوير أعمالهم نسهل عليك آلية إنشاء الفواتير وتسجيلها واستلامها لغير الخبراء بالمجال المحاسبي وتوفير الوقت والجهد على غير المختصين وتأمين الوقت اللازم لهم لتطوير أعمالهم',
        'type' => 'aboutUs']);

        DB::table('settings')->insert(['key' => 'header_image',
        'value' => 'assets/img/images/intro_img.png',
        'type' => 'aboutUs']);


        DB::table('settings')->insert(['key' => 'header_title',
        'value' => 'هذه صفحة لعرض محتوى وهمي حيث يمكن استخدامها لأكثر من غرض',
        'type' => 'privacy']);

        DB::table('settings')->insert(['key' => 'header_content',
        'value' => 'نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك',
        'type' => 'privacy']);

        DB::table('settings')->insert(['key' => 'body_title',
        'value' => 'هنا يمكنك عرض المعلومات على هيئة نقاط منظمة',
        'type' => 'privacy']);

        DB::table('settings')->insert(['key' => 'body_content',
        'value' => '<ul>
        <li>
            <p>
                نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات
            </p>
        </li>
        <li>
            <p>
                يمكنك عرض جميع حساباتك من خلال صفحة واحدة
            </p>
        </li>
        <li>
            <p>
                نساعدك على جذب جمهورك بأسهل الطرق
            </p>
        </li>
        <li>
            <p>
                سهولة تواصل جمهورك معك من أهم اولوياتنا
            </p>
        </li>
        <li>
            <p>
                نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات
            </p>
        </li>
    </ul>',
        'type' => 'privacy']);



        DB::table('settings')->insert(['key' => 'header_title',
        'value' => 'هذه صفحة لعرض محتوى وهمي حيث يمكن استخدامها لأكثر من غرض',
        'type' => 'terms']);

        DB::table('settings')->insert(['key' => 'header_content',
        'value' => 'نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك',
        'type' => 'terms']);

        DB::table('settings')->insert(['key' => 'body_title',
        'value' => 'هنا يمكنك عرض المعلومات على هيئة نقاط منظمة',
        'type' => 'terms']);

        DB::table('settings')->insert(['key' => 'body_content',
        'value' => 'نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات

        يمكنك عرض جميع حساباتك من خلال صفحة واحدة

        نساعدك على جذب جمهورك بأسهل الطرق

        سهولة تواصل جمهورك معك من أهم اولوياتنا

        نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات',
        'type' => 'terms']);
    }
}
