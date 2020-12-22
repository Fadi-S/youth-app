<?php

use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Section::class);
            $table->string('title');
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('task_user', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Section::class);
            $table->timestamp('completed_at');

            $table->primary(['user_id', 'section_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');

        Schema::dropIfExists('task_user');
    }
}
