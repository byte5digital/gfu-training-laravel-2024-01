<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('board_group_id');
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('board_group_id')
                ->references('id')
                ->on('board_groups');
        });

        Schema::table('threads', function (Blueprint $table) {
            $table->foreignId('board_id')
                ->nullable()
                ->default(null)
                ->after('id');

            $table->foreign('board_id')
                ->references('id')
                ->on('boards');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->dropForeign('threads_board_id_foreign');
            $table->dropIndex('threads_board_id_foreign');
            $table->dropColumn('board_id');
        });

        Schema::dropIfExists('boards');
    }
};
