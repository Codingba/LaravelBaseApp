#LaravelBaseApp
A basic Laravel 5.2 setup with user access management, user email verification and a pretty admin panel

![enter image description here](http://adnanmujkanovic.com/wp-content/uploads/2016/05/baseappheader.jpg)
________________

#What you get with this setup
In my experience most web apps and especially those which are user driven, need a solid access management solution, user email verification and a solid admin panel as a basis.

This repository is providing exactly that to get you up to speed a bit quicker.
________________

#Installation

1. Fork or download the repository
2. Set up the database connection renaming & modifying the existing .env.example
3. Run `php artisan migrate`
4. Run `php artisan db:seed`

Installation complete.
________________

#Try it out

 - Navigate the browser to the URL you have setup
 - You should see this if everything went well

![The front page](http://adnanmujkanovic.com/wp-content/uploads/2016/05/frontpage.jpg)

 -  Follow the link "Login to the Admin"
 - You have two accounts setup to use right away

> admin@admin.com 
> password: 111111
> 
> and
> 
> user@user.com 
> password: 111111

 - The admin@admin.com user has full access to everything and 
 - Every new permission that is automatically added attached to this user

```
namespace App\Http\Controllers\Admin;

class PermissionController extends Controller {
	public function store(Request $request){
		...
		//create permission
		$permissions=Permission::create($data);
		$role = Role::where('name', 'Admin')->first();
		$role->attachPermission($permissions);
		...
	}
}
```
 - The user@user.com has the default role that is attached to every new user
```
namespace App\Http\Controllers\Auth;

class RegistrationController extends Controller{
	public function postRegister(Request $request){
		...
		// create user
		$user = User::create($request->all());
		$role = Role::where('name', '=', 'user')->firstOrFail();
		$user->roles()->attach($role->id);
		...
	}
}
```
 - The default user role has no permissions attached to it by default


#User access management
This Laravel setup uses **[Zizaco/entrust](https://github.com/Zizaco/entrust)** for user roles and permissions capability.

#Database structure

![database structure](http://adnanmujkanovic.com/wp-content/uploads/2016/05/db_design.jpg)


