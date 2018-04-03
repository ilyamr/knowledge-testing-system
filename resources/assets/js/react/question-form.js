import React from 'react';

var Dropzone = require('react-dropzone');
var QuestionSimpleAnswers = require('./answers/simple').default;
var QuestionMultiAnswers = require('./answers/multi').default;
var QuestionTextAnswers = require('./answers/text').default;

import TagsInput from 'react-tagsinput';

var QuestionForm = React.createClass({
    getInitialState: function() {
        return {
            uploading: false,
            model: JSON.parse(JSON.stringify(this.props.parent.props.parent.state.data)),
            type: this.props.parent.props.parent.state.data.type
        };
    },
    imageUpload: function (event) {
        this.setState(state => {
            state.uploading = true;

            return {
                uploading: state.uploading
            };
        });

        var file = event.target.files[0],
            name = file.name,
            size = file.size,
            type = file.type;

        if(file.name.length < 1) {
        }
        else if(file.size > 500000) {
            alert("The file is too big");
        }
        else if(file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg' ) {
            alert("The file does not match png, jpg or gif");
        }
        else {
            var formData = new FormData($('#image')[0]),
                that = this;
            $.ajax({
                url: '/attachment/upload',  //server script to process data
                type: 'POST',
                xhr: function() {  // custom xhr
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                        myXhr.upload.addEventListener('progress', function() {

                        }, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: function(data) {
                    /*
                     * Workaround for Chrome browser // Delete the fake path
                     */
                    that.uploaded(data);
                },
                error: function(data) {
                    alert("Something went wrong!");
                },
                // Form data
                data: formData,
                // Options to tell jQuery not to process data or worry about the content-type
                cache: false,
                contentType: false,
                processData: false
            }, 'json');
        }
    },
    uploaded: function(data) {
        this.setState(state => {
            state.model.image = data.url;
            state.uploading = false;

            return {
                model: state.model,
                uploading: state.uploading
            };
        });
    },
    removeImage: function() {
        this.setState(state => {
            state.model.image = false;

            return {
                model: state.model
            };
        });
    },
    submit: function() {
        var newModel = this.state.model;

        newModel.question = this.refs.question.value;
        newModel.answers = this.refs.answers.getAnswers();
        newModel.correct = this.refs.answers.getCorrect();

        var question = this.props.parent.props.parent;
        question.update(newModel);
        this.props.parent.hide();
    },
    forget: function() {
        var question = this.props.parent.props.parent;
        question.update(question.props.data);
    },
    handleTagsChange: function(tags) {
        this.setState(state => {
            state.model.tags = tags;
            return {model: state.model};
        });
    },
    handleTypeChange: function(event) {
        var newModelState = this.state.model;
        newModelState.type = event.target.value;

        newModelState.answers = this.refs.answers.getAnswers();
        newModelState.correct = this.refs.answers.getCorrect();

        this.setState({
            model: newModelState,
            type: event.target.value
        });
    },
    render: function() {
        var model = this.state.model,
            answers = '';

        if(this.state.type == 'single') {
            answers = <QuestionSimpleAnswers ref="answers" data={this.state.model}/>;
        }
        else if(this.state.type == 'multi') {
            answers = <QuestionMultiAnswers ref="answers" data={this.state.model}/>;
        }
        else if(this.state.type == 'text') {
            answers = <QuestionTextAnswers ref="answers" data={this.state.model}/>;
        }

        var imagePreview = (model.image.length > 1)? (
            <div id="preview">
                <img src={model.image} style={{
                'max-width': '100%'
                }}/>
                <a className="btn btn-danger" onClick={this.removeImage}>Видалити</a>
            </div>
        ) : ('');

        var spinner = this.state.uploading? (
            <i className="fa pull-right fa-circle-o-notch fa-spin" style={{
                'font-size':'24px'
            }}></i>
        ) : ('');

        return (
            <div>
                <div id="question-form">
                    <div>
                        <div className="frm-grp">
                            <div className="small-12 columns lbl">
                                Питання
                            </div>
                            <div className="small-12 columns">
                                <textarea rows="5" defaultValue={model.question} ref="question" className="form-control"></textarea>
                            </div>
                        </div>
                        <div className="frm-grp">
                            <div className="small-12 columns lbl">
                                Зображення <span className="description">(опціонально, буде перед текстом)</span>
                            </div>
                            <div className="small-12 columns">
                                {spinner}
                                <form id="image" enctype="multipart/form-data" action="/attachment/upload">
                                    <input type="file" name="image" onChange={this.imageUpload}/>
                                    {imagePreview}
                                </form>
                            </div>
                        </div>
                        <div className="frm-grp">
                            <div className="small-12 columns lbl">
                                Теги <span className="description">(використовуються для інтелектуального підбору питань)</span>
                            </div>
                            <div className="small-12 columns">
                                <TagsInput value={this.state.model.tags} onlyUnique={true} onChange={this.handleTagsChange} />
                            </div>
                        </div>
                        <div className="frm-grp">
                            <div className="small-12 columns lbl">
                                Тип питання
                            </div>
                            <div className="small-12 columns">
                                <select value={model.type} onChange={this.handleTypeChange} className="form-control">
                                    <option value='single'>1 правильна відповідь</option>
                                    <option value='multi'>Багато правильних відповідей</option>
                                    <option value='text'>Текстова відповідь</option>
                                </select>
                            </div>
                        </div>
                        <div className="frm-grp">
                            <div className="small-12 columns lbl">
                                Варіанти <span className="description">(помітьте правильні, чи введіть текст)</span>
                            </div>
                            <div className="small-12 columns">
                                {answers}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
});

export default QuestionForm;