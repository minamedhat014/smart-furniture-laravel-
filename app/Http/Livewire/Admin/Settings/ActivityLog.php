<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Traits\HasTable;

use Livewire\Attributes\Computed;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Component
{


    use HasTable;

    protected function rules()
    {
        $rules = [
           'search'=>''
        ];
          
        return $rules;
    }
    
    public function mount(){
        $this->check_permission('view activity log');
    }

    public function render()
    {
        $data =Activity::where('causer_id' , 'like', '%'.$this->search.'%')
        ->orWhere('description' , 'like', '%'.$this->search.'%')
        ->orWhere('subject_type' , 'like', '%'.$this->search.'%')
        ->orWhere('event' , 'like', '%'.$this->search.'%')
        ->orWhere('created_at' , 'like', '%'.$this->search.'%')
        ->orderBy('id',$this->sortfilter)->paginate($this->perpage);

        return view('livewire.admin.settings.activity-log',compact('data'));
    }
}
