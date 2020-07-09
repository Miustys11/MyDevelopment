/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

$(function () {
    searchWord = function(){
      var searchText = $(this).val(), targetText;
  
      $('.target-area li').each(function() {
        targetText = $(this).text();
  
        // 検索対象となるリストに入力された文字列が存在するかどうかを判断
        if (targetText.indexOf(searchText) != -1) {
          $(this).removeClass('d-none');
        } else {
          $(this).addClass('d-none');
        }
      });
    };
  
    // searchWordの実行
    $('#search-text').on('input', searchWord);
    $('#search-text').focus(function() {
        $(".search-now").removeClass("d-none");
      });
  });

    $(".target-area li").on("click", function(){
        $("#search-text").val($(this).text());
        $(".search-now").addClass("d-none");
    });
    
const app = new Vue({
    el: '#app',
});
