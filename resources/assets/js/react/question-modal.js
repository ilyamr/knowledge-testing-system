var QuestionForm = require('./question-form').default;

import React from 'react';

var QuestionModal = React.createClass({
    getInitialState: function() {
        return {visible: false};
    },
    show: function() {
        $('body').addClass('modal-open');
        this.setState({visible: true});
    },
    hide: function() {
        $('body').removeClass('modal-open');
        this.setState({visible: false});
    },
    handleSubmitClick: function() {
        //var child = React.Children.only(this.props.children);
        //console.log(child);
        this.refs.child.submit();
    },
    render: function() {
        var style = this.state.visible ? {
            display: 'block',
            backgroundColor: 'rgba(0, 0, 0, 0.46)'
        } :  {
            display: 'none',
            backgroundColor: 'rgba(0, 0, 0, 0.46)'
        };

        if(this.state.visible) {
            return (
                <div className="modal in" id="questionEditor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     style={style}>
                    <div className="modal-dialog" role="document">
                        <div className="modal-content">
                            <div className="modal-header">
                                <button type="button" className="close" onClick={this.hide}><span aria-hidden="true">&times;</span></button>
                                <h4 className="modal-title" id="myModalLabel">Modal title</h4>
                            </div>
                            <div className="modal-body">
                                <QuestionForm ref="child" parent={this}/>
                            </div>
                            <div className="modal-footer">
                                <button type="button" className="btn btn-default" onClick={this.hide}>Close</button>
                                <button type="button" className="btn btn-primary" onClick={this.handleSubmitClick}>Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            );
        }
        else {
            return (
                <div className="modal"/>
            );
        }
    }
});

export default QuestionModal;