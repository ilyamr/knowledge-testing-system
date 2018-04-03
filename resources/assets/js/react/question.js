import React from 'react';
import QuestionModal from './question-modal';

export default class Question extends React.Component
{
    constructor(props) {
        super(props);
        this.state = {
            number: props.number,
            data: props.data
        };
    }

    update(state) {
        this.setState({
            data: state
        });
        this.props.parent.updateQuestion(state);
    }

    openEdit() {
        this.refs.modal.show();
    }

    handleDelete(event) {
        if(this.props.deleteHandler) {
            var func = this.props.deleteHandler;
            func(event);
        }
    }

    render(){
        var elem = this.state.data,
            description = (elem.type != 'text' && elem.answers.length > 0)? '(' + elem.answers.length + ' варіантів) ' : '';

        var tags = elem.tags.map(function(item){
            return (
                <span className="label label-info" key={item} style={{marginRight: '.5em'}}>{item}</span>
            );
        });

        return (
            <div className="row question-holder">
                <QuestionModal ref="modal" parent={this} />
                <div>
                    <div className="col-md-1">
                        <span className="number">{this.state.number}</span>
                    </div>
                    <div className="col-md-8"><span className="text">{elem.question}
                        <span className="description"> {description}</span>
                        {tags}
                    </span></div>
                    <div className="col-md-3 item-control align-right">
                        <span className="edit" onClick={this.openEdit.bind(this)}>edit</span> | <span className="delete"
                            onClick={this.handleDelete.bind(this)} value={elem.id}>delete</span>
                    </div>
                </div>
            </div>
        );
    }
}