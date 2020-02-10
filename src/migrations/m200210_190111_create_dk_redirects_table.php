<?php declare(strict_types=1);

namespace DmitriiKoziuk\yii2Redirect\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dk_redirects}}`.
 */
class m200210_190111_create_dk_redirects_table extends Migration
{
    private $redirectsTable = '{{%dk_redirects}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable($this->redirectsTable, [
            'from_url_hash' => $this->string(32)->notNull(),
            'from_url'      => $this->text()->notNull(),
            'to_url'        => $this->text()->notNull(),
        ], $tableOptions);
        $this->addPrimaryKey(
            'primary_key',
            $this->redirectsTable,
            'from_url_hash'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dk_redirects}}');
    }
}
