import './bootstrap';
import jQuery from 'jquery';
$ = window.jQuery = window.$ = jQuery;

import select2 from 'select2';
window.select2 = select2;
select2($);

// // nastavenie prekladov pre select2
// let customTranslations = {};
// Object.keys(config.select2).forEach(function (key) {
//     customTranslations[key] = function () {
//         return config.select2[key];
//     }
// });

import slug from 'slug'
window.slug = slug;

import SeoForm from './seo-form.js';
import ckeditorInit from './ckeditor.js';

import sortable from './sortable'
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
Alpine.plugin(sortable)

window.Alpine = Alpine;
window.Livewire = Livewire;
Livewire.start()

$(function (){
    window.seoForm = new SeoForm();
    $('.select2').select2({
        theme: 'bootstrap-5',
        // language: customTranslations,
    })

    ckeditorInit();


    $('.submit-form').click(function (e){
        e.preventDefault();

        let target = $(this).data('form-target');
        let $form = target !== undefined ? $(target) : $(this).siblings('form');

        let ask = $(this).data('ask');
        if(ask !== undefined && !confirm(ask))
            return false;

        $form.submit();
        return false;
    })
})
