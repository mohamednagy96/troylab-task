<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;

class ActiveAction extends Action
{
    use InteractsWithQueue, Queueable;

    public $name = 'Make Active';
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {

        foreach($models as $model){
            $model->update([
                // 'is_active' => $fields->is_active
                'is_active' => 1
            ]);
        }

        
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            // Boolean::make('is_active'),
            // Text::make('Subject')->default(function ($request) {
            //     return 'Test: Subject';
            // }),
        ];
    }
}
