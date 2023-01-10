<?php

namespace App\Models;

use PDO;
use PDOException;

class Methods
{
    public function create($Request, $Tables, $Columns)
    {
        try {
            $pdo = new PDO("mysql:host=" . $GLOBALS['server'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $pdo->beginTransaction(); 
            $PdoColumns = implode(",", $Columns);
            $PdoValues = implode(",:", $Columns);
            $sql = "INSERT INTO " . $Tables . "(" . $PdoColumns . ") VALUES(:" . $PdoValues . ")";
            $stmt = $pdo->prepare($sql);
            foreach ($Columns as $Column) {
                $stmt->bindParam(':' . $Column, $Request[$Column]);
            }
            $stmt->execute();
            $pdo->commit();
            return $pdo;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            $pdo->rollBack();
        }
    }
    public function update($Request, $Tables, $id)
    {
        try {
            $pdo = new PDO("mysql:host=" . $GLOBALS['server'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $valuesOnString = array();
            foreach ($Request as $item => $value) {
                $valuesOnString[] = $item . "='" . $value . "',";
            }
            $UpdatingValues = implode(' ', $valuesOnString);
            $UpdatingValues = substr($UpdatingValues, 0, -1);
            $sql = "UPDATE " . $Tables . " SET " . $UpdatingValues . "  WHERE id=$id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $pdo->commit();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            $pdo->rollBack();
        }
    }
    public function getAll($Tables)
    {
        try {
            $pdo = new PDO("mysql:host=" . $GLOBALS['server'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $stmt = $pdo->prepare("SELECT * FROM " . $Tables);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            $pdo->rollBack();
        }
    }
    public function select($sql)
    {
        try {
            $pdo = new PDO("mysql:host=" . $GLOBALS['server'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            $pdo->rollBack();
        }
    }
    public function selectAll($sql)
    {
        try {
            $pdo = new PDO("mysql:host=" . $GLOBALS['server'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            $pdo->rollBack();
        }
    }
    public function getUserData($Tables, $id)
    {
        try {
            $pdo = new PDO("mysql:host=" . $GLOBALS['server'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $stmt = $pdo->prepare("SELECT * FROM " . $Tables . " WHERE id='" . $id . "'");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            $pdo->rollBack();
        }
    }
    public function getOneData($Tables, $id)
    {
        try {
            $pdo = new PDO("mysql:host=" . $GLOBALS['server'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);           
            $pdo->beginTransaction();           
            $stmt = $pdo->prepare("SELECT * FROM " . $Tables . " WHERE id='" . $id . "'LIMIT 1");
            $stmt->execute();
            $results = $stmt->fetch();
            return $results;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            $pdo->rollBack();
        }
    }
    public function delete($Tables, $id)
    {
        try {
            $pdo = new PDO("mysql:host=" . $GLOBALS['server'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $sql = "DELETE FROM " . $Tables . " WHERE id=$id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $pdo->commit();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            $pdo->rollBack();
        }
    }
    public function deleteRollback($Tables, $id)
    {
        try {
            $pdo = new PDO("mysql:host=" . $GLOBALS['server'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $sql = "DELETE FROM " . $Tables . " WHERE id=$id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $pdo->commit();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            $pdo->rollBack();
        }
    }
}
