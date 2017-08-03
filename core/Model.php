<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/12/17
 * Time: 8:46 AM
 */

namespace core;


use PDO;

/**
 * Class Model
 * @package core
 */
class Model
{
    /**
     * @var mixed|null
     */
    private $link;

    /**
     * @var array
     */
    private $sql = [
        'select' => '',
        'from' => '',
        'where' => '',
        'group' => '',
        'having' => '',
        'order' => '',
        'limit' => '',
        'join' => ''
    ];

    /**
     * Model constructor
     */
    public function __construct()
    {
        $dbLink = DBLink::getDbObj();
        $this->link = $dbLink->getLink();
    }

    /**
     * @param string $select
     * @return $this
     */
    public function select($select = '*')
    {
        $this->sql['select'] = 'SELECT ' . $select;
        return $this;
    }

    /**
     * @param $from
     * @return $this
     */
    public function from($from)
    {
        $this->sql['from'] = ' FROM ' . $from;
        return $this;
    }

    /**
     * @param $where
     * @return $this
     */
    public function where($where)
    {
        $this->sql['where'] = ' WHERE ' . $where;
        return $this;
    }

    /**
     * @param $group
     * @return $this
     */
    public function group($group)
    {
        $this->sql['group'] = ' GROUP BY ' . $group;
        return $this;
    }

    /**
     * @param $having
     * @return $this
     */
    public function having($having)
    {
        $this->sql['having'] = ' HAVING ' . $having;
        return $this;
    }

    /**
     * @param $order
     * @return $this
     */
    public function order($order)
    {
        $this->sql['order'] = ' ORDER BY ' . $order;
        return $this;
    }

    /**
     * @param $limit
     * @return $this
     */
    public function limit($limit)
    {
        $this->sql['limit'] = ' LIMIT ' . $limit;
        return $this;
    }

    /**
     * @param $join
     * @return $this
     */
    public function join($join)
    {
        $this->sql['join'] = ' JOIN ' . $join;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $sql = implode($this->sql);
        $stmt = $this->link->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function getOne()
    {
        $sql = implode($this->sql);
        $stmt = $this->link->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $original
     */
    public function original($original)
    {

    }

    /**
     * You can also use __call method, but this method will lose ide's
     * auto complete
     */
//    public function __call($name, $args)
//    {
//        $this->sql[$args] = $args;
//        return $this;
//    }

}
