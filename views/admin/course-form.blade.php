<!------------------------------------------------------------------------------
| List of elements in course form
|------------------------------------------------------------------------------->

{!! Form::open(['route'=>['courses.course', 'id' => @$item->id],  'files'=>true, 'method' => 'course'])  !!}

    <!--BUTTONS-->
    <div class='btn-form'>
        <!-- DELETE BUTTON -->
        @if($item)
            <a href="{!! URL::route('courses.delete',['id' => @$item->id, '_token' => csrf_token()]) !!}"
            class="btn btn-danger pull-right margin-left-5 delete">
                {!! trans($plang_admin.'.buttons.delete') !!}
            </a>
        @endif
        <!-- DELETE BUTTON -->

        <!-- SAVE BUTTON -->
        {!! Form::submit(trans($plang_admin.'.buttons.save'), array("class"=>"btn btn-info pull-right ")) !!}
        <!-- /SAVE BUTTON -->
    </div>
    <!--/BUTTONS-->

    <!--TAB MENU-->
    <ul class="nav nav-tabs">
        <!--BASIC-->
        <li class="active">
            <a data-toggle="tab" href="#menu_1">
                {!! trans($plang_admin.'.tabs.basic') !!}
            </a>
        </li>

        <!--ADVANCED-->
        <li>
            <a data-toggle="tab" href="#menu_2">
                {!! trans($plang_admin.'.tabs.advance') !!}
            </a>
        </li>

        <!--OTHER-->
        <li>
            <a data-toggle="tab" href="#menu_3">
                {!! trans($plang_admin.'.tabs.other') !!}
            </a>
        </li>
    </ul>
    <!--/TAB MENU-->

    <!--TAB CONTENT-->
    <div class="tab-content">

        <!--BASIC-->
        <div id="menu_1" class="tab-pane fade in active">

            <!--course NAME-->
            @include('package-category::admin.partials.input_text', [
                'name' => 'course_name',
                'id' => 'course_name',
                'label' => trans($plang_admin.'.labels.name'),
                'value' => @$item->course_name,
                'description' => trans($plang_admin.'.descriptions.name'),
                'errors' => $errors,
            ])
            <!--/course NAME-->

            <!--course SLUG-->
            @include('package-category::admin.partials.input_slug', [
                'name' => 'course_slug',
                'id' => 'course_slug',
                'ref' => 'course_name',
                'label' => trans($plang_admin.'.labels.slug'),
                'value' => @$item->course_slug,
                'description' => trans($plang_admin.'.descriptions.slug'),
                'errors' => $errors,
            ])
            <!--/course NAME-->

            <div class="row">

               <div class='col-md-6'>

                    <!-- LIST OF CATEGORIES -->
                    @include('package-category::admin.partials.select_single', [
                        'name' => 'category_id',
                        'label' => trans($plang_admin.'.labels.category'),
                        'items' => $categories,
                        'value' => @$item->category_id,
                        'description' => trans($plang_admin.'.descriptions.category', [
                                     'href' => URL::route('categories.list', ['_key' => $context->context_key])
                                     ]),
                        'errors' => $errors,
                    ])

               </div>

                <div class='col-md-6'>

                    <!-- LIST OF CATEGORIES -->
                    @include('package-category::admin.partials.select_single', [
                        'name' => 'slideshow_id',
                        'label' => trans($plang_admin.'.labels.slideshow'),
                        'items' => $slideshow,
                        'value' => @$item->slideshow_id,
                        'description' => trans($plang_admin.'.descriptions.slideshow', [
                                     'href' => URL::route('slideshows.list')
                                     ]),
                        'errors' => $errors,
                    ])

               </div>

                <div class='col-md-6'>
                    <!--STATUS-->
                    @include('package-category::admin.partials.select_single', [
                        'name' => 'status',
                        'label' => trans($plang_admin.'.form.status'),
                        'value' => @$item->status,
                        'items' => $status,
                        'description' => trans($plang_admin.'.descriptions.status'),
                    ])
                </div>

            </div>

            <!--course DESCRIPTION-->
            @include('package-category::admin.partials.textarea', [
                'name' => 'course_description',
                'label' => trans($plang_admin.'.labels.description'),
                'value' => @$item->course_description,
                'description' => trans($plang_admin.'.descriptions.description'),
                'rows' => 70,
                'tinymce' => true,
                'errors' => $errors,
            ])
            <!--/course DESCRIPTION-->

        </div>

        <!--ADVANCED-->
        <div id="menu_2" class="tab-pane fade">
            <!--course OVERVIEW-->
            @include('package-category::admin.partials.textarea', [
            'name' => 'course_overview',
            'label' => trans($plang_admin.'.labels.overview'),
            'value' => @$item->course_overview,
            'description' => trans($plang_admin.'.descriptions.overview'),
            'tinymce' => false,
            'errors' => $errors,
            ])
            <!--/course OVERVIEW-->

        </div>

        <!--OTHER-->
        <div id="menu_3" class="tab-pane fade">
            <!--course IMAGE-->
            @include('package-category::admin.partials.input_image', [
            'name' => 'course_image',
            'label' => trans($plang_admin.'.labels.image'),
            'value' => @$item->course_image,
            'description' => trans($plang_admin.'.descriptions.image'),
            'errors' => $errors,
            ])
            <!--/course IMAGE-->

            <!--course FILES-->
            @include('package-category::admin.partials.input_files', [
                'name' => 'files',
                'label' => trans($plang_admin.'.labels.files'),
                'value' => @$item->course_files,
                'description' => trans($plang_admin.'.descriptions.files'),
                'errors' => $errors,
            ])
            <!--/course FILES-->
        </div>

    </div>
    <!--/TAB CONTENT-->

    <!--HIDDEN FIELDS-->
    <div class='hidden-field'>
        {!! Form::hidden('id',@$item->id) !!}
        {!! Form::hidden('context',$request->get('context',null)) !!}
    </div>
    <!--/HIDDEN FIELDS-->

{!! Form::close() !!}
<!------------------------------------------------------------------------------
| End list of elements in course form
|------------------------------------------------------------------------------>