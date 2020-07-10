<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.teacher.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $introduction = $request->get('introduction');
        $curriculums = $request->get('curriculums');
        $students_will_learn = $request->get('students_learn');
        $class_requirements = $request->get('class_requirement');
        $target_students = $request->get('target_student');
        $course_message= $request->get('course_message');

        if(count($curriculums) > 0) {
            for($i = 0; $i < count($curriculums); $i++) {

                $content_title = $curriculums[$i]['content_title'];
                $main_content_files = $curriculums[$i]['main_content_files'];
                $extra_resource_files = $curriculums[$i]['extra_resource_files'];
                $content_description = $curriculums[$i]['content_description'];

                if (count($students_will_learn) > 0) {
                    for($i = 0; $i < count($students_will_learn); $i++) {

                        if(count($class_requirements) > 0) {
                            for($i = 0; $i < count($class_requirements); $i++) {

                                if (count($target_students) > 0) {
                                    for($i = 0; $i < count($target_students); $i++) {

                                        if (count($main_content_files) > 0) {
                                            for($i = 0; $i < count($main_content_files); $i++) {

                                                if (count($extra_resource_files) > 0) {
                                                    for($i = 0; $i < count($extra_resource_files); $i++) {
                                                        $course_title = $introduction['course_title'];
                                                        $course_subtitle = $introduction['course_subtitle'];
                                                        $course_description = $introduction['course_description'];
                                                        $default_subject = $introduction['default_subject'];
                                                        $default_class = $introduction['default_class'];
                                                        $default_level = $introduction['default_level'];

                                                        $welcome_message = $course_message['welcome_message'];
                                                        $congratulations_message = $course_message['congratulations_message'];

                                                        $students_learn = $students_will_learn[$i]['students_learn'];
                                                        $course->students_learn = $students_learn;

                                                        $class_requirement = $class_requirements[$i]['class_requirement'];
                                                        $course->class_requirement = $class_requirement;

                                                        $target_student = $target_students[$i]['target_student'];
                                                        $course->target_student = $target_student;

                                                        $main_content_file = $main_content_files[$i];
                                                        $course->main_content_files = $main_content_file;
                                                        $extra_resource_file = $extra_resource_files[$i];
                                                        $course->extra_resource_files = $extra_resource_file;

                                                        $course->course_title = $course_title;
                                                        $course->course_subtitle = $course_subtitle;
                                                        $course->course_description = $course_description;
                                                        $course->default_subject = $default_subject;
                                                        $course->default_class = $default_class;
                                                        $course->default_level = $default_level;
                                                        $course->content_title = $content_title;
                                                        $course->content_description = $content_description;
                                                        $course->welcome_message = $welcome_message;
                                                        $course->congratulations_message = $congratulations_message;

                                                        $course->save();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
