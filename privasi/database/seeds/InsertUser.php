<?php        
class InsertUser extends Seeder{
    public function run(){
        User::create(array('nama'=>'Yan yan Irawan',
                            'email'=>'rianwp@gmail.com',
                            'password'=>Hash::make('4197108')));
    }
}

?>