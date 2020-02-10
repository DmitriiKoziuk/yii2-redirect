<?php declare(strict_types=1);

namespace DmitriiKoziuk\yii2Redirect\entities;

/**
 * This is the model class for table "{{%dk_redirects}}".
 *
 * @property string $from_url_hash
 * @property string $from_url
 * @property string $to_url
 */
class RedirectEntity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dk_redirects}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_url_hash', 'from_url', 'to_url'], 'required'],
            [['from_url', 'to_url'], 'string'],
            [['from_url_hash'], 'string', 'max' => 32],
            [['from_url_hash'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'from_url_hash' => 'From Url Hash',
            'from_url' => 'From Url',
            'to_url' => 'To Url',
        ];
    }
}
