<?php

use yii\db\Migration;

/**
 * Class m180218_232610_insert_loans_to_loan_table
 */
class m180218_232610_insert_loans_to_loan_table extends Migration
{
    /**
     * @inheritdoc
     * reading loans.json file convert json to array
     */
    public function safeUp()
    {

        $loanJson = fopen("loans.json", "r") or die("Unable to open file!");

        $loanJson = fread($loanJson, filesize("loans.json"));
         
        $loanArray = json_decode($loanJson, true);
        
        $this->insertToLoan($loanArray);
    }


    /*
    *   inserting to loan table
    */
    public function insertToLoan($rows){

        foreach ($rows as $key => $value) {

            $rows[$key]['start_date'] = date("Y-m-d", $value['start_date']);

            $rows[$key]['end_date'] = date("Y-m-d", $value['end_date']);

            if ($value['status'] != 1 ) {

                $rows[$key]['status'] = '0';        

            }

        }
        $columnNameArray=['id', 'user_id', 'amount', 'interest', 'duration', 'start_date', 'end_date', 'campaign', 'status'];

        $insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         'loan', $columnNameArray, $rows
                     )
                   ->execute();
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180218_232610_insert_loans_to_loan_table cannot be reverted.\n";

        return false;
    }

}
