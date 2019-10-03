# mgm

Please do migration !!
-- php artisan migrate

When the migration is done, do these following scripts on your terminal, in order to create new super admin

- Make sure your table is supported by UUID function, you can see in our slack about the gen_uuid function, and confirm
  to me if you don't know how to do it. after this, follow the intructions bellow : 

- php artisan tinker
- $user = new App\User;
- $user->name = '....'
- $user->email = '....'
- $user->password = bcrypt('....')
- $user->status_admin = 1
- $user->save()

then login with the new super admin you have registred with Artisan Tinker.



