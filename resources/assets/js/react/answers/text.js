import React from 'react';

var QuestionTextAnswers = React.createClass({
    getInitialState: function() {
        return {
            answers: this.props.data.answers
        };
    },
    getAnswers: function() {
        return this.state.answers;
    },
    getCorrect: function() {
        return [0];
    },
    handleTick: function(event) {
        var data = $("[name='correct-cb']:checked").map(function(){
            return parseInt($(this).val());
        }).toArray();

        this.setState({
            correct: data
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
    render: function() {
        return (
            <div>
                <div className="row">
                    <div className="col-sm-12">
                        <input
                            className="form-control"
                            name={'data-0'}
                            value={this.state.answers[0]}
                            onChange={this.handleDataChange} />
                    </div>
                </div>
            </div>
        );
    }
});

export default QuestionTextAnswers;