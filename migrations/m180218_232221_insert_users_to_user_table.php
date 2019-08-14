<?php

use yii\db\Migration;

/**
 * Class m180218_232221_insert_users_to_user_table
 */
class m180218_232221_insert_users_to_user_table extends Migration
{
    /**
     * @inheritdoc
     * reading users.json file convert json to array
     */
    public function safeUp()
    {

        $userJson = fopen("users.json", "r") or die("Unable to open file!");

        $userJson = fread($userJson,filesize("users.json"));
         
        $userArray = json_decode($userJson, true);
        
        $this->insertToUser($userArray);
    }

    /*
    *   inserting users to user table
    */
    public function insertToUser($rows)
    {

        $columnNameArray=['id', 'first_name', 'last_name', 'email', 'personal_code', 'phone', 'active', 'dead', 'lang'];

        $insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         'user', $columnNameArray, $rows
                     )
                   ->execute();
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180218_232221_insert_users_to_user_table cannot be reverted.\n";

        return false;
    }
}
