<?php
use App\Permission;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $createInvoice = new Permission();
        $createInvoice->name = 'create-invoice';
        $createInvoice->display_name = 'Create Invoices';
        $createInvoice->description = 'create new invoices';
        $createInvoice->save();

        $editInvoice = new Permission();
        $editInvoice->name = 'edit-invoice';
        $editInvoice->display_name = 'Edit Invoices';
        $editInvoice->description = 'edit existing invoices';
        $editInvoice->save();

        $deleteInvoice = new Permission();
        $deleteInvoice->name = 'delete-invoice';
        $deleteInvoice->display_name = 'Delete Invoices';
        $deleteInvoice->description = 'delete existing invoices';
        $deleteInvoice->save();
    }
}
