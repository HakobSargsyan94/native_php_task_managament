<?php

function pdo_return_fetch_assoc_all ($query) {
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=tasks_custom", 'root', 'root');
        $res = [];
        $send = $dbh->prepare($query);
        $send->execute();
        while ($result = $send->fetchAll(PDO::FETCH_ASSOC)) {
            $res = $result;
        }
        $dbh = null;
        return $res;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function pdo_return_fetch_column ($query) {
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=tasks_custom", 'root', 'root');
        $send = $dbh->prepare($query);
        $send->execute();
        $result = $send->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        return $result;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function pdo_return_insert ($query) {
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=tasks_custom", 'root', 'root');
        $send = $dbh->prepare($query);
        $res = $send->execute();
        $dbh = null;
        return $res;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function pdo_return_update ($query) {
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=tasks_custom", 'root', 'root');
        $send = $dbh->prepare($query);
        $res = $send->execute();
        $dbh = null;
        return $res;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function pdo_return_delete ($query) {
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=tasks_custom", 'root', 'root');
        $send = $dbh->prepare($query);
        $res = $send->execute();
        $dbh = null;
        return $res;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>