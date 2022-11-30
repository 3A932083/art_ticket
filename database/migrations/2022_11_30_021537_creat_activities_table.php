<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();//活動編號
            $table->string('name',60);//活動名稱
            $table->dateTime('start_time');//活動日期(始)
            $table->dateTime('end_time');//活動日期(終)
            $table->string('place',60);//活動地點
            $table->string('introduce',255);//活動介紹
            $table->string('organizer',50);//主辦單位
            $table->string('img',100);//圖片
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
};
