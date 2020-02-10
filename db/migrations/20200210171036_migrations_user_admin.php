<?php

use Phinx\Migration\AbstractMigration;

class MigrationsUserAdmin extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        // inserting only one row
        $singleRow = [
            'login'  => 'admin',
            'senha' => 'e10adc3949ba59abbe56e057f20f883e'
        ];

        $table = $this->table('usuarios');
        $table->insert($singleRow);
        $table->saveData();
    }
}
