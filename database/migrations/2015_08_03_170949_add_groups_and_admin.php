<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

class AddGroupsAndAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        $admin = new User();
        $admin->name = "Admin";
        $admin->slug = Str::slug("Admin");
        $admin->email = "admin@mail.com";
        $admin->password = Hash::make("admin");
        $admin->avatar = URL::to('/uploads/author-thumb.jpg');
        $admin->birthday = "15-01-1990";
        $admin->bio = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quam ex, dignissim at sem nec, rutrum volutpat sapien. Curabitur sed mauris metus. Sed in erat ullamcorper, congue dolor quis, tristique quam. Fusce a pharetra nulla. Duis imperdiet varius odio id mattis";
        $admin->gender = "Male";
        $admin->mobile_no = "+1922933234";
        $admin->activated = 1;
        $admin->fb_url = "http://www.facebook.com/shellprog";
        $admin->fb_page_url = "http://www.facebook.com/kodeinfo";
        $admin->save();

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down()
    {
    }
}
