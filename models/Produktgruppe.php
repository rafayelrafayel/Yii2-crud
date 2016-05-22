<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produktgruppe".
 *
 * @property integer $ProduktgruppeNr
 * @property string $Produktgruppe
 *
 * @property Verkauf[] $verkaufs
 */
class Produktgruppe extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'produktgruppe';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['Produktgruppe'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ProduktgruppeNr' => Yii::t('app', 'Produktgruppe Nr'),
            'Produktgruppe' => Yii::t('app', 'Produktgruppe'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerkaufs() {
        return $this->hasMany(Verkauf::className(), ['ProduktgruppeNr' => 'ProduktgruppeNr']);
    }

    public static function getListForDropDownList() {
        $return = [];
        $data = self::find()->asArray()->all();
        if (!empty($data)) {
            foreach ($data as $each) {
                $return[$each['ProduktgruppeNr']] = $each['Produktgruppe'];
            }
        }
        return $return;
    }

}
