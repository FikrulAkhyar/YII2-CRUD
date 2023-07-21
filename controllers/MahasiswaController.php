<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use yii\db\Connection;
use yii\web\Response;
use \app\models\Mahasiswa;
use yii\base\Model;

class MahasiswaController extends Controller
{
    private $db;

    public function init()
    {
        parent::init();
        $this->layout = false;
        $this->db = Yii::$app->db;
        // $this->mahasiswa = new Mahasiswa();
    }

    public function actionIndex()
    {
        $data = [
            'nama' => 'Fikrul'
        ];
        return $this->render('index', $data);
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDatatable()
    {
        $requestData = Yii::$app->request->get();
        $start = Yii::$app->request->get('start')==null ? 1 : Yii::$app->request->get('start');
        $length = Yii::$app->request->get('length')==null ? 10 : Yii::$app->request->get('length');
        $draw = Yii::$app->request->get('draw');//==null ? 10 : Yii::$app->request->get('length');
        $columns = [
            'nim',
            'nama',
            'jurusan',
            'id',
        ];

        $sql = "SELECT * FROM mahasiswa";

        $data = Yii::$app->db->createCommand($sql)->queryAll();

        $totalData = count($data);
        $totalFiltered = $totalData;

        if (!empty($requestData['search']['value']))
        {
            $sql.=" WHERE nim LIKE '%" . $requestData['search']['value'] . "%'";
            $sql.=" OR nama LIKE '%" . $requestData['search']['value'] . "%'";
            $sql.=" OR jurusan LIKE '%" . $requestData['search']['value'] . "%'";
        }
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $totalFiltered = count($data);

        $sql.=" ORDER BY nim DESC LIMIT " . $start . " ," .
        $length. " ";

        $result = Yii::$app->db->createCommand($sql)->queryAll();

        $data = [];
        foreach ($result as $key => $row)
        {
            $nestedData = [
                'id' => $row["id"],
                'nim' => $row["nim"],
                'nama' => $row["nama"],
                'jurusan' => $row["jurusan"],
                'created_at' => $row["created_at"],
            ];

            array_push($data, $nestedData);
        }

        $json_data = array(
            "draw" => $draw,
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data // total data array
        );

        return \yii\helpers\Json::encode($json_data);
    }

    public function actionModalCreate()
    {
        $html = $this->render('components/modal_create');

        $response = [
            'html' => $html,
        ];
        // Set the response format to JSON
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Return the JSON response
        return $response;
    }

    public function actionStore()
    {
        $post = Yii::$app->request->post();
        $mahasiswa = new Mahasiswa([
            'nim' => $post['nim'],
            'nama' => $post['nama'],
            'jurusan' => $post['jurusan']
        ]);

        // Validate the model
        if (!$mahasiswa->validate()) {
            // Set the response format to JSON
            Yii::$app->response->format = Response::FORMAT_JSON;

            // Set the HTTP status code and status text
            Yii::$app->response->setStatusCode(400, 'Bad Request');

            $errors = $mahasiswa->getErrors();
            $response = [
                'message' => reset($errors),
            ];

            return $response;
        }

        // Save the model to the database
        $mahasiswa->save();

        $response = [
            'message' => 'Berhasil menambahkan mahasiswa',
        ];

        Yii::$app->response->format = Response::FORMAT_JSON;

        return $response;
    }

    public function actionModalEdit($id)
    {
        $data['id'] = $id;
        $data['mahasiswa'] = Mahasiswa::findOne($id);
        $html = $this->render('components/modal_edit', $data);

        $response = [
            'html' => $html,
        ];
        // Set the response format to JSON
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Return the JSON response
        return $response;
    }

    public function actionUpdate()
    {
        $post = Yii::$app->request->post();
        $mahasiswa = Mahasiswa::findOne($post['id']);
        $mahasiswa->nama = $post['nama'];
        $mahasiswa->nim = $post['nim'];
        $mahasiswa->jurusan = $post['jurusan'];
        $mahasiswa->save();

        $response = [
            'message' => 'Berhasil mengubah mahasiswa',
        ];
        
        // Set the response format to JSON
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Return the JSON response
        return $response;
    }

    public function actionModalDelete($id)
    {
        $html = $this->render('components/modal_delete', ['id' => $id]);

        $response = [
            'html' => $html,
        ];
        // Set the response format to JSON
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Return the JSON response
        return $response;
    }

    public function actionDelete()
    {
        $post = Yii::$app->request->post();
        $mahasiswa = Mahasiswa::findOne($post['id']);
        $mahasiswa->delete();

        $response = [
            'message' => 'Berhasil menghapus mahasiswa',
        ];
        
        // Set the response format to JSON
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Return the JSON response
        return $response;
    }
}