<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View to Bind JavaScript Vars To
    |--------------------------------------------------------------------------
    |
    | Set this value to the name of the view (or partial) that
    | you want to prepend all JavaScript variables to.
    | This can be a single view, or an array of views.
    | Example: 'footer' or ['footer', 'bottom']
    |
    */
    'bind_js_vars_to_this_view' => [
        'teacher.notes.sub_notes.show', 'teacher.notes.sub_notes.edit',
        'teacher.pastpapers.sub_pastpapers.show', 'teacher.pastpapers.sub_pastpapers.edit',
        'teacher.pastpapers.sub_pastpaper_answers.show', 'teacher.pastpapers.sub_pastpaper_answers.edit',
        'teacher.books.show', 'teacher.books.edit', 'student.notes.show', 'student.books.show'
    ],

    /*
    |--------------------------------------------------------------------------
    | JavaScript Namespace
    |--------------------------------------------------------------------------
    |
    | By default, we'll add variables to the global window object. However,
    | it's recommended that you change this to some namespace - anything.
    | That way, you can access vars, like "SomeNamespace.someVariable."
    |
    */
    'js_namespace' => 'window'

];
