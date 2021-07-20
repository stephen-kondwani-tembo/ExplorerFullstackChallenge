<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Student;
use App\Models\Tutor;
use Tests\TestCase;


class xplorerAPITest extends TestCase
{
    use RefreshDatabase;


       #Tests for tutor API endpoints

    public function test_can_create_student()
    {
        $formData = [

            'first_name'=> 'ntokozo',
             'last_name'=> 'Dlamini',
                 'phone'=> '0977898008',
                 'email'=> 'ntokozo@gmail.com', 
        ];

        
        $this->json('POST', route('student.store'), $formData)
        ->assertStatus(201)
        ->assertJson($formData);

    }

    public function test_can_show_student()
    {
       $student = Student::factory()->create();

       $this->json('GET', route('student.show', $student->id))
       ->assertStatus(200);
    }


    public function test_can_get_all_students()
    {
       $this->json('GET', route('student.index'))
       ->assertStatus(200);
    }


    public function test_can_delete_student()
    {
       $student = Student::factory()->create();

       $this->json('DELETE', route('student.delete', $student->id))
       ->assertStatus(200);
    }


    #Tests for tutor API endpoints

    public function test_can_create_tutor()
    {
        $formData = [

            'first_name'=> 'brutus',
             'last_name'=> 'Khoza',
                 'phone'=> '0977898008',
                 'email'=> 'brutus@gmail.com', 
        ];

        
        $this->json('POST', route('tutor.store'), $formData)
        ->assertStatus(201)
        ->assertJson($formData);

    }

    public function test_can_show_tutor_with_assigned_students()
    {
       $student = Student::factory()->create();

       $this->json('GET', route('tutor.show', $student->id))
       ->assertStatus(200);
    }


    public function test_can_get_all_tutors()
    {
       $this->json('GET', route('tutor.index'))
       ->assertStatus(200);
    }


    public function test_can_delete_tutor()
    {
       $student = Student::factory()->create();

       $this->json('DELETE', route('tutor.delete', $student->id))
       ->assertStatus(200);
    }


        #Tests for tutor student assignment API endpoints

        public function test_can_assign_student_to_tutor()
        {
            $student = Student::factory()->create();
            $tutor = Tutor::factory()->create();

            $formData = [
              'student_id' => $student->id,
                'tutor_id' => $tutor->id,
            ];
    
            
            $this->json('POST', route('assign'), $formData)
            ->assertStatus(201)
            ->assertJson($formData);
    
        }


        
        public function test_can_get_assignable_students()
        {

            $tutor = Tutor::factory()->create();

            $this->json('GET', route('assignable', $tutor->id))
            ->assertStatus(200);
    
        }


}
