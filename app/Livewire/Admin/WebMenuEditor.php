<?php

namespace App\Livewire\Admin;

use App\Models\WebMenu;
use App\Models\WebMenuItem;
use App\Models\WebPage;
use Livewire\Component;

class WebMenuEditor extends Component
{
    public $modelClass = WebPage::class;
    public $modelId = null;
    public $modelParentId = null;

    public function getModels()
    {
        return [
            WebPage::class => 'WebPage',
            WebMenuItem::class => 'WebMenuItem'
        ];
    }

    public function getOptions()
    {
        return $this->modelClass::all();
    }

    public function render()
    {
        return view('livewire.admin.web-menu-editor', [
            'webMenuList' => WebMenu::whereNull('parent_id')->get()
        ]);
    }

    public function add()
    {
        if(empty($this->modelClass) || empty($this->modelId)) return false;

        WebMenu::create([
            'target_type' => $this->modelClass,
            'target_id' => $this->modelId,
            'parent_id' => $this->modelParentId,
        ]);

        $this->reset('modelClass', 'modelId');
    }

    public function saveOrder($list, $parentId = null)
    {
        foreach($list as $key=>$item) {
            WebMenu::find($item['id'])->update([
                'order' => $key,
                'parent_id' => $parentId
            ]);

            if(!empty($item['children']))
                $this->saveOrder($item['children'], $item['id']);
        }
    }

    public function remove($webMenuId)
    {
        WebMenu::find($webMenuId)->delete();
    }
}
