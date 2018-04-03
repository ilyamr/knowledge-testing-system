var app = new Vue({
    el: '#app',
    ready: function() {
        var it = this;
        $.get('/dashboard/topics/' + this.$el.getAttribute('data-id') + '/data', function(data){
            it.items = data;
            it.isReady = true;
        });
    },
    data: {
        showModal: false,
        isReady: false,
        answerModal: '',
        item: {
            id: false,
            question: '',
            type: 'single', // multi, text
            correct: [],
            answers: []
        },
        isEditing: false,
        utils: {
            editingAnswer: false,
            editingAnswers: false,
            answer: ''
        },
        items: [],
        iter: 0
    },
    methods: {
        editAnswer: function (i) {
            this.utils.editingAnswer = i;
            this.utils.answer = this.item.answers[i];
        },
        doneEditAnswer: function(){
            if(this.utils.editingAnswer !== false) {
                this.item.answers.$set(this.utils.editingAnswer, this.utils.answer);
                this.utils.editingAnswer = false;
                this.utils.answer = '';
            }
        },
        cancelEditAnswer: function(){
            this.utils.editingAnswer = false;
            this.utils.answer = '';
        },
        deleteAnswer: function(answer) {
            this.item.answers.$remove(answer);
        },
        closeEditForm: function() {
            if (this.isEditing !== false) {
                var editingRow = document.getElementById('row-' + this.isEditing),
                    inputs = editingRow.getElementsByClassName('item-control')[0],
                    form = document.getElementById('question-edit-form');

                inputs.style.display = 'block';
                form.style.display = 'none';

                this.item = Vue.util.extend({}, {
                    id: false,
                    question: '',
                    type: 'single', // multi, text
                    correct: [],
                    answers: []
                });

                this.isEditing = false;
                this.answerModal = '';

                this.cancelEditAnswer();
            }
        },
        addAnswer: function () {
            if (this.item.answers.indexOf(this.answerModal) !== -1) {
                alert('Answer exists!');
                this.answerModal = '';
                return;
            }

            this.item.answers.push(this.answerModal);
            this.answerModal = '';
        },
        submitQuestion: function () {
            this.iter++;
            this.item.id = 0;

            if(this.item.type === 'text') {
                this.item.correct = this.item.answers = [this.item.answers[0]];
            }

            this.items.push(this.item);
            this.showModal = false;

            this.item = {
                id: false,
                question: '',
                type: 'single', // multi, text
                correct: [],
                answers: []
            };
        },
        edit: function (i) {
            var row = document.getElementById('row-' + i),
                inputs = row.getElementsByClassName('item-control')[0],
                form = document.getElementById('question-edit-form');

            if (this.isEditing !== false) {
                this.closeEditForm();
            }

            this.isEditing = i;
            this.item = Vue.util.extend({}, this.items[i]);

            row.appendChild(form);
            inputs.style.display = 'none';

            form.style.display = 'block';
            form.setAttribute('data-id', i);
        },
        saveEdit: function () {
            if(this.isEditing !== false) {
                this.items[this.isEditing].id = this.item.id;
                this.items[this.isEditing].question = this.item.question;
                this.items[this.isEditing].correct = this.item.correct;
                this.items[this.isEditing].type = this.item.type;
                this.items[this.isEditing].answers = this.item.answers;

                this.closeEditForm();
            }

        },
        delete: function (item) {
            this.items.$remove(item);
        }
    }
});

app.$watch('showModal', function(val){
    if(val === true) this.closeEditForm();
});

//$('form.container').submit(function(e){
//    $('<input />').attr('type', 'hidden')
//        .attr('name', "items")
//        .attr('value', JSON.stringify(app.items))
//        .appendTo($(this));
//
//    //e.preventDefault();
//});