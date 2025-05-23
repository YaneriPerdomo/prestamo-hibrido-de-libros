<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id('person_id');
            $table->foreignId('gender_id')->nullable()->constrained('genders', 'gender_id');
            $table->foreignId('identity_card_id')->nullable()->constrained('identity_cards', 'identity_card_id')/*->onDelete('cascade') */ ;
            $table->foreignId('user_id')->nullable()->constrained('users', 'user_id')->onDelete('cascade');
            $table->foreignId('avatar_id')->nullable()->constrained('avatars', 'avatar_id')->onDelete('set null');
            $table->string('name', 55);
            $table->string('lastname', 55);
            $table->string('cedula', 10)->unique()->nullable();
            $table->string('number', 13)->nullable()->unique();
            $table->text('address')->nullable();
            $table->string('slug', 120)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
