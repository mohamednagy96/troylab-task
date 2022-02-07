<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Student extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Student::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {

        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('name')->rules(['required']),
            Text::make('email')->rules('required')->creationRules('unique:students,email')->updateRules('unique:students,email,{{resourceId}}'),
            Number::make('mobile')->hideFromIndex()->rules(['required']),
            Number::make('code')->hideFromIndex()->rules(['required']),
            Number::make('Parent Number')->hideFromIndex()->rules(['required']),
            Select::make('gender')->options([
                'male' => 'male',
                'female' => 'female'
            ])->hideFromIndex()->rules('required','in:male,female'),
            Date::make('Join Date')->hideFromIndex()->rules(['required']),
            Date::make('dob')->hideFromIndex()->rules(['required']),

            Boolean::make('Is Active')->rules(['required']),
            Select::make('level')->options([
                '1' => '1 pk' ,
                '2' => '2 pk' ,
                '3' => '3 pk' ,
            ])->hideFromIndex()->rules(['required']),
            BelongsTo::make('school')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
