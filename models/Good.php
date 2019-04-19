<?php

namespace app\models;

use app\queries\GoodQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

/**
 * Модель товара.
 * @property int $id
 * @property string $title
 * @property float $price
 * @property string $description
 * @property int $category_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 */
class Good extends ActiveRecord
{

    const STATUS_ACTIVE = 'active';

    const STATUS_DISABLE = 'disable';

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at'
                ],
                'value' => new Expression('now()'),
            ]
        ];
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'price', 'description', 'category_id', 'status'], 'required'],
            ['title', 'unique'],
            [['title', 'status'], 'string', 'max' => 255],
            ['description', 'string', 'length' => [50, 1000]]
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
            'category_id' => 'Категория',
            'status' => 'Статус',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления'
        ];
    }

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_DISABLE => 'Отключен'
        ];
    }

    /**
     * @return mixed|null
     */
    public function getStatus()
    {
        $statuses = self::getStatuses();

        return (isset( $statuses[$this->status])) ? $statuses[$this->status] : null;
    }


    /**
     * @return GoodQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new GoodQuery(get_called_class());
    }

}