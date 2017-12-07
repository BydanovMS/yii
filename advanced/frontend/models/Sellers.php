<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sellers".
 *
 * @property integer $sel_id
 * @property string $sel_name
 * @property string $sel_tel
 * @property string $sel_town
 *
 * @property Cars[] $cars
 */
class sellers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sellers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sel_id'], 'required'],
            [['sel_id'], 'integer'],
            [['sel_name', 'sel_tel', 'sel_town'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sel_id' => 'Sel ID',
            'sel_name' => 'Sel Name',
            'sel_tel' => 'Sel Tel',
            'sel_town' => 'Sel Town',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::className(), ['car_sel_id' => 'sel_id']);
    }
}
