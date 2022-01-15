<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $permissions = [

            'Invoices',
            'Invoices List ',
            'Paid Invoices',
            'Partially Paid Invoices',
            'Unpaid Invoices',
            'Invoices Archive',
            'Reports',
            'Invoices Report',
            'Customer Report',
            'Users',
            'Users List',
            'Users Permission',
            'Settings',
            'Product',
            'Sections',


            'Add Invoice',
            'Delete Invoice ',
            'EXCEL EXPORT',
            'Payment status change',
            'Edit Invoice ',
            'Archive Invoice',
            'Print Invoice',
            'Add Attachment',
            'Delete Attachment ',

            'Add User ',
            'Edit User ',
            'Delete User ',

            'Show Permission ',
            'Add Permission ',
            'Edit Permission ',
            'Delete Permission ',

            'Add Product',
            'Edit Product ',
            'Delete Product ',

            'Add Section ',
            'Edit Section ',
            'Delete Section ',
            'Notifications',

        ];



        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }


    }
}
