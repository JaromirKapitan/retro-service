<div class="row">
    <div class="col-6">
        <h2>Menu</h2>
        <div id="menu-list">
            <ul x-sortable>
                @foreach($webMenuList as $webMenuItem)
                    @include('livewire.admin.web-menu-editor-item')
                @endforeach

                <div class="text-end" title="pridat polozku hlavneho menu">
                    <i class="fa fa-plus menu-item-plus"></i>
                </div>
            </ul>
        </div>

        <div class="text-end">
            <button type="button" class="btn btn-success" id="save-menu">save</button>
        </div>
    </div>

    <div class="col-6">
        <h2>Form</h2>
        <form>
            <div class="mb-2">
                <label class="form-label">{{ __('Type') }}</label>
                <select class="form-control" wire:model.live="modelClass">
                    @foreach($this->getModels() as $modelClass => $modelName)
                        <option value="{{ $modelClass }}">{{ $modelName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label class="form-label">{{ __('Option') }}</label>
                <select class="form-control" wire:model.live="modelId">
                    <option>-- EMPTY --</option>
                    @foreach($this->getOptions() as $option)
                        <option value="{{ $option->id }}">[{{ $option->id }}] {{ $option->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-end">
                <button type="button" class="btn btn-success" wire:click="add">Add</button>
            </div>
        </form>
    </div>
</div>



@script
<script>
    $('#save-menu').click(function(){
        let listOrder = getListOrder($('#menu-list ul'));
        $wire.saveOrder(listOrder);
    })

    function getListOrder($el){
        let listOrder = [];
        $('> li', $el[0]).each(function (){
            let item = {id: $(this).data('id')}

            let $ul = $(this).find('> ul:first');

            if($ul.length > 0){
                item.children = getListOrder($ul);
            }

            listOrder.push(item);
        })

        return listOrder;
    }

    $('body').on('click', '.menu-item-plus', function (){
        $wire.set('modelParentId' , $(this).data('parent-id') ?? null);
    });
</script>
@endscript
