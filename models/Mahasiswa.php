<?php

namespace app\models;

use yii\db\ActiveRecord;

class Mahasiswa extends ActiveRecord
{
    public static function tableName()
    {
        return 'mahasiswa';
    }

    public function rules()
    {
        return [
            [['nim', 'nama', 'jurusan'], 'required'],
            [['nim'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nim' => 'NIM',
            'jurusan' => 'Jurusan',
            'created_at' => 'Created At',
        ];
    }
}