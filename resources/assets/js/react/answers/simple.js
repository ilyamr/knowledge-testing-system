import React from 'react';

var ChangableInput = require('./../changable-input').default;

var QuestionSimpleAnswers = React.createClass({
    getInitialState: function() {
        return {
            answers: this.props.data.answers,
            correct: this.props.data.correct
        };
    },
    getAnswers: function() {
        return this.state.answers;
    },
    getCorrect: function() {
        return this.state.correct;
    },
    handleTick: function(event) {
        this.setState({
            correct: [parseInt(event.target.value)]
        });
    },
    handleDataChange: function(event) {
        var key = parseInt(event.target.name.replace('data-', '')),
            newAnswers = this.state.answers;

        newAnswers[key] = event.target.value;

        this.setState({
            answers: newAnswers
        });
    },
    checked: function(key) {
        return this.state.correct.indexOf(key) > -1? 'checked' : '';
    },
    handleAdd: function(event) {
        if(!event.keyCode || event.keyCode == 13) {
            event.preventDefault();
            var newAnswers = this.state.answers;
            newAnswers.push(this.refs.newAnswer.value);
            this.refs.newAnswer.value = '';
            this.setState({
                answers: newAnswers
            });
        }
    },
    handleDelete: function(event) {
        var key = parseInt(event.target.value);

        this.setState(state => {
            state.answers.splice(key, 1);
            return {answers: state.answers};
        });
    },
    render: function() {
        var that = this;

        return (
            <div>
                {
                    this.state.answers.map(function(value, key) {
                        var checked = that.checked(key);
                        return (
                            <div className="row" key={key+value}>
                                <div className="col-sm-1">
                                    <input
                                        name="correct-cb"
                                        value={key}
                                        type="radio"
                                        checked={checked}
                                        onChange={that.handleTick}/>
                                </div>
                                <div className="col-sm-8">
                                    <ChangableInput
                                        name={'data-' + key}
                                        value={value}
                                        onChange={that.handleDataChange} />
                                </div>
                                <div className="col-sm-3 item-control">
                                    <span className="delete" value={key} onClick={that.handleDelete}>delete</span>
                                </div>
                            </div>
                        )
                    })
                }
                <div className="row">
                    <div className="col-sm-1">
                        &nbsp;
                    </div>
                    <div className="col-sm-8">
                        <input type="text" className="form-control" ref="newAnswer" onKeyDown={this.handleAdd}/>
                    </div>
                    <div className="col-sm-3">
                        <button type="button" className="btn btn-primary" onClick={this.handleAdd}>Додати</button>
                    </div>
                </div>
            </div>
        );
    }
});

export default QuestionSimpleAnswers;