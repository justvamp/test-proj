<?php

class m120304_121134_sauna2user_relation extends CDbMigration
{
	public function safeUp() {
		$this->addForeignKey('sauna2user','sauna','user_id','tbl_users','id','CASCADE','CASCADE');
	}

	public function safeDown() {
		$this->dropForeignKey('sauna2user','sauna');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}