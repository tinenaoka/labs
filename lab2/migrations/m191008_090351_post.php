<?php

use yii\db\Migration;

/**
 * Class m191008_090351_post
 */
class m191008_090351_post extends Migration
{
    function up() {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'body' => $this->string()->notNull(),
            'created_at'=> $this->dateTime(),
            'update_at'=> $this->dateTime(),
            'author_id'=> $this->integer()->notNull(),
        ]);

        $this->createIndex('id-post-user_id','post','author_id');
        $this->addForeignKey('fk-post-user_id','post','author_id','user','id','CASCADE');

    }

    function down() {
        $this->dropIndex('id-post-user_id','post');
        $this->dropForeignKey('fk-post-user_id','post');
        $this->dropTable('post');
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191008_090351_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191008_090351_post cannot be reverted.\n";

        return false;
    }
    */
}
