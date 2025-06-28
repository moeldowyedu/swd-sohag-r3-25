<?php
class User{
    public $name;
    public $email;
    public $image='uni.png';
    public const FAV_CLUB = "Alahly";

    function __construct($name, $email){
        $this->name = $name;
        $this->email = $email;
    }
    public function sayHi(){
        return "Hi, $this->name";
    }

    public static function whatIsMyFavTeam()
    {
        return "My favorite team is " . self::FAV_CLUB;
    }
}

// to access nonstatic properties OR // methods using -> arrow operator

$newUser = new User('Ahmed', 'ahmed@yahoo.com');

$newUser->image='ahmed.png';
var_dump($newUser);
echo $newUser->name . "<br>";
echo $newUser->sayHi(). "<br>";
echo User::FAV_CLUB."<br>";
echo User::whatIsMyFavTeam(). "<br>";
