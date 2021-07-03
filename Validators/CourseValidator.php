<?php namespace Vovantruong\Course\Validators;

use Vovantruong\Category\Library\Validators\FooValidator;
use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Vovantruong\Course\Models\Course;

use Illuminate\Support\MessageBag as MessageBag;

class CourseValidator extends FooValidator
{

    protected $obj_course;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'course_name' => ["required"],
            'course_overview' => ["required"],
            'course_description' => ["required"],
        ];

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_course = new Course();

        // language
        $this->lang_front = 'course-front';
        $this->lang_admin = 'course-admin';

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'course_name.required'          => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.name')]),
                'course_overview.required'      => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.overview')]),
                'course_description.required'   => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.description')]),
            ];
        });


    }

    /**
     *
     * @param ARRAY $input is form data
     * @return type
     */
    public function validate($input) {

        $flag = parent::validate($input);
        $this->errors = $this->errors ? $this->errors : new MessageBag();

        //Check length
        $_ln = self::$configs['length'];

        $params = [
            'name' => [
                'key' => 'course_name',
                'label' => trans($this->lang_admin.'.fields.name'),
                'min' => $_ln['course_name']['min'],
                'max' => $_ln['course_name']['max'],
            ],
            'overview' => [
                'key' => 'course_overview',
                'label' => trans($this->lang_admin.'.fields.overview'),
                'min' => $_ln['course_overview']['min'],
                'max' => $_ln['course_overview']['max'],
            ],
            'description' => [
                'key' => 'course_description',
                'label' => trans($this->lang_admin.'.fields.description'),
                'min' => $_ln['course_description']['min'],
                'max' => $_ln['course_description']['max'],
            ],
        ];

        $flag = $this->isValidLength($input['course_name'], $params['name']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['course_overview'], $params['overview']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['course_description'], $params['description']) ? $flag : FALSE;

        return $flag;
    }


    /**
     * Load configuration
     * @return ARRAY $configs list of configurations
     */
    public function loadConfigs(){

        $configs = config('package-course');
        return $configs;
    }

}