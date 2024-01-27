<?php

class HomeModel extends Model
{
    public function all()
    {
        $data = $this->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function first($id)
    {
        $data = $this->query('SELECT * FROM users WHERE id=' . $id)->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}