<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['PROFIL', 'PROFIL', 'البيانات الشخصية','الاعدادات',6],
            ['SETTINGS_General', 'SETTINGS_General', 'الاعدادت العامة','الاعدادات',6],
            ['SETTINGS_Payment_Type', 'SETTINGS_Payment_Type', 'تعديل نوع الدفع ','الاعدادات',6],
            ['SETTINGS_Edit_Inoice', 'SETTINGS_Edit_Inoice', 'تعديل الفاتورة ','الاعدادات',6],
            ['SETTINGS_Department', 'SETTINGS_Department', 'اقسام الخدمات ','الاعدادات',6],
          
            ['Edit_Tax_Services', 'Edit_Tax_Services', 'تعديل الخدمات الضريبية ' ,'الاعدادات',6],
            ['Edit_Permissions', 'Edit_Permissions', 'تعديل الصلاحيات ','الاعدادات',6],

            ['Add_User', 'Add_User', 'أضف  مستخدم ','المستخدمين',2],
            ['Edit_User', 'Edit_User', 'تعديل  مستخدم ','المستخدمين',2],
            ['View_User', 'View_User', 'اظهار  مستخدم ','المستخدمين',2],

            ['Add_Payment_Expenses', 'Add_Payment_Expenses', 'أضف مصاريف الدفع  ','المدفوعات',0],

            ['Dashboard_User', 'Dashboard_User', '  انشاء فاتورة للمستخدم  ','انشاء فاتورة',1],
            ['Dashboard_Company', 'Dashboard_Company', 'انشاء فاتورة للشركة  ','انشاء فاتورة',1],

            ['Invoice_View_Mine', 'Invoice_View_Mine', 'اظهار  فواتيرى   ','الفواتير',4],
            ['Invoice_View_All', 'Invoice_View_All', 'اظهار  جميع الفواتير   ','الفواتير',4],
            
            ['Invoice_government_fees', 'Invoice_government_fees', 'الرسوم الحكومية الفاتورة ','الفواتير',4],
            ['Invoice_printing_fees', 'Invoice_printing_fees', 'رسوم طباعة الفاتورة ','الفواتير',4],
            ['Invoice_priniting_client', 'Invoice_priniting_client', '   طباعة الفاتورة للعميل  ','الفواتير',4],
            ['Invoice_taxes', 'Invoice_taxes', 'ضرائب الفاتورة  ','الفواتير',4],
            ['Invoice_discount', 'Invoice_discount', 'خصم الفاتورة  ','الفواتير',4],

            ['View_Company', 'View_Company', '  اظهار شركة   ','شركات',3],
            ['Edit_Company', 'Edit_Company', '  تعديل شركة ','شركات',3],
            ['Delete_Company', 'Delete_Company', 'حذف شركة ','شركات',3],
            ['Add_Balance_Company', 'Add_Balance_Company', 'اضافة رصيد للشركات ','شركات',3],

      

            ['Add_Tax_Services', 'Add_Tax_Services', 'اضافة الخدمات  ' ,'الاعدادات',6],
            ['Delete_Tax_Services', 'Delete_Tax_Services', 'حذف الخدمات   ' ,'الاعدادات',6],


            ['View_Balance_Company', 'View_Balance_Company', 'اظهار رصيد للشركات ','شركات',3],
            ['Accept_Balance_Company', 'Accept_Balance_Company', 'قبول اضافة رصيد شركة ','شركات',3],
        ];

        foreach ($permissions as $permission) {
            Permission::create(['key' => $permission[0], 'name' => $permission[1], 'name_ar' => $permission[2],'category'=> $permission[3]]);
        }
    }

 





  
}
