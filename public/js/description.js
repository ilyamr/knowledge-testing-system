$('.height-full').height($(window).height() - 310);

new Vue({
    el: '#editor',
    data: {
        input: ''
    },
    filters: {
        marked: marked
    }
})