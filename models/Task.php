<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "task".
 *
 * @property int|null $id
 * @property string|null $user
 * @property string|null $title
 * @property int|1 $status
 */
class Task extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'status_id'], 'integer'],
            [['title', 'user'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'Id',
            'user' => 'User',
            'title' => 'Title',
            'status_id' => 'Status',
        ];
    }
}
