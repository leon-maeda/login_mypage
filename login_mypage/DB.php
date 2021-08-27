<?php

class DB{

    public function connect(){
        $pdo = new PDO("mysql:dbname=lesson1;host=localhost;","root","root");
        return $pdo;
    }

    public function insert(){
        return "insert into login_mypage(name, mail, password, picture, comments) values(?, ?, ?, ?, ?)";
    }

    public function login(){
        return "select * from login_mypage where mail = ? and password = ?";
    }

    public function update(){
        return "UPDATE login_mypage SET name = ?, mail = ?, password = ?, comments = ? where id = ?";
    }

}
?>