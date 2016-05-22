<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karte".
 *
 * @property integer $KarteNr
 * @property integer $KundenNr
 * @property string $Erster_Einkauf
 *
 * @property Kunde $kundenNr
 * @property Verkauf[] $verkaufs
 */
class Karte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karte';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KundenNr'], 'integer'],
            [['Erster_Einkauf'], 'string', 'max' => 255],
            [['KundenNr'], 'exist', 'skipOnError' => true, 'targetClass' => Kunde::className(), 'targetAttribute' => ['KundenNr' => 'KundenNr']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KarteNr' => Yii::t('app', 'Karte Nr'),
            'KundenNr' => Yii::t('app', 'Kunden Nr'),
            'Erster_Einkauf' => Yii::t('app', 'Erster  Einkauf'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKundenNr()
    {
        return $this->hasOne(Kunde::className(), ['KundenNr' => 'KundenNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerkaufs()
    {
        return $this->hasMany(Verkauf::className(), ['KarteNr' => 'KarteNr']);
    }
    
     public static function getListForDropDownList() {
        $return = [];
        $data = self::find()->asArray()->all();
        if (!empty($data)) {
            foreach ($data as $each) {
                $return[$each['KarteNr']] = $each['Erster_Einkauf'];
            }
        }
        return $return;
    }
}
