<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description');
            $table->json('about');
            $table->string('facebook');
            $table->string('instagram');
            $table->timestamps();
        });
        Setting::insert([
            'title'=>'{"uk":"Чудовий блог", "en":"Amazing blog"}',
            'description'=>'{"uk":"Чудовий блог опис", "en":"Amazing description"}',
            'about'=>'{"uk":"Про наш блог", "en":"About"}',
            'facebook'=>'https://facebook.com',
            'instagram'=>'https://instagram.com',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
