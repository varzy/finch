<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/12/17
 * Time: 8:46 AM
 */

namespace core;


use PDO;
use PDOException;

class Model
{
    protected $link = null;

    private $sql = [
        'from' => '',
        'where' => '',
        'order' => '',
        'limit' => '',
        'select' => '',
        'join' => ''
    ];

    public function __construct()
    {
        $dbLink = DBLink::getDbObj();
        $this->link = $dbLink->getLink();
    }

    public function from($_from)
    {
        $this->sql['from'] = ' FROM ' . $_from;
        return $this;
    }

    public function where($_where)
    {
        $this->sql['where'] = ' WHERE ' . $_where;
        return $this;
    }

    public function order($_order)
    {
        $this->sql['order'] = ' ORDER BY ' . $_order;
        return $this;
    }

    public function limit($_limit)
    {
        $this->sql['limit'] = ' LIMIT ' . $_limit;
        return $this;
    }

//    public function select($_select = '*')
//    {
//        // !!! TODO: fix here
//        $totalSql = ' SELECT ' . $_select . ' ' . (implode(" ", $this->sql));
//        return $totalSql;
//    }


//    public function select($sql, $params = [])
//    {
//        try {
//            $result = $this->doSql($sql, $params);
//            return $result['stmt']->fetchAll(PDO::FETCH_ASSOC);
//        } catch (PDOException $e) {
//            $this->getError($e);
//        }
//    }
//
//    public function find($sql, $params = [])
//    {
//        try {
//            $result = $this->doSql($sql, $params);
//            return $result['stmt']->fetch(PDO::FETCH_ASSOC);
//        } catch (PDOException $e) {
//            $this->getError($e);
//        }
//    }
//
//    public function count($sql, $params = [])
//    {
//        try {
//            $result = $this->doSql($sql, $params);
//            return $result['stmt']->fetchColumn();
//        } catch (PDOException $e) {
//            $this->getError($e);
//        }
//    }
//
//    public function exec($sql, $params = [])
//    {
//        try {
//            $result = $this->doSql($sql, $params);
//            return $result['isSuccess'] ? $result['stmt']->rowCount() : false;
//        } catch (PDOException $e) {
//            $this->getError($e);
//        }
//    }
//
//    private function doSql($sql, $params)
//    {
//        $stmt = $this->link->prepare($sql);
//        if ($params) {
//            foreach ($params as $key => $value) {
//                is_string($key) ? $stmt->bindValue($key, $value) : $stmt->bindValue($key + 1, $value);
//            }
//        }
//        $isSuccess = $stmt->execute();
//        return [
//            'stmt' => $stmt,
//            'isSuccess' => $isSuccess,
//        ];
//    }
//
//    private function getError($e)
//    {
//        echo 'Error Info: ', $e->getMessage(), '<br>';
//        echo 'Error File: ', $e->getFile(), '<br>';
//        echo 'Error Code: ', $e->getCode(), '<br>';
//        echo 'Wrong in this line: ', $e->getLine(), '<br>';
//        die;
//    }
}
