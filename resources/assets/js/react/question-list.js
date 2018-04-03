import React from 'react';
import NewQuestionButton from './new-question-button';
import Question from './question';

export default
class QuestionList extends React.Component
{
    constructor() {
        super();
        this.state = {
            data: [],
            edited: false
        };
    }

    componentDidMount() {
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            cache: false,
            success: function(data) {
                console.log(data);
                this.setState({data: data});
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    }

    updateData() {
        $('[name="items"]').val(JSON.stringify(this.state.data));
    }

    updateQuestion(question) {
        var key = false;

        this.state.data.forEach(function(value, index, array){
            if(value.id == question.id) {
                key = index;
            }
        });

        if(key !== false) {
            this.setState(state => {
                state.data[key] = question;
                return {data: state.data};
            });
        }

        this.setState({
            edited: true
        });
    }

    componentDidUpdate(prevProps, prevState) {
        this.updateData();
    }

    getNextIndex() {
        var max = 0;

        this.state.data.forEach(function(value, index, array){
            if(value.id > max) {
                max = value.id;
            }
        });

        return max + 1;
    }

    handleDelete(event) {
        var key = parseInt(event.target.value),
            s_key = false;

        this.state.data.forEach(function(value, index, array){
            if(value.id == key) {
                s_key = index;
            }
        });

        if(s_key !== false) {
            this.setState(state => {
                state.data.splice(s_key, 1);
                return {data: state.data,
                    edited: true};
            });
        }
    }

    addNewItem(item) {
        this.setState(state => {
            state.data.push(item);
            return {
                data: state.data,
                edited: true
            };
        });
    }

    render(){
        var a = 0,
            that = this,
            editedOpacity = this.state.edited? 1 : 0,
            list = this.state.data.map(function(item){
            a++;
            return (
                <Question key={item.id + '' + a}
                          data={item}
                          number={a}
                          parent={that}
                          deleteHandler={that.handleDelete.bind(that)}
                    />
            );
        });

        return (
            <div>
                <div className="row">
                    <NewQuestionButton parent={this} />
                    <span className="edit-status" style={{opacity: editedOpacity}}>Тести відредаговані - збережіть тему, аби зберегти зміни</span>
                </div>
                {list}
            </div>
        );
    }
}