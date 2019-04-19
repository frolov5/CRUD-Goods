<?php
/**
 * Created by PhpStorm.
 * User: slizh_i_S
 * Date: 16.04.2019
 * Time: 8:51
 */

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{

    /*
     * Если нет возможности задать имя класса равным именем таблицы,
     * то енобходимо создать метод,который возвращает строку явлющуюся
     * именем необходимой таблицы
     *  public static function tableName()
     *  {
     *      return '{{%имя таблицы}}';
     *  }
     */

}