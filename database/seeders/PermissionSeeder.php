<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'title' => 'user_management_access',
            ],
            [
                'title' => 'permission_create',
            ],
            [
                'title' => 'permission_edit',
            ],
            [
                'title' => 'permission_show',
            ],
            [
                'title' => 'permission_delete',
            ],
            [
                'title' => 'permission_access',
            ],
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'user_create',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_show',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_access',
            ],
            [
                'title' => 'basic_c_r_m_access',
            ],
            //Teacher
            [
                'title' => 'teacher_create',
            ],
            [
                'title' => 'teacher_edit',
            ],
            [
                'title' => 'teacher_show',
            ],
            [
                'title' => 'teacher_delete',
            ],
            [
                'title' => 'teacher_access',
            ],
            //Student
            [
                'title' => 'student_create',
            ],
            [
                'title' => 'student_edit',
            ],
            [
                'title' => 'student_show',
            ],
            [
                'title' => 'student_delete',
            ],
            [
                'title' => 'student_access',
            ],
            //Klass
            [
                'title' => 'klass_create',
            ],
            [
                'title' => 'klass_edit',
            ],
            [
                'title' => 'klass_show',
            ],
            [
                'title' => 'klass_delete',
            ],
            [
                'title' => 'klass_access',
            ],
            //Section
            [
                'title' => 'section_create',
            ],
            [
                'title' => 'section_edit',
            ],
            [
                'title' => 'section_show',
            ],
            [
                'title' => 'section_delete',
            ],
            [
                'title' => 'section_access',
            ],
            //Class_Student
            [
                'title' => 'class_student_create',
            ],
            [
                'title' => 'class_student_edit',
            ],
            [
                'title' => 'class_student_show',
            ],
            [
                'title' => 'class_student_delete',
            ],
            [
                'title' => 'class_student_access',
            ],
            //Class_Attendence
            [
                'title' => 'class_attendence_create',
            ],
            [
                'title' => 'class_attendence_edit',
            ],
            [
                'title' => 'class_attendence_show',
            ],
            [
                'title' => 'class_attendence_delete',
            ],
            [
                'title' => 'class_attendence_access',
            ],

            //Book
            [
                'title' => 'book_create',
            ],
            [
                'title' => 'book_edit',
            ],
            [
                'title' => 'book_show',
            ],
            [
                'title' => 'book_delete',
            ],
            [
                'title' => 'book_access',
            ],

            //Author
            [
                'title' => 'author_create',
            ],
            [
                'title' => 'author_edit',
            ],
            [
                'title' => 'author_show',
            ],
            [
                'title' => 'author_delete',
            ],
            [
                'title' => 'author_access',
            ],

            //Class Student
            [
                'title' => 'class_student_create',
            ],
            [
                'title' => 'class_student_edit',
            ],
            [
                'title' => 'class_student_show',
            ],
            [
                'title' => 'class_student_delete',
            ],
            [
                'title' => 'class_student_access',
            ],

            //Class Attendence
            [
                'title' => 'class_attendence_create',
            ],
            [
                'title' => 'class_attendence_edit',
            ],
            [
                'title' => 'class_attendence_show',
            ],
            [
                'title' => 'class_attendence_delete',
            ],
            [
                'title' => 'class_attendence_access',
            ],

        ];

        Permission::insert($permissions);
    }
}
