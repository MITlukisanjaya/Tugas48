<?php

use Phinx\Migration\AbstractMigration;

class Mahasiswa extends AbstractMigration
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
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $mhs = $this->table('mahasiswa');
        $mhs->addColumn('nim', 'string')
            ->addColumn('nama', 'string')
            ->addColumn('tempat_lahir', 'string')
            ->addColumn('tanggal_lahir', 'date')
            ->addColumn('alamat', 'string')
            ->addColumn('created_at', 'timestamp', ['default' =>
                'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp')
            ->addColumn('deleted', 'integer', ['default' => '0'])
            ->create();
    }
}
