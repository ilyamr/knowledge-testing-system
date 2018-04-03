import React from 'react';
import ReactDOM from 'react-dom';

var ChangableInput = React.createClass({
    getInitialState: function() {
        return {
            editing: false,
            newValue: this.props.value,
            value: this.props.value
        };
    },
    handleKeyDown: function(event){
        // escape
        if(event.keyCode == 27) {
            event.target.value = this.state.value;
            this.setState({
                editing: false,
                newValue: this.state.value
            });
        }
        else if(event.keyCode == 13) {
            event.preventDefault();

            this.state.newValue = event.target.value;
            this.setState({
                editing: false,
                value: this.state.newValue
            });

            if(this.props.onChange) {
                var func = this.props.onChange;
                func(event);
            }

            return false;
        }
    },
    handleLostFocus: function(event){
        event.target.value = this.state.value;
        this.setState({
            editing: false,
            newValue: this.state.value
        });
    },
    handleClick: function(event) {
        this.setState({
            editing: true,
            newValue: this.state.value
        });
    },
    componentDidUpdate: function(prevProps, prevState){
        if(this.state.editing) {
            ReactDOM.findDOMNode(this.refs.input).focus();
            ReactDOM.findDOMNode(this.refs.input).select();
        }
    },
    render: function() {
        var editing = this.state.editing;

        return (
            <div>
                <input type="text"
                       ref="input"
                       onBlur={this.handleLostFocus}
                       defaultValue={this.state.newValue}
                       className={'ci-field ' + (editing? 'visible' : 'hidden')}
                       onKeyDown={this.handleKeyDown}
                       name={this.props.name}/>
                <div className={'ci-block ' + (editing? 'hidden' : 'visible')}
                     onClick={this.handleClick}>
                    {this.state.value}
                </div>
            </div>
        );
    }
});

export default ChangableInput;