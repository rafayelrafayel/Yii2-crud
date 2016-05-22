<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kunde".
 *
 * @property integer $KundenNr
 * @property string $Anrede
 * @property string $Vorname
 * @property string $Nachname
 * @property string $Strasse
 * @property string $PLS
 * @property string $Ort
 * @property string $Telefon
 * @property string $Werbung
 *
 * @property Karte[] $kartes
 * @property Verkauf[] $verkaufs
 */
class Kunde extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'kunde';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['Werbung'], 'string'],
            [['Anrede', 'Vorname', 'Nachname', 'Strasse', 'PLS', 'Ort'], 'string', 'max' => 255],
            [['Telefon'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'KundenNr' => Yii::t('app', 'Kunden Nr'),
            'Anrede' => Yii::t('app', 'Anrede'),
            'Vorname' => Yii::t('app', 'Vorname'),
            'Nachname' => Yii::t('app', 'Nachname'),
            'Strasse' => Yii::t('app', 'Strasse'),
            'PLS' => Yii::t('app', 'Pls'),
            'Ort' => Yii::t('app', 'Ort'),
            'Telefon' => Yii::t('app', 'Telefon'),
            'Werbung' => Yii::t('app', 'Werbung'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKartes() {
        return $this->hasMany(Karte::className(), ['KundenNr' => 'KundenNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerkaufs() {
        return $this->hasMany(Verkauf::className(), ['KundenNr' => 'KundenNr']);
    }

    public static function getListForDropDownList() {
        $return = [];
        $data = self::find()->asArray()->all();
        if (!empty($data)) {
            foreach ($data as $each) {
                $return[$each['KundenNr']] = $each['Vorname'] . ' ' . $each['Nachname'];
            }
        }
        return $return;
    }

}
