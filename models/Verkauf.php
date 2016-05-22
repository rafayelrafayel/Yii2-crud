<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "verkauf".
 *
 * @property integer $VerkaufNr
 * @property integer $KundenNr
 * @property integer $KarteNr
 * @property integer $ProduktgruppeNr
 * @property string $Betrag
 * @property string $Dataum
 *
 * @property Kunde $kundenNr
 * @property Karte $karteNr
 * @property Produktgruppe $produktgruppeNr
 */
class Verkauf extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'verkauf';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['KundenNr', 'KarteNr', 'ProduktgruppeNr'], 'integer'],
            [['Betrag'], 'number'],
            [['KundenNr'], 'exist', 'skipOnError' => true, 'targetClass' => Kunde::className(), 'targetAttribute' => ['KundenNr' => 'KundenNr']],
            [['KarteNr'], 'exist', 'skipOnError' => true, 'targetClass' => Karte::className(), 'targetAttribute' => ['KarteNr' => 'KarteNr']],
            [['ProduktgruppeNr'], 'exist', 'skipOnError' => true, 'targetClass' => Produktgruppe::className(), 'targetAttribute' => ['ProduktgruppeNr' => 'ProduktgruppeNr']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'VerkaufNr' => Yii::t('app', 'Verkauf Nr'),
            'KundenNr' => Yii::t('app', 'Kunden Nr'),
            'KarteNr' => Yii::t('app', 'Karte Nr'),
            'ProduktgruppeNr' => Yii::t('app', 'Produktgruppe Nr'),
            'Betrag' => Yii::t('app', 'Betrag'),
            'Dataum' => Yii::t('app', 'Dataum'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKundenNr() {
        return $this->hasOne(Kunde::className(), ['KundenNr' => 'KundenNr']);
    }

    /* Getter for Kunden name */

    public function getKundenName() {
        if (null !== $this->kundenNr) {
            return $this->kundenNr->Vorname.' '.$this->kundenNr->Nachname;
        }
        return '';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarteNr() {
        return $this->hasOne(Karte::className(), ['KarteNr' => 'KarteNr']);
    }
    
    /* Getter for Karte name */

    public function getKarteName() {
        if (null !== $this->karteNr) {
            return $this->karteNr->Erster_Einkauf;
        }
        return '';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduktgruppeNr() {
        return $this->hasOne(Produktgruppe::className(), ['ProduktgruppeNr' => 'ProduktgruppeNr']);
    }
    
     /* Getter for Karte name */

    public function getProduktgruppeName() {
        if (null !== $this->produktgruppeNr) {
            return $this->produktgruppeNr->Produktgruppe;
        }
        return '';
    }

}
