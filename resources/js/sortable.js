import SortableJS from 'sortablejs'

export default class Sortable {
    constructor(){
        $('.sortable').each(function (index, element) {
            SortableJS.create(element, {
                handle: '.handle',
                group: 'shared',
                onEnd: function (evt) {
                    const cbName = $(evt.to).data('callback');
                    if(cbName !== undefined){
                        window[cbName](evt);
                    }
                }
            });
        })

    }
}
