<?php

use Phinx\Migration\AbstractMigration;

class Migrations extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->table('usuarios')
            ->addColumn('login', 'string')
            ->addColumn('senha', 'string')
            ->create();

        $this->table('clientes')
            ->addColumn('nome', 'string')
            ->addColumn('data_nascimento', 'datetime')
            ->addColumn('cpf', 'string')
            ->addColumn('rg', 'string')
            ->addColumn('telefone', 'string')
            ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated', 'timestamp', ['null' => true])
            ->create();

        $this->table('endereco')
            ->addColumn('cep', 'string')
            ->addColumn('logradouro', 'string')
            ->addColumn('numero', 'integer')
            ->addColumn('bairro', 'string')
            ->addColumn('complemento', 'string', ['null' => true])
            ->addColumn('municipio', 'string')
            ->addColumn('estado', 'string')
            ->addColumn('cliente_id', 'integer')
            ->addForeignKey('cliente_id', 'clientes', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
    }


}
