import Sortable from 'sortablejs'

export default function (Alpine) {
    Alpine.directive('sortable', (el) => {
        el.sortable = Sortable.create(el, {
            dataIdAttr: 'x-sortable-item',
            handle: '.handle',
            group: 'shared',
            // onSort() {
            //     let detail = $(el)
            //         .find('.sortable-item')
            //         .map(function() {return this.value})
            //         .toArray()
            //         .filter(function (elm) {
            //             return elm !== '';
            //         })
            //
            //     el.dispatchEvent(
            //         new CustomEvent('sorted', {
            //             detail: detail
            //         })
            //     )
            // }
        })
    })
}
