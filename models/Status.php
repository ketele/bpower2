<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "status".
 *
 * @property int|null $id
 * @property string|null $name
 * @property int|0 $removable
 */
class Status extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id','removable'], 'integer'],
            [['name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'Id',
            'name' => 'Name',
            'removable' => 'Removable',
        ];
    }

    public function getTasks(): ?ActiveQuery
    {
        return $this->hasMany(Task::class, ['status_id' => 'id']);
    }

    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }

        if($this->getTasks()->count() > 0) {
            throw new Exception('Constraint violation');
        }

        return true;
    }
}
