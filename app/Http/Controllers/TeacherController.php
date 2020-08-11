<?php

namespace App\Http\Controllers;

use App\Models\Course;
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
        $students_learn = $request->get('students_learn');
        $class_requirements = $request->get('class_requirement');
        $target_students = $request->get('target_student');
        $course_message= $request->get('course_message');

        $course_title = $introduction['course_title'];
        $course_subtitle = $introduction['course_subtitle'];
        $course_description = $introduction['course_description'];
        $default_subject = $introduction['default_subject'];
        $default_class = $introduction['default_class'];
        $default_level = $introduction['default_level'];

        $options = [];

        if (count($students_learn) > 0) {
            for($i = 0; $i < count($students_learn); $i++) {
                $options['students_learn'][] = $students_learn[$i]['students_learn'];
            }
        }

        if(count($class_requirements) > 0) {
            for($i = 0; $i < count($class_requirements); $i++) {
                $options['class_requirement'][] = $class_requirements[$i]['class_requirement'];
            }
        }

        if (count($target_students) > 0) {
            for($i = 0; $i < count($target_students); $i++) {
                $options['target_student'][] = $target_students[$i]['target_student'];
            }
        }

        $welcome_message = $course_message['welcome_message'];
        $congratulations_message = $course_message['congratulations_message'];

        $course->course_title = $course_title;
        $course->course_subtitle = $course_subtitle;
        $course->course_description = $course_description;
        $course->default_subject = $default_subject;
        $course->default_class = $default_class;
        $course->default_level = $default_level;
        $course->welcome_message = $welcome_message;
        $course->congratulations_message = $congratulations_message;
        $course->options = $options;

        $course->save();

        $sections = $this->collectSections($curriculums);

        // dd($sections);

        $course->sections()->createMany($sections);
    }

    protected function collectSections($curriculums)
    {
        $sections = [];

        if(count($curriculums) > 0) {
            for($i = 0; $i < count($curriculums); $i++) {
                $content_title = $curriculums[$i]['content_title'];
                // $main_content_files = $curriculums[$i]['main_content_files'];
                // $extra_resource_files = $curriculums[$i]['extra_resource_files'];
                $content_description = $curriculums[$i]['content_description'];

                array_push($sections, [
                    'content_title' => $content_title,
                    // 'main_content_files' =>$main_content_files,
                    // 'extra_resource_files' => $extra_resource_files,
                    'content_description' => $content_description
                ]);
            }
        }

        return $sections;
    }
}
