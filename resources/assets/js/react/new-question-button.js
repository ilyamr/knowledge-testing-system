import React from 'react';
var QuestionModal = require('./question-modal').default;

var NewQuestionButton = React.createClass({
    getInitialState: function() {
        return {data: {
            id: false,
            question: '',
            type: 'single', // multi, text
            image: false,
            tags: [],
            correct: [],
            answers: []
        }};
    },
    update: function(state) {
        this.props.parent.addNewItem(state);
    },
    handleClick: function() {
        this.setState(state => {
            state.data.id = 0;//this.props.parent.getNextIndex();
            return {data: state.data};
        });
        this.refs.modal.show();
    },
    render: function(){
        return (
            <div style={{display: 'inline-block'}}>
                <QuestionModal ref="modal" parent={this} />
                <div className="small-4 columns" style={{padding: '1em'}}>
                    <div className="btn btn-primary" style={{padding: '.75em 1em'}} onClick={this.handleClick}>Add new question</div>
                </div>
            </div>
        );
    }
});

export default NewQuestionButton;