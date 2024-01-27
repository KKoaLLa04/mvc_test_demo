<?php

class Home extends Controller
{
    private $model, $data;
    public function __construct()
    {
        $this->model = $this->getModel('HomeModel');
    }

    public function index()
    {
        $this->data['list'] = $this->model->all();

        return $this->render('list', $this->data);
    }

    public function add()
    {
        return $this->render('add');
    }

    public function post_add()
    {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $dataInsert = [
            'fullname' => $fullname,
            'email' => $email,
            'phone' => $phone,
        ];

        $this->model->insertData('users', $dataInsert);

        header("Location: " . _WEB_ROOT . '/home/add');
    }

    public function edit($id)
    {
        $this->data['userDetail'] = $this->model->first($id);

        return $this->render('edit', $this->data);
    }

    public function post_edit($id)
    {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $dataUpdate = [
            'fullname' => $fullname,
            'email' => $email,
            'phone' => $phone,
        ];

        $condition = "id=$id";
        $this->model->updateData('users', $dataUpdate, $condition);

        header("Location: " . _WEB_ROOT . '/home/edit/' . $id);
    }

    public function delete($id)
    {
        $userDetail = $this->model->first($id);

        if (!empty($userDetail)) {
            $condition = "id=$id";
            $this->model->deleteData('users', $condition);
        }

        header("Location: " . _WEB_ROOT . '/home');
    }
}